<?php

class Employee extends Eloquent
{
	protected $table = 'tblEmployees';
	protected $primaryKey = 'strEmpID';
	protected $fillable = array('strEmpID' , 'strEmpFName', 'strEmpLName','strEmpStatus', 'strEmpAddress', 'strEmpBrchID', 'strEmpRoleID');

	public function orders() {
		return $this->hasMany('Order', 'strPlacedBy', 'strEmpID');
	}
}
