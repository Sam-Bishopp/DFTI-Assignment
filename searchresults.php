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
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<body>
    <h1>Search For Venues</h1>

<?php
    $v = $_GET["type"];
    $conn = new PDO ("mysql:host=localhost;dbname=assign132;", "assign132", "thahS5ph");
    
    $results = $conn->query("select * from venues where type='$v'");
    while($row=$results->fetch())
    {
        echo "<p>";
        echo " Name of Venue: ". $row["name"] ."<br/>";
        echo " Type of Venue: ". $row["type"] ."<br/>";
        echo " Description: ". $row["description"] ."<br/>";
        echo "<p></p>";
        echo " Originally posted by ". $row["username"] ."<br/>";
        echo "<a href='recommend.php?RECvenueID=" . $row["ID"] . "'>Recommended by ". $row["recommended"] ." users</a> ". "<br/>";
        echo "<a href='reviews.php?REVvenueID=" . $row["ID"] . "'>Read reviews for this venue</a> ". "<br/>";
        echo "<a href='w-review.php?REVvenueID2=" . $row["ID"] . "'>Write a review for this venue</a>". "<br/>";
        echo "</p>";
    }
    
    echo "You are searching $v venues <br />";
?>

    <p><a href="index.php">Return to homepage</a></p>

</body>

</html>
<?php
}
?>
