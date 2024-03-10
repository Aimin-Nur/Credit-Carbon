<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class GetDlhData
{
    public function handle($request, Closure $next)
    {
        $dlhData = Auth::guard('dlh')->user();
        view()->share('getDlh', $dlhData);
        return $next($request);
    }
}
