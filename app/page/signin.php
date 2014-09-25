<?php
	function SignIn()  {
	session_start();

	/*	open db connection 	*/
	mysql_connect('localhost', 'root', '');
	mysql_select_db('eshop');

	$email = $_POST['email'];
	$password = $_POST['password'];
	$data = mysql_query("select * from users where email='$_POST[email]' AND password='$_POST[password]'") or die(mysql_error());
	$row = mysql_fetch_array($data) or die(mysql_error()); 
	if(!empty($row['email']) AND !empty($row['password'])) {
		$_SESSION['email'] = $row['password']; 
		echo "SUCCESSFULLY LOGIN TO USER PROFILE PAGE...";
	}
	else {
		echo "SORRY... YOU ENTERD WRONG ID AND PASSWORD... PLEASE RETRY..."; 
		}

if(isset($_POST['submit']))
{
	SignIn();
}
}
	
//	mysql_close();
?>


<html>
<head>
	<meta charset="utf-8" />
	<title>Sign In</title>

	<link rel="stylesheet" type="text/css" href="../css/signin.css">
	
</head>
<body>
<!-- LOGO -->
		<div class="logo"><h1><a href="../index.php">eShop</a></h1></div>
			
<div class= "form">	
	
	<form id="signin" name="signin" method="post" action="profile.php" onsubmit="return validateForm()"> 
	
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



<script src="../js/jquery-1.11.1.min.js"></script>
<script src="../js/signin.js"></script>
</body>
</html>