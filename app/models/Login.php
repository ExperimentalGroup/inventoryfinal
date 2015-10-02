<?php

class Login extends Eloquent
{
	protected $table = 'tblLogin';
	protected $primaryKey = 'strUserName';
	protected $fillable = array('strUsername', 'strPassword', 'strLoginEmpID');

	public function employee() {
		return $this->belongsTo('Employee','strEmpID');
	}
}