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
        Schema::create('alunos', function (Blueprint $table) {
            $table->id();
            $table->integer('idade')->nullable();
            $table->string('nacionalidade');
            $table->string('naturalidade');
            $table->string('deficiencia');
            $table->string('estado_civil');
            $table->string('provincia');
            $table->string('numero_telefone');
            $table->string('nome_responsavel');
            $table->string('nome_pai');
            $table->string('nome_mae');
            $table->string('contato_responsavel');
            $table->string('parentesco_responsavel');
            $table->string('escola_anterior')->nullable();
            $table->string('certificados')->nullable();
            $table->string('vc_foto')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alunos');
    }
};
