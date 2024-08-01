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
        Schema::table('frequencias', function (Blueprint $table) {
            $table->dropForeign('frequencias_disciplina_id_foreign');
           $table->dropColumn('disciplina_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('frequencias', function (Blueprint $table) {
            //
        });
    }
};
