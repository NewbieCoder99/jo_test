<?php

use Illuminate\Database\Seeder;

class AppConfigurationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
			DB::table('app_configurations')->insert([
				'language_id' => 1,
				'name' => 'Web App',
				'meta_description' => 'My Web App Starter',
				'meta_author' => 'Qudrat Nurfajar Yasin Sutisna',
			]);
    }
}
