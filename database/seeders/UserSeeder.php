<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@hmti.com',
            'password' => bcrypt('password'),
            'is_admin' => true,
            'nim' => '22552011080'
        ]);

        // Admin
        \App\Models\User::create([
            'name' => 'Dany Faturrochman',
            'email' => 'danny.vatur@gmail.com',
            'password' => Hash::make('password'),
            'is_admin' => false,
            'nim' => '22552011',
        ]);
    }
}

