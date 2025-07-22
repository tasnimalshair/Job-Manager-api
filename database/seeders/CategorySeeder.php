<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Software Development',
            'Design & Creative',
            'Marketing',
            'Sales',
            'Customer Support',
            'Writing & Translation',
            'Finance & Accounting',
            'HR & Recruitment',
            'Education & Training',
            'Engineering',
            'Legal',
            'Healthcare',
            'Data & Analytics',
            'Product Management',
            'Project Management',
            'Operations',
            'Administrative',
            'Internships',
            'Other',
        ];

        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}
