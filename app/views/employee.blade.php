@extends('layouts.master')

@section('content')
<div class="main-wrapper">
  <!-- ACTUAL PAGE CONTENT GOES HERE -->
  <div class="row">
    <div class="col s12 m12 l12">
      <span class="page-title">Employees</span>
    </div>

    

    <div class="row">
      <div class="col s12 m12 l12">
        <div class="card-panel">
          <span class="card-title">gHuB Employees in current Branch</span>
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
                    <th>Employee ID</th>
                    <th>Employee Name</th>
                    <th>Status</th>
                    <th>Address</th>
                  </tr>
                </thead>
                <tbody>
                 @foreach($data['employees'] as $employee)
                  <tr>
                    <td>{{ $employee->strEmpID }}</td>  
                    <td>{{ $employee->strEmpLName . ", " . $employee->strEmpFName}}</td>
                    <td>{{ $employee->strEmpStatus }}</td>  
                    <td>{{ $employee->strEmpAddress }}</td>
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
          <span class="card-title">Add New Employees</span>
          <div class="divider"></div>
          <div class="card-content">
            <div class="col s12 m12 l10">
                <div class="form-group">
                <form action="/employees" method="POST">
                  <label for="price">Employee ID</label>
                  <input value="{{$newID}}" type="text" class="form-control" name="empID" id="empID" placeholder="Employee ID" readonly>
                  </div>
                  <label for="price">Employee Last Name</label>
                  <div class="form-group">
                  <input type="text" class="form-control" name="emplName" id="emplName" placeholder="Last Name">
                  </div>
                  <label for="price">Employee First Name</label>
                  <div class="form-group">
                  <input type="text" class="form-control" name="empfName" id="empfName" placeholder="First Name">
                  </div>
                  <div class="form-group">
                  <label for="price">Branch</label>
                  {{ Form::select('empBrnch', $data['branches'], null, array('class' => 'browser-default')) }}
                  {{-- <input type="text" class="form-control" name="empBrnch" id="empBrnch" placeholder="Branch"> --}}
                  </div>
                  <div class="form-group">
                  <label for="price">Role</label>
                  {{ Form::select('empRole', $data['roles'], null, array('class' => 'browser-default')) }}
                  {{-- <input type="text" class="form-control" name="empRole" id="empRole" placeholder="Role"> --}}
                  </div>
                  <div class="form-group">
                  <label for="price">Status</label>
                  <input type="text" class="form-control" name="empStatus" id="empStatus" placeholder="Status">
                  </div>
                  <div class="form-group">
                  <label for="price">Address</label>
                  <input type="text" class="form-control" name="empAdd" id="empAdd" placeholder="Address">
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