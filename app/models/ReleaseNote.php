<?php

class ReleaseNote extends Eloquent
{
	
	protected $table = 'tblReleaseNotes';
	protected $fillable = array('strReleaseNotesID','strReleaseID', 'strReleaseNotesStat');
}