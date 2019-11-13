<?php

session_start();
require('connect.php');
if(@$_SESSION["username"]){

?>
<html>
<head><title>Homepage</title></head>
<body>

<?php include ("header.php"); ?>
</body>
</html>

<?php
if (@$_GET['action'] == "logout"){
	session_destroy();
	header("Location: login.php");
}
}else{
	echo "You Must be logged in.";
}
?>