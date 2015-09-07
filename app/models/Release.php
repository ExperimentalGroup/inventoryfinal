<?php

class Release extends Eloquent
{
	protected $table = 'tblReleases';
	protected $fillable = array('strReleasesID', 'strReleaseBrchID', 'strReleaseBy','dtDateReleased');
}

