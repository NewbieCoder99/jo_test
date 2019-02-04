<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session, Validator, App\User, App\Activation, Lang;

class RegisterController extends Controller
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

    if(!is_null(Session::get('activation_email'))) {
      return redirect('/'.$lang.'/activation');
    }

		return view(env('PUBLIC_TEMPLATE', null).'.auth.register', ['title' => 'Registration Member']);
	}

	public function store(Request $request)
	{
		$valid = Validator::make($request->all(), $this->rules(), $this->messages());
		if(!$valid->fails())
		{
	    try
	    {
				DB::table('users')->insert([
					'name' => $request->name,
					'email' => $request->email,
					'password' => bcrypt($request->password)
				]);

        Session::put('activation_email', $request->email);

        return ['error' => 0, 'msg' => Lang::get('register.success')];
	    } catch (\Exception $e) {
				return ['error' => 1, 'msg' => [$e->getMessage()]];  
	    }
		}
		return ['error' => 1,'msg' => $valid->errors()->all()];
	}

	private function rules()
	{
		return [
			'name' => 'required',
			'email' => 'required|unique:users,email|email',
			'password' => 'required',
			'password_confirmation' => 'same:password',
		];
	}

	private function messages()
	{
		return [
			'name.required' => 'Nama tidak boleh kosong.',
			'email.required' => 'Email tidak boleh kosong.',
			'email.unique' => 'Email sudah tersedia.',
			'email.email' => 'Format email salah.',
			'password.required' => 'Password tidak boleh kosong.',
			'password_confirmation.same' => 'Password konfirmasi tidak sama.',
			'role_id.required' => 'Level akses user tidak boleh kosong.',
			'role_id.numeric' => 'Level akses user hanya angka saja.'
		];
	}

}
