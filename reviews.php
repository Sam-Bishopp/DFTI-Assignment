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
        <title>User Reviews</title>
    </head>
    
    <body>
        <h1>Reviews by Users</h1>
    </body>
    

<?php

$rev_display = $_GET["REVvenueID"];

try{
    $conn = new PDO("mysql:host=localhost;dbname=assign132;", "assign132", "thahS5ph");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}

try{
    $display = $conn->query("SELECT * FROM reviews WHERE venueID='$rev_display' AND approved='1'");
    while($row=$display->fetch())
    {
        echo "<p>";
        echo " Review by: ". $row["username"] ."<br/> ";
        echo "<p></p>";
        echo " This user said: ". $row["review"] ."<br/>";
        echo "<p></p>";
    }
    
} catch(PDOException $e){
    die("ERROR: Could not execute $rev_update. " . $e->getMessage());
}

unset($conn);
?>
<?php    
}
?>

<p><a href="index.php">Return to homepage</a></p>

</html>