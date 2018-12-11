<?php
session_start();
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
	<link rel="stylesheet" type="text/css" href="css/cart.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

	
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
			}else{
				echo '<div class="item"><a href="logout.php">Logout</a></div>
					  <div class="item"><a href="cart.php">My Cart</a></div>';
			}
		echo '</div>
	</div>';
?>
