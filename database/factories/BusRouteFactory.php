<?php

namespace Database\Factories;

use App\Models\Bus;
use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

class BusRouteFactory extends Factory
{
    public function definition()
    {
        return [
            'origin_id' => City::factory(),
            'destination_id' => City::factory(),
            'bus_id' => Bus::factory(),
            'departure_time' => $this->faker->dateTimeBetween('now', '+1 month'),
            'arrival_time' => $this->faker->dateTimeBetween('+1 hour', '+2 months'),
            'price' => $this->faker->numberBetween(10000, 500000),
            'is_featured' => false,
        ];
    }
}