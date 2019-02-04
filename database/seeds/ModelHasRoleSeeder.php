<?php

use Illuminate\Database\Seeder;
use App\Model_has_role;

class ModelHasRoleSeeder extends Seeder
{
	/**
	* Run the database seeds.
	*
	* @return void
	*/
	public function run()
	{
		Model_has_role::create([
			'role_id' => 1,
			'model_type' => 'App\User',
			'model_id' => 1,
		]);
		Model_has_role::create([
			'role_id' => 2,
			'model_type' => 'App\User',
			'model_id' => 2,
		]);
	}
}
