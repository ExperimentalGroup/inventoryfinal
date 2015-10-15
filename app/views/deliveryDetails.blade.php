@extends('layouts.master')

@section('content')
<div class="main-wrapper">
  <!-- ACTUAL PAGE CONTENT GOES HERE -->
  <div class="row">
    <div class="col s12 m12 l12">
      <span class="page-title">Delivery</span>
    </div>

    

    <div class="row">
      <div class="col s12 m12 l12">
        <div class="card-panel">
          <span class="card-title">Delivery Product Details</span>
          <div class="divider"></div>
          <div class="card-content">

     

            <div class="col s12 m12 l12 overflow-x">
              <table class="centered">
                <thead>
                  <tr>
                    <th>Delivered Product</th>
                    <th>Quantity</th>
                  </tr>
                </thead>
                <tbody>
                <?php $a=1; $b=1; ?>
                 @foreach($orderproducts as $orderproducts)
                      <tr>
                        <td>{{$orderproducts->strOPProdID}}</td>
                        <td>{{$orderproducts->intOPQuantity}}</td>
                        <td>
                        <form action="/deliveryprice" method="POST">
                                        <label for="price">Wholesale Price</label>
                                        <div class="form-group">
                                        <input type="number" class="form-control" name="{{$a}}" id="{{$a}}Wprice">
                                        </div>
                        </td>
                        <td>
                                        <label for="price">Retail Price</label>
                                        <div class="form-group">
                                        <input type="number" class="form-control" name="{{$b}}" id="{{$b}}Rprice">
                                        </div>
                        </td>
                      </tr>
                      <?php $a++; $b++; ?>
                      @endforeach
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
      <div class="col s12 m12 l6">
        <div class="col s12 m12 l10">
         <label for="price">Delivery ID</label>
         <div class="form-group">
         <input type="text" class="form-control" name="deliverID" id="deliverID" value="{{$id2}}" readonly>
         </div>
        <label for="price">Order ID</label>
          <div class="form-group">
          <input type="text" class="form-control" name="orderID" id="orderID" value="{{$id1}}" readonly>
           </div>
            <button class="waves-effect waves-light btn btn-small center-text" type="submit" >FINALIZE DELIVERY</button>
          </form>
        </div>
      </div>
     </div>

  </div>
</div>
@stop