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
        Schema::table('alunos', function (Blueprint $table) {
            //$table->dropColumn('escola_anterior');
            //$table->dropColumn('numero_telefone');
            //$table->dropColumn('idade');
            $table->dropColumn('contato_responsavel');
            $table->dropColumn('nome_responsavel');
            $table->dropColumn('estado_civil');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('alunos', function (Blueprint $table) {
            //
        });
    }
};
