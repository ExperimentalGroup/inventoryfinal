@extends('layouts.master')

@section('content')
      <div class="main-wrapper">
        <!-- ACTUAL PAGE CONTENT GOES HERE -->
        <div class="row">
          <div class="col s12 m12 l12">
            <span class="page-title">Delivery</span>
          </div>

          <!-- <div class="row">
            <div class="col s12 m12 l12">
              <div class="card-panel">
                //<span class="card-title">Delivery from Suppliers</span>
                <div class="divider"></div>
                <div class="card-content">
                  <div class="col s12 m12 l4">
                    <div class="input-field">
                      <i class="prefix mdi-action-search"></i>
                      <input id="search" type="text" placeholder="Search by name"/>
                    </div>
                  </div> -->



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

                  <div class="row">
            <div class="col s12 m12 l12">
              <div class="card-panel">
                <span class="card-title">Delivery from Suppliers</span>
                <div class="divider"></div>
                <div class="card-content">
                  <div class="col s12 m12 l4">
                    <div class="input-field">
                      <i class="prefix mdi-action-search"></i>
                      <input id="search" type="text" placeholder="Search by name"/>
                    </div>
                  </div>

                  <div class="col s12 m12 l6 offset-l2">
                    <div class="col s12 m12 l4 input-field">
                      <select>
                        <option value="" disabled selected>Quantity (Any)</option>
                        <option value="1">Less than 50</option>
                        <option value="2">50 or more</option>
                      </select>
                    </div>
                    <div class="col s12 m12 l4 input-field">
                      <select>
                        <option value="" selected>Branch (Any)</option>
                        <option value="1">gHub West Avenue</option>
                        <option value="2">gHub Eastwood</option>
                      </select>
                    </div>
                    <div class="col s12 m12 l4 input-field">
                      <select>
                        <option value="" selected>Status (Any)</option>
                        <option value="1">Accepted</option>
                        <option value="2">Pending</option>
                        <option value="3">Declined</option>
                      </select>
                    </div>
                  </div>

                  <div class="col s12 m12 l12 overflow-x">
                    <table class="centered">
                      <thead>
                        <tr>
                          <th>Delivery ID</th>
                          <th>Supplier</th>
                          <!-- <th>Delivered Products</th>
                          <th>Quantity</th> -->
                          <!-- <th>Product Subtotals</th>
                          <th>Total Price</th> -->
                          <th>Date Delivered</th>
                          <th>Received By</th>
                          <!-- <th>Status</th> -->
                          <!-- <th>Actions</th> -->
                        </tr>
                      </thead>

                      <tbody>
                        <tr>
                          @foreach($djt as $joined)
                          <td>{{ $joined -> strDlvryID }}</td>
                          <td>{{ $joined -> strSuppCompanyName }}</td>
                          <!-- <td>LG Flat Screen Monitor</td>
                          <td>10</td> -->
                         <!--  <td>P1,500.00</td>
                          <td>P15,000.00</td> -->
                          <td>{{ $joined -> dtDlvryDate }}</td>
                          <td>{{ $joined -> strEmpLName.', '. $joined -> strEmpFName}}</td>
                          <!-- <td class="yellow-text bold">Pending</td> -->
                          <td>
                            <!-- <div class="center-btn">
                              <a class="waves-effect waves-light btn btn-small center-text">Resend</a>
                              <a class="waves-effect waves-light btn btn-small center-text">Received</a>
                              <a class="waves-effect waves-light btn btn-small center-text">Cancel</a>
                            </div> -->
                          </td>
                        </tr>
                        <tr>
                         <!--  <td>gHub Eastwood</td> -->
                          <!-- <td>Creative Dual Speakers with Bass</td>
                          <td>15</td>
                          <td>P500.00</td>
                          <td>P7,500.00</td>
                          <td>03/31/2015</td>
                          <td class="red-text bold">Declined</td> -->
                          <!-- <td>
                            <div class="center-btn">
                             <a class="waves-effect waves-light btn btn-small center-text">Resend</a>
                              <a class="waves-effect waves-light btn btn-small center-text">Received</a>
                              <a class="waves-effect waves-light btn btn-small center-text">Cancel</a>
                            </div>
                          </td>
 -->                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>

                   <div class="clearfix">

                  </div>

      </div> 
@stop