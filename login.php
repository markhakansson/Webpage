<?php
	include 'login_backend.php';
    header('Content-Type: text/html; charset=ISO-8859-1');
	include 'header.php'
?>
<div class="login_container">		
	<?php
	if(empty($_SESSION['userId'])){
	echo '<a href = "index.php">Go to home</a>
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
		<label for="robot">Are you a robot?</label>
        	<input type="radio" name="robotCheck"'; 
				if(isset($robotCheck) && $robotCheck=="no"){
					echo '"checked" value="no"> No
        			<span class="required">';
					echo $robotCheckErr;
				}
		echo '</span><br>
    		</div>

		<div>
        		<input type="submit" name="submit" value="Logga in">
        		<span class="required">'; 
					echo "$loginMsg";
				echo '</span>
    		</div>

	</form>
<a href="register/register.php">Register here</a>
</div>';
}
?>
</body>
</html>