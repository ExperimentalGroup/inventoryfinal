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
          <span class="card-title">Delivery Details</span>
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
                    <th>Delivered Product</th>
                    <th>Quantity</th>
                    <th>Subtotal Price</th>
                  </tr>
                </thead>

                <tbody>
                      <tr>
                        <td>SAMP</td>
                        <td>SAMP</td>
                        <td>SAMP</td>
                        <td>
                          <div class="center-btn">
                          <a class="waves-effect waves-light btn btn-small center-text">Accept</a>
                          <!-- <a class="waves-effect waves-light btn btn-small center-text">Request</a> -->
                          <a class="waves-effect waves-light btn btn-small center-text">Decline</a>
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
@stop