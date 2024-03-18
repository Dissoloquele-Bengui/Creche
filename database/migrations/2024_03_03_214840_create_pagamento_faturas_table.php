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
        Schema::create('pagamento_faturas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_fatura');
            $table->string('caminho');
            $table->foreign('id_fatura')->references('id')->on('faturas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pagamento_faturas');
    }
};
