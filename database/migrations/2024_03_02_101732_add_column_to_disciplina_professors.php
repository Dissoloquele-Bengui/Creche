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
        Schema::table('disciplina_professors', function (Blueprint $table) {
            $table->unsignedBigInteger('curso_id')->nullable();
            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade');
            $table->unsignedBigInteger('classe_id')->nullable();
            $table->foreign('classe_id')->references('id')->on('classes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('disciplina_professors', function (Blueprint $table) {
            //
        });
    }
};
