<?php

namespace Database\Seeders;

use Database\Seeders\BusinessTableSeeder;
use Database\Seeders\PrinterTableSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PrinterTableSeeder::class);
        $this->call(BusinessTableSeeder::class);
    }
}
