<?php
session_start();
include '../connect.php';
header('location:../cart.php');    
if(isset($_SESSION['userId']) && isset($_POST['submit1'])){
	
	$uId = $_SESSION['userId'];
	$pId = $_POST['prodId'];
	$amount = $_POST['amount'];
	$stmt = $pdo->query("SELECT order_id FROM orders WHERE user_id = '$uId' AND status = '1'");
	$result = $stmt->fetch();
	$oId = $result[0];
	
	if(empty($result)){
		/* STATUS = 1, IN CART /// STATUS = 2, HANDLING ORDER // STATUS = 3; SHIPPED */
		$stmt = $pdo->prepare("INSERT INTO orders (shipping, user_id, date_stamp, shipping_address, payment_method, status)
		VALUES ('0', '$uId', now(), '0', '0', '1')");
		
		$stmt->execute();
		$id = $pdo->lastInsertId();
		$stmt = $pdo->prepare("INSERT INTO order_specifics (amount, order_id,product_id)
		VALUES ('$amount', '$id', '$pId')");
		$stmt->execute();
	}else{
		
		$stmt = $pdo->prepare("SELECT product_id FROM order_specifics WHERE product_id = '$pId' AND order_id = '$oId'");
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		if(empty($result)){
			$stmt = $pdo->prepare("INSERT INTO order_specifics (amount, order_id,product_id)
			VALUES ('$amount', '$oId', '$pId')");
			$stmt->execute();
		}else{
			echo "Product already exists in this order!";
		}
	}
	
	
}
?>