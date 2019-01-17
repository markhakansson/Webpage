<?php 
session_start();
include '../connect.php';
/* Begin transaction, update the amount of the order, process the order, confirm order */

try{
	$pdo->beginTransaction();
	$uId = $_SESSION['userId'];
	$oId = $_POST['orderId'];
	
	// UPDATE THE CART TO STATUS ORDERED
	$stmt = (
		"UPDATE orders 
		SET status = '2'
		WHERE user_id = '$uId'
		AND order_id = '$oId'
		AND status = '1'"
		);
	$pdo->prepare($stmt);
	$pdo->exec($stmt);
	
	// SUBTRACT THE AMOUNT IN THE ORDER SO THE STORE CAN REPRESENT ACCURATE VALUE
	$stmt =  $pdo->query("SELECT  order_specifics.amount, products.product_id FROM products 
	INNER JOIN order_specifics ON order_specifics.product_id = products.product_id
	INNER JOIN orders ON order_specifics.order_id = orders.order_id
	WHERE orders.user_id = '$uId' AND orders.status = '2'");
	$result = $stmt->fetchAll();
	foreach($result as $row){
		$stms = $pdo->query("UPDATE products SET stock = stock - $row[0]
							WHERE products.product_id = '$row[1]'");
		$pdo->prepare($stmt);
		$pdo->exec($stmt);	
	}
	
	// UPDATE PRICE IN ORDER_SPECIFICS TO PRODUCT PRICE
	$stmt = $pdo->prepare("
		UPDATE order_specifics
		INNER JOIN products ON order_specifics.product_id = products.product_id
		SET order_specifics.price = products.price
		WHERE order_specifics.order_id = ?
		");
	$stmt->execute([$oId]);
	
	$pdo->commit();
		/* Subtract amount available in store */
		header('Location: ../purchase.php');
}catch(PDOException $e) {
            $pdo->rollBack();
            die($e->getMessage());
        }

