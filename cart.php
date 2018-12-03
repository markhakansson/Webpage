<?php	
	include 'connect.php';
	include 'header.php';

	// Check if cart is empty
	
	
	//loop out items
	for($x=0; $x<10; $x++){
		echo '<div class = "cart_item_wrapper">
				<div class = "cart_item_image">content</div>
				<div class = "cart_text">content</div>
				<div class = "cart_price">299kr</div>
			</div>';
	}