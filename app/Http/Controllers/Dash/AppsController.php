<?php

namespace App\Http\Controllers\Dash;

use App\App;
use App\Http\Controllers\Controller;
use App\Invitation;
use App\Organization;
use App\Rules\Fqdn;
use App\StaticJAM;
use App\User;
use GuzzleHttp\Client;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AppsController extends Controller
{
    private $auth;
    private $request;

    public function __construct(Guard $auth, Request $request)
    {
        $this->middleware('auth');

        $this->auth = $auth;
        $this->request = $request;
    }

    public function index()
    {
        $apps = $this->auth->user()->applications();
        return view('dash.apps.index', compact('apps'));
    }

    public function create()
    {
        $app = new App();
        return view('dash.apps.create', compact('app'));
    }

    public function createIntegration()
    {
        if (!Session::has('integration') || !isset(Session::get('integration')['url']) || !filter_var(Session::get('integration')['url'], FILTER_VALIDATE_URL)) {
            return redirect(url('dash/'))->with('error', 'default-error');
        }

        $wp_request = (new Client(['timeout' => 10.0, 'http_errors' => false, 'verify' => false]))->request('GET', Session::get('integration')['url'] . '/wp-content/plugins/justauthme/check.php');
        if ($wp_request->getStatusCode() != 200) {
            return view('dash.apps.integration', ['status' => 'error', 'type' => 'failed_verification']);
        }
        $check = json_decode($wp_request->getBody()->getContents(), true);
        if (!isset($check['install_type'], $check['name'])) {
            return view('dash.apps.integration', ['status' => 'error', 'type' => 'failed_verification']);
        }

        $logo_url = env('DEFAULT_APP_LOGO');
        if (isset($check['icon']) && filter_var($check['icon'], FILTER_VALIDATE_URL)) {
            $upload = StaticJAM::express(basename($check['icon']), $check['icon']);
            if ($upload) {
                $logo_url = $upload;
            }
        }

        $res = App::create([
            'url' => Session::get('integration')['url'],
            'name' => $check['name'],
            'redirect_url' => Session::get('integration')['url'].'/wp-content/plugins/justauthme/callback.php',
            'data' => ['email!', 'firstname', 'lastname'],
            'logo' => $logo_url
        ]);

        if ($res->getStatusCode() == 200) {
            $client_app = json_decode($res->getBody()->getContents(), true)['client_app'];
            $app = new App($client_app);
            $app->setOwner($this->auth->user());
            Session::remove('integration');
            return view('dash.apps.integration', ['status' => 'success', 'app' => $app]);
        } elseif ($res->getStatusCode() == 409) {
            return view('dash.apps.integration', ['status' => 'error', 'type' => 'already_exists']);
        } else {
            return view('dash.apps.integration', ['status' => 'error', 'type' => 'failed_verification']);
        }
    }

    public function store(Request $request)
    {
        $this->request->validate([
            'name' => 'required|between:2,255',
            'logo' => 'nullable|image',
            'url' => 'required|url',
            'redirect_url' => 'required|url'
        ]);


        if (!preg_match("#^" . addslashes($request->get('url')) . "(\/.*)?$#", $request->get('redirect_url'))) {
            return redirect()->back()->with('error', __('dash.apps.alerts.redirect-url-same-base-url'));
        }

        $logo_url = env('DEFAULT_APP_LOGO');
        if ($request->has('logo')) {
            $upload = StaticJAM::uploadLogo($request->file('logo'));
            if ($upload) {
                $logo_url = $upload;
            }
        }

        $res = App::create([
            'url' => $request->get('url'),
            'name' => $request->get('name'),
            'redirect_url' => $request->get('redirect_url'),
            'data' => $this->getRetrievedData(),
            'logo' => $logo_url
        ]);

        if ($res->getStatusCode() == 409) {
            return redirect()->back()->with('error', __('dash.apps.alerts.already-exists'));
        }
        if ($res->getStatusCode() == 200) {
            $client_app = json_decode($res->getBody()->getContents(), true)['client_app'];
            $app = new App($client_app);
            $app->setOwner($this->auth->user());
            return redirect(action('Dash\AppsController@index'))->with('success', __('dash.apps.alerts.created'));
        }

        return redirect()->back()->with('error', __('dash.alerts.default-error'));
    }

    public function edit($id)
    {
        $app = App::findOrFail($id);
        if (!$app) {
            return redirect(action('Dash\AppsController@index'))->with('error', __('dash.apps.alerts.not-found'));
        }

        if (!$app->isAuthorized($this->auth->user())) {
            return redirect(action('Dash\AppsController@index'))->with('error', __('dash.alerts.unauthorized'));
        }

        if ($this->request->has('revoke_secret')) {
            $app->revokeSecret();
            return redirect()->back()->with('success', __('dash.apps.alerts.secret-revoked'));
        }

        return view('dash.apps.edit', compact('app'));
    }

    public function update($id, Request $request)
    {
        $app = App::findOrFail($id);
        if (!$app) {
            return redirect(action('Dash\AppsController@index'))->with('error', __('dash.apps.alerts.not-found'));
        }

        if (!$app->isAuthorized($this->auth->user())) {
            return redirect(action('Dash\AppsController@index'))->with('error', __('dash.alerts.unauthorized'));
        }

        $this->request->validate([
            'name' => 'required|between:2,255',
            'logo' => 'image',
            'redirect_url' => 'required|url'
        ]);

        // Get name
        if ($request->get('name') != $app->name) {
            $data_to_update['name'] = $request->get('name');
        }

        // Get dev mode
        $data_to_update['dev'] = ($request->has('dev')) == 1;

        // Logo upload
        if ($request->has('logo')) {
            $url = StaticJAM::uploadLogo($request->file('logo'));
            if ($url) {
                $data_to_update['logo'] = $url;
            } else {
                return redirect()->back()->with('error', __('dash.alerts.default-error'));
            }
        }

        // Get redirect URL
        if ($request->get('redirect_url') != $app->redirect_url) {
            if (!preg_match("#^" . addslashes($app->url) . "(\/.*)?$#", $request->get('redirect_url'))) {
                return redirect()->back()->with('error', __('dash.apps.alerts.redirect-url-same-base-url'));
            }
            $data_to_update['redirect_url'] = $request->get('redirect_url');
        }

        // Get desired data
        $data_to_update['data'] = $this->getRetrievedData();

        $res = $app->update($data_to_update);

        if ($res->getStatusCode() == 409) {
            return redirect()->back()->with('error', __('dash.apps.alerts.already-exists'));
        }

        if ($res->getStatusCode() == 200) {
            return redirect(action('Dash\AppsController@edit', $id))->with('success', __('dash.apps.alerts.updated'));
        }

        return redirect()->back()->with('error', __('dash.alerts.default-error'));
    }

    protected function getRetrievedData()
    {
        $data = $this->request->all();
        $retrieved_data = ['email!'];
        if (isset($data['requested_data'])) {
            foreach ($data['requested_data'] as $requested_data) {
                if (in_array($requested_data, call_user_func_array('array_merge', App::$data_available))) {
                    $retrieved_data[] = (isset($data['required_data']) && in_array($requested_data, $data['required_data'])) ? $requested_data . '!' : $requested_data;
                }
            }
        }
        return $retrieved_data;
    }

    public function changeOwner($id)
    {
        $app = App::findOrFail($id);
        if (!$app) {
            return redirect()->back()->with('error', __('dash.apps.alerts.not-found'));
        }

        if (!$app->isAuthorized($this->auth->user())) {
            return redirect()->back()->with('error', __('dash.alerts.unauthorized'));
        }

        $data = $this->request->all();

        if (get_class($app->getOwner()) == Organization::class) {
            if ($this->auth->user()->organizations()->where('organization_id', $app->getOwner()->id)->get()->first()->pivot->role != Organization::ROLE_OWNER) {
                return redirect()->back()->with('error', __('dash.alerts.unauthorized'));
            }
        }

        if (isset($data['type']) && $data['type'] == 'user') {
            $user = User::where('email', $data['email'])->get()->first();
            if ($user) {
                $app->setOwner($user);
                return redirect(action('Dash\AppsController@index'))->with('success', __('dash.apps.alerts.owner-change-ok'));
            } else {
                return redirect()->back()->with('error', __('dash.apps.alerts.user-invited-does-not-exist'));
            }
        }

        if (isset($data['type']) && $data['type'] == 'organization') {
            $organization = Organization::find($data['organization_id']);
            if ($organization) {
                $app->setOwner($organization);
                return redirect(action('Dash\AppsController@index'))->with('success', __('dash.apps.alerts.owner-change-ok'));
            }
        }

        return redirect()->back()->with('error', __('dash.alerts.default-error'));
    }
}
