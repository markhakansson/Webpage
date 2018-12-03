<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html>
<head>
<style>
input {
	margin-top: 5px;
}
</style>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="addproduct">
<form action='postProduct.php' method='post' enctype="multipart/form-data">
	<h3>Add a product<h3>
	<input name='name' type='text' placeholder='Enter product name'>
	<textarea name='description' placeholder='Enter description' rows="5" cols="25"></textarea>
	<input name='price' type='text' placeholder='Enter price'>
	<input name='stock' type='text' placeholder='Enter amount'>
	<input name='fileToUpload' type='file' id='fileToUpload'>
	<br/>
	<input type='submit' value='Submit'>
</form>
</div>

</body>
</html>