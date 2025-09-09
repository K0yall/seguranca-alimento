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
        Schema::create('porcoes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alimento_id')->constrained('alimentos')->onDelete('cascade');
            $table->decimal('peso', 10, 2); // em gramas
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('porcoes');
    }
};