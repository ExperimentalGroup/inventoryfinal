<?php

class Product extends Eloquent
{
	protected $table = 'tblProducts';
	protected $fillable = array('strProdID','strProdName', 'strProdBrand', 'strProdModel');
}