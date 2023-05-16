<?php

namespace Database\Seeders;

use App\Models\Catagory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CatagorySeeder extends Seeder
{
    public function run()
    {
        Catagory::create([
            "name" => "Men",
        ]);
        Catagory::create([
            "name" => "Women",
        ]);
        Catagory::create([
            "name" => "Kids",
        ]);
        Catagory::create([
            "name" => "",
        ]);
    }
}
