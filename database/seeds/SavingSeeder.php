<?php

use Illuminate\Database\Seeder;

class SavingSeeder extends Seeder
{
	/**
	* Run the database seeds.
	*
	* @return void
	*/
	public function run()
	{
		\App\Saving::insert([
			'name' => 'Tabungan Sukarela',
			'interest_rate' => 6
		]);
	}
}
