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
    <title>Search for a Venue</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>
    
<body>
    <form method="get" action="searchresults.php">
        <p>Search for a type of venue:
            <input type="text" name="type" id="type" />
            <input type="submit" value="Go!" />
        </p>
    </form>
       
    <p><a href="index.php">Return to homepage</a></p>
        
</body>
</html>   
<?php    
}
?>