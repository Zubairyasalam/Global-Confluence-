<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Addon;

class RegistrationAddonsSeeder extends Seeder
{
    public function run(): void
    {
        Addon::truncate();

        Addon::create([
            'title' => 'Pre-Conference Metagenomics Workshop',
            'price' => 500,
            'badge_text' => 'Limited Seats',
            'description' => 'Intensive one-day hands-on training. Must be added to your registration.',
            'is_active' => true
        ]);
    }
}
