<html>
<head><title> Login </title>
</head>
<body>

<form action ="login.php" method="POST">
	Username: <input type="text" name="username"><br />
	Password: <input type="password" name="password"><br />
	<input type="submit" value="Login" name="submit">
</form>


</body>
</html>

<?php
session_start();
require('connect.php');
$username = @$_POST['username'];
$password = @$_POST['password'];

if(isset($_POST['submit'])){
	if($username && $password){
		$check = mysql_query("SELECT * FROM users WHERE username='".$username."'");
		$rows = mysql_num_rows($check);
		
		if(mysql_num_rows($check) !=0){
			while ($row = mysql_fetch_assoc($check)){
				$db_username = $row['username'];
				$db_password = $row['password'];
			}
			if($username == $db_username && sha1($password) == $db_password){
				$_SESSION["username"] = $username;
				header("Location: index.php");
			}else {
				echo "One of the fields is wrong";
			}
		}else{
			die ("No Username Found");
		}
		
	}else{
		echo "Fill out missing fields.";
	}
}

?>
