<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolesAndPermissionsSeeder::class,
            UsersTableSeeder::class,
            LanguageTableSeeder::class,
            AppConfigurationsTableSeeder::class,
            ModelHasRoleSeeder::class,
            VaultSeeder::class,
            ClientSeeder::class,
            SavingSeeder::class,
            TransactionTypeSeeder::class,
            WalletSeeder::class,
        ]);
    }
}
