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
    <title>Night Out Venues</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<body class="main">
    <h1>Night Out Venues</h1>
    <p>Night Out has all the most popular venues for any kind of occassion in town! Enjoy the town casually, as you have a relaxing cup of coffee in one of the many cafes in the town; or venture out to one of the pubs with your friends to enjoy a night to remember. Whatever type of venue you are looking for, we'll likely have it here on Night Out - or if we don't, feel free to make your own listing for that venue so others can have the same wonderful experience as you.</p>

    <h2>Site Navigation</h2>
    <ul style="list-style-type:circle;">
        <li><a href="addvenue.php">Add a Venue</a></li>
        <li><a href="search.php">Search for a venue</a></li>
        <li><a href="a-reviews.php">Approve User Reviews (Admins Only)</a></li>
    </ul>

    <?php
    echo "Logged in as " . $_SESSION["gatekeeper"];
    ?>
    
    <p><a href="logout.php">Logout</a></p>
    
</body>

</html>
<?php
}
?>
