<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 80);
            $table->integer('empresa_id')->unsigned();           
            $table->foreign('empresa_id')->references('id')->on('empresas');            
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}


            
            