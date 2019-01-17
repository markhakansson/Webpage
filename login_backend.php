<?php
    $usernameErr = $passwordErr = $loginMsg = "";
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
				$password = $_POST["password"]; 
			} else {
				$passwordErr = "Password field is empty!";
			}
			
			// Get password from database
			$pwQuery = $pdo->prepare("SELECT password FROM users WHERE username = ?");
			$pwQuery->execute([$username]);
			$passwordHash = $pwQuery->fetchColumn();
			
			// Verify password with the stored one in DB
			if(password_verify($password, $passwordHash)) {
				$idQuery = $pdo->prepare("SELECT user_id FROM users WHERE username = ?");
				$idQuery->execute([$username]);
				$userId = $idQuery->fetchColumn();
				$nameQuery = $pdo->prepare("SELECT name FROM customers WHERE user_id = ?");
				$nameQuery->execute([$userId]);
				$fullname = $nameQuery->fetchColumn();
				$roleQuery = $pdo->prepare("SELECT role FROM users WHERE user_id = ?");
				$roleQuery->execute([$userId]);
				$role = $roleQuery->fetchColumn();
				
				// If user is found update session variables
				if($userId) {
					$_SESSION['userId'] = $userId;
					$_SESSION["fullname"] = $fullname;
					$loginMsg = "Login successful! Welcome $fullname!";
					if($role = "1") {redirectToUrl("index.php");}
					if($role = "2" || $role = "3"){redirectToUrl("admin.php");}
				} else {
					$loginMsg = "Wrong username or password!";
				}
			}
        }
    } catch(PDOException $e) {
        echo "Error, please contact admin. Error code: " . $e->getMessage();
    }	
	
?>