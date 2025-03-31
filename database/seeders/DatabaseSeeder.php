<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
   
    public function run(): void
    {
        // Uncomment jika ingin membuat user menggunakan factory
        // User::factory(10)->create();

        // Tambahkan seeder untuk tabel promotions
        $this->call(PromotionsSeeder::class);
    }
}