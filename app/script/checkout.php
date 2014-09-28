<?php
	if(isset($_POST['product_id']) && isset($_POST['user_id']) && isset($_POST['product_name'])){
		$product_id = $_POST['product_id'];
		$product_name = $_POST['product_name'];
		$user_id = $_POST['user_id'];

		mysql_connect('localhost', 'root', '');
		mysql_select_db('eshop');
		$query = mysql_query("select * from Products where id = $product_id")
			or die(mysql_error());
		$product = mysql_fetch_array($query);

		if(mysql_num_rows($query) == 1){
			mysql_query("update Products set stock=" . ($product['stock']-1) . 
				" where id=$product_id" ) or die(mysql_error());
			mysql_query("
				insert into UsersProducts(user_id, product_id, product_name) 
				values($user_id, $product_id, '$product_name')")
			 or die(mysql_error());
			mysql_close();
			echo "Congrats! you got it.";
		}
		else
			echo "product doesn't exit;";
	}
	else
		echo "server error";
?>