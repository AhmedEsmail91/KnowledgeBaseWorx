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
        Schema::create('lines_management', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('number');
            $table->enum('type',['inbound','outbound']);
            $table->foreignId('cn_id')->constrained('c_n_s')->cascadeOnDelete();
            $table->foreignId('account_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
            // specify the unique constraint
            $table->unique(['account_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lines_management');
    }
};
