<?php
	session_start();

	if (isset($_FILES['avatar'])) {

		if(file_exists("../avatar/" . $_FILES["avatar"]["name"]))
			$_FILES["avatar"]["name"] = $_SESSION['user']['id'] . '-' . $_FILES["avatar"]["name"];
		
		move_uploaded_file($_FILES["avatar"]["tmp_name"],
		      "../avatar/" . $_FILES["avatar"]["name"]);


		mysql_connect('localhost', 'root', '');
		mysql_select_db('eshop');

		mysql_query('update Users set avatar = "avatar' 
			. '/' .  $_FILES["avatar"]["name"] .
			 '" where id = ' . $_SESSION['user']['id']
		);

		$_SESSION['user'] = mysql_fetch_array(mysql_query('select * from Users'));

		mysql_close();
	}
	else {

	}
?>