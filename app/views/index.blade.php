@extends('layouts.master')

@section('content')
<div class="main-wrapper">
  <!-- ACTUAL PAGE CONTENT GOES HERE -->
  
  
  <div class="row">
    <div class="col s12 m12 l12">
      <span class="page-title">Dashboard</span>
    </div>



    <div class="col s12 m12 l8">
      <div class="card-panel">
        <span class="card-title">Inventory status</span>
        <div class="divider"></div>
        <div class="card-content">
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
                    <a class="waves-effect waves-light btn btn-small center-text" href="/adjust">Adjust</a>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>

          <!-- <p>
            All of your items are in <span class="green-text bold">good</span> stocks.
          </p> -->
        </div>
      </div>

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
    </div>
    <div class="col s12 m12 l4">
      <div class="card-panel">
        <span class="card-title">Pending orders</span>
        <div class="divider"></div>
        <div class="card-content">
          <p>
            You have 3 pending orders.
          </p>
          <table class="centered table-fixed">
            <thead>
              <tr>
                <th >Item</th>
                <th>Qty</th>
                <th>Supplier</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td>iPhone 6</td>
                <td>20</td>
                <td>Apple PH</td>
              </tr>
              <tr>
                <td>Razer Deathadder 2013</td>
                <td>15</td>
                <td>Razer</td>
              </tr>
              <tr>
                <td>League of Legends Mouse Pads</td>
                <td>50</td>
                <td>Garena Phillipines</td>
              </tr>
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