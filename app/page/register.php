<?php
	session_start();

	/*	open db connection 	*/
	mysql_connect('localhost', 'root', '');
	mysql_select_db('eshop');


	 if (isset($_POST['email']) && isset($_POST['password']))
    {
		$email = $_POST['email']; 
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$avatar = 'avatar/' .$_FILES['avatar']['name']; 
		$password = $_POST['password']; 
		mysql_query(
			"INSERT INTO Users(email, first_name, last_name, password)
			VALUES('$email','$first_name', '$last_name', '$password')"
		) 
		or die(mysql_error()); 
		header("Location: signin.php");
	}

	mysql_close();
?>



<html>
<head>
	<meta charset="utf-8" />
	<title>Register Form</title>

	<link rel="stylesheet" type="text/css" href="../css/signin.css">
	
</head>
<body>
<!-- LOGO -->
		<div class="logo"><h1><a href="../index.php">eShop</a></h1></div>
			
<div class= "form">	
	
	<form id="register" name="register" method="post" action="" 
	onsubmit="return validateForm()" enctype="multipart/form-data"> 
	
	<table width="510" border="0" align="center">
		<tr>
			<td><b>Register Form</b></td>
			<td><div id="error"></div></td>
		</tr>
		<tr><td></td></tr>
		<tr><td></td></tr>
		<tr><td></td></tr>
		<tr>
			<td>Email:</td>
			<td><input type="text" name="email" id="email" /></td>
		</tr>
		<tr>
			<td>First Name:</td>
			<td><input type="text" name="first_name" id="first_name" /></td>
		</tr>
		<tr>
			<td>Last Name:</td>
			<td><input type="text" name="last_name" id="last_name" /></td>
		</tr>
		<tr>
			<td>Avatar:</td>
			<td> <input type="file" name="avatar" id="avatar"> </td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="password" id="password" /></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type="submit" name="button" id="button" value="Register"/> 
		
		</tr>
		
	</table>
	</form>
</div>



<script src="../js/jquery-1.11.1.min.js"></script>
<script src="../js/register.js"></script>
</body>
</html>

