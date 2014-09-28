<?php
	session_start();

	/*	open db connection 	*/
	mysql_connect('localhost', 'root', '');
	mysql_select_db('eshop');

	$purchases = mysql_query('select * from UsersProducts') or die(mysql_error());

	mysql_close();
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

			<form id="avatar-form" type="post">
				<label>upload avatar</label><br>
				<input type="file" name="avatar" id="avatar">
				<button type="submit">change</button>
			</form>
			<label id="success-msg" class="success"></label>
			<br>
			<h3>History</h3>
			<?php if(mysql_num_rows($purchases) == 0): ?>
				<label class="error"><i class="icon-attention"></i> No purchases made yet. <a href="../index.php">Go to shop</a>
			<?php else: ?>
				<ul>
					<?php while($purchase = mysql_fetch_array($purchases)): ?>
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