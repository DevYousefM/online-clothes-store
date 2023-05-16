<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            "name" => "User",
            "email" => "user@gmail.com",
            "password" => Hash::make("user@gmail.com"),
            "user_type" => "user",
        ]);
        User::create([
            "name" => "Admin",
            "email" => "admin@gmail.com",
            "password" => Hash::make("admin@gmail.com"),
            "user_type" => "admin",
        ]);
    }
}
