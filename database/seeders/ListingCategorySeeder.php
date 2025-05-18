<?php

namespace Database\Seeders;

use App\Models\ListingCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ListingCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Plumbing',
            'Construction',
            'Furniture',
            'Cleaning',
            'Painting',
            'Electrical',
            'Maintenance'
        ];

        foreach ($categories as $category) {
            ListingCategory::create(['name' => $category]);
        }
    }
}
