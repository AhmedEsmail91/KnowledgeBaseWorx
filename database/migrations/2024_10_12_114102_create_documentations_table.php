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
        Schema::create('documentations', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('title', 255);
            $table->json('description');
            $table->string('pdf', 255);
            $table->foreignId('created_by')->constrained('users')->cascadeOnDelete();
            $table->foreignId('section_id')->constrained(table: 'sections')->cascadeOnDelete();
            $table->foreignId('special')->nullable()->constrained('accounts')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentations');
    }
};
