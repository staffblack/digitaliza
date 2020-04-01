<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNotasToNotas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('notas', function($table) {
             $table->dropColumn('nota');
        });
		Schema::table('notas', function($table) {
			$table->double('q1p1');
			$table->double('q1p2');
			$table->double('q1p3');
			$table->double('q1exam');
			$table->double('q2p1');
			$table->double('q2p2');
			$table->double('q2p3');
			$table->double('q2exam');			
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
		Schema::table('notas', function($table) {
			$table->integer('nota');			
		});		
		Schema::table('notas', function($table) {
			$table->dropColumn('q1p1');
			$table->dropColumn('q1p2');
			$table->dropColumn('q1p3');
			$table->dropColumn('q1exam');
			$table->dropColumn('q2p1');
			$table->dropColumn('q2p2');
			$table->dropColumn('q2p3');
			$table->dropColumn('q2exam');			
		});		
    }
}
