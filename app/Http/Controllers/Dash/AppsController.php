<?php

namespace App\Http\Controllers\Dash;

use App\App;
use App\Http\Controllers\Controller;
use App\Invitation;
use App\Organization;
use App\Rules\Fqdn;
use App\StaticJAM;
use App\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

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

    public function store()
    {
        $this->request->validate([
            'name' => 'required|between:2,255',
            'logo' => 'image',
            'domain' => ['required', new Fqdn()],
            'redirect_url' => 'required|url'
        ]);


        $data = $this->request->all();

        if (!filter_var($data['redirect_url'], FILTER_VALIDATE_URL)) {
            return redirect()->back()->with('error', "L'URL de redirection est invalide.");
        }

        if (!preg_match("#^https:\/\/" . addslashes($data['domain']) . "(\/.*)?$#", $data['redirect_url'])) {
            return redirect()->back()->with('error', "L'URL de redirection doit être en https et doit être sous le même domaine.");
        }

        $data_retrivied = ['!email'];

        $logo = $data['logo'];
        $dataurl = 'data:image/' . pathinfo($logo->getClientOriginalName(), PATHINFO_EXTENSION) . ';base64,' . base64_encode(file_get_contents($logo->getPathName()));
        $logo_uploaded = StaticJAM::express($logo->getClientOriginalName(), $dataurl);
        if ($logo_uploaded) {
            $url = $logo_uploaded;
        } else {
            return redirect()->back()->with('error', "Une erreur inattendue s’est produite.");
        }

        $res = App::create([
            'domain' => $data['domain'],
            'name' => $data['name'],
            'redirect_url' => $data['redirect_url'],
            'data' => $this->getRetrievedData(),
            'logo' => $url
        ]);

        if ($res->getStatusCode() == 409) {
            return redirect()->back()->with('error', 'Une application portant se nom ou se domaine existe déja.');
        }
        if ($res->getStatusCode() == 200) {
            $client_app = json_decode($res->getBody()->getContents(), true)['client_app'];
            $app = new App($client_app['id'], $client_app['app_id'], $client_app['domain'], $client_app['name'], $client_app['redirect_url'], $client_app['data'], $client_app['logo']);
            $app->setOwner($this->auth->user());
            return redirect(action('Dash\AppsController@index'))->with('success', "L'application a bien été créée.");
        }

        return redirect()->back()->with('error', "Une erreur inattendue s’est produite.");
    }

    public function edit($id)
    {
        $app = App::findOrFail($id);
        if (!$app) {
            return redirect(action('Dash\AppsController@index'))->with('error', "L'application n'existe pas ou plus.");
        }

        if (!$app->isAuthorized($this->auth->user())) {
            return redirect(action('Dash\AppsController@index'))->with('error', "Vous n'avez pas l'autorisation.");
        }

        if ($this->request->has('revoke_secret')) {
            $app->revokeSecret();
            return redirect()->back()->with('success', "La clé secrète a bien été revoquée.");
        }

        return view('dash.apps.edit', compact('app'));
    }

    public function update($id)
    {
        $app = App::findOrFail($id);
        if (!$app) {
            return redirect(action('Dash\AppsController@index'))->with('error', "L'application n'existe pas ou plus.");
        }

        if (!$app->isAuthorized($this->auth->user())) {
            return redirect(action('Dash\AppsController@index'))->with('error', "Vous n'avez pas l'autorisation.");
        }

        $this->request->validate([
            'name' => 'required|between:2,255',
            'logo' => 'image',
            'redirect_url' => 'required|url'
        ]);

        $data = $this->request->all();

        if ($data['name'] != $app->name) {
            $data_updated['name'] = $data['name'];
        }

        $data_updated['dev'] = isset($data['dev']) && $data['dev'] == 1;

        if (isset($data['logo'])) {
            $logo = $data['logo'];
            $dataurl = 'data:image/' . pathinfo($logo->getClientOriginalName(), PATHINFO_EXTENSION) . ';base64,' . base64_encode(file_get_contents($logo->getPathName()));
            $url = StaticJAM::express($logo->getClientOriginalName(), $dataurl);
            if ($url) {
                $data_updated['logo'] = $url;
            } else {
                return redirect()->back()->with('error', "Une erreur inattendue s’est produite.");
            }
        }

        if ($data['redirect_url'] != $app->redirect_url) {
            $data_updated['redirect_url'] = $data['redirect_url'];
        }

        $data_updated['data'] = $this->getRetrievedData();

        $res = $app->update($data_updated);

        if ($res->getStatusCode() == 409) {
            return redirect()->back()->with('error', 'Une application portant ce nom ou ce domaine existe déja.');
        }

        if ($res->getStatusCode() == 200) {
            return redirect(action('Dash\AppsController@edit', $id))->with('success', "L'application a bien été modifiée.");
        }

        return redirect()->back()->with('error', "Une erreur inattendue s’est produite.");
    }

    protected function getRetrievedData()
    {
        $data = $this->request->all();
        $data_retrivied = ['!email'];
        foreach (App::$data_available as $data_type => $data_name) {
            if (isset($data['retrieve_' . $data_type])) {
                if (isset($data['require_' . $data_type])) {
                    $data_retrivied[] = '!' . $data_type;
                } else {
                    $data_retrivied[] = $data_type;
                }
            }
        }
        return $data_retrivied;
    }

    public function changeOwner($id)
    {
        $app = App::findOrFail($id);
        if (!$app) {
            return redirect()->back()->with('error', "L'application n'existe pas ou plus.");
        }

        if (!$app->isAuthorized($this->auth->user())) {
            return redirect()->back()->with('error', "Vous n'avez pas l'autorisation.");
        }

        $data = $this->request->all();

        if (get_class($app->getOwner()) == Organization::class) {
            if ($this->auth->user()->organizations()->where('organization_id', $app->getOwner()->id)->get()->first()->pivot->role != Organization::ROLE_OWNER) {
                return redirect()->back()->with('error', "Vous n'avez pas l'autorisation.");
            }
        }

        if (isset($data['type']) && $data['type'] == 'user') {
            $user = User::where('email', $data['email'])->get()->first();
            if ($user) {
                $app->setOwner($user);
                return redirect(action('Dash\AppsController@index'))->with('success', 'Le changement de propriétaire a bien été effectué.');
            } else {
                return redirect()->back()->with('error', "Il n'existe aucun utilisateur avec cette adresse e-mail.");
            }
        }

        if (isset($data['type']) && $data['type'] == 'organization') {
            $organization = Organization::find($data['organization_id']);
            if ($organization) {
                $app->setOwner($organization);
                return redirect(action('Dash\AppsController@index'))->with('success', 'Le changement de propriétaire a bien été effectué.');
            }
        }

        return redirect()->back()->with('error', "Une erreur inattendue s’est produite.");
    }
}
