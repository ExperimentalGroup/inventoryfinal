<?php

class Supplier extends Eloquent
{
	protected $table = 'tblSuppliers';
	protected $primaryKey = 'strSuppID';
	protected $fillable = array('strSuppID','strSuppCompanyName','strSuppOwnerLName','strSuppOwnerFName','strSuppContactNo','strSuppAddress');

	public function orders() {
		return $this->hasMany('Order', 'strSupplID', 'strSuppID');
	}
}