<?php

namespace App\Http\Controllers\Dash;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class IntegrationController
{

    public function abort()
    {
        Session::remove('integration');
        return redirect()->back();
    }

    public function integrate(Request $request)
    {
        if (!$request->has('url') || !filter_var($request->get('url'), FILTER_VALIDATE_URL)) {
            return redirect(route('login'))->with('error', 'The integration link is incorrect.');
        }

        Session::put('integration', ['url' => $request->get('url'), 'status' => 'login_required']);

        if (Auth::guest()) {

            return redirect(route('register'))->with('success', __('dash.welcome-message', ['url' => url(route('login'))]));
        }

        return redirect(url('dash/apps/create-integration'));
    }
}
