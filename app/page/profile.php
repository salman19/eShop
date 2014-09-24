<?php
	session_start();
?>

<html>
<head>
	<meta charset="utf-8" />
	<title>eShop</title>

	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<link rel="stylesheet" type="text/css" href="../css/profile.css">
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
					<img src="<?php echo $_SESSION['user']['avatar'] ?>;">
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
			<div class="error"><h3>You must sign in to view this page</h3></div>
		<?php else: ?>

		<?php endif; ?>	
	</div>

	<script src="../js/jquery-1.11.1.min.js"></script>
	<script src="../js/profile.js"></script>
</body>
</html>