<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Invitation;
use App\Organization;
use App\Providers\RouteServiceProvider;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    private $request;

    public function __construct(Request $request)
    {
        $this->middleware('guest');

        $this->request = $request;
    }

    public function showRegistrationForm()
    {
        $invitation_id = $this->request->get('invitation_id');
        $email = $this->request->get('email');

        if ($invitation_id && $email) {
            $invitation = Invitation::findOrFail($invitation_id);
            if ($invitation->email != $email) {
                return abort(400);
            }
            if ($invitation->used_at) {
                return redirect(route('login'))->with('error', "Cette invitation a déja été utilisée.");
            }
            return view('auth.register', compact('invitation'));
        }

        return view('auth.register');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        $user = User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        if (isset($data['invitation_id'])) {
            $invitation = Invitation::findOrFail($data['invitation_id']);

            if ($invitation->email != $data['email']) {
                return abort(400);
            }
            if ($invitation->used_at) {
                return redirect(route('login'))->with('error', "Cette invitation a déja été utilisée.");
            }
            $user->update(['email_verified_at' => new Carbon('now')]);
            $user->organizations()->sync([$invitation->organization_id => ['role' => Organization::ROLE_USER]]);
            $invitation->update(['used_at' => new Carbon('now')]);
        }

        return $user;
    }
}
