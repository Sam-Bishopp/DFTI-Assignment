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
    <title>Add Venue</title>
</head>

<body>

    <h1>Add a venue to the Night Out website</h1>

    <form method="post" action="av-insert.php">

        <label for="name">Name:</label>
        <input type="text" name="name" id="name" />
        <br />

        <label for="type">Type:</label>
        <input type="text" name="type" id="type" />
        <br />

        <label for="description">Description:</label>
        <input type="text" name="description" id="description" />
        <br />

        <input type="submit" value="Add Venue" />
    
    </form>

    <p><a href="index.php">Return to homepage</a></p>

</body>

</html>
<?php
}
?>
