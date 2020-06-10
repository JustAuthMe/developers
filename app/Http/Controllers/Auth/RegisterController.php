<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Invitation;
use App\Organization;
use App\Providers\RouteServiceProvider;
use App\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Response;
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
        $token = $this->request->get('token');
        $email = $this->request->get('email');

        if ($token && $email) {
            $invitation = Invitation::where('token', $token)->first();
            if (!$invitation || $invitation->email != $email) {
                return redirect(route('login'));
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

        if (isset($data['token'])) {
            $invitation = Invitation::where('token', $data['token'])->first();

            if ($invitation->email != $data['email']) {
                return abort(400);
            }
            if ($invitation->used_at) {
                return redirect(route('login'))->with('error', "Cette invitation a déja été utilisée.");
            }
            $user->markEmailAsVerified();
            $user->organizations()->sync([$invitation->organization_id => ['role' => Organization::ROLE_USER]]);
            $invitation->update(['used_at' => new Carbon('now')]);
        } else {
            $user->sendEmailVerificationNotification();
        }

        return $user;
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        if($user->email_token != 1){
            return redirect('dash/login')->with('success', 'Votre compte a bien été créé. Merci de valider votre email avant de vous connecter.');
        }
        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
            ? new Response('', 201)
            : redirect($this->redirectPath());
    }
}
