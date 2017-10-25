<body>
<center>
<?php
include_once 'connectticket.php';
	session_start();
	
if (isset($_SESSION['user']))
	{
	$user=$_SESSION['user'];
	$userinfo="SELECT access from user where name='$user'";
	$userinfo2=mysql_query($userinfo) or die ("Could not get user's access");
	$userinfo3=mysql_fetch_array($userinfo2);
	$access=$userinfo3['access'];
	}
else
	{
	print"Sorry, not logged in please <A href='login.php>Login</a><br>";
	exit;
	}
	
echo "<br>Welcome " . $user . "<br><br>";
	echo "<A href='ticketcreate.php'>Create a new Ticket</big></a><br>";
	echo "<A href='viewtickets.php'>View your Ticket</big></a><br>";
//The line below checks a user to see if they're admin or not
	if ($access >0) {echo "<A href='worktickets.php'>Work Tickets</big></a><br>";}
//Acces of 0 means base level user
//Access of 1 means admin level user
?>

</center>