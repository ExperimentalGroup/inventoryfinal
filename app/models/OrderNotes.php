<?php

class OrderNotes extends Eloquent
{
	protected $table = 'tblOrdNotes';
	protected $primaryKey = 'strOrderID';
	protected $fillable = array('strOrdNotesID','strOrderID','strOrdNotesStat');

	public function order()
	{
		return $this->belongsTo('Order','strOrderID');
	}
}