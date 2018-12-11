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
?>
