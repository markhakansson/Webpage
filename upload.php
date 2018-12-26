<?php
    include 'connect.php';
    include 'functions.php';
    include 'header.php';
    
?>
<div class="body_wrap centring">
	<form action='postProduct.php' method='post' enctype="multipart/form-data">
		<h3>Add a product<h3>
		<input name='name' type='text' placeholder='Enter product name'></br>
		<textarea name='description' placeholder='Enter description' rows="5" cols="25"></textarea></br>
		<input name='price' type='text' placeholder='Enter price'></br>
		<input name='stock' type='text' placeholder='Enter amount'></br>
		<input name='fileToUpload' type='file' id='fileToUpload'></br>
		<br/>
		<input type='submit' value='Submit'>
	</form>
	</div>
</div>

