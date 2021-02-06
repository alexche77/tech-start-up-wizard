<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Feature;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Arts',
            'Autos',
            'Beauty',
            'Books',
            'Business',
            'Computers',
            'Finance',
            'Food',
            'Games',
            'Health',
            'Hobbies',
            'Home',
            'Internet',
            'Jobs',
            'Law',
            'News',
            'Online',
            'People',
            'Pets',
            'Real Estates',
            'Science',
            'Shopping',
            'Sports',
            'Travel',
            'Other'
        ];

        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }

        $features = [
            'Mobile app on Google Play',
            'Mobile app on Apple Store',
            'Mobile app on Huawei Store',
            'Web application',
            'Data Analysis',
            'Machine Learning'
        ];

        foreach ($features as $feature) {
            Feature::create(['name' => $feature]);
        }
    }
}
