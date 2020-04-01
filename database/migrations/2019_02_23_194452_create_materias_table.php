<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMateriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materias', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('id_curso')->unsigned();
			$table->foreign('id_curso')->references('id')->on('cursos');
			$table->integer('id_user')->unsigned();
			$table->foreign('id_user')->references('id')->on('users');			
			$table->string('materia');
			$table->integer('estado');
			$table->string('periodo');
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
        Schema::dropIfExists('materias');
    }
}
