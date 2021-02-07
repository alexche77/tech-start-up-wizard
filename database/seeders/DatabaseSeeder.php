<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Feature;
use App\Models\Position;
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
            'Mobile app',
            'Web application',
            'Data Analysis',
            'Machine Learning',
        ];

        foreach ($features as $feature) {
            Feature::create(['name' => $feature]);
        }


        $startupPositions = [
            'Chief Technology Officer (CTO)',
            'Chief Marketing Director (CMO)',
            'Chief Financial Officer (CFO)',
            'Product Director',
            'Backend Developer',
            'Frontend Developer',
            'Tester',
            'Tech Lead',
            'DevOps',
            'Sales',
            'Admin & Office Manager'

        ];
        $role_keywords = [
            ['CTO'],
            ['CMO', 'M'],
            ['CFO', 'Accountant', 'Business'],
            ['Product Owner'],
            ['Backend', 'Database'],
            ['Frontend', 'Angular', 'Vue', 'JavaScript', 'React'],
            ['QA', 'Tester'],
            ['Technical Lead'],
            ['DevOps'],
            ['Sale', 'CSO'],
            ['Administrator', 'HR', 'Manager']
        ];

        foreach ($startupPositions as $key => $position) {
            Position::create([
                'name' => $position,
                'role_keywords' => $role_keywords[$key]
            ]);
        }


    }
}
