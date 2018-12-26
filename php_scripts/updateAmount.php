<?php
include '../connect.php';
session_start();
if(isset($_SESSION['userId']) && isset($_POST['submit1'])){
	
	$uId = $_SESSION['userId'];
	$pId = $_POST['prodId'];
	$amount = $_POST['amount'];
	$oId = $_POST['orderId'];
	$stmt = $pdo->prepare("UPDATE order_specifics 
	SET order_specifics.amount='$amount'
	WHERE order_specifics.order_id = '$oId'
	AND order_specifics.product_id = '$pId'");
	$stmt->execute();
	if($_POST['update'] == 1){
		
		$id = $_POST['page_id'];
		header("location:../product_page.php?id=$id");
	}else{
		header("location:../cart.php");
	}
}
?>