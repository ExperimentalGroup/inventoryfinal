<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		 $this->call('tblBranchesSeeder');
		 $this->call('tblProductsSeeder');
		 $this->call('tblRolesSeeder');
		 $this->call('tblEmployeesSeeder');
		 $this->call('tblSuppliersSeeder');
		 $this->call('tblOrdersSeeder');
		 $this->call('tblDeliveriesSeeder');
		 $this->call('tblInventorySeeder');
		 $this->call('tblAdjustmentsSeeder');
		 $this->call('tblLoginSeeder');
		 $this->call('tblDelDetSeeder');
		 $this->call('tblOrdProdSeeder');
		 $this->call('tblOrdNotesSeeder');
		 $this->call('tblReleasesSeeder');
		 $this->call('tblReleaseDetails');
		 $this->call('tblReleaseNotes');
		 $this->call('tblTagsSeeder');

	}

}
