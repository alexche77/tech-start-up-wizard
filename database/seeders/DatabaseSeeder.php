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


        $startupPositions = [
            'Chief Technology Officer (CTO)',
            'Chief Marketing Director (CMO)',
            'Chief Financial Officer (CFO)',
            'Product Director',
            'Backend Developer',
            'Frontend Developer',
            'Mobile Developer',
            'Tester',
            'Tech Lead',
            'DevOps',
            'Sales',
            'Admin & Office Manager',
            'Machine Learning Engineer',
            'Data Scientist',


        ];
        $role_keywords = [
            [],
            [],
            [],
            [],
            ['Backend', 'Database', 'Data Analyst', 'Data Analytics'],
            ['Frontend', 'Angular', 'Vue', 'JavaScript', 'React'],
            ['Android', 'iOS', 'Flutter', 'React Native'],
            ['QA', 'Tester'],
            ['Technical Lead'],
            ['DevOps'],
            ['Sale', 'CSO'],
            ['Administrator', 'HR', 'Manager'],
            ['Machine Learning'],
            ['Data Mining', 'Data Analysis']
        ];

        foreach ($startupPositions as $key => $position) {
            Position::create([
                'name' => $position,
                'role_keywords' => $role_keywords[$key]
            ]);
        }

        $features = [
            'Mobile app',
            'Web application',
            'Data Analysis',
            'Machine Learning',
            'QA Testing',
        ];
        $relatedPositionId = [
            [7],
            [5, 6],
            [5, 14],
            [13],
            [8],
        ];

        foreach ($features as $key => $feature) {
            $featureCreated = Feature::create(['name' => $feature]);
            $featureCreated->positions()->attach($relatedPositionId[$key]);
            $featureCreated->save();
        }


    }
}
