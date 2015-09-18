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
			console.log($.parseJSON(data));
			
		},
		error: function(xhr)
		{
			alert('wefkdhfjd');
		}
	}
	);
});