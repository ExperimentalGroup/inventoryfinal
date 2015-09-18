@extends('layouts.master')

@section('content')
      <div class="main-wrapper">
        <!-- ACTUAL PAGE CONTENT GOES HERE -->
        <div class="row">
          <div class="col s12 m12 l12">
            <span class="page-title">Suppliers</span>
          </div>

          
          <div class="row">
            <div class="col s12 m12 l12">
              <div class="card-panel">
                <span class="card-title">gHuB Suppliers Available</span>
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
                          <th>Supplier ID</th>
                          <th>Company Name</th>
                          <th>Owner Name</th>
                          <th>Contact Number</th>
                          <th>Address</th>
                        </tr>
                      </thead>

                      <tbody>
                        @foreach($suppliers as $suppliers)
                        <tr>
                          <td>{{ $suppliers->strSuppID }}</td>  
                          <td>{{ $suppliers->strSuppCompanyName }}</td>
                          <td>{{ $suppliers->strSuppOwnerLName . ", " . $suppliers->strSuppOwnerFName}}</td>
                          <td>{{ $suppliers->strSuppContactNo }}</td>  
                          <td>{{ $suppliers->strSuppAddress}}</td>
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

          <div class="row">
            <div class="col s12 m12 l6">
              <div class="card-panel">
                <span class="card-title">Add New Suppliers</span>
                <div class="divider"></div>
                <div class="card-content">
                  <div class="col s12 m12 l10">
                      <div class="form-group">
                      <form action="/suppliers" method="POST">
                        
                        <div class="form-control">
                          <label for="price">Supplier ID</label>
                          <input type="text" value="{{$newID}}" name="suppID" id="suppID" readonly>
                        </div>                                 
                        <label for="price">Company Name</label>
                        <input type="text" class="form-control" name="compName" id="compName" placeholder="Company">
                        </div>
                        <label for="price">Owner Last Name</label>
                        <div class="form-group">
                        <input type="text" class="form-control" name="suppLName" id="suppLName" placeholder="Surname">
                        </div>
                        <div class="form-group">
                        <label for="price">Owner First Name</label>
                        <input type="text" class="form-control" name="suppFName" id="suppFName" placeholder="Given Name">
                        </div>
                        <div class="form-group">
                        <label for="price">Contact Number</label>
                        <input type="text" class="form-control" name="contNumb" id="contNumb" placeholder="ContNumb">
                        </div>
                        <div class="form-group">
                        <label for="price">Address</label>
                        <input type="text" class="form-control" name="suppAdd" id="suppAdd" placeholder="SuppAdd">
                        </div>
                        <button class="waves-effect waves-light btn btn-small center-text">ADD</button>
                    </form>
                    </div>
                  </div>
           

                  <div class="clearfix">

                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
@stop