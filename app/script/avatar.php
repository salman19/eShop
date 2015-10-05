<?php
	session_start();

	if (isset($_FILES['avatar'])) {

		if(file_exists("../avatar/" . $_FILES["avatar"]["name"]))
			$_FILES["avatar"]["name"] = $_SESSION['user']['id'] . '-' . $_FILES["avatar"]["name"];
		
		move_uploaded_file($_FILES["avatar"]["tmp_name"],
		      "../avatar/" . $_FILES["avatar"]["name"]);


		$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
		$server = $url["host"];
		$username = $url["user"];
		$password = $url["pass"];
		$db = substr($url["path"], 1);
		$conn = new mysqli($server, $username, $password, $db);

		$conn->query('update Users set avatar = "avatar' 
			. '/' .  $_FILES["avatar"]["name"] .
			 '" where id = ' . $_SESSION['user']['id']
		);

		$_SESSION['user'] = mysqli_fetch_array(m$conn->query('select * from Users'));

		mysqli_close();
	}
	else {

	}
?>
