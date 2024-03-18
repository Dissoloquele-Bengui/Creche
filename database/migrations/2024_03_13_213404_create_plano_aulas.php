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
        Schema::create('plano_aulas', function (Blueprint $table) {
            $table->id();
            $table->string('caminho');
            $table->unsignedBigInteger('professor_id');
            $table->unsignedBigInteger('curso_classe_disciplina_id');
            $table->foreign('curso_classe_disciplina_id')->references('id')->on('curso_classe_disciplinas')->onDelete('cascade');
            $table->foreign('professor_id')->references('id')->on('professors')->onDelete('cascade');
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
        Schema::dropIfExists('plano_aulas');
    }
};
