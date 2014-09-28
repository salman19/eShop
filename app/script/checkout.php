<?php
	if(isset($_POST['product_id'])){
		mysql_connect('localhost', 'root', '');
		mysql_select_db('eshop');
		$query = mysql_query("select * from Products where id = " . $_POST['product_id'])
			or die(mysql_error());
		$product = mysql_fetch_array($query);

		if(mysql_num_rows($query) == 1){
			mysql_query("update Products set stock=" . ($product['stock']-1) . 
				" where id=" . $_POST['product_id']) or die(mysql_error());
			mysql_close();
			echo "Congrats! you got it.";
		}
		else
			echo "product doesn't exit;";
	}
	else
		echo "server error";
?>