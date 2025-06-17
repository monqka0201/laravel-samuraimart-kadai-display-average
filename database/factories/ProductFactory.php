<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

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
            'name' => $this->faker->words(2,true),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->numberBetween(1000, 1000),
            'category_id' => Category::inRandomOrder()->first()->id,
        ];
    }
}
