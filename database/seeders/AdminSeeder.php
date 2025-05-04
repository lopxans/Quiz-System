<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            "name" => "sulav",
            "password" => 123,
            "role" => "admin",
        ]);
        Admin::create([
            "name" => "selin",
            "password" => 321,
            "role" => "creater",
        ]);
    }
}
