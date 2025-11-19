<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Default role user
        DB::table('users')->insert([
            'name' => 'Dimass',
            'nik' => '1234567890123456', // NIK user
            'email' => 'Dimas@gmail.com',
            'role' => 'user', // default role
            'password' => Hash::make('Dimas12'),
        ]);

        // Admin
        DB::table('users')->insert([
            'name' => 'Admin Satu',
            'nik' => '0000000000000000', // NIK admin
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('admin123'),
        ]);
    }
}
