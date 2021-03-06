<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblDeliveries extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblDeliveries', function ($table){
			$table->string('strDlvryID')->primary();
			$table->string('strOrdDlvry');//fk
			$table->date('dtDlvryDate');
			$table->string('strDlvryRecBy');//fk
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
		Schema::dropIfExixts('tblDeliveries');
	}

}
