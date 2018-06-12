<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserUniqueAuth
{
    public function handle($request, Closure $next)
    {
        if(auth()->user()->token_access != session()->get('access_token')) {
            Auth::logout();

            return redirect()
                ->route('login')
                ->with('message', app('translator')->get('resource.errors.session.expired'));
        }
        return $next($request);
    }
}