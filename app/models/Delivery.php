<?php

class Delivery extends Eloquent
{
	protected $table = 'tblDeliveries';
	protected $primaryKey = 'strDlvryID';
	protected $fillable = array('strDlvryID','strOrdDlvry','dtDlvryDate', 'strDlvryRecBy');
	
}
