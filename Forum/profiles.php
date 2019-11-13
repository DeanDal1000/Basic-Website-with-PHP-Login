<?php

session_start();
require('connect.php');
if(@$_SESSION["username"]){

?>
<html>
<head><title>Profiles</title></head>
<body>

<?php include ("header.php"); 
echo "<center>";

if(@$_GET['id']) {
	$check = mysql_query("SELECT * FROM users WHERE id='".$_GET['id']."'");
	$rows = mysql_num_rows($check);
	
	if(mysql_num_rows($check) !=0) {
while($row = mysql_fetch_assoc($check)){
	echo "<h1>".$row['username']."</h1><br />";
	echo "<b>Date Registered: </b>".$row['date']."<br />";
	echo "<b>Email: </b>".$row['email']."<br />";
	echo "<b>Replies: </b>".$row['replies']."<br />";
	echo "<b>Topics Created: </b> ".$row['topics']."<br />";
	echo "<b>Score(scr): </b>".$row['score'];
}
	}else{
		echo "Could not find ID.";
	}
}else{
	header("Location: index.php");

}
echo "</center>";

?>

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