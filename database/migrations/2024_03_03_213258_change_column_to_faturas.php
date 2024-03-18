<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('faturas', function (Blueprint $table) {
            $table->unsignedBigInteger('id_loja')->nullable();
            $table->foreign('id_loja')->references('id')->on('lojas')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('faturas', function (Blueprint $table) {
            //
        });
    }
};
