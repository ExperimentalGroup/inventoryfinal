<?php

class tblReleasesSeeder extends Seeder{
	
	public function run() {
		DB::table('tblReleases')->delete();

		$tblReleases = array (
			array(

				'strReleasesID' => 'RELEASE001',
				'strReleaseBrchID' => 'BRCH001',
				'strReleaseBy' => 'EMPL00003',
				'dtDateReleased' => '2015-07-01'
			),

			array(

				'strReleasesID' => 'RELEASE002',
				'strReleaseBrchID' => 'BRCH002',
				'strReleaseBy' => 'EMPL00002',
				'dtDateReleased' => '2015-07-13'
			),

			array(

				'strReleasesID' => 'RELEASE003',
				'strReleaseBrchID' => 'BRCH003',
				'strReleaseBy' => 'EMPL00003',
				'dtDateReleased' => '2015-07-20'
			)
			
		);

	
		DB::table('tblReleases')->insert($tblReleases);
	}
}