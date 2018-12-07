<?php
	session_start();
    header('Content-Type: text/html; charset=ISO-8859-1');
	include '../connect.php';
	include '../header.php';

	$password = $passwordErr = "";
	
	// Should only delete from users and reviews
	// because we might need information on orders
	if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION["userId"])) {
		if(!empty($_POST["password"])) {
			$password = $_POST["password"]; // use htmlspecialchars here
		} else {
			$passwordErr = "Password field is empty!";
		}
		
		$idQuery = "SELECT user_id FROM users WHERE username = ? AND password = ?";
		$idQuery = $pdo->prepare($idQuery);
		$idQuery->execute([$_SESSION["userId"], $password]);
		$userId = $idQuery->fetchColumn;
		
		// Checks for matching username/password
		if($userID && !$passwordErr ) {
			echo "Nothing happened. This feature is not implemented yet.";
			//TODO: remove account and sensitive data.
			//Might be good to use an "active" column in users and customers

			//session_unset();
			//session_destroy();
		} else {
			$passwordErr = "Wrong password!";
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
