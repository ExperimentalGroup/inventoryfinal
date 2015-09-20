@extends('layouts.master')

@section('content')
      <div class="main-wrapper">
        <!-- ACTUAL PAGE CONTENT GOES HERE -->
        <div class="row">
          <div class="col s12 m12 l12">
            <span class="page-title">Release</span>
          </div>

          <div class="row">
            <div class="col s12 m12 l12">
              <div class="card-panel">
                <span class="card-title">Release Report</span>
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
                        <option value="" disabled selected>Release No. (Any)</option>
                        <option value="1">SAMPLE1</option>
                        <option value="2">SAMPLE2</option>
                        <option value="3">SAMPLE3</option>
                      </select>
                    </div>
                    <div class="col s12 m12 l4 input-field">
                      <select>
                        <option value="" selected>Branch Name (Any)</option>
                        <option value="1">SAMPLE1</option>
                        <option value="2">SAMPLE2</option>
                      </select>
                    </div>
                    <div class="col s12 m12 l4 input-field">
                      <select>
                        <option value="" selected>Released By (Any)</option>
                        <option value="1">SAMPLE1</option>
                        <option value="2">SAMPLE2</option>
                        <option value="3">SAMPLE3</option>
                      </select>
                    </div>
                  </div>

                  <div class="col s12 m12 l12 overflow-x">
                    <table class="centered">
                      <thead>
                        <tr>
                          <th>Release Number</th>
                          <th>Branch Name</th>
                          <th>Release by</th>
                          <th>Date</th>
                        </tr>
                      </thead>

                       <tbody>
                        @foreach($rjt as $joined)
                        <tr>
                          <td>{{ $joined -> strReleasesID }}</td>
                          <td>{{ $joined -> strBrchName }}</td>
                          <td>{{ $joined -> strEmpLName.', '. $joined -> strEmpFName }}</td>
                          <td>{{ $joined -> dtDateReleased }}</td>         
                          <td>
                            <!-- <div class="center-btn">
                              <a class="waves-effect waves-light btn btn-small center-text" href="/details">View Details</a>
                            </div> 
                            {{ HTML::link('/release', 'View Details') }} -->
                            <div class="container">
                           <!-- Modal Trigger -->
                              <a class="modal-trigger waves-effect waves-light btn" href="#{{$joined->strReleasesID}}">View Details</a>
                              @foreach($rjt as $joined)
                              <!-- Modal Structure -->
                              <div id="{{$joined->strReleasesID}}" class="modal modal-fixed-footer">
                                <div class="modal-content">
                                  <h4>Release Details</h4>
                                  <p>Release ID: {{$joined-> strReleasesID}}<br>
                                     Branch Name: {{$joined->strBrchName}}<br>
                                     Released By: {{$joined->strEmpLName.', '.$joined->strEmpFName}}<br>
                                     Release Date: {{$joined-> dtDateReleased}}<br>
                                     <br>Products Released:<br>
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
