$(function(){

	var tblAddProduct = $('#table-add-product').DataTable();
	var dataSet;

	$('.product-add').click(function(){
		// dataSet = 
		// [
		// 	'a',
		// 	'b',
		// 	'c',
		// 	'd'
		// ];

		// tblAddProduct.row.add(dataSet).draw();
		alert('jfdksjfkldsjlkfjkdsl');
	});

	var tblProducts = $('#table-prod-list').DataTable({
		ajax: {
			url: '/product-load',
			dataSrc: '',
		},
		columns: [
			{ data: 'strProdID' },
			{ data: 'strProdName' },
			{ data: 'dblCurRetPrice' },
			{ data: 'dblCurWPrice' },
			// { data: 'intAvailQty' },
			{ data: null, defaultContent: '<div class="center-btn"><a class="waves-effect waves-light btn btn-small center-text product-add">ADD TO PRODUCT LIST</a></div>'	}
		]
	});

	$('#table-prod-list tbody').on('click', 'tr', function()
	{
		$(this).toggleClass('selected');
		// console.log(tblProducts.rows('.selected').data());
	});

	$(document).on('click', '.product-add', function()
	{
		var wholesaleprice = tblProducts.row('.selected').data()['dblCurWPrice'];
		// console.log(wahaha);
		// alert('Added!');
		dataSet = 
		[
			[
				tblProducts.row('.selected').data()['strProdID'],
				tblProducts.row('.selected').data()['strProdName'],
				1,
				wholesaleprice
			]
		];
		
		tblAddProduct.rows.add(dataSet).draw();

		tblProducts.row('.selected').remove().draw();
	});

	$('#submit-order').click(function()
	{
		var itemsOrdered = [];

		for (var i = 0; i < tblAddProduct.rows().data().length; i++) 
		{
			itemsOrdered[i] = tblAddProduct.rows().data()[i];
		};

		console.log(itemsOrdered);

		$.ajax({
			url: '/add-order',
			type: 'POST',
			data: 
			{
				orderID: $('#orderID').val(),
				supplierID: $('#supplier-select').val(),
				empID : $('#empID').val(),
				itemsOrd: itemsOrdered
			},
			success: function(data)
			{
				alert('Successfully Added!');
			},
			error: function(xhr)
			{
				alert($.parseJSON(xhr.responseText)['error']['message']);
			}
		});
		console.log(tblAddProduct.rows().data());
	});
});