<?php

class Login extends Eloquent
{
	protected $table = 'tblLogin';
	protected $fillable = array('strUsername', 'strPassword', 'strLoginEmpID');
}