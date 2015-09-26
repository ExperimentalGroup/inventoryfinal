<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblReleaseNotes extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblReleaseNotes', function($table){
			$table->string('strReleaseNotesID')->primary();
			$table->string('strReleaseID');//fk
			$table->string('strReleaseNotesStat');
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
		Schema::dropIfExists('tblReleaseNotes');
	}

}
