<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;

class ServicesController extends Controller
{
	public function index($name)
	{
		$check = Service::where('url', $name);
		if($check->count() == 1) {
			$data = $check->first();
			return view('services.'.$name, ['data' => $data ]);
		}
		return redirect()->back();
	}
}
