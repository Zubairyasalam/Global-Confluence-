<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Policy;

class PoliciesSeeder extends Seeder
{
    public function run(): void
    {
        $policies = [
            [
                'title' => 'WHAT\'S INCLUDED IN YOUR PAYMENT',
                'content_html' => '<div style="display: flex; flex-wrap: wrap; gap: 30px;">
                            <div style="flex: 1; min-width: 300px;">
                                <h4 style="margin-top: 0; margin-bottom: 15px; font-weight: 400; color: #555;">Registration Fee</h4>
                                <ul style="list-style-type: none; padding-left: 0; margin: 0;">
                                    <li style="margin-bottom: 8px;"><i class="fa-solid fa-check" style="margin-right: 8px; color: #000;"></i> Full program at the whole conference</li>
                                    <li style="margin-bottom: 8px;"><i class="fa-solid fa-check" style="margin-right: 8px; color: #000;"></i> Lunch on during the conference</li>
                                    <li style="margin-bottom: 8px;"><i class="fa-solid fa-check" style="margin-right: 8px; color: #000;"></i> Coffee Break</li>
                                    <li style="margin-bottom: 8px;"><i class="fa-solid fa-check" style="margin-right: 8px; color: #000;"></i> Welcome Coffee</li>
                                </ul>
                            </div>
                        </div>',
                'sort_order' => 1
            ],
            [
                'title' => 'REGISTRATION CANCELLATION POLICY',
                'content_html' => '<ul style="padding-left: 20px; margin-top: 0; margin-bottom: 0; color: #475569; line-height: 1.7;">
                            <li style="margin-bottom: 10px;">Cancellations made &ge;120 days prior to the event start date will receive a full refund, less a $150 administrative fee for processing and banking charges.</li>
                            <li style="margin-bottom: 10px;">Cancellations made between 119 to 90 days prior to the event start date are eligible for a 50% refund of the registration fee.</li>
                            <li style="margin-bottom: 10px;">Cancellations requested within 89 days or fewer from the event start date are non-refundable, including registration and accommodation-related charges.</li>
                        </ul>',
                'sort_order' => 2
            ]
        ];

        foreach ($policies as $policy) {
            Policy::create($policy);
        }
    }
}
