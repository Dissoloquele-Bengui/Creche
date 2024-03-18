<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('frequencias', function (Blueprint $table) {
            $table->id();
            $table->date('data_aula');
            $table->enum('presenca', ['Presente', 'Ausente']);
            $table->unsignedBigInteger('disciplina_id');
            $table->unsignedBigInteger('professor_id')->nullable();
            $table->unsignedBigInteger('matricula_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('disciplina_id')->references('id')->on('disciplinas')->onDelete('cascade');
            $table->foreign('professor_id')->references('id')->on('professors')->onDelete('cascade');
            $table->foreign('matricula_id')->references('id')->on('matriculas')->onDelete('cascade');
        });
        Schema::create('faltas', function (Blueprint $table) {
            $table->id();
            $table->text('justificativa');
            $table->date('data_falta');
            $table->unsignedBigInteger('frequencia_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('frequencia_id')->references('id')->on('frequencias')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('frequencias');
        Schema::dropIfExists('faltas');
    }
};

