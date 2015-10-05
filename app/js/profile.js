$(function(){
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
	$('#avatar-form').submit(function(e){
		e.preventDefault();
		$.ajax({
		    type: 'POST',
		   	url: '../script/avatar.php',
		   	data: new FormData( this ),
		   	processData: false,
		   	contentType: false,
		   	success: function(data, textStatus, jqXHR){
		   		$('#success-msg').text('Avatar changed successfully');
		   		setTimeout(function() {
		   			location.reload();
		   		}, 1000);
		   	},
		   	error: function( jqXHR, textStatus, errorThrown) {
				alert(errorThrown);
			}
		});
	});
});