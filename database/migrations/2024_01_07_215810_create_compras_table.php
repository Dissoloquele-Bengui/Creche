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
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_produto');
            $table->unsignedBigInteger('id_fatura');
            $table->unsignedBigInteger('id_cheque');
            $table->integer('qtd');
            $table->float('valor');
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_produto')->references('id')->on('produtos')->onDelete('cascade');
            $table->foreign('id_fatura')->references('id')->on('faturas')->onDelete('cascade');
            $table->foreign('id_cheque')->references('id')->on('cheques')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compras');
    }
};
