<?php
	session_start();
    header('Content-Type: text/html; charset=ISO-8859-1');
	include '../connect.php';
	include '../header.php';

	$password = $passwordErr = "";
	
	if($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["userId"])) {
		if(!empty($_POST["password"])) {
			$password = $_POST["password"];
		} else {
			$passwordErr = "Password field is empty!";
		}
	
		// Should only delete from users and reviews
		// because we might need information on orders
		if(!empty($passwordErr)) {
			
		}	
	}

 	

?>


<div class="terminate_container">		
	<a href = "index.php">Go to home</a>
	<h2>Account termination</h2>
	<p>If you want to terminate your account, please input your password.
	   Remember this will <b>DELETE ALL</b> your personal information from this website. Data on
	   purchases and orders will be kept for 3 years from date of purcase. This is due to the product warranty we give you.</p>
	<form method = "post">
    <div>
		<label for="password">Password:</label>
		<input type="password" name="password">
   	</div>

	<div>
        <input type="submit" name="submit" value="Terminate account">
		<?php echo "$passwordErr";?>
    </div>

	</form>
</div>
