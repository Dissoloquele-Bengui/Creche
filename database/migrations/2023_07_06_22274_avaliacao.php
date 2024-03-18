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

        //Schema::dropIfExists('avaliacaos');
        Schema::create('avaliacaos', function (Blueprint $table) {

            $table->id();
            $table->float('valor');
            $table->integer('trimestre');
            $table->date('data');
            $table->unsignedBigInteger('disciplina_id');
            $table->unsignedBigInteger('matricula_id');
            $table->foreign('disciplina_id')->references('id')->on('disciplinas')->onDelete('cascade');
            $table->foreign('matricula_id')->references('id')->on('matriculas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('avaliacaos');
    }
};
