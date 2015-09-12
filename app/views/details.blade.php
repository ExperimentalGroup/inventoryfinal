@extends('layouts.master')

@section('content')
<div class="main-wrapper">
  <!-- ACTUAL PAGE CONTENT GOES HERE -->
  <div class="row">
    <div class="col s12 m12 l12">
      <span class="page-title"> Order</span>
    </div>

     

    <div class="row">
      <div class="col s12 m12 l12">
        <div class="card-panel">
          <span class="card-title">Order Details</span>
          <div class="divider"></div>
          <div class="card-content">
            <div class="col s12 m12 l4">
              <div class="input-field">
                <i class="prefix mdi-action-search"></i>
                <input id="search" type="text" placeholder="Search by name"/>
              </div>
            </div>
     

            <div class="col s12 m12 l12 overflow-x">
              <table class="centered">
                <thead>
                  <tr>
                    <th>Ordered Items</th>
                    <th>Quantity</th>
                    <th>Price Subtotals</th>
                    <th>Total Price</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($details as $tempdetails)
                      <tr>
                        <td>{{ $tempdetails->strProdName}}</td>
                        <td>{{ $tempdetails->intOPQuantity}}</td>
                      </tr>
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
  </div>
</div>
@stop