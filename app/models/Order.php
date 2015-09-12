<?php

class Order extends Eloquent
{
	protected $table = 'tblOrders';
	protected $primaryKey = 'strOrdersID';
	protected $fillable = array('strSupplID','dtOrdDate','strPlacedBy');

	public function supplier() {
		return $this->belongsTo('Supplier', 'strSupplID');
	}

	public function employee() {
		return $this->belongsTo('Employee', 'strPlacedBy');
	}
}