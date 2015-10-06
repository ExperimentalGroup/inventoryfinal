<?php

class OrderProduct extends Eloquent
{
	protected $table = 'tblOrderedProducts';

	protected $fillable = array('strOPOrdersID', 'strOPProdID', 'intOPQuantity');

	public $timestamps = false;
}