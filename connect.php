<?php
	$servername = "markhakansson.com.mysql";
	$username = "markhakansson_com_example";
	$password = "Xbvc1811";
	$database = "markhakansson_com_example";

	try {
		$pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
		// set the PDO error mode to exception
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
		echo "Connection failed: " . $e->getMessage();
    }
?> 