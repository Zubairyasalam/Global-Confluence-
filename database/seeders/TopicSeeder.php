<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $topics = [
            [1, 'Biomedical Imaging'],
            [1, 'AI and Robotics in Healthcare'],
            [1, 'Telemedicine and Remote Health Monitoring'],
            [1, 'Synthetic Biology and Bioengineering'],
            [1, 'Nanomedicine and Nanobiotechnology'],
            [1, 'Clinical Trials and Therapeutic Innovations'],
            [2, 'Biomedical Signal Processing'],
            [2, 'Biomedical Data Mining and Machine Learning'],
            [2, 'Wearable Robotics and Exoskeletons'],
            [2, 'Cellular Bioengineering'],
            [2, 'Drug Discovery & Delivery'],
            [2, 'Epigenetics and Gene Editing Technologies'],
            [2, 'Advanced Medical Imaging Modalities'],
            [3, 'Biomedical Engineering'],
            [3, 'Biomedical Imaging and Signal Processing'],
            [3, 'Medical Robotics and Automation'],
            [3, 'Tissue Engineering'],
            [3, 'Biofabrication and 3D Bioprinting Technologies'],
            [3, 'Pharmaceutical Engineering'],
            [3, 'Point-of-Care Diagnostic Technologies'],
        ];

        $order1 = 1;
        $order2 = 1;
        $order3 = 1;

        foreach ($topics as $t) {
            $col = $t[0];
            if ($col == 1) { $order = $order1++; }
            elseif ($col == 2) { $order = $order2++; }
            else { $order = $order3++; }
            
            \App\Models\Topic::create([
                'title' => $t[1],
                'column_number' => $col,
                'sort_order' => $order
            ]);
        }
    }
}
