<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UpdateProjectInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $updates = [
            'construction-management' => [
                'location' => 'Washington DC Metro Area',
                'sector' => 'Commercial & Residential',
                'technology' => 'Modern Construction Methods',
                'scope_of_work' => 'Full Project Management',
                'completion_date' => '2024-12-31',
            ],
            'development-management' => [
                'location' => 'Virginia & Maryland',
                'sector' => 'Mixed-Use Development',
                'technology' => 'Sustainable Building Practices',
                'scope_of_work' => 'Development Oversight',
                'completion_date' => '2024-10-15',
            ],
            'project-delivery-partners' => [
                'location' => 'East Coast USA',
                'sector' => 'Infrastructure & Civil',
                'technology' => 'Collaborative Delivery Methods',
                'scope_of_work' => 'Partnership Management',
                'completion_date' => '2024-08-20',
            ],
            'project-types' => [
                'location' => 'Multi-State Operations',
                'sector' => 'Residential, Commercial, Industrial',
                'technology' => 'Adaptive Construction Methods',
                'scope_of_work' => 'Multi-Sector Expertise',
                'completion_date' => '2024-11-30',
            ]
        ];

        foreach ($updates as $slug => $data) {
            Project::where('slug', $slug)->update($data);
        }
    }
}
