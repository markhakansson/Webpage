<?php
	ob_start();
	include 'header.php';
	include 'connect.php';
?>
<form action="submitRegistration.php" method="post">
	<h1>User registration</h1>

	Username: <input type="text" name="username"><br>
	Password: <input type="password" name="password"><br>
	National Identification Number: <input type="text" name="nin"><br>
	Phone number: <input type="text" name="phone"><br>
	<input type="submit" value="Register">
	
</form>
</div>
</body>
</html>
