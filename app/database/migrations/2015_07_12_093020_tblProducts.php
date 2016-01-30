<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblProducts extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblProducts', function(Blueprint $table){
			$table->string('strProdID')->primary();
			$table->string('strProdName');
			$table->string('strProdBrand');
			$table->string('strProdModel');
			$table->boolean('actStatus')->default('1');
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
		Schema::dropIfExists('tblProducts');
	}

}
