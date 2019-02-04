<?php

use Illuminate\Database\Seeder;

class TransactionTypeSeeder extends Seeder
{
	/**
	* Run the database seeds.
	*
	* @return void
	*/
	public function run()
	{
		\App\Transaction_type::insert([
			[ 'name' => 'Setor Tunai' ],
			[ 'name' => 'Tarik Tunai' ],
			[ 'name' => 'Bunga' ]
		]);
	}
}
