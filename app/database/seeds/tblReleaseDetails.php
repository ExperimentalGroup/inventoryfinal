<?php

class tblReleaseDetails extends Seeder{
	
	public function run() {
		DB::table('tblReleaseDetails')->delete();

		$tblReleaseDetails = array (
			array(

				'strReleaseProducts' => 'PRO001',
				'strReleaseHeaderID' => 'RELEASE001',
				'intReleaseQty' => '10'
			),

			array(

				'strReleaseProducts' => 'PRO002',
				'strReleaseHeaderID' => 'RELEASE002',
				'intReleaseQty' => '21'
			),

			array(

				'strReleaseProducts' => 'PRO002',
				'strReleaseHeaderID' => 'RELEASE003',
				'intReleaseQty' => '30'
			)
			
		);

	
		DB::table('tblReleaseDetails')->insert($tblReleaseDetails);
	}
}