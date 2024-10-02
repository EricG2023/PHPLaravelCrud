<?php

namespace Database\Factories;


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
    public function definition(): array
    {
        return [
            
            'name' => fake()->word(),
            //'price' => fake()->price(),
            'price' => $this->faker->randomFloat(2, 0, 1000),
            'description' => $this->faker->sentence(),
            'item_number' => $this->faker->unique()->randomNumber(),
            'image' => $this->faker->image(),
            //'image' => fake()->image(),
        ];
    }
}
