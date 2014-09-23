<?php
	/*open db connection*/
	mysql_connect('localhost', 'root', '');
	mysql_select_db('eshop');

	$products = mysql_query('select * from Products') or die(mysql_error());

	$_SESSION['user'] = mysql_fetch_array(mysql_query('select * from Users'));

	mysql_close();
?>

<html>
<head>
	<meta charset="utf-8" />
	<title>eShop</title>

	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
	<header>
		<!-- LOGO -->
		<div class="logo"><h1>eShop</h1></div>
			
		<!-- Register/Login button OR User session info -->
		<div class="widget">
			<?php if(isset($_SESSION['user'])): ?>
				<div class="user">
					<label><?php echo $_SESSION['user']['email']; ?></label>
					<img src="<?php echo $_SESSION['user']['avatar'] ?>;">
					<button>profile/history</button>
					<button id="signout">sign out</button>
				</div>
			<?php else: ?>
				<button onclick="window.location='script/signin.php'">Login</button>
				<button onclick="window.location='script/register.php'">Register</button>
			<?php endif; ?>	
		</div>
	</header>

	<!-- Products -->
	<div class="container">
		<h2>Stock</h2>
		<?php while($product = mysql_fetch_array($products)): ?>
			<section>
				<label class="product-name"><?php echo $product['name']; ?></label>
				<img src="<?php echo $product['image_url'] ?>">
				<!-- BUY / OUT OF STOCK -->
				<div class="product-info">
					<?php if($product['stock'] == 0): ?>
						<label class="error">out of stock</label>
					<?php else: ?>
						<form action="script/buy.php" method="post">
							<input type="hidden" name="product_id" value="<?php echo $product['id'];?>">
							<button type="submit">Buy</button>
						</form>
						<label class="price-tag"><?php echo $product['price']; ?></label>
					<?php endif; ?>
				</div>
			</section>
		<?php endwhile; ?>	
	</div>

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/index.js"></script>
</body>
</html>