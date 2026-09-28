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
        Schema::table('registrations', function (Blueprint $table) {
            if (!Schema::hasColumn('registrations', 'registration_type')) {
                $table->string('registration_type')->nullable();
            }
            if (!Schema::hasColumn('registrations', 'abstract_file')) {
                $table->string('abstract_file')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('registrations', function (Blueprint $table) {
            if (Schema::hasColumn('registrations', 'registration_type')) {
                $table->dropColumn('registration_type');
            }
            if (Schema::hasColumn('registrations', 'abstract_file')) {
                $table->dropColumn('abstract_file');
            }
        });
    }
};
