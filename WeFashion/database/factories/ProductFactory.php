<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
                'name' => $this->faker->name(),
                'description' => $this->faker->paragraph(),
                'price'=>$this->faker->numberBetween(200,500),
                'status' => $this->faker -> numberBetween($min = 1, $max = 2),
                'visibility' => $this->faker -> numberBetween($min = 1, $max = 2),
                'reference' => Str::random(16)
        ];
    }
}
