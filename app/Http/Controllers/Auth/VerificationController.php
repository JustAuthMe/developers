<?php

namespace App\Http\Controllers\Auth;

use App\Email;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Str;

class VerificationController extends Controller
{
    public function sender()
    {
        if (request()->has(['token', 'email'])) {
            $user = User::where('email', request()->get('email'))->where('email_token', request()->get('token'))->first();
            if ($user) {
                $user->email_token = 1;
                $user->save();
                return redirect('dash/login')->with('success', "Votre adresse e-mail a bien été validée. Vous pouvez désormais vous connecter.");
            }
            return redirect('dash/email')->with('error', 'Ce lien de validation est invalide.');
        }

        if (request()->method() == "POST") {
            $user = User::where('email', request()->get('email'))->first();
            if ($user && $user->email_token != 1) {
                $user->sendEmailVerificationNotification();
                return redirect('dash/login')->with('success', 'Un lien de validation vient de vous être envoyé.');
            }
            return redirect()->back()->with('error', "Cette adresse e-mail n'existe pas ou a déja été validée.");
        }

        return view('auth.verify');
    }
}
