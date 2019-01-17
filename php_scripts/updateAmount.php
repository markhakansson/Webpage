<?php
	ob_start();
	session_start();
	include '../connect.php';
	include '../functions.php';
	
	if(isset($_SESSION['userId']) && isset($_POST['submit1'])){
		
		
		$uId = $_SESSION['userId'];
		$pId = $_POST['prodId'];
		$amount = $_POST['amount'];
		$oId = $_POST['orderId'];
		$stmt = $pdo->prepare("UPDATE order_specifics os
								SET os.amount= ?
								WHERE os.order_id = ? AND os.product_id = ?");
		$stmt->execute([$amount, $oId, $pId]);
				
		if($_POST['update'] == 1){
			$id = $_POST['page_id'];
			redirectToUrl("../product_page.php?id=$id");
			//header("location:../product_page.php?id=$id");
		}else{
			redirectToUrl("../cart.php");
			//header("location:../cart.php");
		} 
	}
?>