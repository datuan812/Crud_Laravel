<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();
        \App\Models\LopHoc::factory(10)->create();
        \App\Models\KhoaHoc::factory(10)->create();
        \App\Models\SinhVien::factory(10)->create();
    }
}
