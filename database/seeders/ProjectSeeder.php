<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Construction Management',
                'slug' => 'construction-management',
                'subtitle' => 'Professional Construction Oversight',
                'description' => 'Comprehensive construction management services to ensure your project is completed on time, within budget, and to the highest quality standards.',
                'content' => 'If you are planning a construction project, it is important to know that the leadership of that project will always be your responsibility whether you lack sufficient knowledge of the design and construction process and/or you lack time to monitor and lead the process, even if you have a trusted designer/architect to administer your contracts beyond the design process.

In any of these scenarios, a great move by any Owner looking to instill effective leadership over their project team and protect their investment, is to hire a Construction Manager/Owner\'s Representative (CM) who can act as their fiduciary advocating for the best interest of the project and Owner.

Dauber and Partners Construction provides results-oriented client solutions by leveraging our deep construction experience across many sectors including General contractor experience, knowledge of Washington DC Metro area construction industry, effective communication methods and tools, and great Project Management tools and methods, etc.

Drop us a message or call to enquire about how we could be of help to your project.',
                'location' => 'Washington DC Metro Area',
                'sector' => 'Commercial & Residential',
                'technology' => 'Modern Construction Methods',
                'scope_of_work' => 'Full Project Management',
                'completion_date' => '2024-12-31',
                'is_active' => true,
                'order' => 1,
                'meta_title' => 'Construction Management Services | Dauber and Partners Construction',
                'meta_description' => 'Professional construction management services ensuring projects are completed on time, within budget, and to highest quality standards.'
            ],
            [
                'title' => 'Development Management',
                'slug' => 'development-management',
                'subtitle' => 'End-to-End Development Solutions',
                'description' => 'Complete development management from initial planning through project completion, ensuring seamless coordination of all project phases.',
                'content' => 'Our development management services provide comprehensive oversight from concept to completion. We coordinate all aspects of the development process, ensuring that your vision becomes reality while maintaining the highest standards of quality and efficiency.

We work closely with architects, engineers, contractors, and other stakeholders to deliver projects that exceed expectations. Our experienced team manages timelines, budgets, and quality control throughout the entire development lifecycle.',
                'location' => 'Virginia & Maryland',
                'sector' => 'Mixed-Use Development',
                'technology' => 'Sustainable Building Practices',
                'scope_of_work' => 'Development Oversight',
                'completion_date' => '2024-10-15',
                'is_active' => true,
                'order' => 2,
                'meta_title' => 'Development Management Services | Dauber and Partners Construction',
                'meta_description' => 'Complete development management services from planning through completion with expert coordination and quality control.'
            ],
            [
                'title' => 'Project Delivery Partners',
                'slug' => 'project-delivery-partners',
                'subtitle' => 'Strategic Partnership Solutions',
                'description' => 'Strategic partnerships that bring together the right expertise and resources to deliver successful construction projects.',
                'content' => 'As your project delivery partner, we bring together the right combination of expertise, resources, and experience to ensure successful project outcomes. We work as an extension of your team, providing strategic guidance and hands-on management.

Our partnership approach focuses on collaborative problem-solving, transparent communication, and shared accountability for project success. We leverage our network of trusted professionals and proven methodologies to deliver exceptional results.',
                'location' => 'East Coast USA',
                'sector' => 'Infrastructure & Civil',
                'technology' => 'Collaborative Delivery Methods',
                'scope_of_work' => 'Partnership Management',
                'completion_date' => '2024-08-20',
                'is_active' => true,
                'order' => 3,
                'meta_title' => 'Project Delivery Partners | Dauber and Partners Construction',
                'meta_description' => 'Strategic project delivery partnerships bringing expertise and resources together for successful construction outcomes.'
            ],
            [
                'title' => 'Project Types',
                'slug' => 'project-types',
                'subtitle' => 'Diverse Construction Solutions',
                'description' => 'We handle a wide variety of construction project types, from residential developments to commercial complexes.',
                'content' => 'Our expertise spans across multiple project types and sectors, allowing us to bring specialized knowledge and proven methodologies to each unique challenge. Whether you\'re developing residential communities, commercial properties, or mixed-use developments, we have the experience to deliver.

We understand that different project types require different approaches, and we tailor our services to meet the specific needs and requirements of each sector. Our diverse portfolio demonstrates our capability to adapt and excel across various construction disciplines.',
                'location' => 'Multi-State Operations',
                'sector' => 'Residential, Commercial, Industrial',
                'technology' => 'Adaptive Construction Methods',
                'scope_of_work' => 'Multi-Sector Expertise',
                'completion_date' => '2024-11-30',
                'is_active' => true,
                'order' => 4,
                'meta_title' => 'Construction Project Types | Dauber and Partners Construction',
                'meta_description' => 'Diverse construction project expertise spanning residential, commercial, and mixed-use developments.'
            ]
        ];

        foreach ($projects as $projectData) {
            Project::create($projectData);
        }
    }
}
