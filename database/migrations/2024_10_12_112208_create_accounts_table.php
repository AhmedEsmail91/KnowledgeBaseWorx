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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name', 255);
            $table->json('job_nature');
            $table->string('thumbnail');
            $table->string('hotline');
            $table->foreignId('aheeva_id')->nullable()->constrained('aheevas')->cascadeOnDelete();
            $table->foreignId('kaspersky_id')->nullable()->constrained('kasperskies')->cascadeOnDelete();
            $table->foreignId('branch_id')->constrained(table: 'branches')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
