$(function(){
	$('#signout').on('click', function(){
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
});