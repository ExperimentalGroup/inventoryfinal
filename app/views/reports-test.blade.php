<?php
	$columns = 
	[
		'Batch ID',
		'Product Name',
		'Brand',
		'Model',
		'Retail Price',
		'Wholesale Price',
		'Available Stock',
		'Date Delivered'
	];
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Technogalore Inventory Report</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<style type="text/css">
			table {
    			border-collapse: collapse;
    			margin-left:auto; margin-right:auto;
			}
			table, th, td {
   				border: 1px solid black;
   				text-align: center;
			} 
		</style>
	</head>

	<body>
		<h1>Generate Report</h1>

		<p><strong>Date & Time: </strong> {{date('Y-m-d h:i:sa')}}</p>

		<table>
			<thead>
				<tr>
					@foreach($columns as $header)
						<th>{{$header}}</th>
					@endforeach
				</tr>
			</thead>

			<tbody>
				@foreach($result as $row)
					<tr>
						<td>{{$row->strBatchID}}</td>
						<td>{{$row->strProdName}}</td>
						<td>{{$row->strProdBrand}}</td>
						<td>{{$row->strProdModel}}</td>
						<td>{{number_format($row->dblCurRetPrice,2)}}</td>
						<td>{{number_format($row->dblCurWPrice,2)}}</td>
						<td>{{$row->intAvailQty}}</td>
						<td>{{$row->dtDlvryDate}}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</body>
</html>
