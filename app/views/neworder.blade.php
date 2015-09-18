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
            <div class="col s12 m12 l4">
              <div class="input-field">
                <i class="prefix mdi-action-search"></i>
                <input id="search" type="text" placeholder="Search by name"/>
              </div>
            </div>
     

            <div class="col s12 m12 l12 overflow-x">
              <table class="centered" id="table-prod-list"> 
                <thead>
                  <tr>
                    <th>Product Name</th>
                    <th>Retail Price</th>
                    <th>Wholesale Price</th>
                    <th>Quantity</th>
                    <th>Price Type</td>
                  </tr>
                </thead>

                <tbody>
                 <!--  @foreach($products as $product)
                      <tr>
                        <td>{{ $product->strProdName }}</td>
                        <td>{{ $product->dblCurRetPrice }}</td>
                        <td>{{ $product->dblCurWPrice }}</td>
                        <td> <input id="ordQTY" type="text" min="1" value="1" required/> </td>
                        <td> 
                              <select>
                                <option value="1" selected>Retail</option>
                                <option value="2">Wholesale</option>
                              </select>
                        </td>
                        <td>
                          <div class="center-btn">
                          <a class="waves-effect waves-light btn btn-small center-text product-add">ADD TO PRODUCT LIST</a>
                          </div>
                        </td>
                      </tr>
                  @endforeach -->
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
          <span class="card-title">Orders</span>
          <div class="divider"></div>
          <div class="card-content">

     

            <div class="col s12 m12 l12 overflow-x">
              <table class="centered" id="table-add-product">
                <thead>
                  <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Subtotal Price</th>
                    <th>Total Price</th>
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
                  <tr>
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
                  </tr>
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
                    <th>Placed by (Employee ID)</th>
                  </tr>
                </thead>

                <tbody>
                      <tr>
                        <td> <input type="text" class="form-control" name="orderID" id="orderID" value="{{$newID}}" readonly></td>
                        <td>
                          {{ Form::select('strSuppCompanyName', $data['suppliers'], null, array('class' => 'browser-default')) }}
                          {{-- <input type="text" class="form-control" name="suppName" id="suppliersppName" placeholder="Supplier"> --}}
                        </td>
                        <td><input type="text" class="form-control" name="empPlacer" id="empPlacer" readonly value="{{Session::get('username')}}"></td>
                        <td>
                          <div class="center-btn">
                          <a class="waves-effect waves-light btn btn-small center-text">SUBMIT</a>
                          <a class="waves-effect waves-light btn btn-small center-text">CANCEL</a>
                          </div>
                        </td>
                      </tr>
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



  </div>
</div>
<script type="text/javascript" src="{{asset('js/new-order.js')}}"></script>
@stop