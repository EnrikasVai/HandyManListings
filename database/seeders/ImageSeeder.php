<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Listing;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $listings = Listing::all();

        foreach ($listings as $listing) {
            Image::create([
                'listing_id' => $listing->id,
                'path' => 'images/dummy.jpg',
            ]);
        }
    }
}
