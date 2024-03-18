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
        Schema::table('curso_disciplinas', function (Blueprint $table) {
            $table->unsignedBigInteger('classe_id')->nullable()->default(1);
            $table->foreign('classe_id')->on('classes')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('curso_disciplinas', function (Blueprint $table) {
            //
        });
    }
};
