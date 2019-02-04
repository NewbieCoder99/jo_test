<?php

use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
	/**
	* Run the database seeds.
	*
	* @return void
	*/
	public function run()
	{
		\App\Client::insert([
			'first_name' => 'Qudrat',
			'middle_name' => 'Nur Fajar',
			'last_name' => 'YS',
			'gender' => 'Male',
			'date_of_birth' => '1994-12-11',
			'job' => 'Programmer',
			'address' => 'Jl. Pahlawan No. 25 Majalengka Kulon',
			'city' => 'Majalengka',
			'phone' => '081324712041'
		]);
	}
}
