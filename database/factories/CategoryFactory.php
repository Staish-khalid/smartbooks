<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = fake()->name;
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => fake()->text($maxNbChars = 500),
            'status' => fake()->randomElement(['DEACTIVE', 'ACTIVE']),
            'created_by' => '1',
            'updated_by' => '1',
        ];
    }
}
