<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('professors', function (Blueprint $table) {
            $table->id();
            $table->date('data_nascimento')->nullable();
            $table->string('contacto')->nullable();
            $table->string('bi')->nullable();
            $table->string('endereco')->nullable();
            $table->string('genero')->nullable();
            $table->string('nome')->nullable();
            $table->string('area_especializacao');
            $table->date('data_contratacao');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('professors');
    }
};

