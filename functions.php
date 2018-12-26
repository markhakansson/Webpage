<?php
    function selProd($pdo){
	$stmt = $pdo->query("SELECT * FROM products WHERE product_id = 1"); 
	$row = $stmt->fetch();
	return $row;
    }
	
    function selProdID($pdo, $id){
	$stmt = $pdo->query("SELECT * FROM products WHERE product_id = '$id'"); 
	$row = $stmt->fetch();
	return $row;
    }
		
		
    function redirectIfNotLoggedIn() {
        if(!isset($_SESSION["userId"])) {
            header("Location: index.php");
        }
    }
	   
    function getUserPosition($user_id, $pdo) {
	$stmt =  $pdo->prepare("SELECT role FROM users WHERE user_id = ?");
	$stmt->execute([$user_id]);
	$row = $stmt->fetchColumn();
	return $row;
    }
	   
    function userIsEmployee($user_id, $pdo) {
	$role = getUserPosition($user_id, $pdo);
	if($role == 2) {
	    return true;
	} else {
	    return false;
	}
    }
	   
    function userIsAdmin($user_id, $pdo) {
	$role = getUserPosition($user_id, $pdo);
	if($role == 3) {
	    return true;
	} else {
	    return false;
	}
    }
    
    function redirectIfNotEmployeeOrAdmin($userId, $pdo) {
        if(!userIsEmployee($userId, $pdo) and !userIsAdmin($userId, $pdo)) {
            header("Location: index.php");
        }
    }      
?>