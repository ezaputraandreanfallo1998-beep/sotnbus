// database/factories/CityFactory.php
<?php

namespace Database\Factories;

use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

class CityFactory extends Factory
{
    protected $model = City::class;

   public function definition()
{
    return [
        'name' => $this->faker->city,
        'province' => $this->faker->state,
        'postal_code' => $this->faker->postcode // Pastikan kolom sudah ada
    ];
}
}