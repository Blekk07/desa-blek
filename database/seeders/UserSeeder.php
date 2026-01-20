<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Default role user
        DB::table('users')->updateOrInsert(
            ['email' => 'Dimas@gmail.com'],
            [
                'name' => 'Dimass',
                'nik' => '1111111111111111',
                'role' => 'user',
                'password' => Hash::make('Dimas12'),
                'email_verified_at' => Carbon::now(),
            ]
        );

        // Admin
        DB::table('users')->updateOrInsert(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin Desa',
                'nik' => '0000000000000000',
                'role' => 'admin',
                'password' => Hash::make('admin1207'),
                'email_verified_at' => Carbon::now(),
            ]
        );
    }
}
