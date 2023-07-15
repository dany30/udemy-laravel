<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'usuariouno',
            'email' => 'usuariouno@gmail.com',
            'password' => bcrypt('programador'),
        ]);
        User::create([
            'name' => 'usuariodos',
            'email' => 'usuariodos@gmail.com',
            'password' => bcrypt('programador'),
        ]);
        User::create([
            'name' => 'usuariotres',
            'email' => 'usuariotres@gmail.com',
            'password' => bcrypt('programador'),
        ]);
    }
}
