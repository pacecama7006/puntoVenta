<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Traits\assignRole;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name'     => 'SuperAdmin',
            'email'    => 'admin@gmail.com',
            'password' => bcrypt('123456789'),
        ])->assignRole('SuperAdmin');

        User::create([
            'name'     => 'Administrador',
            'email'    => 'administrador@correo.com',
            'password' => bcrypt('123456789'),
        ])->assignRole('Administrador');
    }
}
