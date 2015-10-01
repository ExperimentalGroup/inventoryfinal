<?php

class Adjust extends Eloquent
{
	protected $table = 'tblAdjustments';
	protected $primaryKey = 'strAdjBatchID';
	protected $fillable = array('strAdjID', 'strAdjProdID', 'intAdjQtyBef', 'intAdjQtyAft', 'strAdjReason', 'dtAdjDate', 'strAdjBatchID');
}
