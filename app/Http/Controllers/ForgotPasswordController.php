<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class ForgotPasswordController extends Controller
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
			return redirect('/');
		}
		return view(env('PUBLIC_TEMPLATE', null).'.auth.passwords.email');
	}
}
