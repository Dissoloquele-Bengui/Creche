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
        Schema::create('solicita_servicos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_aluno');
            $table->unsignedBigInteger('id_servico');
            $table->integer('status');
            $table->string('caminho_comprovativo');
            $table->foreign('id_aluno')->references('id')->on('alunos')->onDelete('cascade');
            $table->foreign('id_servico')->references('id')->on('servicos')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicita_servicos');
    }
};
