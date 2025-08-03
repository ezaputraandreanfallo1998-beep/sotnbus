<?php

namespace Database\Factories;

use App\Models\Promotion;
use Illuminate\Database\Eloquent\Factories\Factory;

class PromotionFactory extends Factory
{
    protected $model = Promotion::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph,
            'discount_code' => 'DISC' . $this->faker->unique()->numberBetween(100, 999),
            'discount_amount' => $this->faker->numberBetween(10, 50) * 1000,
            'start_date' => now()->subDays(rand(1, 10)),
            'end_date' => now()->addDays(rand(10, 30)),
            'is_active' => true,
        ];
    }
}