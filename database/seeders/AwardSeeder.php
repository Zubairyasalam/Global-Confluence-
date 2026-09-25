<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AwardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Text Content
        $intro = "At Biomed Summit, we celebrate the spirit of research, innovation, and academic excellence. To foster advancement and honor exceptional contributions, we proudly present the Conference Awards to outstanding researchers, scholars, and innovators.";
        
        \App\Models\SiteSetting::updateOrCreate(
            ['group' => 'awards_page', 'key' => 'awards_intro'], 
            ['type' => 'textarea', 'label' => 'Intro Paragraph', 'value' => $intro]
        );

        // 2. Awards
        \App\Models\Award::truncate();
        $awards = [
            [
                'name' => 'Best Scholar Award',
                'icon' => 'fa-solid fa-graduation-cap',
                'icon_color' => '#009688',
                'short_description' => 'Honoring outstanding academic performance, research contribution, and scholastic excellence. Cash Prize: ₹10,000',
                'benefits' => "Cash Prize of ₹10,000.
Certificate of Distinction & Memento.
Public recognition during the valedictory ceremony.
Featured spotlight in conference proceedings.",
                'eligibility' => "Open to students, research scholars, and early-career academicians.
Must present an accepted paper or poster at the conference.",
                'guidelines' => "Evaluated based on academic merit, research quality, and presentation delivery.",
                'sort_order' => 1
            ],
            [
                'name' => 'Best Researcher Award',
                'icon' => 'fa-solid fa-award',
                'icon_color' => '#0284c7',
                'short_description' => 'Recognizing groundbreaking research, high-impact scientific work, and domain leadership. Cash Prize: ₹25,000',
                'benefits' => "Cash Prize of ₹25,000.
Certificate of Research Excellence & Trophy.
Opportunity to deliver a special guest presentation.
Featured showcase on the official portal and media release.",
                'eligibility' => "Open to senior researchers, faculty members, and scientists with significant research contributions.
Requires submission of research abstract and portfolio.",
                'guidelines' => "Evaluated by the Advisory Committee based on research novelty, domain impact, and presentation.",
                'sort_order' => 2
            ],
            [
                'name' => 'Entrepreneur Award',
                'icon' => 'fa-solid fa-rocket',
                'icon_color' => '#d97706',
                'short_description' => 'Celebrating innovative biomedical models, patent innovations, and startup leadership. Cash Prize: ₹25,000',
                'benefits' => "Cash Prize of ₹25,000.
Certificate of Innovation & Entrepreneur Trophy.
Mentorship & incubation networking with industry investors.
Direct feature in the startup showcase.",
                'eligibility' => "Open to student entrepreneurs, startup founders, and innovators presenting scalable solutions or patents.",
                'guidelines' => "Pitch deck or prototype demonstration required during the Innovation & Pitch session.",
                'sort_order' => 3
            ]
        ];

        foreach ($awards as $award) {
            \App\Models\Award::create($award);
        }
    }
}
