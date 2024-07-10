<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'=>fake()->jobTitle(),
            'slug'=>fake()->slug(),
            'content'=>fake()->text(100),
            'category'=>fake()->colorName(),
            'author'=>\App\Models\User::factory(),
            'image'=>fake()->imageUrl(),
            'resumen'=>fake()->text(100)
        ];
    }
}
