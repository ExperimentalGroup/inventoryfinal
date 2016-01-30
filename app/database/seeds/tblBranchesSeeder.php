<?php

class tblBranchesSeeder extends Seeder{
	
	public function run() {
		DB::table('tblBranches')->delete();

		$tblBranches = array (
			array(

				'strBrchID' => 'BRCH001',
				'strBrchName' => 'Techno Galore Mandaluyong',	
				'strBrchAddress' => 'Boni,Mandaluyong',
				'actStatus'=>'1'
			),

			array(

				'strBrchID' => 'BRCH002',
				'strBrchName' => 'Techno Galore Main',	
				'strBrchAddress' => 'Sta.Mesa,Manila',
				'actStatus'=>'1'
			),

			array(

				'strBrchID' => 'BRCH003',
				'strBrchName' => 'Techno Galore Taguig',	
				'strBrchAddress' => 'Global City,Taguig',
				'actStatus'=>'1'
			)

		);

	
		DB::table('tblBranches')->insert($tblBranches);
	}
}