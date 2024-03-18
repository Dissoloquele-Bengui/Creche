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
        Schema::create('cheques', function (Blueprint $table) {
            $table->id();
            $table->string("codigo");
            $table->unsignedBigInteger('id_cliente');
            $table->unsignedBigInteger('id_loja')->nullable();
            $table->float('montante');
            $table->foreign('id_cliente')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_loja')->references('id')->on('lojas')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cheques');
    }
};
