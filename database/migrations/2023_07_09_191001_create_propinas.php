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
        Schema::create('propinas', function (Blueprint $table) {
            $table->id();
            $table->string('mes');
            $table->float('limite');
            $table->date('data_vencimento');
            $table->unsignedBigInteger('ano_id');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('ano_id')->references('id')->on('ano_lectivos')->onDelete('cascade');
        });
        Schema::create('pagamentos', function (Blueprint $table) {
            $table->id();
            $table->float('valor');
            $table->date('data');
            $table->unsignedBigInteger('matricula_id');
            $table->foreign('matricula_id')->references('id')->on('matriculas')->onDelete('cascade');
            $table->unsignedBigInteger('propina_id');
            $table->foreign('propina_id')->references('id')->on('propinas')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('propinas');
        Schema::dropIfExists('pagamentos');

    }
};
