<?php

class loginController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function LogIn()
	{
		
		$un = Input::get('username');
		$pw = Input::get('password');
		$chk1 = Login::where('strUsername','=',Input::get('username'))->first();
		$chk2 = Login::where('strPassword','=',Input::get('password'))->first();	
		if($chk1 && $chk2)
		{
			//$id = Login::all();
			$empId = DB::table('tblLogin')
			->join('tblEmployees',function($join)
			{
				$join->on('tblLogin.strLoginEmpID','=','tblEmployees.strEmpID');
			})
			->join('tblBranches',function($join)
			{
				$join->on('tblEmployees.strEmpBrchID','=','tblBranches.strBrchID');
			})
			->join('tblRoles',function($join)
			{
				$join->on('tblEmployees.strEmpRoleID','=','tblRoles.strRoleID');
			})
			->get();

			$orders = Order::with('supplier', 'employee','products','notes')
			->get();

			//dashboard(danger stocks)
			$index = DB::table('tblInventory')
			->join('tblProducts',function($join)
			{
				$join->on('tblInventory.strProdID','=','tblProducts.strProdID')
					 ->where('tblInventory.intAvailQty','<=','10');
			})->get();

			
			return View::make('index')->with('index', $index)->with('empId',$empId)->with('un',$un)->with('orders',$orders);
		}
		else
			return Redirect::to('/')->with('message', 'Login Failed, USERNAME/PASSWORD Dont Exists');
		
	}

	public function remembLog()
	{
		if(!Session::has('username'))
		{
			return Redirect::to('/');
		}
		else
		{
			$empId = DB::table('tblLogin')
			->join('tblEmployees',function($join)
			{
				$join->on('tblLogin.strLoginEmpID','=','tblEmployees.strEmpID');
					// ->where('tblLogin.strUsername','=',Session::get('username'));
			})->get();
			$orders = Order::with('supplier', 'employee','products','notes')
			->get();
			
			$index = DB::table('tblInventory')
			->join('tblProducts',function($join)
			{
				$join->on('tblInventory.strProdID','=','tblProducts.strProdID')
					 ->where('tblInventory.intAvailQty','<=','10');
			})->get();

			return View::make('index')->with('index', $index)->with('empId',$empId)->with('orders',$orders);
		}
		
	}

	public function LogOut()
	{
		Session::flush();
		return Redirect::to('/');
	}

	public function showWelcome()
	{
		if(Session::has('username'))
		{
			return Redirect::to('/index');
		}
		else
			return View::make('login');
	}

	
}
