<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class GetUserData
{
    public function handle($request, Closure $next)
    {
        $userData = Auth::guard('swasta')->user();
        view()->share('getUser', $userData);
        return $next($request);
    }
}
