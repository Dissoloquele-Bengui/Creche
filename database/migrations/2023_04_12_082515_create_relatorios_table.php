<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('relatorios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('aluno_id');
            $table->foreign('aluno_id')->references('id')->on('alunos')->onDelete('cascade');
            $table->unsignedBigInteger('disciplina_id');
            $table->foreign('disciplina_id')->references('id')->on('disciplinas')->onDelete('cascade');
            $table->unsignedBigInteger('trimestre_id');
            $table->foreign('trimestre_id')->references('id')->on('trimestres')->onDelete('cascade');
            $table->date('data');
            $table->text('conteudo');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('relatorios');
    }
};

