<?php

namespace App\Http\Middleware;

use Closure, Session, Auth, App;

class LangMiddleware
{
  /**
  * The availables languages.
  *
  * @array $languages
  */
  protected $languages = ['id','en'];

  /**
  * Handle an incoming request.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \Closure  $next
  * @return mixed
  */
  public function handle($request, Closure $next)
  {
    App::setLocale(Session::get('lang'));
    return $next($request);
  }
}
