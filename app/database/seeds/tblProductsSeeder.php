<?php


class tblProductsSeeder extends Seeder{
	
	public function run() {
		DB::table('tblProducts')->delete();

		$tblProducts = array (
			array(

				'strProdID' => 'PRO001',
				'strProdName' => 'Zenfone Series 2',
				'strProdBrand' => 'ASUS',
				'strProdModel' =>'Zenfone',
				'actStatus'=>'1'
			),

			array(

				'strProdID' => 'PRO002',
				'strProdName' => 'iPhone 6',
				'strProdBrand' => 'Apple',
				'strProdModel' =>'6 series',
				'actStatus'=>'1'
			),

			array(

				'strProdID' => 'PRO003',
				'strProdName' => 'LG U+',
				'strProdBrand' => 'LG',
				'strProdModel' =>'U+',
				'actStatus'=>'1'
			),

			array(

				'strProdID' => 'PRO004',
				'strProdName' => 'iPhone 6s',
				'strProdBrand' => 'Apple',
				'strProdModel' =>'6 series',
				'actStatus'=>'1'
			),

			array(

				'strProdID' => 'PRO005',
				'strProdName' => 'Samsung S6 Edge',
				'strProdBrand' => 'Samsung',
				'strProdModel' =>'Edge series',
				'actStatus'=>'1'
			),

			array(

				'strProdID' => 'PRO006',
				'strProdName' => 'iPad Pro',
				'strProdBrand' => 'Apple',
				'strProdModel' =>'iPad',
				'actStatus'=>'1'
			),

			array(

				'strProdID' => 'PRO007',
				'strProdName' => 'Cherry Mobile Flare S3',
				'strProdBrand' => 'Cherry Mobile',
				'strProdModel' =>'Flare',
				'actStatus'=>'1'
			)
		);

	
		DB::table('tblProducts')->insert($tblProducts);
	}
}

