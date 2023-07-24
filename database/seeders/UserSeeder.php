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
        DB::table('users')->insert([
            [
                'name' => 'Kruno',
                'email' => 'kruno@varikina.com',
                'password' => Hash::make('pass123'),
                'role_id' => 1,
            ],
            [
                'name' => 'test',
                'email' => 'test@varikina.com',
                'password' => Hash::make('password'),
                'role_id' => 2,
            ]
            ]);
    }
}
