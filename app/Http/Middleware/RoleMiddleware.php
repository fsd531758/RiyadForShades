<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{

    public function handle($request, Closure $next, $permission = null, $guard = null)
    {
        $user = Auth::guard('web')->user();

        if (auth('web')->user()->hasPermission([]))
            return $next($request);

        else abort(404);
        return $next($request);
    }
}
