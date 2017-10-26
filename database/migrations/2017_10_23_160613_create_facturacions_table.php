<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturacionsTable extends Migration
{
    public function up()
    {
        Schema::create('facturacion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cliente_id')->unsigned();
            $table->integer('servicio_id')->unsigned();
            $table->integer('empresa_id')->unsigned();
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('servicio_id')->references('id')->on('servicios');
            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->string('motivo_baja', 255)->nullable();
            $table->date('fecha_baja')->nullable();
            $table->unsignedSmallInteger('estado')->default(1);
            $table->float('base');
            $table->text('observaciones')->nullable();
            $table->string('dominio', 255)->nullable();
            $table->unsignedSmallInteger('ene');
            $table->unsignedSmallInteger('feb');
            $table->unsignedSmallInteger('mar');
            $table->unsignedSmallInteger('abr');
            $table->unsignedSmallInteger('may');
            $table->unsignedSmallInteger('jun');
            $table->unsignedSmallInteger('jul');
            $table->unsignedSmallInteger('ago');
            $table->unsignedSmallInteger('sep');
            $table->unsignedSmallInteger('oct');
            $table->unsignedSmallInteger('nov');
            $table->unsignedSmallInteger('dic');
        });
    }

    public function down()
    {
        Schema::dropIfExists('facturacion');
    }
}
