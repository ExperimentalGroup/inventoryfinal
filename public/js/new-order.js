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
	// // alert('fdsjkhfdjkf');

	var tblProducts = $('#table-prod-list').DataTable();

	$.ajax(
	{
		url: '/product-load',
		type: 'GET',
		success: function(data)
		{
			// var strProducts = $.parseJSON(data);
			// var wahaha = [];
			// var abc = [];
			// var strProdukto = $.map(strProducts[0], function(ret)
			// {
			// 	return ret;
			// });
			// 	console.log(strProducts[0]['dblCurRetPrice']);
			// // 	// Rated SPG
			// 	// for (var i = 0; i < strProducts.length; i++) {
			// 	// 	for (var j = 0; j < strProducts.length; j++) {
			// 	// 		if(j==0) wahaha[i][j] = strProducts[i]['strProdName'];
			// 	// 			else if(j==1) wahaha[i][j] = strProducts[i]['dblCurRetPrice'];
			// 	// 				else if(j==2)	wahaha[i][j] = strProducts[i]['dblCurWPrice'];
			// 	// 					else if(j==3) wahaha[i][j] = strProducts[i]['intAvailQty'];
			// 	// 	}
			// 	// }

			// 	for (var i = 0; i < strProducts.length; i++) {
			// 		wahaha[i] = 
			// 		[
			// 			strProducts[i]['strProdName'],
			// 			strProducts[i]['dblCurRetPrice'],
			// 			strProducts[i]['dblCurWPrice'],
			// 			strProducts[i]['intAvailQty']
			// 		]
			// 	}

			// 	// tblProducts.row.add(wahaha).draw();
				console.log(dataSet);
		},
		error: function(xhr)
		{
			alert('wefkdhfjd');
		}
	}
	);
});