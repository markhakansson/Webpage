<?php
	include 'connect.php';
	include 'functions.php';
	include 'header.php';

	$id = $_GET['id'];
	$row = selProdID($pdo, $id);
?>
	
	<div class="body_wrap centring box">
		<!-- Rubrik !-->
		
	<?php
		
echo'
	<div id="header" class="centring"><h1>'.$row[3].'</h1></div>
		
		
		<!-- Skapar bild !-->
		<div class="review_img">
			<img src="'.$row[5].'" alt="">
		</div>
		<!-- Två textfält !-->
		<div class="text_wrap">
			<p>'.$row[4].'</p>
		</div>
		<div class="text_wrap">
			<p>'.$row[4].'</p>
		</div>
	</div>';
	?>
	
	
<!-- Reviews -->
	<div class="body_wrap centring box">
	<div id="header" class="centring"><h1>Reviews</h1></div>
	<div class="text_wrap">
	<?php
	$currentUserID = $_SESSION['userId']; //Behövs annars får jag en massa errors
	$currentUser;
	
	if(empty($_SESSION['userId'])){ //If logged out
		echo "<br>Please <a href='login.php'>log in</a> to leave a review.";
	}
	else{ //If logged in
		
		$query = $pdo->prepare("SELECT username FROM users WHERE user_id = $currentUserID");
		$query->execute();
		$query = $query->fetch(PDO::FETCH_ASSOC);
		$currentUser = $query['username'];


	
	
		$query = $pdo->prepare("SELECT * FROM reviews WHERE user_id = '$currentUserID' && product_id = $id");
		$query->execute();
		$query = $query->fetchColumn(); //Will be empty if user has not left a review
		if (!empty($query) || isset($_POST['submit'])){
			//Lägg till möjlighet att kunna redigera din review
			echo "<br>You have already left a review on this product."
			;
		}
		
		else{
		echo "<br>Leave a review<br><form action='' method='post'>
		Rating: 
		<select name='rating'>
			<option value='1'>1</option>
			<option value='2'>2</option>
			<option value='3'>3</option>
			<option value='4'>4</option>
			<option value='5'>5</option>
		</select>		
		</br>
		<textarea rows='5' cols='35' name='reviewText' placeholder='Please write your review here'></textarea>
		</br>
		<input name='submit' type='submit' />
		</form>";
		}
	}
	
    if (isset($_POST['submit'])) {
		$rating = $_POST['rating'];
		$reviewText = $_POST['reviewText'];
		
		if(!empty($query)) {
			echo "hej";
		}else{
		
		try {
			$sql = "INSERT INTO reviews (user_id, product_id, rating, comments)
			VALUES ('$currentUserID', '$id', '$rating', '$reviewText')";
			$pdo->exec($sql);
		}
		
		catch(PDOException $e)
		{
			echo "<br>Could not submit review: " . $e->getMessage();
		}
	}
	}
	
	
	
	//Find reviews if they exist and then show them
	$query = $pdo->query("SELECT reviews.rating, reviews.comments, users.username FROM reviews INNER JOIN users ON reviews.user_id = users.user_id WHERE reviews.product_id = $id" 	
	);
	$result = $query->fetchAll();
	
	if (empty($result)){
		echo "<br>There are no reviews yet.";
	}
	
	else{
		foreach($result as $row){
			echo '
			</br></br><b>'.$row[0].'</b> out of <b>5</b> stars</br>
			'.$row[1].'</br>
			-<i> '.$row[2].'</i></br>				
			';
		}

	}
	?>
	</div></div></div>
	
	
	

	
</body>
	