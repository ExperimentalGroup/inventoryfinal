<?php

class Release extends Eloquent
{
	protected $table = 'tblReleases';
	protected $primaryKey = 'strReleasesID';
	protected $fillable = array('strReleasesID', 'strReleaseBrchID', 'strReleaseBy','dtDateReleased');

	public function branch() {
		return $this->belongsTo('Branch','strReleaseBrchID');
	}

	public function employee() {
		return $this->belongsTo('Employee','strReleaseBy');
	}

	public function products() {
		return $this->belongsToMany('Product', 'tblReleaseDetails', 'strReleaseHeaderID', 'strReleaseProducts')->withPivot('intReleaseQty');
	}
}

