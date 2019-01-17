<?php
	ob_start();
	session_start();
	include 'connect.php';

	echo'
	<!DOCTYPE html>
	<html lang="sv">
	<head>
		<meta charset="utf-8">
		<title>Webster</title>
		<link rel="stylesheet" type="text/css" href="css/design.css">
		<link rel="stylesheet" type="text/css" href="css/read_review_design.css">
		<link rel="stylesheet" type="text/css" href="css/read_article_design.css">
		<link rel="stylesheet" type="text/css" href="css/article_design.css">
		<link rel="stylesheet" type="text/css" href="css/login.css">
		<link rel="stylesheet" type="text/css" href="css/register.css">
		<link rel="stylesheet" type="text/css" href="css/cart.css">
		<link href="http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900italic,900" rel="stylesheet" type="text/css">
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	</head>
	
	<body>
	<!-- Skapar logotyp samt meny !-->
	<div class="logo"><p>WEBSTER<p></div>
		<div class="menu">
			<div class="item_wrap centring">
				<div class="item"><a href="index.php">Home</a></div>
				<div class="item"><a href="products.php">Products</a></div>';
				
				if(empty($_SESSION['userId'])){
					echo '<div class="item"><a href="login.php">Login</a></div>';
					echo '<div class="item"><a href="register.php">Register</a></div>';
				} else {		
					$uId = $_SESSION['userId'];
					$stmt = $pdo->query("SELECT role FROM users WHERE user_id = '$uId'");
					$result = $stmt->fetch();
					if($result[0] == 2){
						echo '
							<div class="item"><a href="cart.php">My Cart</a></div>
							<div class="item"><a href="admin.php">Admin</a></div>
							<div class="item"><a href="logout.php">Logout</a></div>';
					} else {
						echo '
							<div class="item"><a href="cart.php">My Cart</a></div>
							<div class="item"><a href="account.php">Settings</a></div>
							<div class="item"><a href="logout.php">Logout</a></div>';				
					}
				}
		echo '</div>
	</div>';
?>