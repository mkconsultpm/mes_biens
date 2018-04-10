<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if ($request->user()) {
            $user = $request->user();

            if ($user->is_admin) {
                return redirect()->route("excel_files.index");
            }

            return redirect()->route("prospects.theNext");

        }
        if (Auth::guard($guard)->check()) {
            //return redirect('/home');
            return redirect()->route("prospects.theNext");
        }

        return $next($request);
    }
}
