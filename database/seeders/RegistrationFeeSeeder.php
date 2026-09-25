<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\RegistrationFee;

class RegistrationFeeSeeder extends Seeder
{
    public function run(): void
    {
        RegistrationFee::truncate();

        RegistrationFee::create([
            'category_name' => 'Student',
            'price_inr' => '1000',
            'price_online' => '1500',
            'price_usd' => null,
            'features' => json_encode(['Registration includes conference kit, certificate, lunch and refreshment.']),
            'is_active' => true,
            'sort_order' => 1,
            'is_highlighted' => false,
        ]);

        RegistrationFee::create([
            'category_name' => 'Research Scholar',
            'price_inr' => '1500',
            'price_online' => '2000',
            'price_usd' => null,
            'features' => json_encode(['Registration includes conference kit, certificate, lunch and refreshment.']),
            'is_active' => true,
            'sort_order' => 2,
            'is_highlighted' => false,
        ]);

        RegistrationFee::create([
            'category_name' => 'Faculty/Scientist',
            'price_inr' => '2000',
            'price_online' => '3000',
            'price_usd' => null,
            'features' => json_encode(['Registration includes conference kit, certificate, lunch and refreshment.']),
            'is_active' => true,
            'sort_order' => 3,
            'is_highlighted' => true,
        ]);

        RegistrationFee::create([
            'category_name' => 'Industrialists',
            'price_inr' => '5000',
            'price_online' => '5000',
            'price_usd' => null,
            'features' => json_encode(['Registration includes conference kit, certificate, lunch and refreshment.']),
            'is_active' => true,
            'sort_order' => 4,
            'is_highlighted' => false,
        ]);
    }
}
