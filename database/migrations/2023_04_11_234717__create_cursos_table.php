<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
        {

            Schema::create('cursos', function (Blueprint $table) {
                $table->id();
                $table->string('nome');
                $table->string('codigo');
                $table->softDeletes();
                $table->timestamps();
            });


        /*Schema::create('matrizes_curriculares', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->text('descricao')->nullable();
            $table->unsignedBigInteger('curso_id');
            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade');
            $table->unsignedBigInteger('ano_letivo_id');
            $table->foreign('ano_letivo_id')->references('id')->on('ano_lectivos')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('disciplinas_matrizes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('matriz_curricular_id');
            $table->foreign('matriz_curricular_id')->references('id')->on('matrizes_curriculares')->onDelete('cascade');
            $table->unsignedBigInteger('disciplina_id');
            $table->foreign('disciplina_id')->references('id')->on('disciplinas')->onDelete('cascade');
            $table->integer('carga_horaria');
            $table->integer('pre_requisito_id')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });*/
    }

    public function down()
    {
        Schema::dropIfExists('disciplinas_matrizes');
        Schema::dropIfExists('matrizes_curriculares');
        Schema::dropIfExists('cursos');
    }
};

