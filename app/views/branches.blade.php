@extends('layouts.master')

@section('content')
      <div class="main-wrapper">
        <!-- ACTUAL PAGE CONTENT GOES HERE -->
        <div class="row">
          <div class="col s12 m12 l12">
            <span class="page-title">Branches</span>
          </div>

          <div class="row">
      <div class="col s12 m12 l6">
        <div class="col s12 m12 l10">
            <button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#newbranch">ADD NEW BRANCH</button>
          </form>
        </div>
      </div>
     </div>
           

          <div class="row">
            <div class="col s12 m12 l12">
              <div class="card-panel">
                <span class="card-title">gHuB Branches in Metro Manila</span>
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
                          <th>Branch ID</th>
                          <th>Branch Name</th>
                          <th>Branch Address</th>
                        </tr>
                      </thead>

                      <tbody>
                         @foreach($branches as $branches)
                        <tr>
                          <td>{{ $branches->strBrchID }}</td>
                          <td>{{ $branches->strBrchName }}</td>
                          <td>{{ $branches->strBrchAddress }}</td>
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

        <div id="newbranch" class="modal modal-fixed-footer">
          <div class="modal-content">
          <h4>Add New Branch</h4>
          <p>
            <form action="/branches" method="POST">
                      <div class="form-group">
                      <!-- <label for="price">Branch ID</label>
                      <input type="text" class="form-control" name="brnchID" id="brnchID" placeholder="BranchID"> -->
                        <label for="disabled">Branch ID</label>
                        <input value="{{$newID}}" name="brnchID" id="brnchID" placeholder="BranchID" type="text" class="form-control" readonly>
                      </div>
                      <div class="form-group">
                      <label for="price">Branch Name</label>
                      <input type="text" class="form-control" name="brnchName" id="brnchName" placeholder="BranchName">
                      </div>
                      <div class="form-group">
                      <label for="price">Branch Address</label>
                      <input type="text" class="form-control" name="brnchAdd" id="brnchAdd" placeholder="BranchAdd">
                      </div>
                      <button type="submit" class="waves-effect waves-light btn btn-small center-text">ADD</button>
              </p>
                      </div>
                                <div class="modal-footer">
                                  <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Close</a>
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
