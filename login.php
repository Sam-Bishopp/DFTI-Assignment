<?php
session_start();

$conn = new PDO ("mysql:host=localhost;dbname=assign132;", "assign132", "thahS5ph"); 

$un = $_POST["username"];
$pw = $_POST["password"];

?>
<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" type="text/css" href="main.css"/>
<title>Night Out Login</title>
</head>
<body>
<h1>Log in to Night Out</h1>

<form method="post" action="login.php">

<label for="username">Username:</label>
<input name="username" id="username"/>
<br/>

<label for="password">Password:</label>
<input name="password" id="password" type="password"/>
<br/>

<input type="submit" value="Go!"/>
</form>
</body>
</html>
<?php

$results = $conn->query("SELECT username, password FROM users WHERE username='$un' and password='$pw'");

$row = $results->fetch();


if($row==false)
{
	//There were no matching rows
	echo "Incorrect Login!";
}
else
{
	//There were matching rows
	$_SESSION["gatekeeper"] = $row["username"];
	
	header ("Location: index.php");
}
?>