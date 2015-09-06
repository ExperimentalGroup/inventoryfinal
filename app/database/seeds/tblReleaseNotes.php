<?php

class tblReleaseNotes extends Seeder{
	
	public function run() {
		DB::table('tblReleaseNotes')->delete();

		$tblReleaseNotes = array (
			array(

				'strReleaseNotesID' => 'RELNOTE001',
				'strReleaseID' => 'RELEASE001',
				'strReleaseNotesStat' => 'Pending'
			),

			array(

				'strReleaseNotesID' => 'RELNOTE002',
				'strReleaseID' => 'RELEASE002',
				'strReleaseNotesStat' => 'Pending'
			),

			array(

				'strReleaseNotesID' => 'RELNOTE003',
				'strReleaseID' => 'RELEASE003',
				'strReleaseNotesStat' => 'Pending'
			)
			
		);

	
		DB::table('tblReleaseNotes')->insert($tblReleaseNotes);
	}
}