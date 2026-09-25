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
        // Schema::table('registrations', function (Blueprint $table) {
        //     if (Schema::hasColumn('registrations', 'title')) $table->string('title')->nullable()->change();
        //     $table->string('name')->nullable()->change();
        //     if (Schema::hasColumn('registrations', 'organization')) $table->string('organization')->nullable()->change();
        //     $table->string('email')->nullable()->change();
        //     $table->string('phone')->nullable()->change();
        //     if (Schema::hasColumn('registrations', 'city')) $table->string('city')->nullable()->change();
        //     if (Schema::hasColumn('registrations', 'country')) $table->string('country')->nullable()->change();
        //     $table->string('postal_code')->nullable()->change();
        //     $table->string('interested_in')->nullable()->change();
        //     $table->string('reg_category')->nullable()->change();
        //     $table->string('payment_method')->nullable()->change();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('registrations', function (Blueprint $table) {
        // });
    }
};
