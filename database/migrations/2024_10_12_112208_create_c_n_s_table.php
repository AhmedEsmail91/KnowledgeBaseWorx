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
        
        Schema::create('c_n_s', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('CN-number');
            $table->string('start_range');
            $table->string('end_range');
            $table->json('Hunt_Group')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('c_n_s');
    }
};
