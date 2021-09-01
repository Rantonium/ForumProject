<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Policies\UserPolicy;
use Closure;
use HttpException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminCheck
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @param null $guard
     * @return mixed
     * @throws HttpException
     */

    public function handle(Request $request, Closure $next, $guard = null )
    {
        // Added @noinspection because PhpStorm annoys me
        /** @noinspection PhpUndefinedMethodInspection */
        if(Auth::guard($guard)->user()->can(UserPolicy::ADMIN, User::class)) {
            return $next($request);
        }
        throw new HttpException(403, 'Forbidden');
    }
}
