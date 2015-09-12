<?php

class Product extends Eloquent
{
	protected $table = 'tblProducts';
	protected $primaryKey = 'strProdID';
	protected $fillable = array('strProdID','strProdName', 'strProdBrand', 'strProdModel');

	public function price()
	{
		return $this->hasMany('Inventory', 'strProdID');
	}

	// public function orders()
	// {
	// 	return $this->belongstoMany('Order');
	// }
}