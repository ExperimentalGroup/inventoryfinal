@extends('layouts.master')

@section('content')
<div class="main-wrapper">
	<!-- ACTUAL PAGE CONTENT GOES HERE -->
	<div class="row">
		<div class="col s12 m12 l12">
			<span class="page-title">Order</span>
		</div>

		 <div class="row">
			<div class="col s12 m12 l6">
				<div class="col s12 m12 l10">
					<form action="/neworder" method="GET">
						<button class="waves-effect waves-light btn btn-small center-text">ADD NEW ORDER</button>
					</form>
				</div>
			</div>
		 </div>
				

		<div class="row">
			<div class="col s12 m12 l12">
				<div class="card-panel">
					<span class="card-title">Items Ordered from Suppliers</span>
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
										<th>Order ID</th>
										<th>Supplier</th>
										<th>Date Ordered</th>
										<th>Placed by</th>
										<th>Status</th>
									</tr>
								</thead>

								 <tbody>
									@foreach($orders as $order)
									<tr>
										<td>{{ $order -> strOrdersID }}</td>
										<td>{{ $order -> supplier -> strSuppCompanyName }}</td>
										<td>{{ $order -> dtOrdDate }}</td>
										<td>{{ $order -> employee -> strEmpLName.', '. $order -> employee -> strEmpFName}}</td> 
										@if($order -> strOrdNotesStat == 'Pending')
										<td class="orange-text bold">PENDING</td>
										@elseif($order -> strOrdNotesStat == 'Declined')
										<td class="red-text bold">DECLINED</td>
										@elseif($order -> strOrdNotesStat == 'Accepted')
										<td class="green-text bold">ACCEPTED</td>
										@endif                         
										<td>
											<!-- <div class="center-btn">
												<a class="waves-effect waves-light btn btn-small center-text" href="/details">View Details</a>
											</div> -->
											<div class="container">
				                           <!-- Modal Trigger -->
				                              <a class="modal-trigger waves-effect waves-light btn" href="#{{$order->strOrdersID}}">View Details</a>
				                              @foreach($orders as $order)
				                              <!-- Modal Structure -->
				                              <div id="{{$order->strOrdersID}}" class="modal modal-fixed-footer">
				                                <div class="modal-content">
				                                  <h4>Order Details</h4>
				                                  <p>Order ID: {{$order -> strOrdersID}}<br>
				                                     Supplier Name: {{$order -> supplier -> strSuppCompanyName}}<br>
				                                     Placed By: {{$order->employee -> strEmpLName.', '.$order->employee->strEmpFName}}<br>
				                                     Order Date: {{$order-> dtOrdDate}}<br>
				                                     <br>Products Ordered:<br>
				                                     {{$order->strOPProdID}} 
                        							 {{ $order->intOPQuantity}} 
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
