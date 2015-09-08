<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure 
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function employee()
	{
		$ids = DB::table('tblEmployees')
			->select('strEmpID')
			->orderBy('updated_at', 'desc')
			->orderBy('strEmpID', 'desc')
			->take(1)
			->get();

		$ID = $ids["0"]->strEmpID;
		$newID = $this->smart($ID);

		// Get all products from the database
		$employees = Employee::all();

		return View::make('employee')->with ('employees', $employees)->with('newID', $newID);
	}

	public function inventoree()
	{
		// Get all products from the database
		$ids = DB::table('tblInventory')
			->select('strBatchID')
			->orderBy('updated_at', 'desc')
			->orderBy('strBatchID', 'desc')
			->take(1)
			->get();

		$ID = $ids["0"]->strBatchID;
		$newID = $this->smart($ID);

		$ids2 = DB::table('tblProducts')
			->select('strProdID')
			->orderBy('updated_at', 'desc')
			->orderBy('strProdID', 'desc')
			->take(1)
			->get();

		$ID2 = $ids2["0"]->strProdID;
		$newID2 = $this->smart($ID2);

		$inventory = DB::table('tblInventory')
		->join('tblProducts', function($join)
		{
			$join->on('tblInventory.strProdID','=','tblProducts.strProdID');
		})->get();
		
		return View::make('inventory')->with('inventory', $inventory)->with('newID', $newID)->with('newID2', $newID2);
	}

	public function branches()
	{
		$ids = DB::table('tblBranches')
			->select('strBrchID')
			->orderBy('updated_at', 'desc')
			->orderBy('strBrchID', 'desc')
			->take(1)
			->get();

		$ID = $ids["0"]->strBrchID;
		$newID = $this->smart($ID);

		$branches = Branch::all();

		return View::make('branches')->with('branches', $branches)->with('newID', $newID);
	}

	public function suppliers()
	{
		$ids = DB::table('tblSuppliers')
			->select('strSuppID')
			->orderBy('updated_at', 'desc')
			->orderBy('strSuppID', 'desc')
			->take(1)
			->get();

		$ID = $ids["0"]->strSuppID;
		$newID = $this->smart($ID);


		// Get all products from the database
		$suppliers = Supplier::all();

		return View::make('suppliers')->with('suppliers', $suppliers)->with('newID', $newID);
	}

	public function delivery()
	{
		// Get all products from the database
		//$suppliers = Supplier::all();

		$djt = DB::table('tblDeliveries')
		->join('tblOrders', function($join)
		{
			$join->on('tblDeliveries.strOrdDlvry','=','tblOrders.strOrdersID');
		})
		->join('tblEmployees', function($join2)
		{
			$join2->on('tblDeliveries.strDlvryRecBy','=','tblEmployees.strEmpID');
		})
		->join('tblSuppliers',function($join3)
		{
			$join3->on('tblOrders.strSupplID','=','tblSuppliers.strSuppID');
		})
		->get();

		return View::make('delivery')->with('djt', $djt);


		// return View::make('delivery');
	}

	public function release()
	{
		
		$rjt = DB::table('tblReleases')
		->join('tblBranches', function($join)
		{
			$join->on('tblReleases.strReleaseBrchID','=','tblBranches.strBrchID');
		})
		->join('tblEmployees', function($join2)
		{
			$join2->on('tblReleases.strReleaseBy','=','tblEmployees.strEmpID');
		})	
		->get();


		return View::make('release')->with('rjt', $rjt);
	}


	public function createBranch()
	{
		$branch = Branch::create(array(
			'strBrchID' => Input::get('brnchID'),
			'strBrchName' => Input::get('brnchName'),
			'strBrchAddress' => Input::get('brnchAdd')
		));
		$branch->save();
		return Redirect::to('/branches');
	}

	public function createSupp()
	{
		$suppliers = Supplier::create(array(
			'strSuppID' => Input::get('suppID'),
			'strSuppCompanyName' => Input::get('compName'),
			'strSuppOwnerLName' => Input::get('suppLName'),
			'strSuppOwnerFName' => Input::get('suppFName'),
			'strSuppContactNo' => Input::get('contNumb'),
			'strSuppAddress' => Input::get('suppAdd')
		));
		$suppliers->save();
		return Redirect::to('/suppliers');
	}

	public function createEmp()
	{

		$employees = Employee::create(array(
			'strEmpID' => Input::get('empID'),
			'strEmpFName' => Input::get('empfName'),
			'strEmpLName' => Input::get('emplName'),
			'strEmpStatus' => Input::get('empStatus'),
			'strEmpAddress' => Input::get('empAdd'),
			'strEmpBrchID' => Input::get('empBrnch'),
			'strEmpRoleID' => Input::get('empRole')
		));
		$employees->save();
		return Redirect::to('/employees');
	}

 	public function createInv()
	{

		//$inventory = DB::table('tblInventory')
		//->join('tblProducts', function($join)
		//{
		//	$join->on('tblInventory.strProdID','=','tblProducts.strProdID');
		//})->get();
		$prod = Product::create(array(
			'strProdID' => Input::get('proID'),
			'strProdName' => Input::get('proName'),
			'strProdBrand' => Input::get('proBrand'),
			'strProdModel' => Input::get('proModel')
		));
		$prod->save();
		
		$inv = Inventory::create(array(
			'strBatchID' => Input::get('batchID'),
			'strProdID' => Input::get('proID'),
			'strDlvryID' => "DEL003",
			'strBrchID' => "BRCH002",
			'intAvailQty' => Input::get('avaQTY'),
			'dblCurRetPrice' => Input::get('retPrice'),
			'dblCurWPrice' => Input::get('whoPrice')
		));
		$inv->save();

		
		return Redirect::to('/inventory');
	}

	public function order()
	{
		// Get all products from the database
		$jt = DB::table('tblOrders')
		->join('tblSuppliers', function($join)
		{
			$join->on('tblOrders.strSupplID','=','tblSuppliers.strSuppID');
		})
		->join('tblEmployees', function($join2)
		{
			$join2->on('tblOrders.strPlacedBy','=','tblEmployees.strEmpID');
		})
		->join('tblOrdNotes',function($join3)
		{
			$join3->on('tblOrdNotes.strOrdersID','=','tblOrders.strOrdersID');
		})
		->get();

		return View::make('order')->with('jt', $jt);

	}

	public function neworder()
	{
		return View::make('neworder');
	}

	public function adjust()
	{
		return View::make('adjust');
	}

	public function details()
	{
		$details = DB::table('tblOrderedProducts')
        ->join('tblOrders', function($join)
        {
            $join->on('tblOrderedProducts.strOPOrdersID', '=', 'tblOrders.strOrdersID')
                 ->where('tblOrders.strOrdersID', '=','orderid');
        })
        ->join('tblProducts', function($join2)
        {
        	$join2->on('tblOrderedProducts.strOPProdID','=','tblProducts.strProdID');
        })
        ->get();

		return View::make('details')->with('details', $details);
	}


	private function smart($id)
	{
		//$ID ="emp0111";

		//Retriving lastest ID from the db
		// $ids = DB::table('tblBranches')
		// 	->select('strBrchID')
		// 	//->orderBy('updated_at', 'desc')
		// 	->orderBy('strBrchID', 'desc')
		// 	->take(1)
		// 	->get();

		// $ID = $ids["0"]->strBrchID;

		//print_r("Recent ID retrieved from database: " . $ID);
		
		$arrID = str_split($id);

		// echo "<br />";
		// 	echo "To Array: ";
		// echo "<pre>";
		// 	print_r($arrID);
		// echo "</pre>";

		$new = "";
		$somenew = "";
		$arrNew = [];
		$boolAdd = TRUE;

		for($ctr = count($arrID) - 1; $ctr >= 0; $ctr--)
		{
			$new = $arrID[$ctr];

			if($boolAdd)
			{

				if(is_numeric($new) || $new == '0')
				{
					if($new == '9')
					{
						$new = '0';
						$arrNew[$ctr] = $new;
					}
					else
					{
						$new = $new + 1;
						$arrNew[$ctr] = $new;
						$boolAdd = FALSE;
					}//else
				}//if(is_numeric($new))
				else
				{
					$arrNew[$ctr] = $new;
				}//else
			}//if ($boolAdd)
			
			$arrNew[$ctr] = $new;
		}//for

		for($ctr2 = 0; $ctr2 < count($arrID); $ctr2++)
		{
			$somenew = $somenew . $arrNew[$ctr2] ;
		}
		return $somenew;
		// echo "<br />";
		// 	print_r("Newly created ID : ");
		// echo "<pre>";
		// 	print_r($somenew);
		// echo "</pre>";
	}

}
