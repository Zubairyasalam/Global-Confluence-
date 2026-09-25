<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('submit_paper_fields', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // name attribute (e.g. contact_number)
            $table->string('label'); // e.g. Contact Number
            $table->string('type'); // text, email, select, etc.
            $table->string('placeholder')->nullable();
            $table->boolean('is_required')->default(true);
            $table->json('options')->nullable(); // For select/radio
            $table->string('grid_column')->default('span 12'); // Layout
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('submit_paper_fields');
    }
};
