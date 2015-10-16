@extends('layouts.master')

@section('content')
     <div class="main-wrapper">
  <!-- ACTUAL PAGE CONTENT GOES HERE -->
  <div class="row">
    <div class="col s12 m12 l12">
      <span class="page-title">NEW RELEASE</span>
    </div>

     

    <div class="row">
      <div class="col s12 m12 l12">
        <div class="card-panel">
          <span class="card-title">Product List from Inventory</span>
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
                    <th>Available Quantity</th>
                    <th></th>
                  </tr>
                </thead>

                <tbody>
            
                </tbody>
              </table>
            </div>

            <div class="clearfix">

            </div>
          </div>
        </div>
      </div>
    </div>

<div class="row">
      <div class="col s12 m12 l12">
        <div class="card-panel">
          <span class="card-title">Release</span>
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
                  </tr>
                </thead>
                <tbody>
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
          <span class="card-title">Release Products</span>
          <div class="divider"></div>
          <div class="card-content">

     

            <div class="col s12 m12 l12 overflow-x">
              <table class="centered">
                <thead>
                  <tr>
                    <th>Order ID</th>
                    <th>Branch Name</th>
                    <th>Released by</th>
                  </tr>
                </thead>

                <tbody>
                      <tr>
                        <td> <input type="text" class="form-control" name="releaseID" id="releaseID" value="{{Session::get('newreleaseid')}}" readonly></td>
                        <td>
                          {{ Form::select('strBrchName', $branches, null, array('class' => 'browser-default', 'id' => 'branch-select')) }}
                          {{-- <input type="text" class="form-control" name="branchName" id="branchName" placeholder="Branch"> --}}
                        </td>
                        <td><input type="text" class="form-control" name="empPlacer" id="empPlacer" readonly value="{{Session::get('empName')}}"></td>
                        <td>
                          <div class="center-btn">
                          <a class="waves-effect waves-light btn btn-small center-text" id="submit-release">RELEASE</a>
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
{{ HTML::script('js/new-release.js') }}
@stop