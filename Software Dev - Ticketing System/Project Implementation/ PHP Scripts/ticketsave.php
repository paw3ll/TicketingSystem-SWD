<?php
include 'connectticket.php';
?>

<?php
$firstname=$_POST['firstname'];
$firstname=strip_tags($firstname);
$lastname=$_POST['lastname'];
$lastname=strip_tags($lastname); 
$category=$_POST['category'];
$subcategory=$_POST['subcategory'];
$description=$_POST['description'];
$description=strip_tags($description);

if ($firstname == "")
{
	echo "A valid first name was not entered.<br>";
	echo "<A href='ticketcreate.php'>Go back</a>";
	exit;
}

if ($lastname == "")
{
	print "A valid last name was not entered.<br>";
	echo  "<A href='ticketcreate.php'>Go back</a>";
	exit;
}

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
	
// Values are not being pushed to database, need to sovle.
$SQL = "INSERT into ticketv2(FirstName, LastName, Category, SubCategory, Description, Priority, TicketId) VALUES ('$firstname','$lastname','$category,'$subcategory','$description','0','1')";
mysql_query($SQL) or die ("Could not register ticket, please contact nearest agent at 555-555-5555");

print "Thank you for your ticket! Our team will begin work shortly!";
	echo "<A href='login.php'>Login Page</a><br>";
?>