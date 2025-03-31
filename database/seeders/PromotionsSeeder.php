<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PromotionsSeeder extends Seeder
{
    
    public function run(): void
    {
        DB::table('promotions')->insert([
            [
                'title' => 'Diskon Spesial',
                'description' => 'Diskon 50% untuk semua produk.',
                'image' => 'diskon_spesial.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Promo Event',
                'description' => 'Ikuti event spesial kami dan raih hadiah menarik.',
                'image' => 'promo_event.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}