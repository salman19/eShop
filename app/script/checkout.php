<?php
	if(isset($_POST['product_id']) && isset($_POST['user_id']) && isset($_POST['product_name'])){
		$product_id = $_POST['product_id'];
		$product_name = $_POST['product_name'];
		$user_id = $_POST['user_id'];

		$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
		$server = $url["host"];
		$username = $url["user"];
		$password = $url["pass"];
		$db = substr($url["path"], 1);
		$conn = new mysqli($server, $username, $password, $db);
		
		$query = $conn->query("select * from Products where id = $product_id")
			or die(mysqli_connect_error());
		$product = mysqli_fetch_array($query);

		if($conn->num_rows($query) == 1){
			$conn->query("update Products set stock=" . ($product['stock']-1) . 
				" where id=$product_id" ) or die(mysqli_connect_error());
			$conn->query("
				insert into UsersProducts(user_id, product_id, product_name) 
				values($user_id, $product_id, '$product_name')")
			 or die(mysqli_connect_error());
			mysqli_close();
			echo "Congrats! you got it.";
		}
		else
			echo "product doesn't exit;";
	}
	else
		echo "server error";
?>
