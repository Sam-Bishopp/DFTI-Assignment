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
    
$username = $_SESSION["gatekeeper"];

try{

$conn = new PDO ("mysql:host=localhost;dbname=assign132;", "assign132", "thahS5ph");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch(PDOException $e){
    die("ERROR: Could not connect." . $e->getMessage());
}

try{
    
$insert = "INSERT INTO venues (name, type, description, recommended, username) VALUES (:name, :type, :description, 0, :added_by)";
    
    $stmt = $conn->prepare($insert);
    
    $stmt->bindParam(':name', $_REQUEST['name']);
    $stmt->bindParam(':type', $_REQUEST['type']);
    $stmt->bindParam(':description', $_REQUEST['description']);
    $stmt->bindParam(':added_by', $username);
    
    $stmt->execute();
    echo "Venue Successfully Added. Thank you!";
} catch(PDOException $e){
    die("ERROR: Could not execute $insert. " . $e->getMessage());
}

unset($conn);
?>
<?php    
}
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="main.css" />
        <title>Thank you for adding a venue!</title>
    </head>
    
    <body>
        <p><a href="index.php">Return to homepage</a></p>
    </body>
</html>