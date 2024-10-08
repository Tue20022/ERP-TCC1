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
        Schema::create('detalhamento', function (Blueprint $table) {
            $table->id();
            $table->integer('num_det');
            $table->string('tag')->nullable();
            $table->float('peso')->nullable();
            $table->float('area')->nullable();
            $table->string('status');
            $table->string('observacoes')->nullable();
            $table->string('anexo')->nullable();
            $table->timestamps();

            $table->integer('projeto_id')->unique();
            $table->foreign('projeto_id')->references('id')->on('projetos');

            $table->integer('responsavel_id');
            $table->foreign('responsavel_id')->references('id')->on('users');

            $table->integer('aprovador_id');
            $table->foreign('aprovador_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    { 
        Schema::dropIfExists('detalhamento');
    }
};
