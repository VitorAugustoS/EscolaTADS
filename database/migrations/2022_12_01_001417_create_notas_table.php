<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nota', function (Blueprint $table) {
            $table->id();
            $table->foreignId("atividade_id");
            $table->foreignId("turma_id");
            $table->foreignId("aluno_id");
            $table->decimal("nota", $precision = 4, $scale = 2);
            $table->timestamps();

            $table->foreign("atividade_id")->references("id")->on("atividade");            
            $table->foreign("turma_id")->references("id")->on("turma");            
            $table->foreign("aluno_id")->references("id")->on("aluno");            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nota');
    }
};
