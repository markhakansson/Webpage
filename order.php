<?php
    session_start();
    include 'connect.php';
    include 'functions.php';
    include 'header.php';
   
    redirectIfNotLoggedIn();
		
?>

<div class = "order-page">
	<?php
		$orderId = $_GET["id"];
		$stmt = $pdo->prepare("SELECT user_id WHERE order_id = ?");
		$stmt->execute([$orderId]);
		$test = $stmt->fetch();
		echo $test;
	?>
</div>
