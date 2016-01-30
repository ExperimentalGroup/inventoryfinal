<?php

class Supplier extends Eloquent
{
	protected $table = 'tblSuppliers';
	protected $primaryKey = 'strSuppID';
	protected $fillable = array('strSuppID','strSuppCompanyName','strSuppOwnerLName','strSuppOwnerFName','strSuppContactNo','strSuppAddress','actStatus');

	public function orders() {
		return $this->hasMany('Order', 'strSupplID', 'strSuppID');
	}

	// public function deliveries() {
	// 	return $this->hasManyThrough('Delivery','Order','strSupplID','strOrdDlvry');
	// }
}