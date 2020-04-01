<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCajasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cajas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('id')->nullable();
            $table->integer('empresa')->nullable();
            $table->integer('sucursal')->nullable();
            $table->integer('departamento')->nullable();
            $table->integer('sub_departamento')->nullable();
            $table->text('detalle')->nullable();
            $table->text('sub_detalle')->nullable();
            $table->date('fecha_desde')->nullable();
            $table->date('fecha_hasta')->nullable();
            $table->date('fecha_vencimiento')->nullable();
            $table->integer('secuencia_desde')->nullable();
            $table->integer('secuencia_hasta')->nullable();
            $table->integer('estado')->nullable();
            $table->text('codigo_verificacion')->nullable();
            $table->foreign('id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cajas');
    }
}
