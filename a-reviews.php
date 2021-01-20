<?php
session_start();
//Test if the authentication session still exists
if(!isset ($_SESSION["gatekeeper"])) /* approved = '1' */
{
	echo "You are not logged in. Please login or signup.";
}
else                                           
{
?>  
<html>
    
    <head>
        <link rel="stylesheet" type="text/css" href="main.css"/>
        <title>Approve Reviews</title>
    </head>
    
    <body>
        <h1>Approve pending reviews from users</h1>
    </body>

<?php

try{
    $conn = new PDO ("mysql:host=localhost;dbname=assign132;", "assign132", "thahS5ph");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
} 

try{
    $display = $conn->query("SELECT * FROM reviews WHERE approved='0'");
    while($row=$display->fetch())
    {
        echo "<p>";
        echo " Review by: ". $row["username"] ."<br/> ";
        echo " For Venue ID: ". $row["venueID"] ."<br/> ";
        echo " This user said: ". $row["review"] ."<br/> ";
        echo "<a href='approved.php?id=" . $row["ID"] . "'>Approve this review</a>". "<br/>";
    }
    
} catch(PDOException $e){
    die("ERROR: Could not execute $display. " . $e->getMessage());
}

unset($conn);
?>
<?php
}
?>

<p><a href="index.php">Return to homepage</a></p>

</html>