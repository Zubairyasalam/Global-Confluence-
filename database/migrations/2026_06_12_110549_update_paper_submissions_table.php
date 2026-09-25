<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Schema::table('paper_submissions', function (Blueprint $table) {
        //     $table->json('form_data')->nullable()->after('id');
        //     // We make the legacy columns nullable in case they aren't already
        //     $table->string('title')->nullable()->change();
        //     $table->string('name')->nullable()->change();
        //     $table->string('email')->nullable()->change();
        //     $table->string('contact_number')->nullable()->change();
        // });
    }

    public function down(): void
    {
        Schema::table('paper_submissions', function (Blueprint $table) {
            $table->dropColumn('form_data');
        });
    }
};
