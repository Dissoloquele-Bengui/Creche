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
        Schema::table('compras', function (Blueprint $table) {
           // $table->unsignedBigInteger('id_cheque')->nullable()->change();
           // $table->unsignedBigInteger('id_loja')->nullable();
            //$table->foreign('id_loja')->references('id')->on('lojas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('compras', function (Blueprint $table) {
            $table->dropForeign('compras_id_loja_foreign');
            $table->dropColumn('id_loja');
        });
    }
};
