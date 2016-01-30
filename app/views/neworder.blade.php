@extends('layouts.master')

@section('content')
     <div class="main-wrapper">
  <!-- ACTUAL PAGE CONTENT GOES HERE -->
  <div class="row">
    <div class="col s12 m12 l12">
      <span class="page-title">NEW ORDER</span>
    </div>

     

    <div class="row">
      <div class="col s12 m12 l12">
        <div class="card-panel">
          <span class="card-title">Product List</span>
          <div class="divider"></div>
          <div class="card-content">
            <!-- <div class="col s12 m12 l4">
              <div class="input-field">
                <i class="prefix mdi-action-search"></i>
                <input id="search" type="text" placeholder="Search by name"/>
              </div>
            </div> -->
     

            <div class="col s12 m12 l12 overflow-x">
              <table class="centered" id="table-prod-list"> 
                <thead>
                  <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <!-- <th>Retail Price</th>
                    <th>Wholesale Price</th> -->
                    <!-- <th>Quantity</th> -->
                    <th></td>
                  </tr>
                </thead>

                <tbody>
            
                </tbody>
              </table>
              <!-- <button type="button" id="add-prod-btn">Add</button> -->
              <!-- <div class="center-btn"><a class="waves-effect waves-light btn btn-small center-text" id="add-prod-btn">ADD TO PRODUCT LIST</a></div> -->
            </div>

            <!-- <p>
              You have no items.
            </p> -->

            <div class="clearfix">

            </div>
          </div>
        </div>
      </div>
    </div>

<div class="row">
      <div class="col s12 m12 l12">
        <div class="card-panel">
          <span class="card-title">Orders</span>
          <div class="divider"></div>
          <div class="card-content">

     

            <div class="col s12 m12 l12 overflow-x">
              <table class="centered" id="table-add-product">
                <thead>
                  <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th></th>
                    <!-- <th>Subtotal Price</th> -->
                    <!-- <th>Total Price</th> -->
                  </tr>
                </thead>
               <!--  @foreach( $ordProd as $tempOrders)
                @if($tempOrders->strOPOrdersID == Session::get('orderqueue'))
                <tbody>
                      <tr>
                        <td>{{$tempOrders->strOPProdID}}</td>
                        <td>{{$tempOrders->intOPQuantity}}</td>
                        <td>SAMP</td>
                        <td>SAMP</td>
                        <td>
                          <div class="center-btn">
                          <a class="waves-effect waves-light btn btn-small red center-text"><i class="mdi-navigation-close"></i></a>
                          </div>
                        </td>
                      </tr>
                </tbody>
                @endif
                @endforeach -->
                <tbody>
                  <!-- <tr>
                    <td>a</td>
                    <td>a</td>
                    <td>a</td>
                    <td>a</td>
                  </tr>
                  <tr>
                    <td>b</td>
                    <td>b</td>
                    <td>b</td>
                    <td>b</td>
                  </tr> -->
                </tbody>
              </table>
            </div>

            <!-- <p>
              You have no items.
            </p> -->

            <div class="clearfix">

            </div>
          </div>
        </div>
      </div>
    </div>


<div class="row">
      <div class="col s12 m12 l12">
        <div class="card-panel">
          <span class="card-title">Submit Orders</span>
          <div class="divider"></div>
          <div class="card-content">

     

            <div class="col s12 m12 l12 overflow-x">
              <table class="centered">
                <thead>
                  <tr>
                    <th>Order ID</th>
                    <th>Supplier Name</th>
                    <th>Placed by</th>
                  </tr>
                </thead>

                <tbody>
                      <tr>
                        <td> <input type="text" class="form-control" name="orderID" id="orderID" value="{{$newID}}"></td>
                        <td>
                          {{ Form::select('strSuppCompanyName', $data['suppliers'], null, array('class' => 'browser-default', 'id' => 'supplier-select')) }}
                          {{-- <input type="text" class="form-control" name="suppName" id="suppliersppName" placeholder="Supplier"> --}}
                        </td>
                        <td><input type="text" class="form-control" name="empPlacer" id="empPlacer" readonly value="{{Session::get('empName')}}"></td>
                        <td>
                          <div class="center-btn">
                          <a class="waves-effect waves-light btn btn-small center-text" id="submit-order">SUBMIT</a>
                          <a class="waves-effect waves-light btn btn-small center-text">CANCEL</a>
                          </div>
                        </td>
                      </tr>
                </tbody>
              </table>
            </div>
            <input id="empID" hidden value="{{Session::get('empID')}}">
            <!-- <p>
              You have no items.
            </p> -->

            <div class="clearfix">

            </div>
          </div>
        </div>
      </div>
    </div>



  </div>
</div>
@stop

@section('scripts')
{{ HTML::script('js/new-order.js') }}
@stop