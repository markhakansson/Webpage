<?php
	session_start();
	include '../connect.php';
	include '../functions.php';
	include '../header.php';
?>


<div class = "account-page">
	
	<h2>Active orders:</h2><br>
	<?php
		try{
			$userId = $_SESSION["userId"];
			$status = "in_progress";
			
			$query = $pdo->prepare('SELECT * FROM orders WHERE user_id = ? AND status = ?');
			$query->execute([$userId, $status]);
			
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
							<td><?php echo "In progress"; ?></td>
						</tr>
					<?php	
				}?>
				</table>
			<?php
			} else {
				echo "You have no active orders.";
			}
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
	?>
	
	<h2>Order history:</h2><br>
	<?php
		try{
			$userId = $_SESSION["userId"];
			$status = "sent";
			
			$query = $pdo->prepare('SELECT * FROM orders WHERE user_id = ? AND status = ?');
			$query->execute([$userId, $status]);
			
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
							<td><?php echo "Sent"; ?></td>
						</tr>
					<?php	
				}?>
				</table>
			<?php
			} else {
				echo "You have no order history.";
			}
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
	?>

</div>
