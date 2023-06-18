<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // DB::table('users')->delete();
        DB::table('users')->insert([
            'name' => 'Ferrari Romano',
            'email' => 'ferrariromano74@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Kikik211101'),
            'role_name' => 'Admin',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'Augusta',
            'email' => 'Augusta@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Kikik211101'),
            'role_name' => 'Pasien',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
