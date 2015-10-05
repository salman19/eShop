<?php
	session_start();

	/*	open db connection 	*/
	$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
	$server = $url["host"];
	$username = $url["user"];
	$password = $url["pass"];
	$db = substr($url["path"], 1);
	$conn = new mysqli($server, $username, $password, $db);

	$purchases = $conn->query('select * from UsersProducts') or die(mysqli_connect_error());

	mysqli_close();
?>

<html>
<head>
	<meta charset="utf-8" />
	<title>eShop</title>

	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<link rel="stylesheet" type="text/css" href="../css/profile.css">
	<link rel="stylesheet" type="text/css" href="../fontello/css/fontello.css">s
</head>
<body>
	<header>
		<!-- LOGO -->
		<div class="logo"><h1><a href="../index.php">eShop</a></h1></div>
			
		<!-- Register/Login button OR User session info -->
		<div class="widget">
			<?php if(isset($_SESSION['user'])): ?>
				<div class="user">
					<label><?php echo $_SESSION['user']['email']; ?></label>
					<img src="<?php echo '../' . $_SESSION['user']['avatar'] ?>">
					<button onclick="window.location='../index.php'">shop</button>
					<button id="signout">logout</button>
				</div>
			<?php else: ?>
				<button onclick="window.location='signin.php'">Login</button>
				<button onclick="window.location='register.php'">Register</button>
			<?php endif; ?>	
		</div>
	</header>

	<!-- Products -->
	<div class="container">
		<h2>Profile</h2>
		<?php if(!isset($_SESSION['user'])): ?>
			<div class="error"><i class="icon-attention"></i>You must sign in to view this page</div>
		<?php else: ?>
			<img src="../<?php echo $_SESSION['user']['avatar'] ?>">
			<big><label><?php echo $_SESSION['user']['first_name'];?> <?php echo $_SESSION['user']['last_name'];?></label></big>
			<br><label><?php echo $_SESSION['user']['email'];?></label>

			<form id="profile-form">
				<label><i class="icon-user"></i>Update Profile</label><br>
				<input type="text" name="first_name" id="first_name" value="<?php echo $_SESSION['user']['first_name'];?>" required>
				<input type="text" name="last_name" id="last_name" value="<?php echo $_SESSION['user']['last_name'];?>" required>
				<br>
				<input type="text" name="email" id="email" value="<?php echo $_SESSION['user']['email'];?>" required>
				<input type="password" name="password" id="password" value="<?php echo $_SESSION['user']['password'];?>" required>
				<button type="submit">Save Changes</button>
			</form>
			<form id="profile-form">
				<label><i class="icon-user"></i>Upload avatar</label><br>
				<input type="file" name="avatar" id="avatar"  required>
				<button type="submit">Upload</button>
			</form>
			<label id="success-msg" class="success"></label>
			<br>
			<h3>History</h3>
			<?php if($conn->num_rows($purchases) == 0): ?>
				<label class="error"><i class="icon-attention"></i> No purchases made yet. <a href="../index.php">Go to shop</a>
			<?php else: ?>
				<ul>
					<?php while($purchase = mysqli_fetch_array($purchases)): ?>
						<li style="list-style:none;">
							<i class="icon-angle-circled-right"></i> You bought <b><?php echo $purchase['product_name'] . '</b> at <i>'. $purchase['bought_at'] ?></i>.
						</li>
					<?php endwhile; ?>
				</ul>
			<?php endif; ?>	
		<?php endif; ?>
	</div>

	<script src="../js/jquery-1.11.1.min.js"></script>
	<script src="../js/profile.js"></script>
</body>
</html>
