<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('admins')->insert([
            [
                'name' => 'Ahmed Samir',
                'email' => 'admin@admin.com',
                'password' => Hash::make(123456),
            ]
        ]);
    }
}

