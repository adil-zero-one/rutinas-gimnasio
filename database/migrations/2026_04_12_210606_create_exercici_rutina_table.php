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
        Schema::create('exercici_rutina', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rutina_id')->unique()->constrained()->cascadeOnDelete()
                ->onUpdate('cascade');
            $table->foreignId('exercici_id')->unique()->constrained()
            ->onDelete('cascade')->cascadeOnUpdate();
            $table->integer('series');
            $table->integer('repeticions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exercici_rutina');
    }
};
