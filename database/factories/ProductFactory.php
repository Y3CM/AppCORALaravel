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
    public function definition()
    {
        return [
            'name' =>fake()->word(),
            'description'=>fake()->sentence(),
            'price'=>fake()->numberBetween(100,1000),
            'stock'=>fake()->numberBetween(1,100),
            'id_user'=>\App\Models\User::factory(),
            'category_id'=>1,
            'image_path'=>fake()->imageUrl(),
            'created_at'=>now(),
            'updated_at'=>now(),
        ];
    }
}
