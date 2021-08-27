<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserPermissions
{

    /**
     * @param $request
     * @param Closure $next
     * @param string $permission
     * @return mixed|void
     */
    public function handle($request, Closure $next, string $permission = 'none')
    {
        abort_unless((Auth::check() && Auth::user()->can($permission)), 403);
        return $next($request);
    }
}
