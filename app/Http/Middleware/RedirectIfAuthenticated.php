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
    if (Auth::guard($guard)->check()) {
      if(Auth::user()->hasRole('superadmin')) {
        return redirect(route('dashboard.admin'));
      } else if(Auth::user()->hasRole('member')) {
        return redirect(route('dashboard.member'));
      } else {
        return redirect('/activation');
      }
    }

    return $next($request);
  }
}
