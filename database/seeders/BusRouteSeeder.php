<?php

namespace Database\Seeders;

use App\Models\BusRoute;
use Illuminate\Database\Seeder;

class BusRouteSeeder extends Seeder
{
    public function run()
    {
        // Buat 10 data dummy rute bus
        BusRoute::factory()->count(10)->create();

        // Jadikan 3 rute sebagai featured (id 1, 3, 5)
        BusRoute::whereIn('id', [1, 3, 5])->update(['is_featured' => true]);
    }
}