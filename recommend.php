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
<?php

$id = $_GET["RECvenueID"];

try{
    $conn = new PDO("mysql:host=localhost;dbname=assign132;", "assign132", "thahS5ph");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}

try{
    $r_update = "UPDATE venues SET recommended=recommended+1 WHERE ID = '$id'";
    $conn->exec($r_update);
    
    echo "You have recommended this venue.";

} catch(PDOException $e){
    die("ERROR: Could not execute $r_update. " . $e->getMessage());
}

unset($conn);
?>
<?php    
}
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="main.css" />
        <title>Thank you recommending this venue!</title>
    </head>
    
    <body>
        <p><a href="index.php">Return to homepage</a></p>
    </body>
</html>