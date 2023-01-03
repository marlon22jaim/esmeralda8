<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name" => "Marlon Jaimes",
            "phone" => "3000000000",
            "email" => "andres_jr19@hotmail.com",
            "profile" => "ADMIN",
            "status" => "ACTIVE",
            "password" => bcrypt("123"),
        ]);
        User::create([
            "name" => "Guillermo Jaimes",
            "phone" => "3200000000",
            "email" => "guillermo@correo.com",
            "profile" => "ADMIN",
            "status" => "ACTIVE",
            "password" => bcrypt("123"),
        ]);
        User::create([
            "name" => "Carlos",
            "phone" => "3150000000",
            "email" => "carlos@correo.com",
            "profile" => "EMPLOYEE",
            "status" => "ACTIVE",
            "password" => bcrypt("123"),
        ]);
        User::create([
            "name" => "Marbel",
            "phone" => "3050000000",
            "email" => "marbel@correo.com",
            "profile" => "EMPLOYEE",
            "status" => "ACTIVE",
            "password" => bcrypt("123"),
        ]);
    }
}
