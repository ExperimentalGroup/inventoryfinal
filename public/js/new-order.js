$(function(){

	//var tblAddProduct = $('#table-add-product').DataTable();
	var dataSet;
	var wholesaleprice;
	var prodid;
	var prodname;

	var tblAddProduct = $('#table-add-product').DataTable({
			"data": dataSet,
			"ordering": false,
			// "columns": [{
			// 	"title": "Product ID"
			// }, {
			// 	"title": "Product Name"
			// }, {
			// 	"title": "Quantity"
			// }, {
			// 	"title": "Subtotal"
			// }],
			"columnDefs":[{
				"targets": 2, 
				"render": function(data, type, full, meta){
					console.log("data = "+data);

					// if (data == '1' && data<=availqty){
						return '<input type="text" name="" id="yes">';
					// } else {
					// 	return data;
					// }
				}
			},
			{
				"targets": 3, 
				"render": function(data, type, full, meta){
					console.log("data = "+data);

					var add = '<div class="center-btn"><a class="waves-effect waves-light btn btn-small center-text product-edit">Edit</a></div>';
					return add;
				}
			},
			{
				"targets": 4, 
				"render": function(data, type, full, meta){
					console.log("data = "+data);
					return '<input type="number" min="1" value="">';
				}
			}
			]
	});	
	$(document).on('click', '.product-add', function()
	{
		console.log("basta");
	});
	// function commit(data){

	// 	console.log("commit called");

	// 	var list = ['a','b'];
	// 	var info = $("td input[type=text]").each(function(idx) {
	// 		this.outerHTML = this.value;
	// 		list.push(this.value);
	// 	});
	// 	list = list.concat (['4','5']);

	// 	var row = $data.closest('tr');
	// 	var nRow = row[0];

	// 	var table = $('#table-add-product').datatable();
	// 		table.fnUpdate(list, nRow);
	// }

	var tblProducts = $('#table-prod-list').DataTable({
		ajax: {
			url: '/product-load',
			dataSrc: '',
		},
		columns: [
			{ data: 'strProdID' },
			{ data: 'strProdName' },
			// { data: 'dblCurRetPrice' },
			// { data: 'dblCurWPrice' },
			// { data: 'intAvailQty' },
			{ data: null, defaultContent: '<div class="center-btn"><a class="waves-effect waves-light btn btn-small center-text product-add">ADD TO ORDER</a></div>'	}
		]
	});

	$('#table-prod-list tbody').on('click', 'tr', function()
	{
		$(this).toggleClass('selected');
		// console.log(tblProducts.rows('.selected').data());
	});

	$(document).on('click', '.product-add', function()
	{
		//wholesaleprice = tblProducts.row('.selected').data()['dblCurWPrice'];
		prodid = tblProducts.row('.selected').data()['strProdID'];
		prodname = tblProducts.row('.selected').data()['strProdName'];
		// console.log(wahaha);
		// alert('Added!');
		dataSet = 
		[
			[
				tblProducts.row('.selected').data()['strProdID'],
				tblProducts.row('.selected').data()['strProdName'],
				1,
				'',
				''
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
				window.location = "order";
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