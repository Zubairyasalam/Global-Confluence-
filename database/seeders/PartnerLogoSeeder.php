<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PartnerLogo;

class PartnerLogoSeeder extends Seeder
{
    public function run(): void
    {
        $defaultLogos = [
            [
                'name' => 'Madras Christian College (MCC)',
                'logo_path' => 'images/MMC-LOGO-2.jpg',
                'link_url' => 'https://mcc.edu.in',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'National Institute of Siddha (NIS)',
                'logo_path' => 'images/nis-logo-transparent.png',
                'link_url' => 'https://nischennai.org',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Microbiologists Society, India',
                'logo_path' => 'images/microbiologists_society.png',
                'link_url' => 'https://microbiosoc.org',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Mazumdar Shaw Medical Foundation (MSMF)',
                'logo_path' => 'images/msmf_logo2.png',
                'link_url' => 'https://msmf.org',
                'sort_order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($defaultLogos as $logo) {
            PartnerLogo::firstOrCreate(
                ['name' => $logo['name']],
                $logo
            );
        }
    }
}
