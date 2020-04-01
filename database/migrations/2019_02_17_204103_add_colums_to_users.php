<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
		Schema::table('users', function($table) {
			$table->String('identificacion');
			$table->String('apellido');
			$table->integer('edad');
			$table->String('sexo');
			$table->String('telefono');
			$table->String('representante');
			$table->String('telefono_represen');			
		});
	
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
		Schema::table('users', function($table) {
			$table->String('identificacion');
			$table->String('apellido');
			$table->integer('edad');
			$table->String('sexo');
			$table->String('telefono');
			$table->String('representante');
			$table->String('telefono_represen');			
		});		
    }
}
