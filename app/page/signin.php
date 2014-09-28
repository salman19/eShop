<?php
	session_start();
	$rowcount = 1;

	/*	open db connection 	*/
	mysql_connect('localhost', 'root', '');
	mysql_select_db('eshop');

	if(isset($_POST['email']) && isset($_POST['password'])) {
		$email = $_POST['email'];
		$password = $_POST['password'];
		$login = mysql_query(
			"select * from Users where email='$email' AND password='$password'") 
			or die(mysql_error());
		
		// Check username and password match
		$rowcount = mysql_num_rows($login);
		if ($rowcount == 1) {
			$_SESSION['user'] = mysql_fetch_array($login);
			header('Location: profile.php');
		}
	}
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

		<?php if(isset($_SESSION['user'])): ?>
			<h2> You are already signed in</h2>
		<?php else: ?>
			
<div class= "form">	
	
	<form id="signin" name="signin" method="post" action="" 
		onsubmit="return validateForm(this)"> 
	
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
			<td>Password: </td>
			<td><input type="password" name="password" id="password" required/></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type="submit" name="button" id="button" value="Sign in" /> 
			</td>
		</tr>
	</table>
		<?php if($rowcount != 1): ?>
			<label class="error">Email or password are incorrect</label>
		<?php endif; ?>
	</form>
	
</div>
<div class = "widget"> 
		<p> If you are not a user , please   
		<a href = "register.php"><input name= "register" type= "submit" 
			action="register.php" value="Register"> </a> </p>
	</div>


<?php endif; ?>

</body>
</html>