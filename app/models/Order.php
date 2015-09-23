<?php

class Order extends Eloquent
{
	protected $table = 'tblOrders';
	protected $primaryKey = 'strOrdersID';
	protected $fillable = array('strOrdersID','strSupplID','dtOrdDate','strPlacedBy');

	public function supplier() {
		return $this->belongsTo('Supplier', 'strSupplID');
	}

	public function employee() {
		return $this->belongsTo('Employee', 'strPlacedBy');
	}

	public function products() {
		return $this->belongsToMany('Product', 'tblOrderedProducts', 'strOPOrdersID', 'strOPProdID')->withPivot('intOPQuantity');
	}

	public function notes() {
		return $this->hasMany('OrderNotes','strOrderID','strOrdersID');
	}
}