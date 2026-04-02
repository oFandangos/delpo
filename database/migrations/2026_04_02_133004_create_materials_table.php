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
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 500);
            $table->string('titulo_publicacao', 500);
            $table->string('autores')->nullable();
            $table->string('editoras')->nullable();
            $table->string('genero')->nullable();
            $table->string('suporte')->nullable();
            $table->string('data_publicacao')->nullable();
            $table->string('localizacao')->nullable();
            $table->longText('comentarios')->nullable();
            $table->longText('descricao')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materials');
    }
};
