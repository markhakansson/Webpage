<?php	
	ob_start();
	include 'header.php';
	include 'connect.php';

	
	// Check if cart is empty
	$total = 0;
	$uId = $_SESSION['userId'];
	$stmt = $pdo->query("SELECT products.price, name, picture, products.product_id, order_specifics.amount, orders.order_id FROM products 
	INNER JOIN order_specifics ON order_specifics.product_id = products.product_id
	INNER JOIN orders ON order_specifics.order_id = orders.order_id
	WHERE orders.user_id = '$uId' AND orders.status = '1'");
	$result = $stmt->fetchAll();
	//loop out items
	
	if(empty($result)){
		echo "Empty!";
	}
	
	foreach($result as $row){
		$total += $row[0]*$row[4];
		echo '<div class = "cart_item_wrapper">
				<form action="php_scripts/deleteItem.php" method="post">
					<button type="submit" name="submit2" value="submit" class="deleteButton"><span>x</span></button>
					<input type="hidden" value="'.$row[3].'" name="prodId">
					<input type="hidden" value="'.$row[5].'" name="orderId">
				</form>
				<form action="php_scripts/updateAmount.php" method="post">
					<button type="submit" name="submit1" value="submit" class="updateButton"><p id="edit">Edit</p></button>
					<input type="hidden" value="'.$row[3].'" name="prodId">
					<input type="hidden" value="'.$row[5].'" name="orderId">
					<div class="updateAmount"><input value="'.$row[4].'" name="amount"></div>
				</form>
				<div class = "cart_item_image"><img src="'.$row[2].'" alt="img" id="cart_img"></div>
				<div class = "cart_text"><p>'.$row[1].'</br><span id="price">'.$row[0].' SEK</span></p></div>
			</div>';
	}
	if(!empty($total)) {
		echo '<div id="total"><p>'.$total.' <span>SEK</span></p>
		<form action="php_scripts/transaction.php" method="post">
			<input type="hidden" value="'.$row[5].'" name="orderId">
			<button type="submit" name="submit1" value="submit" class="checkOut">Purchase</button>
		</form></div>';
	}
	