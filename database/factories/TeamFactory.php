<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;



/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */

class TeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $autoIncrement = autoIncrement();
        return [
            'fullname' => fake()->name,
            'designation' => fake()->jobTitle,
            'telephone' => fake()->phoneNumber,
            'mobile' => fake()->e164PhoneNumber,
            'email' => fake()->unique()->safeEmail,
            'facebook_id' => fake()->unique()->freeEmail,
            'twitter_id' => fake()->unique()->freeEmail,
            'pinterest_id' => fake()->unique()->freeEmail,
            'profile' => fake()->text($maxNbChars = 500),
            'team_img' => 'No image found',
            'status' => fake()->randomElement(array('DEACTIVE','ACTIVE')),
            'created_by' => '1',
            'updated_by' => '1',
        ];
    }
}
