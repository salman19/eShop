<?php
	function SignIn()  {
	session_start();

	/*	open db connection 	*/
	mysql_connect('localhost', 'root', '');
	mysql_select_db('eshop');

	$email = $_POST['email'];
	$password = $_POST['password'];
	$login = mysql_query("select * from users where email='$_POST[email]' AND password='md5 $_POST[password]'") or die(mysql_error());
	
	// Check username and password match
	$rowcount = mysql_num_rows($login);
	if ($rowcount == 1) {
		// Set email session variable
		$_SESSION['email'] = $email;
		// Jump to profile page
		header('Location: ../../profile.php');
	}
	else { 
	header('Location:login.php');
	}
}
	
//	mysql_close();
?>


<html>
<head>
	<meta charset="utf-8" />
	<title>Sign In</title>

	<link rel="stylesheet" type="text/css" href="../css/signin.css">
	<script src="../js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="../js/signin.js"></script>
	
</head>
<body>
<!-- LOGO -->
		<div class="logo"><h1><a href="../index.php">eShop</a></h1></div>
			
<div class= "form">	
	
	<form id="signin" name="signin" method="post" action="profile.php" onsubmit="return validateForm(this)"> 
	
	<table width="510" border="0" align="center">
		<tr>
			<td><b>Sign in Form</b></td>
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
			<td>Password</td>
			<td><input type="password" name="password" id="password" /></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type="submit" name="button" id="button" value="Sign in " /> 
			</td>
		</tr>
		
	</table>
	</form>
	
</div>
<div class = "widget"> 
		<p> If you are not a user , please   
		<a href = "register.php"><input name= "register" type= "submit" action="register.php" value="Register"> </a> </p>
	</div>




</body>
</html>