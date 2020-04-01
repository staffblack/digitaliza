<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('id_user')->unsigned();
			$table->foreign('id_user')->references('id')->on('users');
			$table->integer('id_curso')->unsigned();
			$table->foreign('id_curso')->references('id')->on('cursos');
			$table->integer('id_materia')->unsigned();
			$table->foreign('id_materia')->references('id')->on('materias');
			$table->integer('lapso');
			$table->integer('tipo');
			$table->integer('nota');
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
        Schema::dropIfExists('notas');
    }
}
