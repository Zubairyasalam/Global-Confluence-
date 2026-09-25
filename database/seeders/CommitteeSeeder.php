<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommitteeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $members = [
            // Leadership - Chief Patron
            [
                'name' => 'Dr. P. Wilson',
                'designation' => 'Principal & Secretary, MCC',
                'category' => 'leadership',
                'subcategory' => 'chief_patron',
                'sort_order' => 1,
            ],
            // Leadership - Patrons
            [
                'name' => 'Mr. R. Sridhar',
                'designation' => 'Vice Principal (Administration), MCC',
                'category' => 'leadership',
                'subcategory' => 'patrons',
                'sort_order' => 1,
            ],
            [
                'name' => 'Dr. J. Jannet Vennila',
                'designation' => 'Vice Principal (SFS), MCC',
                'category' => 'leadership',
                'subcategory' => 'patrons',
                'sort_order' => 2,
            ],
            // Leadership - Convenor
            [
                'name' => 'Dr. V. Mahalakshmi',
                'designation' => "Associate Professor & Head,\nDepartment of Microbiology",
                'category' => 'leadership',
                'subcategory' => 'convenor',
                'sort_order' => 1,
            ],
            // Leadership - Organizing Secretaries
            [
                'name' => 'Dr. S. Niren Andrew',
                'designation' => 'Assistant Professor, Dept of Microbiology',
                'category' => 'leadership',
                'subcategory' => 'organizing_secretaries',
                'sort_order' => 1,
            ],
            [
                'name' => 'Dr. K. Kavitha',
                'designation' => 'Associate Professor, Dept of Microbiology',
                'category' => 'leadership',
                'subcategory' => 'organizing_secretaries',
                'sort_order' => 2,
            ],
            // Organizing Committee
            [
                'name' => 'Dr. S. Premina',
                'designation' => 'Assistant Professor',
                'category' => 'organizing_committee',
                'subcategory' => null,
                'sort_order' => 1,
            ],
            [
                'name' => 'Dr. S. Abirami',
                'designation' => 'Assistant Professor',
                'category' => 'organizing_committee',
                'subcategory' => null,
                'sort_order' => 2,
            ],
            [
                'name' => 'Dr. P. Hanumantha Rao',
                'designation' => 'Associate Professor',
                'category' => 'organizing_committee',
                'subcategory' => null,
                'sort_order' => 3,
            ],
            [
                'name' => 'Dr. T. Sathish Kumar',
                'designation' => 'Associate Professor',
                'category' => 'organizing_committee',
                'subcategory' => null,
                'sort_order' => 4,
            ],
            [
                'name' => 'Dr. V. Vedha',
                'designation' => 'Assistant Professor',
                'category' => 'organizing_committee',
                'subcategory' => null,
                'sort_order' => 5,
            ],
            [
                'name' => 'Dr. K. Balakumar',
                'designation' => 'Assistant Professor',
                'category' => 'organizing_committee',
                'subcategory' => null,
                'sort_order' => 6,
            ],
            [
                'name' => 'Dr. Neginah Vijayasingh',
                'designation' => 'Assistant Professor',
                'category' => 'organizing_committee',
                'subcategory' => null,
                'sort_order' => 7,
            ],
            // Advisory Committee
            [
                'name' => 'Dr. S. Vincent',
                'designation' => 'Member Secretary, Tamil Nadu State Council for Science and Technology.',
                'category' => 'advisory_committee',
                'subcategory' => null,
                'icon' => 'fa-solid fa-user-shield',
                'sort_order' => 1,
            ],
            [
                'name' => 'Dr. D. Alex Anand',
                'designation' => 'Associate Professor, Department of Bioinformatics & The Centre for Molecular Data Science',
                'category' => 'advisory_committee',
                'subcategory' => null,
                'icon' => 'fa-solid fa-user-shield',
                'sort_order' => 2,
            ],
            [
                'name' => 'Dr. Joyce Sudandara Priya',
                'designation' => 'Head, Department of Botany, MCC.',
                'category' => 'advisory_committee',
                'subcategory' => null,
                'icon' => 'fa-solid fa-user-shield',
                'sort_order' => 3,
            ],
        ];

        foreach ($members as $member) {
            \App\Models\CommitteeMember::create($member);
        }
    }
}
