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
        //Schema::dropIfExists('avaliacao_produtos');
        Schema::create('avaliacao_produtos', function (Blueprint $table) {
            $table->id();
            $table->integer('valor');
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_produto');
            $table->foreign('id_produto')->references('id')->on('produtos')->onDelete('cascade');
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avaliacaos');
    }
};
