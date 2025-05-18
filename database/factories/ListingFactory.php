<?php

namespace Database\Factories;

use App\Models\ListingCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'price' => fake()->randomFloat(2, 100, 500),
            'location' => fake()->city(),
            'is_active' => true,
            'user_id' => User::factory(), // if relationship exists
            'listing_category_id' => ListingCategory::factory(),
        ];
    }
}
