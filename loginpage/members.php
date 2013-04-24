<?php

//STEP 1 Connect To Database
$con1 = mysql_connect("localhost", "root", "Eeeeek31");
mysql_select_db("bpl", $con1);
if (!$con1)
{
die("MySQL could not connect!");
}


//STEP 2 Declare Variables

$Name = $_POST['username'];
$Pass = $_POST['password'];
$Query = mysql_query("SELECT * FROM Users WHERE Username='$Name' AND Password='$Pass'");
$NumRows = mysql_num_rows($Query);
$_SESSION['username'] = $Name;
$_SESSION['password'] = $Pass;

//STEP 3 Check to See If User Entered All Of The Information

if(empty($_SESSION['username']) || empty($_SESSION['password']))
{
die("Go back and login before you visit this page!");
}

if($Name && $Pass == "")
{
die("Please enter in a name and password!");
}

if($Name == "")
{
die("Please enter your name!" . "</br>");
}

if($Pass == "")
{
die("Please enter a password!");
echo "</br>";
}

//STEP 4 Check Username And Password With The MySQL Database

if($NumRows != 0)
{
while($Row = mysql_fetch_assoc($Query))
{
$Database_Name = $Row['username'];
$Database_Pass = $Row['password'];
}
}
else
{

echo "Incorrect Username or Password!</br>";
die("<a href=register.php>Click here to register</a>");
}

if($Name == $Database_Name && $Pass == $Database_Pass)
{
// If The User Makes It Here Then That Means He Logged In Successfully
echo "Hello " . $_SESSION['username'] . "!";
}

?>
<html>
<body>
<p>Here is where you can put information for the user to see when he logs on. (Anything inside these html tags!)</p>
</body>
</html>