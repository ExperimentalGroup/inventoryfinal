<?php

class Details extends Eloquent
{
	protected $table = 'tblOrderedProducts';

	public function orders(){
		return $this->hasMany('Order', 'strOrdersID');
	}

	public function products(){
		return $this->hasMany('Product','strProdID');
	}

}