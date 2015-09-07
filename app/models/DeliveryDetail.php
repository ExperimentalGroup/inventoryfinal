<?php

class DeliveryDetail extends Eloquent()
{
	
	protected $table = 'tblDeliveryDetails';
	protected $fillable = array('strDetProdID', 'intDetQty');
}