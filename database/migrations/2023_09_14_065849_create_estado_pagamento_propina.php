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
        Schema::create('estado_pagamento_propina', function (Blueprint $table) {
            $table->id();
            $table->string('estado');
            $table->unsignedBigInteger('id_propina');
            $table->unsignedBigInteger('id_matricula');
            $table->foreign('id_propina')->references('id')->on('propinas')->onDelete('cascade');
            $table->foreign('id_matricula')->references('id')->on('matriculas')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estado_pagamento_propina');
    }
};
