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
        Schema::create('exercicis', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->text('descripcio');
            // blob de laravel, seguramente no es recomendable
            // query lento, backup grande y no escalable X
            // $table->binary('imatge')->nullable();
            // -----------------------------
            // como el video club lo guardamos mediadamente un url
            $table->string('imatge')->nullable();
            $table->foreignId('categoria_id')
                ->constrained()
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exercicis');
    }
};
