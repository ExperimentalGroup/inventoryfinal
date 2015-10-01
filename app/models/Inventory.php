<?php

class Inventory extends Eloquent
{
	protected $table = 'tblInventory';
	protected $primaryKey = 'strBatchID';
	protected $fillable = array('strBatchID','strProdID', 'strDlvryID', 'strBrchID', 'intAvailQty', 'dblCurRetPrice', 'dblCurWPrice');

	public function product()
	{
		return $this->belongsTo('Product', 'strProdID', 'strProdID');
	}

	
}
