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
            if (!Schema::hasColumn('registrations', 'gender')) {
                $table->string('gender')->nullable()->after('phone');
            }
            if (!Schema::hasColumn('registrations', 'presentation_event_type')) {
                $table->string('presentation_event_type')->nullable()->after('registration_type');
            }
            if (!Schema::hasColumn('registrations', 'presentation_track')) {
                $table->text('presentation_track')->nullable()->after('presentation_event_type');
            }
            if (!Schema::hasColumn('registrations', 'id_card_file')) {
                $table->string('id_card_file')->nullable()->after('abstract_file');
            }
            if (!Schema::hasColumn('registrations', 'payment_receipt_file')) {
                $table->string('payment_receipt_file')->nullable()->after('id_card_file');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('registrations', function (Blueprint $table) {
            $cols = ['gender', 'presentation_event_type', 'presentation_track', 'id_card_file', 'payment_receipt_file'];
            foreach ($cols as $col) {
                if (Schema::hasColumn('registrations', $col)) {
                    $table->dropColumn($col);
                }
            }
        });
    }
};
