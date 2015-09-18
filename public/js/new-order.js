$(function(){

	var tblAddProduct = $('#table-add-product').DataTable();
	var dataSet;

	$('.product-add').click(function(){
		dataSet = 
		[
			'a',
			'b',
			'c',
			'd'
		];

		tblAddProduct.row.add(dataSet).draw();
	});

	var tblProducts = $('#table-prod-list').DataTable({
		ajax: {
			url: '/product-load',
			dataSrc: '',
		},
		columns: [
			{ data: 'strProdName' },
			{ data: 'dblCurRetPrice' },
			{ data: 'dblCurWPrice' },
			{ data: 'intAvailQty' },
			{ data: null, defaultContent: '<div class="center-btn"><a class="waves-effect waves-light btn btn-small center-text product-add">ADD TO PRODUCT LIST</a></div>'	}
		]
	});
});