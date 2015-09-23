<?php

class Delivery extends Eloquent
{
	protected $table = 'tblDeliveries';
	protected $primaryKey = 'strDlvryID';
	protected $fillable = array('strDlvryID','strOrdDlvry','dtDlvryDate', 'strDlvryRecBy');
	
	public function products() {
		return $this->belongsToMany('Product', 'tblDeliveryDetails', 'strDetID', 'strDetProdID')->withPivot('intDetQty');
	}	

	public function employee() {
		return $this->belongsTo('Employee', 'strDlvryRecBy', 'strEmpID');
	}

	public function supplier() {
		return $this->hasManyThrough('Supplier','Order','strSupplID','strSuppID');
	}

	// public function notes() {
	// 	return $this->hasMany('');
	// }
}
