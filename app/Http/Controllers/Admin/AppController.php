<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\App_configuration;
class AppController extends Controller
{

	public function __construct() {
	$this->template = env('PRIVATE_TEMPLATE', null).'.admin.apps.';
	}

  public function index()
  {

  	$data = App_configuration::with(['lang'])->first();

  	if (request()->ajax()) {
  		return $data;
  	}
		return view($this->template.'_index',[
			'name_page' => 'Settings || App',
			'title' => 'Dashboard - Settings | App',
			'data' => $data,
			'include' => $this->template.'_form'
		]);
  }

  public function update(Request $request)
  {

  	try {
  		$data = App_configuration::find($request->id);
  		$data->update($request->all());
      $data->audits;
  		return ['error' => 0,'msg' => 'Data updated.'];
  	} catch (\Exception $e) {
  		return ['error' => 1, 'msg' => [$e->getMessage()]];  
  	}
  }

}
