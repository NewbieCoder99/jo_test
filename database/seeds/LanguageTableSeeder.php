<?php

use Illuminate\Database\Seeder;

class LanguageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('languages')->insert([
			[
				'code' => 'en',
				'name' => 'English',
				'active' => 1
			],
			[
				'code' => 'id',
				'name' => 'Indonesia',
				'active' => 0
			]
		]);
    }
}
