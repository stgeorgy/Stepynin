﻿<?php require_once("connection.php"); ?>
<?php include("includes/header.php"); ?>


	<?php
$connection = @mysqli_connect('localhost', root, '', bd) or die("Нет соединения с БД");
if(isset($_POST["register"])){
if(!empty($_POST['full_name']) && !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password'])) {
	$full_name=$_POST['full_name'];
	$email=$_POST['email'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	
	$query=mysqli_query($connection,"SELECT * FROM table WHERE username='.$username.'");
	$numrows=mysqli_num_rows($query);
	echo "Number of rows fetched are : ". $numrows;  
	if($numrows==0)
	{
	$sql="INSERT INTO table
			(full_name, email, username,password) 
			VALUES('$full_name','$email', '$username', '$password')";
	$result=mysqli_query($connection, $sql);
	if($result){
	 $message = "Account Successfully Created";
	} else {
	 $message = "Failed to insert data information!";
	}
	} else {
	 $message = "That username already exists! Please try another one!";
	}
} else {
	 $message = "All fields are required!";
}
}
?>


<?php if (!empty($message)) {echo "<p class=\"error\">" . "MESSAGE: ". $message . "</p>";} ?>

<div class="container mregister">
			<div id="login">
	<h1>REGISTER</h1>
<form name="registerform" id="registerform" action="register.php" method="post">
	<p>
		<label for="user_login">Full Name<br />
		<input type="text" name="full_name" id="full_name" class="input" size="32" value=""  /></label>
	</p>


	<p>
		<label for="user_pass">Email<br />
		<input type="email" name="email" id="email" class="input" value="" size="32" /></label>
	</p>

	<p>
		<label for="user_pass">Username<br />
		<input type="text" name="username" id="username" class="input" value="" size="20" /></label>
	</p>

	<p>
		<label for="user_pass">Password<br />
		<input type="password" name="password" id="password" class="input" value="" size="32" /></label>
	</p>	


		<p class="submit">
		<input type="submit" name="register" id="register" class="button" value="Register" />
	</p>

	<p class="regtext">Already have an account? <a href="login.php" >Login Here</a>!</p>
</form>

	</div>
	</div>



	<?php include("includes/footer.php"); ?>