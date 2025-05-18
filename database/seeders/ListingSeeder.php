<?php

namespace Database\Seeders;

use App\Models\Listing;
use App\Models\ListingCategory;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ListingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userIds = User::pluck('id')->toArray();
        $categoryIds = ListingCategory::pluck('id')->toArray();

        Listing::factory()->count(20)->create([
            'user_id' => fn() => fake()->randomElement($userIds),
            'listing_category_id' => fn() => fake()->randomElement($categoryIds),
        ]);
    }


}
