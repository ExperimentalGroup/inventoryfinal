<?php

class OrderNotes extends Eloquent
{
	protected $table = 'tblOrdNotes';
	protected $primaryKey = 'strOrdNotesID';
	protected $fillable = array('strOrdNotesID','strOrdersID','strOrdNotesStat');

	public function order()
	{
		return $this->belongsTo('Order','strOrdersID', 'strOrdersID');
	}
}