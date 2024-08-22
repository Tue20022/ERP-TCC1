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
        Schema::create('projetos', function (Blueprint $table) {
            $table->id();
            $table->integer('responsavel');
            $table->string('numero_interno');
            $table->string('numero_externo')->nullable();
            $table->string('prioridade');
            $table->string('descricao')->nullable();
            $table->timestamps();

            //Foreign Keys
            $table->integer('tipo');
            $table->foreign('tipo')->references('id')->on('tipoProjetos');

            $table->integer('status');
            $table->foreign('status')->references('id')->on('statusProjetos');

            $table->integer('cliente')->nullable();
            $table->foreign('cliente')->references('id')->on('clientes');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projetos');
    }
};