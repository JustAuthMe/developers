<?php

namespace App\Http\Middleware;

use App\Organization;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class OrganizationAdmin
{
    private $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {
        $controller_name = explode('@', $request->route()->getAction()['uses'])[0];
        $controller = app($controller_name);
        $reflectionMethod = new \ReflectionMethod($controller_name, 'getResource');
        $resource = $reflectionMethod->invokeArgs($controller, $request->route()->parameters());

        $user = Auth::user();
        $organization_user = $resource->users()->where('user_id', $user->id)->get()->first();

        if (!$organization_user || $organization_user->pivot->role < Organization::ROLE_ADMIN) {
            return redirect('/dash')->with('error', "Vous n'avez pas l'autorisation.");
        }

        $request->route()->setParameter($request->route()->parameterNames()[0], $resource);

        return $next($request);
    }
}
