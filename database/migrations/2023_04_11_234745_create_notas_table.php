<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('aluno_id');
            $table->foreign('aluno_id')->references('id')->on('alunos')->onDelete('cascade');
            $table->unsignedBigInteger('professor_id');
            $table->foreign('professor_id')->references('id')->on('professors')->onDelete('cascade');
            $table->unsignedBigInteger('trimestre_id');
            $table->foreign('trimestre_id')->references('id')->on('trimestres')->onDelete('cascade');
            $table->float('valor');
            $table->string('tipo');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('notas');
    }
};
