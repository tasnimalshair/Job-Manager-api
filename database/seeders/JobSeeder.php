<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Job::truncate();
        Schema::enableForeignKeyConstraints();

        $jobs = [
            [
                'title' => 'Laravel Backend Developer',
                'description' => 'We are looking for a skilled Laravel developer with experience in API development and MySQL.',
                'company' => 'TechCorp Inc.',
                'location' => 'Remote',
                'type' => 'Full-time',
                'deadline' => now()->addDays(15),
                'salary' => 3500,
                'category_id' => 1,
                'created_by' => 1,
                'status' => 'active'
            ],
            [
                'title' => 'Junior Frontend Engineer',
                'description' => 'Join our frontend team to build beautiful UIs using React and Tailwind CSS.',
                'company' => 'Creative Studios',
                'location' => 'On-site',
                'type' => 'Part-time',
                'deadline' => now()->addDays(30),
                'salary' => 2200,
                'category_id' => 1,
                'created_by' => 1,
                'status' => 'inactive'

            ],
            [
                'title' => 'DevOps Engineer',
                'description' => 'Looking for a DevOps engineer experienced with Docker, CI/CD pipelines, and AWS.',
                'company' => 'Cloudify',
                'location' => 'Remote',
                'type' => 'Full-time',
                'deadline' => now()->addDays(20),
                'salary' => 5000,
                'category_id' => 1,
                'created_by' => 1,
                'status' => 'closed'

            ],
            [
                'title' => 'UI/UX Designer',
                'description' => 'Design clean, modern interfaces and collaborate with developers and product teams.',
                'company' => 'DesignPro',
                'location' => 'On-site',
                'type' => 'Part-time',
                'deadline' => now()->addDays(10),
                'salary' => 1800,
                'category_id' => 2,
                'created_by' => 1,
                'status' => 'active'

            ],
            [
                'title' => 'Project Manager',
                'description' => 'Manage multiple software projects and coordinate between clients and dev teams.',
                'company' => 'Agile Solutions',
                'location' => 'Remote',
                'type' => 'Full-time',
                'deadline' => now()->addDays(25),
                'salary' => 4000,
                'category_id' => 15,
                'created_by' => 1,
                'status' => 'active'

            ],
            [
                'title' => 'QA Tester',
                'description' => 'Perform manual and automated testing to ensure quality of software releases.',
                'company' => 'SoftTesters',
                'location' => 'On-site',
                'type' => 'Part-time',
                'deadline' => now()->addDays(18),
                'salary' => 2000,
                'category_id' => 1,
                'created_by' => 1,
                'status' => 'active'

            ],
            [
                'title' => 'Mobile App Developer',
                'description' => 'Develop cross-platform mobile apps using Flutter or React Native.',
                'company' => 'AppVantage',
                'location' => 'Remote',
                'type' => 'Full-time',
                'deadline' => now()->addDays(12),
                'salary' => 3800,
                'category_id' => 1,
                'created_by' => 1,
                'status' => 'inactive'

            ],
        ];

        foreach ($jobs as $job) {
            Job::create($job);
        }
    }
}
