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
        Schema::create('rupes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('codigo');
            $table->unsignedBigInteger('servico_id');
            $table->foreign('servico_id')
                ->references('id')
                ->on('servicos')
                ->onDelete('cascade');
            $table->softdeletes();
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
        Schema::dropIfExists('rupes');
    }
};
