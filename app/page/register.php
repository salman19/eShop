<?php
	session_start();

	/*	open db connection 	*/
	$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
	$server = $url["host"];
	$username = $url["user"];
	$password = $url["pass"];
	$db = substr($url["path"], 1);
	$conn = new mysqli($server, $username, $password, $db);


	 if (isset($_POST['email']) && isset($_POST['password']))
    {
		$email = $_POST['email']; 
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$avatar = 'avatar/' .$_FILES['avatar']['name']; 
		$password = $_POST['password']; 
		$conn->query(
			"INSERT INTO Users(email, first_name, last_name, password)
			VALUES('$email','$first_name', '$last_name', '$password')"
		) 
		or die(mysqli_connect_error()); 
		header("Location: signin.php");
	}

	mysqli_close();
?>

<html>
<head>
	<meta charset="utf-8" />
	<title>Register Form</title>

	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<link rel="stylesheet" type="text/css" href="../css/signin.css">
	<link rel="stylesheet" type="text/css" href="../fontello/css/fontello.css">
	
</head>
<body>
	<header>
		<!-- LOGO -->
		<div class="logo"><h1><a href="../index.php">eShop</a></h1></div>
		<hr>
	</header>

	<div class="container">
		<div class= "form">	
			
			<form id="register" name="register" method="post" action="" 
			onsubmit="return validateForm()" enctype="multipart/form-data"> 
			
			<table width="510" border="0">
				<tr>
					<td><h2>Register Form</h2></td>
					<td><div id="error"></div></td>
				</tr>
				<tr><td></td></tr>
				<tr><td></td></tr>
				<tr><td></td></tr>
				<tr>
					<td>Email:</td>
					<td><input type="text" name="email" id="email" /><i class="icon-mail"></i></td>
				</tr>
				<tr><td></td></tr>
				<tr>
					<td>First Name:</td>
					<td><input type="text" name="first_name" id="first_name" /><i class="icon-user"></i></td>
				</tr>
				<tr><td></td></tr>
				<tr>
					<td>Last Name:</td>
					<td><input type="text" name="last_name" id="last_name" /><i class="icon-user"></i></td>
				</tr>
				<tr><td></td></tr>
				<tr>
					<td>Avatar:</td>
					<td> <input type="file" name="avatar" id="avatar"> </td>
				</tr>
				<tr><td></td></tr>
				<tr>
					<td>Password</td>
					<td><input type="password" name="password" id="password" /><i class="icon-lock"></i></td>
				</tr>
				<tr><td></td></tr>
				<tr><td></td></tr>
				<tr>
					<td>&nbsp;</td>
					<td><button type="submit" name="button" id="button">Register <i class="icon-angle-circled-right"></i></button> 
				</tr>
			</table>
			</form>
		</div>
	</div>

	<script src="../js/register.js"></script>
</body>
</html>

