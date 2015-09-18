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
			var strProducts = $.parseJSON(data);
			var strProdukto = [];
			var aaa = [];

			for (var i = 0; i < strProducts.length; i++) {
				strProdukto[i] = $.map(strProducts[i], function(ret)
				{
					return ret;
				});
			};

			for (var i = 0; i < strProducts.length; i++) {
						aaa[i] = 
						[
							strProdukto[i][0],
							strProdukto[i][1],
							strProdukto[i][2],
							strProdukto[i][3],
							'<div class="center-btn">' + '<a class="waves-effect waves-light btn btn-small center-text product-add">ADD TO PRODUCT LIST</a>' + '</div>'					
						];
			}			

			for(var i = 0; i < aaa.length; i++)
			{
				tblProducts.row.add(aaa[i]).draw();
			}
					
				// console.log(dataSet);
		},
		error: function(xhr)
		{
			alert('wefkdhfjd');
		}
	}
	);
});