<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Promo;

class PromoSeeder extends Seeder
{
    public function run()
    {
        // Data khusus
        Promo::create([
            'title' => 'Diskon 50% User Baru',
            'description' => 'Dapatkan diskon 50% untuk pemesanan pertama Anda setelah registrasi.',
            'code' => 'NEWUSER50',
            'discount_percent' => 50,
            'bg_color' => '#4CAF50',
            'icon' => 'fas fa-gift',
            'is_active' => true,
            'valid_until' => '2025-12-31'
        ]);

        // Data dummy (10 promo)
        \App\Models\Promo::factory()->count(10)->create();
    }
}