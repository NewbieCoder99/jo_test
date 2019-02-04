<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
	public function __construct() {
		$this->template = env('PUBLIC_TEMPLATE', null);
	}

    public function index() {
        return view($this->template.'.admin.home',[
            'name_page' => 'Dashboard',
            'title' => 'Dashboard'
        ]);
    }
}
