@extends('layouts.master')

@section('content')
      <div class="main-wrapper">
        <!-- ACTUAL PAGE CONTENT GOES HERE -->
        <div class="row">
          <div class="col s12 m12 l12">
            <span class="page-title">Inventory</span>
          </div>

 @if( Session::get('empBrchID') == 'BRCH002' && Session::get('empRole') == 'ROLE0001' )
          <div class="row">
      <div class="col s12 m12 l6">
        <div class="col s12 m12 l10">
            <!-- <button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#newprod">ADD NEW PRODUCT</button>
            <button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#viewprod">VIEW ALL PRODUCTS</button> -->
            <a class="modal-trigger waves-effect waves-light btn btn-small center-text" href="{{ URL::to('/reports') }}">Generate Report</a>
        </div>
      </div>
     </div>
  @endif

  


          <div class="row">
            <div class="col s12 m12 l12">
              <div class="card-panel">
                <span class="card-title">Items on {{Session::get('empBrch')}} branch</span>
                <div class="divider"></div>
                <div class="card-content">
                  
                  </div>

                  <div class="col s12 m12 l12 overflow-x">
                    <table class="centered">
                      <thead>
                        <tr>
                          <th>Batch ID</th>
                          <th>Product Name</th>
                         <!--  <th>Brand</th>
                          <th>Model</th> -->
                          <th>Retail Price</th>
                          <!-- <th>Wholesale Price</th> -->
                          <th>Available Stock</th>
                          <th>Status</th>
                        </tr>
                      </thead>

                      <tbody>
                         @foreach($inventory as $inventory)
                         
                        <tr>
                          <td>{{ $inventory->strBatchID }}</td>
                          <td>{{ $inventory->product->strProdName }}</td>
                          <!-- <td>{{ $inventory->product->strProdBrand }}</td>
                          <td>{{ $inventory->product->strProdModel }}</td> -->
                          <td>{{ $inventory->dblCurRetPrice }}</td>
                          <!-- <td>{{ $inventory->dblCurWPrice }}</td> -->
                          <td>{{ $inventory->intAvailQty }}</td>
                         @if($inventory->intAvailQty <= 1)
                          <td class="red-text bold">DEPLETED</td>
                          @elseif($inventory->intAvailQty <= 10)
                          <td class="orange-text bold">CRITICAL</td>
                          @else
                          <td class="green-text bold">GOOD</td>
                         @endif 
                          <td>
                          <button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#{{$inventory->strBatchID}}">ADJUST</button>
                             
                              <!-- Modal Structure -->
                              <div id="{{$inventory->strBatchID}}" class="modal modal-fixed-footer">
                                <div class="modal-content">
                                  <h4>ADJUSTMENTS</h4>
                                  <p>
                                  <form action="/adjust" method="POST">
                                          <div class="form-group">
                                          <label for="price">Batch ID</label>
                                          <input value="{{$inventory->strBatchID}}" type="text" class="form-control" name="batchID" id="batchID" placeholder="ProdID" readonly>
                                          </div>
                                          <label for="price">Product Name</label>
                                          <div class="form-group">
                                          <input type="text" class="form-control" name="productName" id="productName" value="{{ $inventory->product->strProdName }}" readonly>
                                          </div>
                                          <label for="price">Quantity</label>
                                          <div class="form-group">
                                          <input type="number" class="form-control" name="adjQTY" id="adjQTY" value="1">
                                          </div>
                                          <div class="form-group">
                                          <label for="price">Reason for Adjustment</label>
                                          <input type="text" class="form-control" name="adjRes" id="adjRes" placeholder="REASONS">
                                          </div>
                                          <div class="form-group">
                                          <label for="price">Date Adjusted</label>
                                          <input id="dtAdj" name="dtAdj" type="date"/>
                                          </div>
                                  </p>
                                </div>
                                <div class="modal-footer">
                                  <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Close</a>
                                  <button type="submit" class="waves-effect waves-green btn-flat ">SUBMIT</button>
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

