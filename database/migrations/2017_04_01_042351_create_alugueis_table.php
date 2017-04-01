<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlugueisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alugueis', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('idVeiculo')->unsigned();
            $table->foreign('idVeiculo')
                ->references('id')->on('veiculos')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->integer('idCliente')->unsigned();
            $table->foreign('idCliente')
                ->references('id')->on('clientes')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->date('dataLocacao');
            $table->date('dataDevolucao');
            $table->float('pagamento');
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
        Schema::dropIfExists('alugueis');
    }
}
