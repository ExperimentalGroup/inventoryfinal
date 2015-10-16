@extends('layouts.master')

@section('content')
      <div class="main-wrapper">
        <!-- ACTUAL PAGE CONTENT GOES HERE -->
        <div class="row">
          <div class="col s12 m12 l12">
            <span class="page-title">Suppliers</span>
          </div>
 @if( Session::get('empBrchID') == 'BRCH002'  && Session::get('empRole') == 'ROLE0001' )
           <div class="row">
      <div class="col s12 m12 l6">
        <div class="col s12 m12 l10">
            <button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#newsupp">ADD NEW SUPPLIER</button>
          </form>
        </div>
      </div>
     </div>
 @endif

          
          <div class="row">
            <div class="col s12 m12 l12">
              <div class="card-panel">
                <span class="card-title">Technogalore Suppliers</span>
                <div class="divider"></div>
                <div class="card-content">
                  <!-- <div class="col s12 m12 l4">
                    <div class="input-field">
                      <i class="prefix mdi-action-search"></i>
                      <input id="search" type="text" placeholder="Search by name"/>
                    </div>
                  </div> -->


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
                          <td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#{{$suppliers->strSuppID}}">EDIT</button>
                             
                              <!-- Modal Structure -->
                              <div id="{{$suppliers->strSuppID}}" class="modal modal-fixed-footer">
                                <div class="modal-content">
                                  <h4>EDIT SUPPLIER DETAILS</h4>
                                  <p>
                                   <div class="form-group">
                                    <form action="/supplierupdate" method="POST">
                                      
                                      <div class="form-control">
                                        <label for="price">Supplier ID</label>
                                        <input type="text"name="EsuppID" id="EsuppID" value="{{$suppliers->strSuppID}}" readonly>
                                      </div>                                 
                                      <label for="price">Company Name</label>
                                      <input type="text" class="form-control" name="EcompName" id="EcompName" value="{{ $suppliers->strSuppCompanyName }}">
                                      </div>
                                      <label for="price">Owner Last Name</label>
                                      <div class="form-group">
                                      <input type="text" class="form-control" name="EsuppLName" id="EsuppLName" value="{{ $suppliers->strSuppOwnerLName}}">
                                      </div>
                                      <div class="form-group">
                                      <label for="price">Owner First Name</label>
                                      <input type="text" class="form-control" name="EsuppFName" id="EsuppFName" value="{{$suppliers->strSuppOwnerFName}}">
                                      </div>
                                      <div class="form-group">
                                      <label for="price">Contact Number</label>
                                      <input type="text" class="form-control" name="EcontNumb" id="EcontNumb" value="{{ $suppliers->strSuppContactNo }}">
                                      </div>
                                      <div class="form-group">
                                      <label for="price">Address</label>
                                      <input type="text" class="form-control" name="EsuppAdd" id="EsuppAdd" value="{{ $suppliers->strSuppAddress}}">
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

          <div id="newsupp" class="modal modal-fixed-footer">
          <div class="modal-content">
          <h4>Add New Supplier</h4>
          <p>
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
              </p>
                      </div>
                                <div class="modal-footer">
                                  <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Close</a>
                                  <button class="waves-effect waves-green btn-flat ">ADD</button>
                                </div>
                      </form>
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
