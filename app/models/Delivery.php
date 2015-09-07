<?php

class Deliveries extends Eloquent()
{
	protected $table = 'tblDeliveries';
	protected $primaryKey = 'strDlvryID';
	protected $fillable = array('strOrdDlvry','dtDlvryDate', 'strDlvryRecBy');
	
}
