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
        Schema::create('delineamento', function (Blueprint $table) {
            $table->id();
            $table->string('num_del');
            $table->string('tipo');
            $table->date('necessidade_em');
            $table->string('status');
            $table->string('observacoes')->nullable();
            $table->string('anexo')->nullable();

            // Foreign Key
            $table->integer('projeto_id')->unique();
            $table->foreign('projeto_id')->references('id')->on('projetos');

            $table->integer('disciplina_id');
            $table->foreign('disciplina_id')->references('id')->on('disciplina_del');

            $table->integer('delineador_id');
            $table->foreign('delineador_id')->references('id')->on('users');

            $table->integer('aprovador_id');
            $table->foreign('aprovador_id')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delineamento');
    }
};
