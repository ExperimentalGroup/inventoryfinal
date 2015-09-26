<?php

class DeliveryOrder extends Eloquent
{

	protected $table = 'tblOrdDelivery';
	protected $fillable = array('strOrdDlvryID', 'strOrdersID');
}