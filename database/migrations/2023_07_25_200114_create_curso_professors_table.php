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
        Schema::create('curso_professors', function (Blueprint $table) {
            $table->id();
            $table->UnsignedBigInteger('professor_id');
            $table->UnsignedBigInteger('curso_id');
            $table->date('data_atribuicao');
            $table->foreign('professor_id')->references('id')->on('professors')->onDelete('cascade');
            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $table->dropForeign('professor_id');
        $table->dropForeign('curso_id');
        Schema::dropIfExists('curso_professors');
    }
};
