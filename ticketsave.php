<?php
session_start();
include 'connectticket.php';
?>

<?php
 
 //get username of logged in user
$username = $_SESSION['user'];

$category=$_POST['category'];
$subcategory=$_POST['subcategory'];
$description=$_POST['description'];
$description=strip_tags($description);




if ($category == "Software Problem")
{
	if ($subcategory == "N/A")
	{
		echo "Please select a valid subcategory.";
		echo "<A href='ticketcreate.php'>Go back</a>";
		exit;
	}
}
if ($category == "Hardware Problem")
{
	if ($subcategory != "N/A")
	{
		echo "SubCategorys are for Software Problems only.";
		echo "<A href='ticketcreate.php'>Go back</a>";
		exit;
	}
}	

if ($description == "")
{	
	echo "Please enter a valid description. Decriptions can be no more than 1000 characters.<br>";
	echo "<A href='ticketcreate.php'>Go back</a>";
	exit;	
}

if (strlen($description)>1000)
	{
	echo "Please enter a valid description. Decriptions can be no more than 1000 characters.<br>";
	echo "<A href='ticketcreate.php'>Go back</a>";
	exit;	
	}
	
$sql = "INSERT INTO TICKETV2 (Description, Category, SubCategory, UserId )
VALUES ('$description','$category','$subcategory','$username')";
mysql_query($sql) or die ("Could not register ticket, please contact nearest agent at 555-555-5555");

//Select User With Least Amount of Tickets
$sql = "SELECT username FROM users WHERE access=1 ORDER BY ticketcount ASC LIMIT 1";
$us = mysql_result(mysql_query($sql),0);  

//Increment Ticket Count
$sql = "UPDATE users SET ticketcount = ticketcount+1 WHERE username = '$us'";
mysql_query($sql) or die ("Could Not update Ticket Count") ; 

//Assign Ticket an Admin
$sql = "UPDATE TICKETV2 SET AdminID = '$us' WHERE AdminID is NULL"; 
mysql_query($sql) or die("Could Not Assign Ticket an Admin");

 
print "Thank you for your ticket! Please Save Ticket ID for Tracking Purposes!";

print"<br>TICKET ID: ";
$sql = "SELECT LAST_INSERT_ID()"; 
$id = mysql_result(mysql_query($sql),0);
echo $id;  


echo "<br><A href='login.php'>Login Page</a><br>";


?>