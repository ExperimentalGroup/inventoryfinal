<?php


class tblProductsSeeder extends Seeder{
	
	public function run() {
		DB::table('tblProducts')->delete();

		$tblProducts = array (
			array(

				'strProdID' => 'PRO001',
				'strProdName' => 'Zenfone Series 2',
				'strProdBrand' => 'ASUS',
				'strProdModel' =>'Zenfone'
				
			),

			array(

				'strProdID' => 'PRO002',
				'strProdName' => 'iPhone 6',
				'strProdBrand' => 'Apple',
				'strProdModel' =>'6 series'
				
			),

			array(

				'strProdID' => 'PRO003',
				'strProdName' => 'LG U+',
				'strProdBrand' => 'LG',
				'strProdModel' =>'U+'

			),

			array(

				'strProdID' => 'PRO004',
				'strProdName' => 'iPhone 6s',
				'strProdBrand' => 'Apple',
				'strProdModel' =>'6 series'
				
			),

			array(

				'strProdID' => 'PRO005',
				'strProdName' => 'Samsung S6 Edge',
				'strProdBrand' => 'Samsung',
				'strProdModel' =>'Edge series'
				
			),

			array(

				'strProdID' => 'PRO006',
				'strProdName' => 'iPad Pro',
				'strProdBrand' => 'Apple',
				'strProdModel' =>'iPad'
				
			),

			array(

				'strProdID' => 'PRO007',
				'strProdName' => 'Cherry Mobile Flare S3',
				'strProdBrand' => 'Cherry Mobile',
				'strProdModel' =>'Flare'
				
			)
		);

	
		DB::table('tblProducts')->insert($tblProducts);
	}
}

