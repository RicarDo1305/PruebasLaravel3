<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         User::create([
        'name' => 'Nombre del encargado',
        'email' => 'celfia@gmail.com',
        'noControl' => '01',
        'password' => '12345678',
        'rol' => '1',
        ]);

        User::create([
        'name' => 'José Luis Urquiza Flores',
        'email' => 'urquiza@gmail.com',
        'noControl' => '02',
        'password' => '12345678',
        'rol' => '2',
        ]);
    }
}
