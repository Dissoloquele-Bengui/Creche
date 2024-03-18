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
        //DB::statement('delete from avaliacaos where disciplina_id is not null ');
        Schema::table('avaliacaos', function (Blueprint $table) {
//            $table->dropColumn('disciplina_id');
            $table->dropForeign('avaliacaos_disciplina_id_foreign');
            $table->foreign('disciplina_id')->references('id')->on('curso_classe_disciplinas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('avaliacao', function (Blueprint $table) {
            //
        });
    }
};
