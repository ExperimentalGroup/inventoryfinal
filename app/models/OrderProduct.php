<?php

class OrderProduct extends Eloquent
{
	protected $table = 'tblOrderedProducts';
<<<<<<< HEAD
	protected $primaryKey = 'strOPOrdersID';
=======

	protected $fillable = array('strOPOrdersID', 'strOPProdID', 'intOPQuantity');

	public $timestamps = false;
>>>>>>> 6f0e7d9fb8168d155bfa2bb3c141540d6da1cd18
}