<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::dropIfExists('horarios');
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('turma_id');
            $table->foreign('turma_id')->references('id')->on('turmas')->onDelete('cascade');
            $table->string('caminho');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('horarios');
    }
};

