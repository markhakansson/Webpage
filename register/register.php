<?php
include '../connect.php';

//DB Login https://d0018e-232709.phpmyadmin.mysql.binero.se/

?>

<html>
<head>
<title>WebShop</title>
</head>
<body>

<form action="submitRegistration.php" method="post">
	<h1>User registration</h1>
	Username: <input type="text" name="username"><br>
	Password: <input type="text" name="password"><br>		Name: <input type="text" name="name"><br>		Email: <input type="text" name="email"><br>		Address: <input type="text" name="address"><br>	
	National Identification Number: <input type="text" name="nin"><br>
	Phone number: <input type="text" name="phone"><br>
	<input type="submit">		<h1>when you register you give up all your rights according to GDPR, yes we can do that its totally legal</h1>	
</form>

</body>
</html>

