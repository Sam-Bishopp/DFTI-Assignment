<?php
session_start();

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
    <title>Venue Review</title>
</head>

<body>
   
<h1>Write a review for this venue</h1>   
    
<?php
 
//ID of venue
$id = $_GET["REVvenueID2"];

//Review Form
echo "<p>";
echo "<form method='post' action='p-review.php'> ";
echo "Write your review: <input type='text' name='review' id='review' /> ";
echo "<input type='hidden' name='venue_id' value='$id' /> ";
echo "<br/>";
echo "<br/>";
echo "<input type='submit' value='Submit Your Review' /> ";
echo "</p>";

?>

<p><a href="index.php">Return to homepage</a></p>

</body>

</html>

<?php
}
?>