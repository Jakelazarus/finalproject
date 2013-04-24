<?php

//STEP 1 Connect To Database

$connect = mysql_connect("localhost", "root", "Eeeeek31");
if (!$connect)
{
die("MySQL could not connect!");
}

$DB = mysql_select_db('bpl');

if(!$DB)
{
die("My SQL could not select Database!");
}

//STEP 2 Declare Variables

$Username = $_POST['username'];
$Email = $_POST['email'];
$Email1 = "@";
$Email_Check = strpos($Email,$Email1);
$Password = $_POST['password'];
$Re_Password = $_POST['re-password'];
$Birth = $_POST['birth'];

//STEP 3 Check To See If All Information Is Correct

if($Username == "")
{
die("Opps! You don't enter a username!");
}

if($Password == "" || $Re_Password == "")
{
die("Opps! You didn't enter one of your passwords!");
}

if($Birth == "")
{
die("Opps! You never entered in your birth year!");
}

if($Password != $Re_Password)
{
die("Ouch! Your passwords don't match! Try again.");
}

if($Email_Check === false)
{
die("Opps! That's not an email!");
}

//STEP 4 Insert Information Into MySQL Database

if(!mysql_query("INSERT INTO Users (email, username, password, birth)
VALUES ('$Email', '$Username', '$Password', '$Birth')"))
{
die("We could not register you due to a mysql error (Contact the website owner if this continues to happen.)");
}
die("Thank you for registering!</br><a href='login.php'>Return to login page</a>");
?>