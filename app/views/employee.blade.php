@extends('layouts.master')

@section('content')
<div class="main-wrapper">
      <!-- ACTUAL PAGE CONTENT GOES HERE -->
      <div class="row">
        <div class="col s12 m12 l12">
             <span class="page-title">Employees</span>
        </div>

 @if( Session::get('empRole') == 'ROLE0001' )
    <div class="row">
      <div class="col s12 m12 l6">
        <div class="col s12 m12 l10">
            <button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#newemp">ADD NEW EMPLOYEE</button>
             <button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#viewemp">VIEW ALL EMPLOYEES</button>
        </div>
      </div>
     </div>
 @endif
    

    <div class="row">
      <div class="col s12 m12 l12">
        <div class="card-panel">
          <span class="card-title">Employees in {{Session::get('empBrch')}} Branch</span>
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
                 @if( Session::get('empBrchID') == $employee -> strEmpBrchID)
                  <tr>
                    <td>{{ $employee->strEmpID }}</td>  
                    <td>{{ $employee->strEmpLName . ", " . $employee->strEmpFName}}</td>
                    <td>{{ $employee->strEmpStatus }}</td>  
                    <td>{{ $employee->strEmpAddress }}</td>
                    <td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#{{$employee->strEmpID}}">EDIT</button>
                             
                              <!-- Modal Structure -->
                              <div id="{{$employee->strEmpID}}" class="modal modal-fixed-footer">
                                <div class="modal-content">
                                  <h4>EDIT EMPLOYEE DETAILS</h4>
                                  <p>
                                  <form action="/employeeupdate" method="POST">
                                      <div class="form-group">
                                      <!-- <label for="price">Branch ID</label>
                                      <input type="text" class="form-control" name="brnchID" id="brnchID" placeholder="BranchID"> -->
                                        <label for="disabled">Employee ID</label>
                                        <input value="{{$employee->strEmpID}}" name="EempID" id="EempID" placeholder="EmpID" type="text" class="form-control" readonly>
                                      </div>
                                      <div class="form-group">
                                      <label for="price">Employee Last Name</label>
                                      <input type="text" class="form-control" name="EemplName" id="EemplName" value="{{ $employee->strEmpLName }}">
                                      </div>
                                      <div class="form-group">
                                      <label for="price">Employee First Name</label>
                                      <input type="text" class="form-control" name="EempfName" id="EempfName" value="{{ $employee->strEmpFName }}">
                                      </div>
                                      <div class="form-group">
                                      <label for="price">Branch</label>
                                      {{ Form::select('EempBrnch', $data['branches'], null, array('class' => 'browser-default')) }}
                                      {{-- <input type="text" class="form-control" name="EempBrnch" id="EempBrnch" placeholder="Branch"> --}}
                                      </div>
                                      <div class="form-group">
                                      <label for="price">Role</label>
                                      {{ Form::select('EempRole', $data['roles'], null, array('class' => 'browser-default')) }}
                                      {{-- <input type="text" class="form-control" name="EempRole" id="EempRole" placeholder="Role"> --}}
                                      </div>
                                      <div class="form-group">
                                      <label for="price">Employee Status</label>
                                      <input type="text" class="form-control" name="EempStatus" id="EempStatus" value="{{ $employee->strEmpStatus }}">
                                      </div>
                                      <div class="form-group">
                                      <label for="price">Employee Adress</label>
                                      <input type="text" class="form-control" name="EempAdd" id="EempAdd" value="{{ $employee->strEmpAddress }}">
                                      </div>
                                  </p>
                                </div>
                                <div class="modal-footer">
                                  <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Close</a>
                                  <button type="submit" class="waves-effect waves-green btn-flat ">DONE EDITING</button>
                                </div>
                                </form>
                              </div>
                            

                          </td>
                  </tr>
                  @endif
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


<div id="newemp" class="modal modal-fixed-footer">
          <div class="modal-content">
          <h4>Add New Employee</h4>
          <p>
           <div class="form-group">
                <form action="/employees" method="POST">
                  <!--EMPLOYEE ACCOUNT DETAILS<br>
                  <label for="price">Employee Username</label>
                  <div class="form-group">
                  <input type="text" class="form-control" name="newEmpUName" id="newEmpUName" value="{{$newID2}}" readonly>
                  </div>
                  <label for="price">Employee Password</label>
                  <div class="form-group">
                  <input type="password" class="form-control" name="newEmpPass" id="newEmpPass">
                  </div> -->
                  EMPLOYEE PERSONAL DETAILS<br>
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
                 
              </p>
                      </div>
                                <div class="modal-footer">
                                  <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Close</a>
                                   <button class="waves-effect waves-green btn-flat ">ADD</button>
                                </div>
                      </form>
  </div>
  <div id="viewemp" class="modal modal-fixed-footer">
          <div class="modal-content">
          <h4>ALL EMPLOYEES AND THEIR BRANCHES</h4>
          <p>
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
                    <th>Branch</th>
                    <th>Status</th>
                    <th>Address</th>
                  </tr>
                </thead>
                <tbody>
                 @foreach($data['employees'] as $employee)
                  <tr>
                    <td>{{ $employee->strEmpID }}</td>  
                    <td>{{ $employee->strEmpLName . ", " . $employee->strEmpFName}}</td>
                    <td>{{ $employee->strEmpBrchID}}</td>
                    <td>{{ $employee->strEmpStatus }}</td>  
                    <td>{{ $employee->strEmpAddress }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </p>
                      </div>
                                <div class="modal-footer">
                                  <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Close</a>
                                </div>
    </div>
@stop

@section('scripts')
<!--{{ HTML::script('js/new-order.js') }}-->
<script type="text/javascript" src="js/jquery.js"></script>
<script src="js/materialize.js"></script>
<script>   
    $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
  }); 
</script>
@stop
