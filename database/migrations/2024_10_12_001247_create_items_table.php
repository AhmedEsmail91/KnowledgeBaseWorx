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
        Schema::create('items', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name');
            $table->enum('type', ['IT', 'Network', 'Software', 'VOIP'])->default('IT');
            $table->json('description');
            $table->string('item_desc_name')->virtualAs('concat(name, \' \',"-",\' \', type, \' \',"-",\' \', description)');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
