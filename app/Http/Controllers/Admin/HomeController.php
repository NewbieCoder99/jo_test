<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Auth;
use App\User;

class HomeController extends Controller
{
	public function __construct() {
		$this->template = env('PRIVATE_TEMPLATE', null);
	}

	public function index() {
		return view($this->template.'.admin.home',[
			'name_page' => 'Dashboard',
			'title' => 'Dashboard',
		]);
	}
}
