<?php

namespace App\Http\Controllers\Dash;

use App\Email;
use App\Http\Controllers\Controller;
use App\Invitation;
use App\Organization;
use App\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

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
        return redirect(action('Dash\OrganizationsController@index'))->with('success', "L'organisation a bien été créée.");
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
        return redirect()->back()->with('success', "L'organisation a bien été modifiée.");
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
                return redirect()->back()->with('error', "Cet utilisateur est déja membre de l'organisation.");
            }
            $user->organizations()->sync([$organization->id => ['role' => Organization::ROLE_USER]]);
        } else {
            Invitation::where('email', $data['email'])->where('organization_id', $organization->id)->delete();

            $invitation = Invitation::create([
                'email' => $data['email'],
                'organization_id' => $organization->id,
                'role' => Organization::ROLE_USER
            ]);
            $register_url = url(route('register') . "?invitation_id={$invitation->id}&email={$invitation->email}");
            Email::express($invitation->email, __('emails.invitation.guest.body', [
                'name' => $organization->name,
                'url' => $register_url
            ]), __('emails.invitation.guest.subject'), [__('emails.invitation.guest.action'), $register_url]);
        }

        return redirect()->back()->with('success', "L'utilisateur a bien été invité.");
    }

    public function changeMemberRole($organization, $user_id, $role)
    {
        $user = $organization->users->find($user_id);

        if ($role != Organization::ROLE_USER && $role != Organization::ROLE_ADMIN) {
            return redirect()->back()->with('error', "Vous n'avez pas la permission.");
        }

        if (!$user) {
            return abort(404);
        }

        $user_authenticated = $organization->users->find($this->auth->user()->id);
        if ($user_authenticated && $user_authenticated->pivot->role < Organization::ROLE_ADMIN) {
            return redirect()->back()->with('error', "Vous n'avez pas la permission.");
        }

        $organization->users()->updateExistingPivot($user->id, ['role' => $role]);
        return redirect()->back()->with('success', "Le rôle de l'utilisateur a bien été modifié.");
    }

    public function removeMember($organization_id, $user_id)
    {
        $organization = Organization::findOrFail($organization_id);
        $user = $organization->users->find($user_id);

        if (!$user) {
            return abort(404);
        }

        if ($user->pivot->role == Organization::ROLE_OWNER) {
            return redirect()->back()->with('error', "Vous ne pouvez pas supprimer un propriétaire.");
        }

        if ($user->id != $this->auth->user()->id) {
            $user_authenticated = $organization->users->find($this->auth->user()->id);
            if ($user_authenticated && $user_authenticated->pivot->role < Organization::ROLE_ADMIN) {
                return redirect()->back()->with('error', "Vous n'avez pas la permission.");
            }
        }

        $organization->users()->detach($user->id);
        return redirect()->back()->with('success', "L'utilisateur a bien été retiré.");
    }
}
