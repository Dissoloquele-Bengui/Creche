<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        /*Schema::table('disciplina_professors', function (Blueprint $table) {
          /* $table->dropForeign('disciplina_professors_curso_id_foreign');
            $table->dropForeign('disciplina_professors_classe_id_foreign');
            $table->dropColumn('curso_id');
            $table->dropColumn('classe_id');
            $table->dropForeign('disciplina_professors_disciplina_id_foreign');
            $table->renameColumn('disciplina_id','curso_classe_disciplina_id');
            $table->foreign('curso_classe_disciplina_id')->references('id')->on('curso_classe_disciplinas')->onDelete('cascade');


        });*/
        //dd(            DB::statement('select * disciplina_professors '));
        /*Schema::table('disciplina_professors', function (Blueprint $table) {
            // Add a new column with the desired name

            // Copy data from the old column to the new one
           // DB::statement('UPDATE disciplina_professors SET curso_classe_disciplina_id = disciplina_id');

            // Drop the old column
           // $table->dropColumn('disciplina_id');

            // Add foreign key constraint to the new column
            DB::statement('delete from disciplina_professors where curso_classe_disciplina_id is not null');
            $table->foreign('curso_classe_disciplina_id')->references('id')->on('curso_classe_disciplinas')->onDelete('cascade');
        });*/
      //  dd(            DB::statement('select * disciplina_professors '));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('disciplina_professors', function (Blueprint $table) {
            //
        });
    }
};
