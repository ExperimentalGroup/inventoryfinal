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
			->orderBy('strEmpID', 'desc')
			->take(1)
			->get();

		$ID = $ids["0"]->strEmpID;
		$newID = $this->smart($ID);

		$ids2 = DB::table('tblLogin')
			->select('strUsername')
			->orderBy('strUsername', 'desc')
			->take(1)
			->get();

		$ID2 = $ids2["0"]->strUsername;
		$newID2 = $this->smart($ID2);

		// Get all products from the database
		$employees = Employee::all();
		$branches = Branch::lists('strBrchName', 'strBrchID');
		$roles = Role::lists('strRoleDescription', 'strRoleID');

		$data = array(
			'employees' => $employees,
			'branches' => $branches,
			'roles' => $roles
		);

		return View::make('employee')->with ('data', $data)->with('newID', $newID)->with('newID2', $newID2);
	}

	public function inventoree()
	{
		
		$ids2 = DB::table('tblProducts')
			->select('strProdID')
			->orderBy('strProdID', 'desc')
			->take(1)
			->get();

		$ID2 = $ids2["0"]->strProdID;
		$newID2 = $this->smart($ID2);

		// $inventory = DB::table('tblInventory')
		// ->join('tblProducts', function($join)
		// {
		// 	$join->on('tblInventory.strProdID','=','tblProducts.strProdID');
		// })->get();
		$inventory = Inventory::all();
		$products = Product::all();

		return View::make('inventory')->with('inventory', $inventory)->with('newID2', $newID2)->with('products',$products);
	}

	public function branches()
	{
		$ids = DB::table('tblBranches')
			->select('strBrchID')
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
		$djt = Delivery::with('employee')
		->join('tblOrders',function($join)
		{
			$join->on('tblDeliveries.strOrdDlvry','=', 'tblOrders.strOrdersID');
		})
		->join('tblSuppliers',function($join3)
		{
			$join3->on('tblOrders.strSupplID','=','tblSuppliers.strSuppID');
		})
		->get();

		$ids = DB::table('tblDeliveries')
			->select('strDlvryID')
			->orderBy('strDlvryID', 'desc')
			->take(1)
			->get();

		$ID = $ids["0"]->strDlvryID;
		$newID = $this->smart($ID);


		$orders = Order::all();
		$op = OrderProduct::all();

		$ord = Order::lists('strOrdersID', 'strOrdersID');
		$products = Product::lists('strProdName', 'strProdID');

		$data = array(
			'orders' => $ord,
			'products' => $products
		);

		return View::make('delivery')->with('djt', $djt)->with('newID',$newID)->with('orders',$orders)->with('op',$op)->with('data',$data);

	}

	public function add_delivery()
	{
		$id1 = Input::get('ordID');
		$id2 = Input::get('dlvID');
		$orderproducts = OrderProduct::where('strOPOrdersID', '=', $id1)->get();

		$delivery = Delivery::create(array(
			'strDlvryID' => Input::get('dlvID'),
			'dtDlvryDate'=> Input::get('dtDelv'),
			'strOrdDlvry' => Input::get('ordID'),
			'strDlvryRecBy' => Session::get('empID')
		));
		$delivery->save();

		return View::make('deliveryDetails')->with('orderproducts',$orderproducts)->with('id1',$id1)->with('id2',$id2);

	}

	public function finalize_delivery()
	{
		$id1 = Input::get('orderID');
		$id2 = Input::get('deliverID');
		$orderproducts = OrderProduct::where('strOPOrdersID', '=', $id1)->get();
		$a = 0;
		$b = 0;	
		foreach ($orderproducts as $orderproduct) {	
			
			$details = DeliveryDetail::create(array(
				'strDetID' => $id2,
				'strDetProdID' => $orderproduct->strOPProdID,
				'intDetQty' => $orderproduct->intOPQuantity
			));
			$details->save();


			$ids = DB::table('tblInventory')
				->select('strBatchID')
				->orderBy('strBatchID', 'desc')
				->take(1)
				->get();

			$ID = $ids["0"]->strBatchID;
			$newID = $this->smart($ID);
					
			$inv = Inventory::create(array(
				'strBatchID' => $newID,
				'strProdID' => $orderproduct->strOPProdID,
				'strDlvryID' => $id2,
				'intAvailQty' => $orderproduct->intOPQuantity,
				'dblCurRetPrice' => Input::get($b + 'Rprice'),
				'dblCurWPrice' => Input::get($a + 'Wprice')
			));
			$inv->save();

			$a++;
			$b++;
		}

		$notesID = $id1;

		$notes = OrderNotes::find($notesID);

		$notes->strOrdNotesStat = "Accepted";

		$notes->save();

		return Redirect::to('/delivery');
	}

	public function release()
	{
		
		$ids = DB::table('tblReleases')
			->select('strReleasesID')
			->orderBy('strReleasesID', 'desc')
			->take(1)
			->get();

		$ID = $ids["0"]->strReleasesID;
		$newID = $this->smart($ID);


		$release = Release::with('branch','employee','products')
		->join('tblReleaseNotes',function($join)
		{
			$join->on('tblReleaseNotes.strReleaseID','=','tblReleases.strReleasesID');
		})
		->get();

		$branches = Branch::lists('strBrchName', 'strBrchID');
		$products = Product::lists('strProdName', 'strProdID');

		$data = array(
			'branches' => $branches,
			'products' => $products
		);


		return View::make('release')->with('release', $release)->with('data',$data)->with('newID', $newID);
	}

	public function minus_release()
	{
		$release = Release::create(array(
			'strReleasesID' => Input::get('relID'),
			'strReleaseBrchID'=> Input::get('relBranch'),
			'strReleaseBy' => Session::get('empID'),
			'dtDateReleased' => Input::get('dtRel')
		));
		$release->save();

		$details = ReleaseDetail::create(array(
			'strReleaseHeaderID'=> Input::get('relID'),
			'strReleaseProducts' => Input::get('relProd'),
			'intReleaseQty' => Input::get('quantityRel')
		));
		$details->save();


		$ids = DB::table('tblReleaseNotes')
			->select('strReleaseNotesID')
			->orderBy('strReleaseNotesID', 'desc')
			->take(1)
			->get();

		$ID = $ids["0"]->strReleaseNotesID;
		$newID = $this->smart($ID);

		$notes = ReleaseNote::create(array(
			'strReleaseNotesID'=> $newID,
			'strReleaseID' => Input::get('relID'),
			'strReleaseNotesStat' => 'Pending'
		));
		$notes->save();

		$id1 = Input::get('relProd');

		$tryids = DB::table('tblInventory')
			->select('strBatchID')
			->where('strProdID','=',$id1)
			->orderBy('strBatchID', 'asc')
			->take(1)
			->get();

		$tryID = $tryids["0"]->strBatchID;

		
		$addQ = Input::get('quantityRel');
		$inventory = Inventory::find($tryID);

		$inventory->intAvailQty -= $addQ;


		$inventory->save();

		return Redirect::to('/release');
	}

	public function adjustInv()
	{

		$ids = DB::table('tblAdjustments')
			->select('strAdjID')
			->orderBy('strAdjID', 'desc')
			->take(1)
			->get();

		$ID = $ids["0"]->strAdjID;
		$newID = $this->smart($ID);

		$id = Input::get('batchID');
		$invadj = Inventory::find($id);

		$qty = $invadj->intAvailQty;
		$prodID = $invadj->strProdID;
		$counter = Input::get('adjQTY');
		$invadj->intAvailQty += $counter;

		$invadj->save();

		$adjust = Adjust::create(array(
			'strAdjID' => $newID,
			'strAdjProdID' => $prodID,
			'intAdjQtyBef' => $qty,
			'intAdjQtyAft' => $qty + $counter,
			'strAdjReason' => Input::get('adjRes'),
			 'dtAdjDate' => Input::get('dtAdj'),
			 'strAdjBatchID' => Input::get('batchID')
		)); 
		$adjust->save();


		return Redirect::to('/inventory');
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

		/*$account = Login::create(array(
			'strUsername' => Input::get('newEmpUName'),
			'strPassword' => Input::get('newEmpPass'),
			'strLoginEmpID' => Input::get('empID')
		));
		$account->save();*/
		
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
		
		/*$inv = Inventory::create(array(
			'strBatchID' => Input::get('batchID'),
			'strProdID' => Input::get('proID'),
			'strDlvryID' => "DEL003",
			'strBrchID' => "BRCH002",
			'intAvailQty' => Input::get('avaQTY'),
			'dblCurRetPrice' => Input::get('retPrice'),
			'dblCurWPrice' => Input::get('whoPrice')
		));
		$inv->save();*/

		
		return Redirect::to('/inventory');
	}

	public function update_supplier()
	{
		$id = Input::get('EsuppID');
		$supplier = Supplier::find($id);

		$supplier->strSuppCompanyName=Input::get('EcompName');
		$supplier->strSuppOwnerLName=Input::get('EsuppLName');
		$supplier->strSuppOwnerFName=Input::get('EsuppFName');
		$supplier->strSuppContactNo=Input::get('EcontNumb');
		$supplier->strSuppAddress=Input::get('EsuppAdd');

		$supplier->save();

		return Redirect::to('/suppliers');
	}

	public function update_branch()
	{
		$id = Input::get('EbrnchID');
		$branch = Branch::find($id);

		$branch->strBrchName=Input::get('EbrnchName');
		$branch->strBrchAddress=Input::get('EbrnchAdd');

		$branch->save();

		return Redirect::to('/branches');

	}

	public function update_employee()
	{
		$id = Input::get('EempID');
		$employee = Employee::find($id);

		$employee->strEmpLName = Input::get('EemplName');
		$employee->strEmpFName = Input::get('EempfName');
		$employee->strEmpBrchID = Input::get('EempBrnch');
		$employee->strEmpRoleID = Input::get('EempRole');
		$employee->strEmpStatus = Input::get('EempStatus');
		$employee->strEmpAddress =  Input::get('EempAdd');

		$employee->save();

		return Redirect::to('/employees');
	} 

	public function order()
	{
		$orders = Order::with('supplier', 'employee','products','notes')
		->get();

		return View::make('order.order')->with('orders', $orders);

	}

	public function productTable()
	{
		$products = DB::table('tblProducts')
		->get();

		return Response::json($products);
	}


	public function newOrder()
	{
		$products = DB::table('tblInventory')
		->join('tblProducts', function($join)
		{
			$join->on('tblInventory.strProdID','=','tblProducts.strProdID');
		})->get();

		$suppliers = Supplier::lists('strSuppCompanyName','strSuppID');

		$data = array(
			'suppliers' => $suppliers
		);

		$ids = DB::table('tblOrders')
			->select('strOrdersID')
			->orderBy('strOrdersID', 'desc')
			->take(1)
			->get();

		$ID = $ids["0"]->strOrdersID;
		$newID = $this->smart($ID);

		Session::put('orderqueue',$newID);

		$ordProd = OrderProduct::all();

		return View::make('neworder')->with('products', $products)->with('data',$data)->with('newID',$newID)->with('ordProd',$ordProd);
	}

	function newOrderAdd()
	{

		$order = Order::create(array(
			'strOrdersID'=>Input::get('orderID'),
			'strSupplID'=>Input::get('supplierID'),
			'dtOrdDate'=>date('Y-m-d'),
			'strPlacedBy'=>Input::get('empID')
		));
		$order->save();

		$ids = DB::table('tblOrdNotes')
			->select('strOrdNotesID')
			->orderBy('updated_at', 'desc')
			->take(1)
			->get();

		$ID = $ids["0"]->strOrdNotesID;
		$newID = $this->smart($ID);

		$notes = OrderNotes::create(array(
			'strOrdNotesID'=>$newID,
			'strOrderID'=>Input::get('orderID'),
			'strOrdNotesStat'=>'Pending'
		));
		$notes->save();

		$item = Input::get('itemsOrd');
		// 'strOPOrdersID', 'strOPProdID', 'intOPQuantity'
		for ($i = 0; $i < count($item); $i++)  
		{
			$ordItem = OrderProduct::create(
				array(
					'strOPOrdersID'=>Input::get('orderID'),
					'strOPProdID'=>$item[$i][0],
					'intOPQuantity'=>$item[$i][2]
				)
			);

			$ordItem->save();
		}
	}

	public function adjust()
	{
		return View::make('adjust');
	}

	private function smart($id)
	{
		$arrID = str_split($id);

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
	}

	public function generateReport()
	{
		$queryResult = 
			DB::table('tblInventory as a')
			->join('tblProducts as b', 'b.strProdID', '=', 'a.strProdID')
			->join('tblDeliveries as c', 'c.strDlvryID', '=', 'a.strDlvryID')
			->select('a.strBatchID', 'b.strProdName', 'b.strProdBrand', 'b.strProdModel', 'a.dblCurRetPrice', 'a.dblCurWPrice', 'a.intAvailQty', 'c.dtDlvryDate')
			->get();
		$pdf = PDF::loadView('reports-test', array('result'=>$queryResult));
		return $pdf->stream();
		return View::make('reports');
	}

}
