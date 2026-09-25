<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call([
            AdminUserSeeder::class,
            SiteSettingSeeder::class,
            RegistrationFieldSeeder::class,
            SpeakerSeeder::class,
            AwardSeeder::class,
            CommitteeSeeder::class,
            DeadlineSeeder::class,
            InterestOptionSeeder::class,
            PoliciesSeeder::class,
            RegistrationAddonsSeeder::class,
            RegistrationFeeSeeder::class,
            SponsorSeeder::class,
            SubmitPaperFieldSeeder::class,
            TopicSeeder::class,
        ]);
    }
}
