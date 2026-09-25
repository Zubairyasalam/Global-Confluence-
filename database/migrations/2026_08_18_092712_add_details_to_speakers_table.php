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
        Schema::table('speakers', function (Blueprint $table) {
            $table->text('biography')->nullable();
            $table->text('field')->nullable();
            $table->text('current_role')->nullable();
            $table->text('education')->nullable();
            $table->text('honours')->nullable();
            $table->text('key_achievements')->nullable();
            $table->text('relevance')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('speakers', function (Blueprint $table) {
            $table->dropColumn(['biography', 'field', 'current_role', 'education', 'honours', 'key_achievements', 'relevance']);
        });
    }
};
