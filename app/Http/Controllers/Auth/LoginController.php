<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
  /*
  |--------------------------------------------------------------------------
  | Login Controller
  |--------------------------------------------------------------------------
  |
  | This controller handles authenticating users for the application and
  | redirecting them to your home screen. The controller uses a trait
  | to conveniently provide its functionality to your applications.
  |
  */

  use AuthenticatesUsers;

  /**
  * Where to redirect users after login.
  *
  * @var string
  */
  protected $redirectTo = '/';

  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    $this->middleware('guest')->except('logout');
  }

  protected function authenticated()
  {
    $lang = \App\Language::where('active', 1)->first();
    if(\Auth::user()->hasRole('superadmin')) {
      return redirect('superadmin');
    } else if(\Auth::user()->hasRole('member')) {
      return redirect('member');
    } else {
      return redirect('/auth/'.$lang->code.'/login');
    }
  }

  public function showLoginForm(Request $request)
  {
    $lang = \App\Language::where('active', 1)->first();
    return redirect('/auth/'.$lang->code.'/login');
  }
}
