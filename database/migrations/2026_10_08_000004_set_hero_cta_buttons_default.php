<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::hasTable('site_settings')) {
            DB::table('site_settings')->updateOrInsert(
                ['key' => 'hero_btn1_text'],
                ['value' => 'REGISTER NOW', 'group' => 'hero', 'type' => 'text', 'label' => 'Primary Button Text', 'updated_at' => now()]
            );

            DB::table('site_settings')->updateOrInsert(
                ['key' => 'hero_btn1_link'],
                ['value' => '/registration', 'group' => 'hero', 'type' => 'text', 'label' => 'Primary Button Link', 'updated_at' => now()]
            );

            DB::table('site_settings')->updateOrInsert(
                ['key' => 'hero_btn2_text'],
                ['value' => 'APPLY FOR AWARDS', 'group' => 'hero', 'type' => 'text', 'label' => 'Secondary Button Text', 'updated_at' => now()]
            );

            DB::table('site_settings')->updateOrInsert(
                ['key' => 'hero_btn2_link'],
                ['value' => '/awards', 'group' => 'hero', 'type' => 'text', 'label' => 'Secondary Button Link', 'updated_at' => now()]
            );
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No reversal necessary
    }
};
