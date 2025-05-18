<?php

namespace Database\Seeders;

use App\Models\Listing;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $listings = Listing::all();
        $users = User::all();

        foreach ($listings as $listing) {
            Review::factory()->count(2)->create([
                'listing_id' => $listing->id,
                'user_id' => $users->random()->id,
            ]);
        }
    }
}
