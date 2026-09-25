<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InterestOption;

class InterestOptionSeeder extends Seeder
{
    public function run()
    {
        $options = [
            'Plenary',
            'Keynote',
            'Invited',
            'Oral',
            'Poster Presentation',
            'Delegate'
        ];

        foreach ($options as $index => $name) {
            InterestOption::create([
                'name' => $name,
                'sort_order' => $index
            ]);
        }
    }
}
