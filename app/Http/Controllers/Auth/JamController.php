<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use JustAuthMe\SDK\Exceptions\JamNotFoundException;
use JustAuthMe\SDK\JamSdk;


class JamController extends Controller
{

    public function auth(Guard $auth, Request $request)
    {
        $access_token = $request->get('access_token');

        $jamSdk = new JamSdk('498a1e727b95f1f9e30f8c13cc452089', 'http://127.0.0.1:8000/dash/jam', 'iACb5KuuBrhgATIoUZTO6RwnPWJfpN');

        try {
            $user_infos = $jamSdk->getUserInfos($_GET['access_token']);

            if ($auth->guest()) {
                $user = User::where('jam_id', $user_infos->jam_id)->get()->first();
                if ($user) {
                    Auth::login($user, true);
                    return redirect('/dash');
                }

                if (isset($user_infos->email)) {
                    if (User::where('email', $user_infos->email)->exists()) {
                        return redirect(route('login'))->with('error', 'Un utilisateur avec cette adresse e-mail existe déja. Connectez-vous avec votre mot de passe pour lier JustAuthMe.');
                    }

                    $user = new User();
                    $user->email = $user_infos->email;
                    $user->markEmailAsVerified();
                    if (isset($user_infos->firstname)) {
                        $user->firstname = $user_infos->firstname;
                    }
                    if (isset($user_infos->lastname)) {
                        $user->lastname = $user_infos->lastname;
                    }
                    $user->jam_id = $user_infos->jam_id;
                    $user->save();
                    Auth::login($user, true);
                    return redirect(url('/dash'));
                }

                return redirect(route('login'))->with('error', 'Veuillez supprimer le service JustAuthMe Dash dans votre application JustAuthMe.');
            } else {
                $user = $auth->user();
                $user->update(['jam_id' => $user_infos->jam_id, 'password' => null]);
                return redirect('/dash')->with('success', 'Vous pouvez désormais vous connecter avec JustAuthMe.');
            }

        } catch (JamNotFoundException $e) {
            return redirect(route('login'))->with('error', 'Une erreur est survenue.');
        }

    }
}
