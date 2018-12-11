<?php
    session_start();
    include 'connect.php';
    include 'functions.php';
    include 'header.php';
   
    redirectIfNotLoggedIn();
    
    // Have to check if the order belongs to user or if an employee is reading this
    $orderId = $_GET["id"];
    $stmt = $pdo->prepare("SELECT user_id FROM orders WHERE order_id = ?");
    $stmt->execute([$orderId]);
    $userId = $stmt->fetchColumn();
        
    if($userId != $_SESSION["userId"] && !userIsEmployee($_SESSION["userId"], $pdo)) {
        header("Location: index.php");
    }
?>    

<div class = "order-page">
    <h2>Order specification ID #<?php echo $orderId; ?>:</h2>
    <?php
    try{
        $stmt = $pdo->prepare("SELECT * FROM order_specifics WHERE order_id = ?");
        $stmt->execute([$orderId]);
        
        if($stmt->rowCount()) {

            ?>
            <table border = "0">
            <tr>
            <th>Product name</th>
            <th>Product ID</th>
            <th>Amount</th>
            <th>Price per unit</th>
            <th>Total price</th>
            </tr>
            <?php
           
            // Problem here is that the same PDO is used for queries. Gives no results in $prodQuery.... 
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $prodId = $row["product_id"];
                $prodQuery = $pdo->prepare("SELECT * FROM products WHERE product_id = ?");
                $prodQuery->execute([$productId]);
                $product = $prodQuery->fetch(PDO::FETCH_ASSOC);

                ?>
                <tr>
                <td><?php echo $product["name"];?></td>
                <td><?php echo $prodId;?></td>
                <td><?php echo $row["amount"];?></td>
                <td><?php echo $product["price"];?></td>
                <td><?php echo $row["amount"]*$product["price"];?></td>
                </tr>

                <?php
            } ?>
            </table>
            <?php
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();    
    }
    ?>
        
</div>
