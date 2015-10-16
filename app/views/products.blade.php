@extends('layouts.master')

@section('content')
      <div class="main-wrapper">
        <!-- ACTUAL PAGE CONTENT GOES HERE -->
        <div class="row">
          <div class="col s12 m12 l12">
            <span class="page-title">Products</span>
          </div>
 @if( Session::get('empBrchID') == 'BRCH002'  && Session::get('empRole') == 'ROLE0001' )
           <div class="row">
      <div class="col s12 m12 l6">
        <div class="col s12 m12 l10">
             <button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#newprod">ADD NEW PRODUCT</button>
          </form>
        </div>
      </div>
     </div>
 @endif

          
          <div class="row">
            <div class="col s12 m12 l12">
              <div class="card-panel">
                <span class="card-title">Technogalore Available Products</span>
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
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                 @foreach($products as $products)
                  <tr>
                    <td>{{ $products->strProdID }}</td>
                    <td>{{ $products->strProdName }}</td>
                    <td>{{ $products->strProdBrand }}</td>
                    <td>{{ $products->strProdModel }}</td>
                    <td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#{{$products->strProdID}}">EDIT</button>
                             
                              <!-- Modal Structure -->
                              <div id="{{$products->strProdID}}" class="modal modal-fixed-footer">
                                <div class="modal-content">
                                  <h4>EDIT PRODUCT DETAILS</h4>
                                  <p>
                                  <form action="/productupdate" method="POST">
                                      <div class="form-group">
                                      <!-- <label for="price">Branch ID</label>
                                      <input type="text" class="form-control" name="brnchID" id="brnchID" placeholder="BranchID"> -->
                                        <label for="disabled">Product ID</label>
                                        <input value="{{$products->strProdID}}" name="prodID" id="prodID" placeholder="Product ID" type="text" class="form-control" readonly>
                                      </div>
                                      <div class="form-group">
                                      <label for="price">Product Name</label>
                                      <input type="text" class="form-control" name="prodName" id="prodName" value="{{ $products->strProdName }}">
                                      </div>
                                      <div class="form-group">
                                      <label for="price">Product Brand</label>
                                      <input type="text" class="form-control" name="prodBrand" id="prodBrand" value="{{ $products->strProdBrand }}">
                                      </div>                                   
                                      <div class="form-group">
                                      <label for="price">Product Model</label>
                                      <input type="text" class="form-control" name="prodModel" id="prodModel" value="{{ $products->strProdModel  }}">
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

         <div id="newprod" class="modal modal-fixed-footer">
          <div class="modal-content">
          <h4>Add New Product</h4>
          <p>
                 <form action="/products" method="POST">
                      <div class="form-group">
                      <label for="price">Product ID</label>
                      <input value="{{$newID2}}" type="text" class="form-control" name="proID" id="proID" placeholder="ProdID" readonly>
                      </div>
                      <label for="price">Product Name</label>
                      <div class="form-group">
                      <input type="text" class="form-control" name="proName" id="proName" placeholder="Product Name">
                      </div>
                      <label for="price">Brand</label>
                      <div class="form-group">
                      <input type="text" class="form-control" name="proBrand" id="proBrand" placeholder="Product Brand">
                      </div>
                      <div class="form-group">
                      <label for="price">Model</label>
                      <input type="text" class="form-control" name="proModel" id="proModel" placeholder="Product Model">
                      </div>
                      
</p>
</div>
                                <div class="modal-footer">
                                  <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Close</a>
                                  <button class="waves-effect wwaves-green btn-flat ">ADD</button>
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
