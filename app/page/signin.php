<?php
	session_start();

	/*	open db connection 	*/
	mysql_connect('localhost', 'root', '');
	mysql_select_db('eshop');

	$purchases = mysql_query('select * from users') or die(mysql_error());

	mysql_close();
?>


<html>
<head>
	<meta charset="utf-8" />
	<title>Sign In</title>

	<link rel="stylesheet" type="text/css" href="../css/main.css">
	
	<script type="text/javascript">
function validateForm()
{
	var user=document.signin.username.value;
	var user=user.trim();
	var pass=document.signin.password.value;
 
	if(user == '')
	{
		document.getElementById('error').innerHTML="Please Enter Username";
		return false;
	}
 
	if(pass == '')
	{
		document.getElementById('error').innerHTML="Please Enter Password";
		return false;
	}
}
</script>
</head>
<body>
<!-- LOGO -->
		<div class="logo"><h1><a href="../index.php">eShop</a></h1></div>
			
<div class="widget">	
	
	<form id="signin" name="signin" method="post" action="signin.php" onsubmit="return validateForm()">
	<table width="510" border="0" align="center">
		<tr>
			<td>Sign in Form</td>
			<td><div id="error"></div></td>
		</tr>
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
			<td><input type="submit" name="button" id="button" value="Submit" /></td>
		</tr>
	</table>
	</form>
</div>

<a href = "profile.php"><input name= "register" type= "submit" value="Register"> </a>
<script src="../js/jquery-1.11.1.min.js"></script>
<script src="../js/signin.js"></script>
</body>
</html>