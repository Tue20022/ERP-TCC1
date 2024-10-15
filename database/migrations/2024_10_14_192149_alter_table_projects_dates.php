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
        Schema::table('projetos', function (Blueprint $table) {
            // Planejamento
            $table->date('inicio_prev_plan')->nullable();
            $table->date('term_prev_plan')->nullable();
            $table->date('inicio_real_plan')->nullable();
            $table->date('term_real_plan')->nullable();

            //Execução
            $table->date('inicio_prev_exec')->nullable();
            $table->date('term_prev_exec')->nullable();
            $table->date('inicio_real_exec')->nullable();
            $table->date('term_real_exec')->nullable();
            
            // Foreign Key
            $table->integer('status_plan')->nullable();
            $table->foreign('status_plan')->references('id')->on('statusPlan');

            $table->integer('status_exec')->nullable();
            $table->foreign('status_exec')->references('id')->on('statusExec');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projetos', function (Blueprint $table) {
            // Drop foreign keys
            $table->dropForeign(['status_plan']);
            $table->dropForeign(['status_exec']);

            // Drop columns
            $table->dropColumn([
                'inicio_prev_plan',
                'term_prev_plan',
                'inicio_real_plan',
                'term_real_plan',
                'inicio_prev_exec',
                'term_prev_exec',
                'inicio_real_exec',
                'term_real_exec',
                'status_plan',
                'status_exec'
            ]);
        });
    }
};
