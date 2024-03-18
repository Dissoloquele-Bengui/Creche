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

        Schema::dropIfExists('curso_disciplinas');
        Schema::create('curso_disciplinas', function (Blueprint $table) {

            $table->id();
            $table->UnsignedBigInteger('curso_id');
            $table->UnsignedBigInteger('disciplina_id');
            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade');
            $table->foreign('disciplina_id')->references('id')->on('disciplinas')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $table->dropForeign('curso_id');
        $table->dropForeign('disciplina_id');
        Schema::dropIfExists('curso_disciplina');
    }
};
