<?php
	$servername = "utbweb.its.ltu.se:3306";
	$username = "930807";
	$password = "930807";
	$database = "db930807";

try {
		$pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
		// set the PDO error mode to exception
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
		echo "Connection failed: " . $e->getMessage();
    }
?> 