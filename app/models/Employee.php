<?php

class Employee extends Eloquent
{
	protected $table = 'tblEmployees';
	protected $primaryKey = 'strEmpID';
	protected $fillable = array('strEmpID' , 'strEmpFName', 'strEmpLName','strEmpStatus', 'strEmpAddress', 'strEmpBrchID', 'strEmpRoleID');

	public function orders() {
		return $this->hasMany('Order', 'strPlacedBy', 'strEmpID');
	}

	public function role() {
		return $this->belongsTo('Role', 'strEmpRoleID');
	}

	public function deliveries(){
		return $this->hasMany('Delivery', 'strDlvryID');
	}

	public function releases() {
		return $this->hasMany('Release','strReleaseBy','strEmpID');
	}

	public function logins() {
		return $this->hasMany('Login', 'strLoginEmpID', 'strEmpID');
	}

	public function branch() {
		return $this->belongsTo('Branch', 'strEmpBrchID');
	}
}
