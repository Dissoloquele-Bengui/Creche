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
        Schema::table('plano_aulas', function (Blueprint $table) {
            $table->unsignedBigInteger('turma_id');
            $table->string("trimestre");
            $table->foreign('turma_id')->on('turmas')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('plano_aulas', function (Blueprint $table) {
            //
        });
    }
};
