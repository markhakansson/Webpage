<?php
    include 'connect.php';
    include 'functions.php';
    include 'header.php';
    
?>
<?php
	try{
   
	
	$stmt = $pdo->prepare("INSERT INTO products (name, description, price, stock, picture)
	VALUES (:name, :description, :price, :stock, :image)");
	
	$stmt->bindParam(':name', $name);
	$stmt->bindParam(':description', $description);
	$stmt->bindParam(':price', $price);
	$stmt->bindParam(':stock', $stock);
	$stmt->bindParam(':image', $image);
	
	$name = $_POST["name"];
	$description = $_POST["description"];
	$price = $_POST["price"];
	$stock = $_POST["stock"];
	$image = 'images/'.$_FILES["fileToUpload"]["name"];
	 
		
	$stmt->execute();
	
	echo 'posted!';
}
catch(PDOException $e)
{
	echo "Error: " . $e->getMessage();
}
$pdo = null;
?>