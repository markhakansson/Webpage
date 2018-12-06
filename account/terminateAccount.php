<?php
	session_start();
    header('Content-Type: text/html; charset=ISO-8859-1');
	include '../header.php'
?>

<!DOCTYPE html>
<html lang="sv">
<head>
</head>
<body>
<div class="terminate_container">		
	<a href = "index.php">Go to home</a>
	<h2>Account termination</h2>
	<p>If you want to terminate your account, please input your password.
	   Remember this will <b>DELETE ALL</b> your personal information from this website. </p>
	<form method = "post">
    <div>
		<label for="password">Password:</label>
    	<input type="password" name="password">
   	</div>

	<div>
        <input type="submit" name="submit" value="Terminate account">
        <span class="required">
		</span>
    </div>

	</form>
</div>

<?php 
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		if(!empty($_POST["password"])) {
			echo "Goodday to you";
		} else {
			echo "Didn't work :(";
		}
	} 
?>

</body>
</html>