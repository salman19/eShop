<?php
	/*open db connection*/
	mysql_connect('localhost', 'root', '');
	mysql_select_db('eshop');

	$result = mysql_query('select * from Products') or die(mysql_error());
	$products = mysql_fetch_array($result);

	mysql_close();
?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
	<!-- LOGO -->
	<div class="logo">LOGO</div>
		
	<!-- Register/Login button OR User session info -->
	<div class="widget">
		<?php if(isset($_SESSION['user'])): ?>
			<div class="user"></div>
		<?php else: ?>
			<button>Login</button>
			<button>Register</button>
		<?php endif; ?>	
	</div>

	<!-- Products -->
	<div class="container">
		<?php foreach ($products as $product): ?>

			<section>
				<label><?php echo $product['name']; ?></label>
				<img src="<?php echo $product['image_url']; ?>">
				<!-- BUY / OUT OF STOCK -->
				<?php if($product['stock'] == 0): ?>
					<label class="error">out of stock</label>
				<?php else: ?>
					<div class="product-info">
						<button>Buy</button>
						<label class="price-tag"><?php echo $product['price']; ?></label>
					</div>
				<?php endif; ?>
			</section>
		<?php endforeach; ?>	
	</div>
</body>
</html>