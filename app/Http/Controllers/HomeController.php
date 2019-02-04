<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\App_configuration;
use Auth;

class HomeController extends Controller
{

	/**
	* Create a new controller instance.
	*
	* @return void
	*/
	public function __construct()
	{
		$this->template = env('PUBLIC_TEMPLATE', null);
	}

  public function index()
  {
		return view($this->template.'._home', [
			'name_page' => '',
			'title' => '',
			'data' => App_configuration::find(1)
		]);
  }

}
