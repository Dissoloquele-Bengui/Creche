<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('turmas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->unsignedBigInteger('idCurso');
            $table->unsignedBigInteger('idClasse');
            $table->unsignedBigInteger('idAno');
            $table->foreign('idAno')->references('id')->on('ano_lectivos')->onDelete('cascade');
            $table->foreign('idClasse')->references('id')->on('classes')->onDelete('cascade');
            $table->foreign('idCurso')->references('id')->on('cursos')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });


    }

    public function down()
    {
        Schema::dropIfExists('turmas');
    }
};

