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
        Schema::create('turma_professors', function (Blueprint $table) {
            $table->id();
            $table->UnsignedBigInteger('professor_id');
            $table->UnsignedBigInteger('turma_id');
            $table->foreign('professor_id')->references('id')->on('professors')->onDelete('cascade');
            $table->foreign('turma_id')->references('id')->on('turmas')->onDelete('cascade');
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
        $table->dropForeign('turma_id');
        Schema::dropIfExists('turma_professors');
    }
};
