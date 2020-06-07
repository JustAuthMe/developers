<?php

namespace App\Http\Controllers\Auth;

use App\Email;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class ResetPasswordController extends Controller
{
    public function emailForm()
    {
        return view('auth.passwords.email_form');
    }

    public function sendEmail()
    {
        $user = User::where('email', request()->get('email'))->first();
        if ($user) {
            $user->password_token = Str::random(64);
            $user->save();
            $url = url('/dash/password/validation/?email=' . $user->email . "&token=" . $user->password_token);
            Email::express($user->email, __('emails.password_reset.body', ['url' => $url]), __('emails.password_reset.subject'), [__('emails.password_reset.action'), $url]);
            return redirect('/dash/login')->with('success', 'Vous allez recevoir un lien permettant de réinitialiser votre mot de passe.');
        } else {
            return redirect()->back()->with('error', "L'adresse e-mail n'existe pas.");
        }
    }

    public function resetPasswordForm()
    {
        if (request()->has(['email', 'token'])) {
            $user = User::where('password_token', request()->get('token'))->first();
            if ($user && $user->email == request()->get('email')) {
                return view('auth.passwords.reset_form');
            }
        }
        return redirect('/dash');
    }

    public function resetPassword()
    {
        if (request()->has(['email', 'token'])) {
            $user = User::where('password_token', request()->get('token'))->first();
            if ($user && $user->email == request()->get('email')) {

                if (request()->method() == 'POST') {
                    request()->validate(['password' => ['required', 'string', 'min:8', 'confirmed']]);
                    $user->password = Hash::make(request()->get('password'));
                    $user->email_token = 1;
                    $user->save();
                    return redirect('/dash/login')->with('Votre mot de passe a bien été modifié. Vous pouvez désormais vous connecter.');
                }
                return view('auth.passwords.reset_form');
            }
        }
        return redirect('/dash');
    }

}
