$("#checkout").on('click', function(e) {
	e.preventDefault();
	var product_id = $('#product_id').val();
	var user_id = $('#user_id').val();
	var product_name = $('#product_name').val();

	console.log({'product_id': product_id, 'user_id': user_id, 'product_name': product_name});
	$.ajax({
		type: 'POST',
		url: '../script/checkout.php',
		data: {'product_id': product_id, 'user_id': user_id, 'product_name': product_name},
		success: function(data, textStatus, jqXHR){
			alert(data);
			window.location="../index.php";
		},
		error: function( jqXHR, textStatus, errorThrown) {
			alert(errorThrown);
		}
	});
});
$('#signout').on('click', function(e){
	e.preventDefault();
	$.ajax({
		type: 'post',
		url: '../script/session_terminate.php',
		dataType: 'text',
		success: function(data, textStatus, jqXHR){
			console.log(data);
			(data.trim() === 'true')? window.location='../index.php' : alert('error');
		},
		error: function( jqXHR, textStatus, errorThrown) {
			alert(errorThrown);
		}
	});
});