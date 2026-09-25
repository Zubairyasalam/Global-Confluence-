<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegistrationFieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fields = [
            [
                'name' => 'title',
                'label' => 'Title',
                'type' => 'select',
                'placeholder' => 'Select',
                'is_required' => true,
                'options' => ['Mr.', 'Ms.', 'Dr.', 'Prof.'],
                'grid_column' => 'span 3',
                'sort_order' => 1,
            ],
            [
                'name' => 'name',
                'label' => 'Name',
                'type' => 'text',
                'placeholder' => 'Enter your name',
                'is_required' => true,
                'options' => null,
                'grid_column' => 'span 9',
                'sort_order' => 2,
            ],
            [
                'name' => 'organization',
                'label' => 'Organization/Institution',
                'type' => 'text',
                'placeholder' => 'Organization/Institution',
                'is_required' => true,
                'options' => null,
                'grid_column' => 'span 12',
                'sort_order' => 3,
            ],
            [
                'name' => 'email',
                'label' => 'Email',
                'type' => 'email',
                'placeholder' => 'Enter your email',
                'is_required' => true,
                'options' => null,
                'grid_column' => 'span 6',
                'sort_order' => 4,
            ],
            [
                'name' => 'phone',
                'label' => 'Phone',
                'type' => 'text',
                'placeholder' => 'Enter your phone number',
                'is_required' => true,
                'options' => null,
                'grid_column' => 'span 6',
                'sort_order' => 5,
            ],
            [
                'name' => 'city',
                'label' => 'City',
                'type' => 'text',
                'placeholder' => 'Enter your city name',
                'is_required' => true,
                'options' => null,
                'grid_column' => 'span 4',
                'sort_order' => 6,
            ],
            [
                'name' => 'country',
                'label' => 'Country',
                'type' => 'text',
                'placeholder' => 'Enter your Country',
                'is_required' => true,
                'options' => null,
                'grid_column' => 'span 4',
                'sort_order' => 7,
            ],
            [
                'name' => 'postal_code',
                'label' => 'Postal Code',
                'type' => 'text',
                'placeholder' => 'Enter your Postal Code',
                'is_required' => true,
                'options' => null,
                'grid_column' => 'span 4',
                'sort_order' => 8,
            ],
            // Interested in field will be populated from DB in view dynamically, but we define the field here
            [
                'name' => 'interested_in',
                'label' => 'Interested In',
                'type' => 'dynamic_select', // special type that we can handle in frontend
                'placeholder' => 'Select Interested In',
                'is_required' => true,
                'options' => ['dynamic_interest_options'], // a key to denote this comes from db
                'grid_column' => 'span 12',
                'sort_order' => 9,
            ],
        ];

        foreach ($fields as $field) {
            \App\Models\RegistrationField::create($field);
        }
    }
}
