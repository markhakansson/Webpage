<?php
session_start();
include 'connect.php';

    $usernameErr = $passwordErr = $robotCheckErr = $loginMsg = "";

    try{
        if($_SERVER["REQUEST_METHOD"] == "POST") {
			// Trim unnecessary characters
            if(!empty($_POST["username"])) {
				$username = trim($_POST["username"]);
				$username = stripslashes($username);
				$username = strtolower($username);
				$username = htmlspecialchars($username);
			} else {
				$usernameErr = "Username field is empty!";
			}

			if(!empty($_POST["password"])) {
				$password = $_POST["password"]; // use htmlspecialchars here
			} else {
				$passwordErr = "Password field is empty!";
			}

			if(!empty($_POST["robotCheck"])) {
				$robotCheck = $_POST["robotCheck"];
			} else {
				$robotCheckErr = "SO YOU ARE A ROBOT HUH?!";
			}

			$idQuery = $pdo->prepare("SELECT user_id FROM users WHERE username = ? AND password = ? ");
			$idQuery->execute([$username, $password]);
			$userId = $idQuery->fetchColumn();

			$nameQuery = $pdo->prepare("SELECT name FROM customers WHERE user_id = ?");
			$nameQuery->execute([$userId]);
			$fullname = $nameQuery->fetchColumn();
            if($userId && !$robotCheckErr) {
                $_SESSION['userId'] = $userId;
                $_SESSION["fullname"] = $fullname;
                $loginMsg = "Login successful! Welcome $fullname!";
				echo $_SESSION['userId'];
            } else {
                $loginMsg = "Wrong username or password!";
            }
        }
    } catch(PDOException $e) {
        echo "Error, please contact admin. Error code: " . $e->getMessage();
    }	

?>