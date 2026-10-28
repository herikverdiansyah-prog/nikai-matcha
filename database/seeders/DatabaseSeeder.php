<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Panggil ProductSeeder di sini
        $this->call([
            ProductSeeder::class,
        ]);
    }
}
