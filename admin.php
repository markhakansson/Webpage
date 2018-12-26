<?php
    include 'connect.php';
    include 'functions.php';
    include 'header.php';

    redirectIfNotLoggedIn();    
    redirectIfNotEmployeeOrAdmin($_SESSION["userId"],$pdo);
    
?>

<div class="body_wrap centring">
	<div class = "admin-page">
		<h2>Admin page</h2>
		<a href="upload.php">Upload products</a>
		<h2>Active orders:</h2>
		
	</div>
</div>