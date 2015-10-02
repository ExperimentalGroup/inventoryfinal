<?php

class Branch extends Eloquent
{
	protected $table = 'tblBranches';
	protected $primaryKey = 'strBrchID';
	protected $fillable = array('strBrchID', 'strBrchName', 'strBrchAddress');

	public function branches() {
		return $this->hasMany('Release','strReleaseBrchID','strBrchID');
	}

	public function employees() {
		return $this->hasMany('Employee', 'strEmpBrchID', 'strBrchID');
	}
}


	

