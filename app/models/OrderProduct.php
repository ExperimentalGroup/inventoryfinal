<?php

class OrderProduct extends Eloquent
{
	protected $table = 'tblOrderedProducts';
	protected $primaryKey = 'strOPOrdersID';
	protected $fillable = array('strOPOrdersID', 'strOPProdID', 'intOPQuantity');

}