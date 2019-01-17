<?php
	ob_start();
	include 'header.php';
	include 'connect.php';
?><div class="register_container" id="register">
<form action="submitRegistration.php" method="post">
	<h1>User registration</h1>

	Username: <input type="text" name="username"><br>
	Password: <input type="password" name="password"><br>		Name: <input type="text" name="name"><br>		Email: <input type="text" name="email"><br>		Address: <input type="text" name="address"><br>	
	National Identification Number: <input type="text" name="nin"><br>
	Phone number: <input type="text" name="phone"><br>
	<input type="submit" value="Register">		<p>when you register you give up all your rights according to GDPR, yes we can do that its totally legal</p>
	
</form>
</div>
</body>
</html>

