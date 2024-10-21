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
        Schema::create('teo', function (Blueprint $table) {
            $table->id();
            $table->string('nome_cliente');
            $table->string('cpf_cliente')->nullable();
            $table->string('cpf_responsavel')->nullable();
            $table->string('observacoes')->nullable();
            $table->string('status');
            $table->string('anexo')->nullable();

            $table->timestamps();

            //FK
            $table->integer('responsavel_id');
            $table->foreign('responsavel_id')->references('id')->on('users');

            $table->integer('projeto_id')->unique();
            $table->foreign('projeto_id')->references('id')->on('projetos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teo');
    }
};
