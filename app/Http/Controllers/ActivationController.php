<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Language;
use App\Mail\SendActivation;
use Illuminate\Support\Facades\Mail;
use Session, App;

class ActivationController extends Controller
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

	public function index()
	{

		$app = \App\App_configuration::with(['lang'])->first();
		$lang = Session::get('lang');

		if($lang == null) {
		  Session::put('lang',$app->lang->code);
		  \App::setLocale($lang);
		  return redirect('/');
		}

		if(is_null(Session::get('activation_email'))) {
		  return redirect('/auth/'.Session::get('lang').'/login');
		}

	  return view(env('PUBLIC_TEMPLATE', null).'.auth.activation', ['title' => 'Activation Member']);
	}

	public function send_activation(Request $request)
	{

		$email = Session::get('activation_email');

		if($request->isMethod('post')) {
			$email = $request->email;
		}

		if(is_null($email)) {
		  return redirect('/auth/'.Session::get('lang').'/login');
		}

		$data = [
			'unique_code' => sha1(sha1(sha1(sha1($this->code($email))))) 
		];
		return Mail::to($email)->send(new SendActivation($data));
		// return (new SendActivation($data))->render();
	}

	private function code($email)
	{
		$r = rand(1,999) * rand(2,date('Y'));
		$n = $r * date('dmyhis');
		return $email.$n;
	}

}
