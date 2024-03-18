<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ano_lectivos', function (Blueprint $table) {
            $table->id();
            $table->String('data_inicio');
            $table->String('data_fim');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ano_lectivos');
    }
};

