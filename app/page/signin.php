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
	mysql_close();
?>


<html>
<head>
	<meta charset="utf-8" />
	<title>Sign In</title>

	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<link rel="stylesheet" type="text/css" href="../css/signin.css">
	
</head>
<body>

	<header>
		<!-- LOGO -->
		<div class="logo"><h1><a href="../index.php">eShop</a></h1></div>
		<hr>
		if not a user
		<button onclick="window.location='register.php'">Register</button>
	</header>

	<div class="container">
		<?php if(isset($_SESSION['user'])): ?>
			<h2> You are already signed in</h2>
		<?php else: ?>
		
		<div class= "form">	
			<form id="signin" name="signin" method="post" action="" 
				onsubmit="return validateForm(this)"> 
			
			<table width="510" border="0">
				<tr>
					<td><h2>Log in</h2></td>
					<td><div id="error"></div></td>
				</tr>
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
					<td><button type="submit" name="button" id="button">Sign in</button> 
					</td>
				</tr>
			</table>
				<?php if($rowcount != 1): ?>
					<label class="error">Email or password are incorrect</label>
				<?php endif; ?>
			</form>
		</div>
	<?php endif; ?>
	</div>
	<script type="text/javascript" src="../js/signin.js"></script>
</body>
</html>