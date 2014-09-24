$(function(){
	$('#signout').on('click', function(e){
		e.preventDefault();
		$.ajax({
			type: 'post',
			url: 'script/session_terminate.php',
			dataType: 'text',
			success: function(data, textStatus, jqXHR){
				console.log(data);
				(data.trim() === 'true')? location.reload() : alert('error');
			},
			error: function( jqXHR, textStatus, errorThrown) {
				alert(errorThrown);
			}
		});
	});
});