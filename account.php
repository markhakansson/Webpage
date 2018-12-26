<?php
    include 'connect.php';
    include 'functions.php';
    include 'header.php';
    
    redirectIfNotLoggedIn();

?>


<div class="body_wrap" id="account">
	
    <h2>Active orders:</h2>
    <?php
    	try{
    	    $userId = $_SESSION["userId"];
    	    $status = 2;
    		
    	    $query = $pdo->prepare('SELECT * FROM orders WHERE user_id = ? AND status = ?');
    	    $query->execute([$userId, $status]);
    		
    	    if($query->rowCount()) {

                ?>
                <p><span>Click on the order ID to check the contents of your order.</span></p>
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
    			<td><a href="order.php?id=<?php echo $row["order_id"]; ?>"><?php echo $row["order_id"];?></a></td>
                        <td><?php echo $row["date_stamp"]; ?></td>
    		    	<td><?php echo "In progress"; ?></td>
    		    </tr>
    		    <?php	
    		}?>
    	        </table>
    		<?php

    	    } else {
    		echo "<span>You have no active orders.</span>";
    	    }
    	} catch (PDOException $e) {
    		echo "Error: " . $e->getMessage();
    	}	
    ?>
	
    <h2>Order history:</h2>
    <?php
    	try{
    	    $userId = $_SESSION["userId"];
    	    $status = 3;
    		
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
    		   <span> <tr>
    			<td><a href="order.php?<?php echo $row["order_id"]; ?>"><?php echo $row["order_id"];?></a></td>
    			<td><?php echo $row["date_stamp"]; ?></td>
    			<td><?php echo "Sent"; ?></td>
    		    </tr></span>
    		<?php	
    		}
                
                ?>
                </table>
    		<?php

    		} else {
    			echo "<span>You have no order history.</span>";
    		}

    	} catch (PDOException $e) {
    		echo "Error: " . $e->getMessage();
    	}
    ?>

    <h2>Update your information:</h2>
    <?php
    	$userId = $_SESSION["userId"];
    	$query = $pdo->prepare('SELECT * FROM customers WHERE user_id = ?');
    	$query->execute([$userId]);
    	$row = $query->fetch(PDO::FETCH_ASSOC);
    ?>
    <form action="php_scripts/updateInformation.php" method="post">		
    	Fullname: <br><input type="text" name="fullname" placeholder = <?php echo $row["name"]; ?>><br> 
    	Address: <br><input type="text" name="address" placeholder = <?php echo $row["address"];?>><br>
    	Phone: <br><input type="text" name="phone" placeholder = <?php echo $row["phone"];?>><br>
    	Email: <br><input type="text" name="email" placeholder = <?php echo $row["email"];?>><br>
    	<input type="submit" name="submit" value="Update">
    </form>
</div>



























