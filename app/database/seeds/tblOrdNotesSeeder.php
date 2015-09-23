<?php

class tblOrdNotesSeeder extends Seeder{
	
	public function run() {
		DB::table('tblOrdNotes')->delete();

		$tblOrdNotes = array (
			array(

				'strOrdNotesID' => 'ORDNOTE001',
				'strOrderID' => 'ORD001',
				'strOrdNotesStat' => 'Pending'
			),

			array(

				'strOrdNotesID' => 'ORDNOTE002',
				'strOrderID' => 'ORD003',
				'strOrdNotesStat' => 'Pending'
			),

			array(

				'strOrdNotesID' => 'ORDNOTE003',
				'strOrderID' => 'ORD002',
				'strOrdNotesStat' => 'Pending'
			)
			
		);

	
		DB::table('tblOrdNotes')->insert($tblOrdNotes);
	}
}