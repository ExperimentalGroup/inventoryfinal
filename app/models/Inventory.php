<?php

class Inventory extends Eloquent
{
	protected $table = 'tblInventory';
	protected $fillable = array('strBatchID','strProdID', 'strDlvryID', 'strBrchID', 'intAvailQty', 'dblCurRetPrice', 'dblCurWPrice');
	
}