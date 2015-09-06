<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblRelease extends Migration {

	/**
	 * Run the migrations.d
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblReleases', function($table){
			$table->string('strReleasesID')->primary();
			$table->string('strReleaseBrchID');//fk
			$table->string('strReleaseBy');//fk
			$table->date('dtDateReleased');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('tblReleases');
	}

}
