<?php
	$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
	
	$server = $url["host"];
	$username = $url["user"];
	$password = $url["pass"];
	$db = substr($url["path"], 1);
	
	$conn = new mysqli($server, $username, $password, $db);
	$products = $conn->query('select * from Products') or die($conn->error());
	
?>

<html>
<head>
	<meta charset="utf-8" />
	<title>eShop</title>

	<link rel="shortcut icon" href="avatar/eshop_ico.png">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="fontello/css/fontello.css">
</head>
<body>
	<header>
		<!-- LOGO -->
		<div class="logo"><h1>eShop</h1></div>
		
		<hr>
		<!-- Register/Login button OR User session info -->
		<div class="widget">
			<?php if(isset($_SESSION['user'])): ?>
				<div class="user">
					<label><i class="icon-mail"></i> <?php echo $_SESSION['user']['email']; ?></label><br>
					<img src="<?php echo $_SESSION['user']['avatar'] ?>"><br>
					<button onclick="window.location='page/profile.php'">profile</button>
					<button id="signout">logout</button>
				</div>
			<?php else: ?>
				<button onclick="window.location='page/signin.php'">Login</button>
				<button onclick="window.location='page/register.php'">Register</button>
			<?php endif; ?>	
		</div>
	</header>

	<!-- Products -->
	<div class="container">
		<h2>Stock</h2>
		<?php while($product = mysqli_fetch_array($products)): ?>
			<section>
				<label class="product-name"><?php echo $product['name']; ?></label><br>
				<img src="<?php echo $product['image_url'] ?>">
				<!-- BUY / OUT OF STOCK -->
				<div class="product-info">
					<?php if($product['stock'] == 0): ?>
						<label class="error">out of stock</label>
					<?php else: ?>
						<form action="page/buy.php" method="post">
							<input type="hidden" name="product_id" value="<?php echo $product['id'];?>">
							<button type="submit">
								Buy</button>
						</form>
						<label class="price-tag"><i class="icon-tag"></i><?php echo $product['price']; ?></label>
					<?php endif; ?>
				</div>
			</section>
		<?php endwhile; ?>	
	</div>

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/index.js"></script>
</body>
</html>
