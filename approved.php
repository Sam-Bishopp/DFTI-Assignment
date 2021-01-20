<?php
session_start();
//Test if the authentication session still exists
if(!isset ($_SESSION["gatekeeper"]))
{
	echo "You are not logged in. Please <a href='login.php'>Login</a>";
}
else
{
?>

<html>
    
    <head>
        <link rel="stylesheet" type="text/css" href="main.css"/>
        <title>Review Approved!</title>
    </head>
    

<?php
    
$rID = $_GET["id"];
    
try{
    $conn = new PDO("mysql:host=localhost;dbname=assign132;", "assign132", "thahS5ph");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
    
try{
    $conn->query("UPDATE reviews SET approved = 1 WHERE ID = '$rID'");
    
    echo "This review has been approved for viewing to users.";

} catch(PDOException $e){
    die("ERROR: Could not execute $conn->query. " . $e->getMessage());
}
    
unset($conn);
?>
<?php
}
?>

<p><a href="index.php">Return to homepage</a></p>

</html>