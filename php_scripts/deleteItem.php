<?php
include '../connect.php';
session_start();
if(isset($_SESSION['userId']) && isset($_POST['submit2'])){
	
	$uId = $_SESSION['userId'];
	$pId = $_POST['prodId'];
	$oId = $_POST['orderId'];
	$stmt = $pdo->prepare("DELETE FROM os
	USING order_specifics AS os
	WHERE os.order_id = '$oId'
	AND os.product_id = '$pId'");
	$stmt->execute();
	header("location:../cart.php");
}
?>