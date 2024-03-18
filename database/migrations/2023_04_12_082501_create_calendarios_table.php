<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('calendarios', function (Blueprint $table) {
            $table->id();
            $table->string('descricao');
            $table->date('data');
            $table->unsignedBigInteger('ano_letivo_id');
            $table->foreign('ano_letivo_id')->references('id')->on('ano_lectivos')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('calendarios');
    }
};



