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
        Schema::table('professors', function (Blueprint $table) {
            $table->dropColumn('salario');
            $table->date('data_nascimento')->nullable();
            $table->string('contacto')->nullable();
            $table->string('bi')->nullable();
            $table->string('endereco')->nullable();
            $table->string('genero')->nullable();
            $table->string('nome')->nullable();
            $table->dropForeign('professors_user_id_foreign');
            $table->dropColumn('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('professors', function (Blueprint $table) {
            //
        });
    }
};
