<?php

use Illuminate\Database\Seeder;

class WalletSeeder extends Seeder
{
	/**
	* Run the database seeds.
	*
	* @return void
	*/
	public function run()
	{
		\App\Wallet::insert([
			'client_id' => 1,
			'saving_id' => 1,
			'balance' => 0,
			'previous_balance' => 0
		]);
	}
}
