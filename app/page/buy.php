<?php 
	session_start();

	if (isset($_POST['product_id'])) {
		$product_id = $_POST['product_id'];
	} else
		die("Server error");

	/*	open db connection 	*/
	mysql_connect('localhost', 'root', '');
	mysql_select_db('eshop');

	$query = mysql_query("select * from Products where id = $product_id");
	mysql_close();

	$product = mysql_fetch_array($query);
	
?>

<html>
<head>
	<meta charset="utf-8" />
	<title>eShop</title>

	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<link rel="stylesheet" type="text/css" href="../fontello/css/fontello.css">
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
					<button onclick="window.location='profile.php'">profile</button>
					<button id="signout">logout</button>
				</div>
			<?php endif; ?>
		</div>
	</header>

	<div class="container">
		<h2>Transaction</h2>
		<?php if (!isset($_SESSION['user'])): ?>
			<big class="error"><i class="icon-attention"></i>you must log in to complete this transaction.</big>
			 Please <a href="signin.php">sign in</a> or <a href="regester.php">register</a> before performing this transaction
		<?php else: ?>
			<ul>
				<li><?php echo $product['name'] ?></li> <i class="icon-dollar"></i><?php echo $product['price'] ?>
			</ul>
			
			<input type="hidden" id="product_name" value="<?php echo $product['name'] ?>">
			<input type="hidden" id="product_id" value="<?php echo $product_id ?>">
			<input type="hidden" id="user_id" value="<?php echo $_SESSION['user']['id'] ?>">
			<br><button id="checkout"><i class="icon-basket"></i> Checkout</button>
		<?php endif; ?>
	</div>

	<script src="../js/jquery-1.11.1.min.js"></script>
	<script src="../js/buy.js"></script>
</body>
</html>