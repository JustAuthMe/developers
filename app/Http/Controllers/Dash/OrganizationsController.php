<?php

namespace App\Http\Controllers\Dash;

use App\Email;
use App\Http\Controllers\Controller;
use App\Invitation;
use App\Organization;
use App\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrganizationsController extends Controller
{
    private $auth;
    private $request;

    public function __construct(Guard $auth, Request $request)
    {
        $this->middleware('auth');
        $this->middleware('organization.admin', ['except' => ['index', 'create', 'store', 'removeMember']]);

        $this->auth = $auth;
        $this->request = $request;
    }

    public function getResource($id)
    {
        return Organization::findOrFail($id);
    }

    public function index()
    {
        $organizations = $this->auth->user()->organizations;
        return view('dash.organizations.index', compact('organizations'));
    }

    public function create()
    {
        $organization = new Organization();
        return view('dash.organizations.create', compact('organization'));
    }

    public function store()
    {
        $this->request->validate([
            'name' => 'required|regex:/^[a-zA-Z0-9\s]+$/|between:2,255'
        ]);

        $organization = Organization::create($this->request->only('name'));
        $organization->users()->sync([$this->auth->user()->id => ['role' => Organization::ROLE_OWNER]]);
        return redirect(action('Dash\OrganizationsController@index'))->with('success', __('dash.organizations.alerts.created'));
    }

    public function manage($organization)
    {
        return view('dash.organizations.manage', compact('organization'));
    }

    public function update($organization)
    {
        $this->request->validate([
            'name' => 'required|regex:/^[a-zA-Z0-9\s]+$/|between:2,255'
        ]);
        $organization->update($this->request->only('name'));
        return redirect()->back()->with('success', __('dash.organizations.alerts.updated'));
    }

    public function invite($organization)
    {
        $this->request->validate([
            'email' => 'required|email'
        ]);

        $data = $this->request->only('email');

        $user = User::where('email', $data['email'])->get()->first();
        if ($user) {
            if ($user->organizations->contains($organization->id)) {
                return redirect()->back()->with('error', __('dash.organizations.alerts.user_already_member'));
            }
            $user->organizations()->sync([$organization->id => ['role' => Organization::ROLE_USER]]);
        } else {
            Invitation::where('email', $data['email'])->where('organization_id', $organization->id)->delete();

            $invitation = Invitation::create([
                'email' => $data['email'],
                'organization_id' => $organization->id,
                'token' => Str::random(64),
                'role' => Organization::ROLE_USER
            ]);
            $register_url = url(route('register') . "?token={$invitation->token}&email={$invitation->email}");
            Email::express($invitation->email, __('emails.invitation.guest.body', [
                'name' => $organization->name,
                'url' => $register_url
            ]), __('emails.invitation.guest.subject'), [__('emails.invitation.guest.action'), $register_url]);
        }

        return redirect()->back()->with('success', __('dash.organizations.alerts.invited'));
    }

    public function changeMemberRole($organization, $user_id, $role)
    {
        $user = $organization->users->find($user_id);

        if ($role != Organization::ROLE_USER && $role != Organization::ROLE_ADMIN) {
            return redirect()->back()->with('error', __('dash.alerts.unauthorized'));
        }

        if (!$user) {
            return abort(404);
        }

        $user_authenticated = $organization->users->find($this->auth->user()->id);
        if ($user_authenticated && $user_authenticated->pivot->role < Organization::ROLE_ADMIN) {
            return redirect()->back()->with('error', __('dash.alerts.unauthorized'));
        }

        $organization->users()->updateExistingPivot($user->id, ['role' => $role]);
        return redirect()->back()->with('success', __('dash.organizations.alerts.role-updated'));
    }

    public function removeMember($organization_id, $user_id)
    {
        $organization = Organization::findOrFail($organization_id);
        $user = $organization->users->find($user_id);

        if (!$user) {
            return abort(404);
        }

        if ($user->pivot->role == Organization::ROLE_OWNER) {
            return redirect()->back()->with('error', __('dash.alerts.unauthorized'));
        }

        if ($user->id != $this->auth->user()->id) {
            $user_authenticated = $organization->users->find($this->auth->user()->id);
            if ($user_authenticated && $user_authenticated->pivot->role < Organization::ROLE_ADMIN) {
                return redirect()->back()->with('error', __('dash.alerts.unauthorized'));
            }
        }

        $organization->users()->detach($user->id);
        return redirect()->back()->with('success', __('dash.organizations.alerts.kicked'));
    }
}
