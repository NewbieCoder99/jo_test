<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Language;
use Session, App;

class LoginController extends Controller
{
  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    $this->middleware('guest');
  }

  public function index($lang)
  {
    $app = \App\App_configuration::with(['lang'])->first();
    $lang = Session::get('lang');

    if($lang == null) {
      Session::put('lang',$app->lang->code);
      \App::setLocale($lang);
      return redirect(route('web.login', Session::get('lang') ));
    }

    if(!is_null(Session::get('activation_email'))) {
      return redirect(route('activation', Session::get('lang')));
    }

    return view(env('PRIVATE_TEMPLATE').'.auth.login', ['title' => 'Login']);
  }
}
