<?php

use Illuminate\Database\Seeder;

class VaultSeeder extends Seeder
{
	/**
	* Run the database seeds.
	*
	* @return void
	*/
	public function run()
	{
		\App\Vault::insert([
			'balance' => 0,
			'previous_balance' => 0 
		]);
	}
}
