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
        Schema::create('curso_classe_disciplinas', function (Blueprint $table) {
            $table->id();
            $table->UnsignedBigInteger('classe_id');
            $table->UnsignedBigInteger('disciplina_id');
            $table->foreign('classe_id')->references('id')->on('classes')->onDelete('cascade');
            $table->foreign('disciplina_id')->references('id')->on('disciplinas')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classe_disciplina');
    }
};
