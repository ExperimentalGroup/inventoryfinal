@extends('layouts.master')

@section('content')
      <div class="main-wrapper">
        <!-- ACTUAL PAGE CONTENT GOES HERE -->
        <div class="row">
          <div class="col s12 m12 l12">
            <span class="page-title">Inventory</span>
          </div>

          <div class="row">
            <div class="col s12 m12 l12">
              <div class="card-panel">
                <span class="card-title">Items on current branch</span>
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
                        <option value="" disabled selected>Model (Any)</option>
                       
                        <option>Cellphone</option>
                        <option>Tablet</option>
                      </select>
                    </div>
                    <div class="col s12 m12 l4 input-field">
                      <select>
                        <option value="" selected>Brand (Any)</option>
                        <option value="1">Razer</option>
                        <option value="2">Apple</option>
                        <option value="3">ASUS</option>
                      </select>
                    </div>
                    <div class="col s12 m12 l4 input-field">
                      <select>
                        <option value="" selected>Status (Any)</option>
                        <option value="1">Good</option>
                        <option value="2">Critical</option>
                        <option value="3">Empty</option>
                      </select>
                    </div>
                  </div>

                  <div class="col s12 m12 l12 overflow-x">
                    <table class="centered">
                      <thead>
                        <tr>
                          <th>Product ID</th>
                          <th>Product Name</th>
                          <th>Brand</th>
                          <th>Model</th>
                          <th>Retail Price</th>
                          <th>Wholesale Price</th>
                          <th>Available Stock</th>
                          <th>Status</th>
                        </tr>
                      </thead>

                      <tbody>
                         @foreach($inventory as $inventory)
                        <tr>
                          <td>{{ $inventory->strProdID }}</td>
                          <td>{{ $inventory->strProdName }}</td>
                          <td>{{ $inventory->strProdBrand }}</td>
                          <td>{{ $inventory->strProdModel }}</td>
                          <td>{{ $inventory->dblCurRetPrice }}</td>
                          <td>{{ $inventory->dblCurWPrice }}</td>
                          <td>{{ $inventory->intAvailQty }}</td>
                         @if($inventory->intAvailQty <= 1)
                          <td class="red-text bold">DEPLETED</td>
                          @elseif($inventory->intAvailQty <= 10)
                          <td class="orange-text bold">CRITICAL</td>
                          @else
                          <td class="green-text bold">GOOD</td>
                         @endif 
                          <td>
                            <div class="center-btn">
                              <a class="waves-effect waves-light btn btn-small center-text" href="/adjust">ADJUST</a>
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


          <div class="row">
            <div class="col s12 m12 l6">
              <div class="card-panel">
                <span class="card-title">Add New Product</span>
                <div class="divider"></div>
                <div class="card-content">
                  <div class="col s12 m12 l10">
                      <form action="/inventory" method="POST">
                      <div class="form-group">
                      <label for="price">Batch ID</label>
                      <input value="{{$newID}}" type="text" class="form-control" name="batchID" id="batchID" placeholder="ProdID" readonly>
                      </div>
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
                      <div class="form-group">
                      <label for="price">Retail Price</label>
                      <input type="text" class="form-control" name="retPrice" id="retPrice" placeholder="Retail Price">
                      </div>
                      <div class="form-group">
                      <label for="price">Wholesale Price</label>
                      <input type="text" class="form-control" name="whoPrice" id="whoPrice" placeholder="Wholesale Price">
                      </div>
                      <div class="form-group">
                      <label for="price">Available Stock</label>
                      <input type="text" class="form-control" name="avaQTY" id="avaQTY" placeholder="Available Stock">
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
