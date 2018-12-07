<?php
	session_start();
	include 'connect.php'; 
	include 'functions.php';
	include 'header.php';
?>

<div class = "account-page">
	
	<h2>Active orders:<h2><br>
	<?php
		$query = "SELECT * FROM orders WHERE user_id = ? AND status = 'in_progress' ";
		$query = $pdo->prepare($query);
		$query = $pdo->execute([$_SESSION["user_id"]]);
		
		if($query->rowCount()) {
			?>
			<table border="0">
				<tr>
					<th>Order ID</th>
					<th>Date</th>
					<th>Status</th>
				</tr>
			<?php
			while($row = $query->fetch(PDO::FETCH_ASSOC) ){
				?>
					<tr>
						<td><?php echo $row["order_id"]; ?></td>
						<td><?php echo $row["date_stamp"]; ?></td>
						<td><?php echo $row["status"]; ?></td>
					</tr>
				<?php	
			}
		} else {
			echo "You have no active orders.";
		}
		
	?>
	
	<h2>Order history:</h2><br>
	<?php
		$query = "SELECT * FROM orders WHERE user_id = ? AND status = 'sent' ";
		$query = $pdo->prepare($query);
		$query = $pdo->execute([$_SESSION["user_id"]]);
		
		if($query->rowCount()) {
			?>
			<table border="0">
				<tr>
					<th>Order ID</th>
					<th>Date</th>
					<th>Status</th>
				</tr>
			<?php
			while($row = $query->fetch(PDO::FETCH_ASSOC) ){
				?>
					<tr>
						<td><?php echo $row["order_id"]; ?></td>
						<td><?php echo $row["date_stamp"]; ?></td>
						<td><?php echo $row["status"]; ?></td>
					</tr>
				<?php
				
			}
		} else {
			echo "You have no order history.";
		}
		
		
		
	?>

</div>