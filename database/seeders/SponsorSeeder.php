<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Text Content
        $intro = "Partnering with us as a sponsor or exhibitor gives your organization a unique opportunity to stand at the forefront of global innovation. Our international summits connect you directly with leading researchers, decision-makers, and industry pioneers — offering high-value visibility, strategic networking, and brand credibility. From showcasing your latest innovations to forging meaningful collaborations, this is your chance to amplify your impact, generate quality leads, and position your brand where the future is being shaped.";
        
        $benefits = "Enhance your brand visibility among international audiences
Showcase your technologies, products, or services to leading institutions and professionals
Connect directly with key decision-makers and industry influencers
Build global partnerships and collaborative networks
Participate in high-value networking sessions, panels, and technical discussions
Receive branding across digital, print, and on-site materials
Generate qualified leads and accelerate business development
Establish your brand as a thought leader in your industry";

        \App\Models\SiteSetting::updateOrCreate(['group' => 'sponsors', 'key' => 'sponsors_intro'], ['type' => 'textarea', 'label' => 'Intro Paragraph', 'value' => $intro]);
        \App\Models\SiteSetting::updateOrCreate(['group' => 'sponsors', 'key' => 'sponsors_benefits'], ['type' => 'textarea', 'label' => 'Key Benefits', 'value' => $benefits]);

        // 2. Tiers
        $tiers = [
            [
                'name' => 'PLATINUM',
                'price' => '$8,500',
                'ribbon_color' => 'bg-platinum',
                'features' => ["Premier logo placement on all conference materials", "5 complimentary full conference registrations", "Keynote speaking opportunity", "Exhibit booth in prime location"],
                'type' => 'tier',
                'sort_order' => 1
            ],
            [
                'name' => 'GOLD',
                'price' => '$7,500',
                'ribbon_color' => 'bg-gold',
                'features' => ["Logo placement on all conference materials", "3 complimentary full conference registrations", "Speaking opportunity in a session", "Exhibit booth"],
                'type' => 'tier',
                'sort_order' => 2
            ],
            [
                'name' => 'SILVER',
                'price' => '$6,500',
                'ribbon_color' => 'bg-silver',
                'features' => ["Logo placement on all conference materials", "2 complimentary full conference registrations", "Exhibit booth", "Quarterpage ad in conference program", "Logo on conference website with link to sponsor's site", "Social media shoutouts"],
                'type' => 'tier',
                'sort_order' => 3
            ],
            [
                'name' => 'BRONZE',
                'price' => '$5,000',
                'ribbon_color' => 'bg-bronze',
                'features' => ["Logo placement on all conference materials", "1 complimentary full conference registration", "Exhibit booth", "Logo on conference website with link to sponsor's site", "Social media shoutouts"],
                'type' => 'tier',
                'sort_order' => 4
            ],
        ];

        foreach ($tiers as $tier) {
            \App\Models\SponsorPackage::create($tier);
        }

        // 3. Additional Opportunities
        $additional = [
            ['name' => 'Conference bag sponsorship', 'price' => '$2,500', 'type' => 'additional', 'sort_order' => 1],
            ['name' => 'Lanyard sponsorship', 'price' => '$1,000', 'type' => 'additional', 'sort_order' => 2],
            ['name' => 'Coffee break sponsorship', 'price' => '$1,500', 'type' => 'additional', 'sort_order' => 3],
            ['name' => 'Networking reception sponsorship', 'price' => '$2,000', 'type' => 'additional', 'sort_order' => 4],
        ];

        foreach ($additional as $opp) {
            \App\Models\SponsorPackage::create($opp);
        }
    }
}
