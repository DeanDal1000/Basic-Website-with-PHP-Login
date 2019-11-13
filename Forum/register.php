<html>
<head>
<title> Register </title>
</head>
<body>
	<form action="register.php" method="POST">
		Username: <input type= "text" name="username">
		<br />Password: <input type= "password" name="password">
		<br />Confirm Password: <input type= "password" name="repeatpassword">
		<br />Email: <input type= "text" name="email">
		<br /><input type= "submit" name="submit" value="Register"> or <a href="login.php"> Login </a>
	</form> 
</body>

</html>
<?php
require('connect.php');
$username = @$_POST['username'];
$password = @$_POST['password'];
$repass = @$_POST['repeatpassword'];
$email = @$_POST['email'];
$date = date("Y-m-d");
$pass_en = sha1($password);


if(isset($_POST['submit'])){
	if($username && $password && $repass && $email) {
		if(strlen($username) >= 5 && strlen ($username) < 25 && strlen($password) > 6) {
			if($repass == $password) {
					if($query = mysql_query("INSERT INTO users (`id`, `username`, `password`, `email`, `date`) VALUES ('', '".$username."', '".$pass_en."', '".$email."', '".$date."')"))
		
	echo "Success You have Offically Registered, Click to<a href='login.php'> login </a>";

else{
	echo "Failure";
	}
			}else{
				echo "Password not matched";
			}
	}else{
		if(strlen($username) < 5 || strlen ($username) > 25){
			echo "Username Between 5 & 25 characters";
		}
		if(strlen($password) < 6) {
			echo "Password longer than 6 characters.";
		}
	}
	}else{
		
		echo "Please Fill out all information.";

	}

	
}
?>