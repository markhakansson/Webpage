<?php
    //header('Content-Type: text/html; charset=ISO-8859-1');
	include 'header.php';
	include 'functions.php';
	include 'login_backend.php';
?>
<div class="login_container">		
	<?php
	if(empty($_SESSION['userId'])){
		echo '
		<h2>Login to your account</h2>
		<form method = "post">
    	<div>
        	<label for="username">Username:</label>
       	 	<input type="text" name="username">
        	<span class="required">*<?php echo $usernameErr;?></span>
    	</div>

    	<div>
			<label for="password">Password:</label>
    		<input type="password" name="password">
			<span class="required">*<?php echo $passwordErr;?></span>
		</div>

		<div>
        	<input type="submit" name="submit" value="Login">
        	<span class="required">'; 
			echo "$loginMsg";
			echo '</span>
    	</div>

		</form>
	<a href="register.php">Register here</a>
	';}
	?>
</div>
</body>
</html>