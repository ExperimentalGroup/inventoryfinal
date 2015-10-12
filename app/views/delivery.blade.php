@extends('layouts.master')

@section('content')
      <div class="main-wrapper">
        <!-- ACTUAL PAGE CONTENT GOES HERE -->
        <div class="row">
          <div class="col s12 m12 l12">
            <span class="page-title">Delivery</span>
          </div>

      <div class="row">
      <div class="col s12 m12 l6">
        <div class="col s12 m12 l10">
            <button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#newdlv" >ADD NEW DELIVERY</button>
          </form>
        </div>
      </div>
     </div>
                  <div class="row">
            <div class="col s12 m12 l12">
              <div class="card-panel">
                <span class="card-title">Delivery from Suppliers</span>
                <div class="divider"></div>
                <div class="card-content">
                  <!-- <div class="col s12 m12 l4">
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
                    </div> -->
                  </div>

                <div class="col s12 m12 l12 overflow-x">
                    <table class="centered">
                      <thead>
                        <tr>
                          <th>Delivery ID</th>
                          <th>Supplier</th>
                          <th>Date Delivered</th>
                          <th>Received By</th>
                        </tr>
                      </thead>

                      <tbody>
                        <tr>
                          @foreach($djt as $joined)
                          <td>{{ $joined -> strDlvryID }}</td>
                          <td>{{$joined->strSuppCompanyName}}</td>
                          <td>{{ $joined -> dtDlvryDate }}</td>
                          <td>{{ $joined ->employee-> strEmpLName.', '. $joined->employee-> strEmpFName}}</td>
                          <td>
                             <div class="container">
                           <!-- Modal Trigger -->
                              <a class="modal-trigger waves-effect waves-light btn" href="#{{$joined->strDlvryID}}">View Details</a>
                              @foreach($djt as $joined)
                              <!-- Modal Structure -->
                              <div id="{{$joined->strDlvryID}}" class="modal modal-fixed-footer">
                                <div class="modal-content">
                                  <h4>Delivery Details</h4>
                                  <p>Delivery ID: {{$joined-> strDlvryID}}<br>
                                     Supplier: {{$joined->strSuppCompanyName}}<br>
                                     Received By: {{$joined->employee->strEmpLName.', '.$joined->employee->strEmpFName}}<br>
                                     Delivery Date: {{$joined-> dtDlvryDate}}<br>
                                     
                                     <table class="centered">
                                      <thead>
                                        <tr>
                                          <th>Delivered Items</th>
                                          <th>Quantity</th>
                                          <th>Retail Price</th>
                                          <th>Price Subtotals</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                          @foreach($joined->products as $product)
                                            <tr>
                                              <td>{{ $product->strProdName}}</td>
                                              <td>{{ $product->pivot->intDetQty}}</td>
                                              <td>{{ $product->price[0]->dblCurRetPrice }}</td>
                                              <td>{{ $product->price[0]->dblCurRetPrice *  $product->pivot->intDetQty}}</td>
                                            </tr>
                                          @endforeach
                                      </tbody>
                                    </table>
                                     
                                  </p>
                                </div>
                                <div class="modal-footer">
                                  <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Close</a>
                                </div>
                              </div>
                              @endforeach
                            </div>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>

                   <div class="clearfix">

                  </div>

      </div> 


                              <!-- Modal Structure -->
                              <div id="newdlv" class="modal modal-fixed-footer">
                                <div class="modal-content">
                                  <h4>ADD NEW DELIVERY</h4>
                                  <p>
                                  <div class="form-group">
                                      <form action="/delivery" method="POST">
                                        <label for="price">Delivery ID</label>
                                        <input value="{{$newID}}" type="text" class="form-control" name="dlvID" id="dlvID" readonly>
                                        </div>
                                        <label for="price">Received By</label>
                                        <div class="form-group">
                                        <input type="text" class="form-control" name="empNameRec" id="empNameRec" value="{{Session::get('empName')}}" readonly>
                                        </div>
                                        <label for="price">Date Delivered</label>
                                        <div class="form-group">
                                        <input id="dtDelv" name="dtDelv" type="date"/>
                                        </div>
                                       <div class="form-group">
                                        <label for="price">Product</label>
                                        {{ Form::select('ordID', $data['orders'], null, array('class' => 'browser-default')) }}
                                        {{-- <input type="text" class="form-control" name="ordID" id="ordID" onchange="onChangeEvent()"> --}}
                                        </div>
                                  </p>
                                </div>

                                <div class="modal-footer">
                                  <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Close</a>
                                   <button class=" waves-effect waves-green btn-flat " >ADD</button>
                                    </form>
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