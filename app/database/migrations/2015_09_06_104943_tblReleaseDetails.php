<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblReleaseDetails extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblReleaseDetails', function($table){
			$table->string('strReleaseProducts');//fk
			$table->string('strReleaseHeaderID');//fk
			$table->integer('intReleaseQty');
			$table->timestamps();

			//composite keys
			$table->primary(array('strReleaseProducts','strReleaseHeaderID'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('tblReleaseDetails');
	}

}
