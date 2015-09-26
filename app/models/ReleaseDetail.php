<?php

class ReleaseDetail extends Eloquent
{
	
	protected $table = 'tblReleaseDetails';
	protected $fillable = array('strReleaseProducts','strReleaseHeaderID', 'intReleaseQty');
}