<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('deadlines', function (Blueprint $table) {
            if (!Schema::hasColumn('deadlines', 'phase')) {
                $table->string('phase')->nullable()->default('PHASE 01');
            }
            if (!Schema::hasColumn('deadlines', 'date_text')) {
                $table->string('date_text')->nullable();
            }
            if (!Schema::hasColumn('deadlines', 'description')) {
                $table->text('description')->nullable();
            }
            if (!Schema::hasColumn('deadlines', 'icon')) {
                $table->string('icon')->nullable()->default('fa-solid fa-file-arrow-up');
            }
            if (!Schema::hasColumn('deadlines', 'tag_label')) {
                $table->string('tag_label')->nullable()->default('Call for Abstracts');
            }
            if (!Schema::hasColumn('deadlines', 'tag_icon')) {
                $table->string('tag_icon')->nullable()->default('fa-solid fa-circle-dot');
            }
            if (!Schema::hasColumn('deadlines', 'color_theme')) {
                $table->string('color_theme')->nullable()->default('teal');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('deadlines', function (Blueprint $table) {
            $table->dropColumn(['phase', 'date_text', 'description', 'icon', 'tag_label', 'tag_icon', 'color_theme']);
        });
    }
};
