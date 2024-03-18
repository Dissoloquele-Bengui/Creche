<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('compras', function (Blueprint $table) {
            //$table->float('valor')->change();
            $table->integer('it_estado')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void{
    
        Schema::table('faturas', function (Blueprint $table) {
            $table->dropColumn('it_estado');
            $table->dropColumn('id_usuario');
            $table->dropColumn('cliente');
            $table->dropColumn('email');
            $table->dropColumn('telefone');
            $table->dropColumn('endereco');
        });
    }
};
