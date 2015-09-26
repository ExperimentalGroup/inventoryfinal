<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblDeliveryDetails extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblDeliveryDetails', function ($table){
			$table->string('strDetID');//fk
			$table->string('strDetProdID');//fk
			$table->integer('intDetQty');

			$table->primary(array('strDetID','strDetProdID'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('tblDeliveryDetails');
	}

}
