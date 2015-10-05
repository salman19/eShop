<?php
	session_start();
	$rowcount = 1;

	/*	open db connection 	*/
	$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
	$server = $url["host"];
	$username = $url["user"];
	$password = $url["pass"];
	$db = substr($url["path"], 1);
	$conn = new mysqli($server, $username, $password, $db);
	if(isset($_POST['email']) && isset($_POST['password'])) {
		$email = $_POST['email'];
		$password = $_POST['password'];
		echo $rowcount;
		if ($login = $conn->query("select * from Users where email='$email' AND password='$password'")){
			echo " - ";
			echo mysqli_num_rows($login);
			echo " - ";
		}
		// Check username and password match
		$counts = mysqli_num_rows($login);
		if ($rowcount == $counts) echo " true , so there is something "; 
		echo $rowcount;
		if ($rowcount == 1) {
			echo " inside ";
			$_SESSION['user'] = $login->fetch_array();
			echo " fetched ";
			header('Location: profile.php');
			echo " redirected ";
		}
	}
	mysqli_close();
?>


<html>
<head>
	<meta charset="utf-8" />
	<title>Sign In</title>

	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<link rel="stylesheet" type="text/css" href="../css/signin.css">
	<link rel="stylesheet" type="text/css" href="../fontello/css/fontello.css">
	
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
					<td><input type="text" name="email" id="email" /><i class="icon-mail"></i></td>
				</tr>
				<tr>
					<td>Password: </td>
					<td><input type="password" name="password" id="password" required/><i class="icon-lock"></i></td>
				</tr>
				<tr><td></td></tr>
				<tr><td></td></tr>
				<tr>
					<td>&nbsp;</td>
					<td><button type="submit" name="button" id="button">Sign in <i class="icon-angle-circled-right"></i></button> 
					</td>
				</tr>
			</table>
				<?php if($rowcount != 1): ?>
					<label class="error"><i class="icon-attention"></i> Email or password are incorrect</label>
				<?php endif; ?>
			</form>
		</div>
	<?php endif; ?>
	</div>
	<script type="text/javascript" src="../js/signin.js"></script>
</body>
</html>
