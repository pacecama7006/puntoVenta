<?php

namespace Database\Seeders;

use App\Models\Business;
use Illuminate\Database\Seeder;

class BusinessTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Business::create([
            'name'        => 'Checos interprise',
            'description' => 'Reciclado de materiales',
            'rfc'         => 'xxxx-010237-x12',
            'adress'      => 'Dirección conocida',
            'phone'       => '443-111-1111',
            'email'       => 'correo@correo.com',
            'logo'        => 'logo.png',
        ]);

    }
}
