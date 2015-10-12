@extends('layouts.master')

@section('content')
<div class="main-wrapper">
  <!-- ACTUAL PAGE CONTENT GOES HERE -->
  <?php $a; ?>
@if(!Session::has('username'))
@foreach($empId as $empId)
        <?php Session::put('username', $un); ?>
        @if ($empId -> strUsername == Session::get('username'))
             <?php $a=$empId->strEmpID; Session::put('empID', $a); ?>
             <?php $b=$empId->strEmpLName . ", " . $empId->strEmpFName; Session::put('empName', $b); ?>
             <?php $d=$empId->strEmpBrchID; Session::put('empBrchID', $d); ?>
             <?php $c=$empId->strBrchName; Session::put('empBrch', $c); ?>
             <?php $e=$empId->strEmpRoleID; Session::put('empRole', $e); ?>
             <?php $f=$empId->strRoleDescription; Session::put('empRoleDesc', $f); ?>              
        @endif
@endforeach
@endif

  
  <div class="row">
    <div class="col s12 m12 l12">
      <span class="page-title">Dashboard</span>
    </div>



    <div class="col s12 m12 l8">
      <div class="card-panel">
        <span class="card-title">Inventory status</span>
        <div class="divider"></div>
        <div class="card-content">
        @if (count($index) > 0)
          <p>
            These items are in <span class="red-text bold">danger</span> stocks.
          </p>

          <table class="centered">
            <thead>
              <tr>
                <th>Item</th>
                <th>Qty</th>
                <th>Actions</th>
              </tr>
            </thead>

            <tbody>
              @foreach($index as $status)
              
              <tr>
                <td>{{ $status -> strProdName }}</td>
                <td>{{ $status -> intAvailQty }}</td>
                <td>
                  <div class="center-btn">
                    <a class="waves-effect waves-light btn btn-small center-text" href="/neworder">Order</a>
                    <!-- <a class="waves-effect waves-light btn btn-small center-text">Request</a> -->
                    <a class="waves-effect waves-light btn btn-small center-text" href="/inventory">Adjust</a>
                  </div>
                </td>
              </tr>
              
              @endforeach
            </tbody>
          </table>
        @else
          <p> All of your items are in <span class="green-text bold">good</span> stocks.</p>
        @endif
        </div>
      </div>
 @if( !Session::get('empBrchID') == 'BRCH002')
      <div class="card-panel">
        <span class="card-title">Incoming requests</span>
        <div class="divider"></div>
        <div class="card-content">
          <p>
            You have 1 incoming request.
          </p>
          <table class="centered table-fixed">
            <thead>
              <tr>
                <th>Item</th>
                <th>Qty</th>
                <th>Branch</th>
                <th>Actions</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td>Samsung Galaxy Y S5360</td>
                <td>20</td>
                <td>gHub Cubao</td>
                <td>
                  <div class="center-btn">
                    <a class="waves-effect waves-light btn btn-small green center-text"><i class="mdi-navigation-check"></i></a>
                    <a class="waves-effect waves-light btn btn-small red center-text"><i class="mdi-navigation-close"></i></a>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>

          <!-- <p>
            You have no incoming requests.
          </p> -->
        </div>
      </div>
@endif

    </div>
    <div class="col s12 m12 l4">
      <div class="card-panel">
        <span class="card-title">Pending orders</span>
        <div class="divider"></div>
        <div class="card-content">
          <p>
            You have pending orders.
          </p>
          <table class="centered table-fixed">
            <thead>
              <tr>
                <th>Order ID</th>
                <th>Product Name</th>
                <th>Qty</th>
                <th>Supplier</th>
              </tr>
            </thead>

            <tbody>
             @foreach($orders as $order)
             @foreach($order->products as $product)
             @if($order ->notes[0] -> strOrdNotesStat == 'Pending')
              <tr>
              <td>{{$order->strOrdersID}}</td>
               <td>{{ $product->strProdName}}</td>
                <td>{{ $product->pivot->intOPQuantity}}</td>
                <td>{{$order -> supplier -> strSuppCompanyName }}</td>
              </tr>
              @endif
              @endforeach
              @endforeach
            </tbody>
          </table>

          <!-- <p>
            You have no pending orders.
          </p> -->
        </div>
      </div>


    </div>
  </div>
</div>
@stop