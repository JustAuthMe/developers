<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->middleware('auth');

        $this->auth = $auth;
    }

    public function edit()
    {
        $user = $this->auth->user();
        return view('dash.user.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'firstname' => 'string|max:255',
            'lastname' => 'string|max:255',
            'password' => 'nullable|string|min:8|confirmed'
        ]);

        $user = $this->auth->user();

        if ($request->get('password')) {
            $user->password = Hash::make($request->get('password'));
        }

        $user->update($request->only('firstname', 'lastname'));
        return redirect()->back()->with('success', 'Votre profil a bien été modifié.');
    }
}
