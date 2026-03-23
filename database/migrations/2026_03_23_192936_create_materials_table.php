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
            $table->string('titulo');
            $table->string('titulo_publicacao');
            $table->string('autores');
            $table->string('editoras');
            $table->string('genero');
            $table->string('suporte');
            $table->string('data_publicacao');
            $table->string('localizacao');
            $table->string('comentarios');
            $table->text('descricao');
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
