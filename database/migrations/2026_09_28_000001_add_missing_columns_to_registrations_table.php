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
            $columns = [
                'title',
                'name',
                'email',
                'phone',
                'organization',
                'city',
                'country',
                'postal_code',
                'interested_in',
                'reg_category',
                'payment_method'
            ];

            foreach ($columns as $column) {
                if (!Schema::hasColumn('registrations', $column)) {
                    $table->string($column)->nullable();
                }
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('registrations', function (Blueprint $table) {
            $columns = [
                'title',
                'name',
                'email',
                'phone',
                'organization',
                'city',
                'country',
                'postal_code',
                'interested_in',
                'reg_category',
                'payment_method'
            ];

            foreach ($columns as $column) {
                if (Schema::hasColumn('registrations', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
