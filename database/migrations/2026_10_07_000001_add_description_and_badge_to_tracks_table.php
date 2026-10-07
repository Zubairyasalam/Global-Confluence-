<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tracks', function (Blueprint $table) {
            if (!Schema::hasColumn('tracks', 'description')) {
                $table->longText('description')->nullable()->after('title');
            }
            if (!Schema::hasColumn('tracks', 'badge')) {
                $table->string('badge')->nullable()->after('title');
            }
        });
    }

    public function down(): void
    {
        Schema::table('tracks', function (Blueprint $table) {
            if (Schema::hasColumn('tracks', 'description')) {
                $table->dropColumn('description');
            }
            if (Schema::hasColumn('tracks', 'badge')) {
                $table->dropColumn('badge');
            }
        });
    }
};
