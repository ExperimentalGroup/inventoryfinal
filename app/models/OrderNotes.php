<?php

class OrderNotes extends Eloquent
{
	protected $table = 'tblOrdNotes';
	protected $primaryKey = 'strOrdNotesID';
	protected $fillable = array('strOrdNotesID','strOrderID','strOrdNotesStat');

	public function order()
	{
		return $this->belongsTo('Order','strOrderID');
	}
}