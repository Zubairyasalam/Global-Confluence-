<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpeakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $speakers = [
            [
                'name' => 'Boris N. Chichkov',
                'h_index' => '103',
                'university' => 'Leibniz University Hannover',
                'country' => 'Germany',
                'title' => 'Laser printing of cells',
                'image_path' => 'images/speakers/speaker1.png',
                'type' => 'keynote',
                'sort_order' => 1
            ],
            [
                'name' => 'Iwao Ojima',
                'h_index' => '93',
                'university' => 'Stony Brook University',
                'country' => 'United States',
                'title' => 'TBA',
                'image_path' => 'images/speakers/speaker2.png',
                'type' => 'keynote',
                'sort_order' => 2
            ],
            [
                'name' => 'Shahnaz Mansouri',
                'h_index' => null,
                'university' => 'Monash University',
                'country' => 'Australia',
                'title' => 'Emerging Food Cultivation and Printing Technologies for Food Security and Personalization',
                'image_path' => 'images/speakers/speaker3.png',
                'type' => 'plenary',
                'sort_order' => 3
            ],
            [
                'name' => 'Jingwei Xie',
                'h_index' => '68',
                'university' => 'University of Nebraska Medical Center',
                'country' => 'United States',
                'title' => 'Emerging Nanofiber Materials for Biomedical Applications',
                'image_path' => 'images/speakers/speaker4.png',
                'type' => 'plenary',
                'sort_order' => 4
            ],
            [
                'name' => 'Dr. Upendra Bhojani',
                'h_index' => null,
                'university' => 'Lead, Centre for Commercial Determinants of Health, India Alliance (DBT/Wellcome Trust) Senior Fellow, Former Director, Institute of Public Health',
                'country' => 'Bengaluru, India',
                'title' => 'Senior Fellow (Professor Grade)',
                'image_path' => 'images/speakers/upendra_bhojani.jpg',
                'type' => 'distinguished',
                'sort_order' => 5
            ],
            [
                'name' => 'Richard Spontak',
                'h_index' => '68',
                'university' => 'North Carolina State University',
                'country' => 'United States',
                'title' => 'TBA',
                'image_path' => 'images/speakers/speaker6.png',
                'type' => 'invited',
                'sort_order' => 6
            ]
        ];

        foreach ($speakers as $speaker) {
            \App\Models\Speaker::updateOrCreate(
                ['name' => $speaker['name']],
                $speaker
            );
        }
    }
}
