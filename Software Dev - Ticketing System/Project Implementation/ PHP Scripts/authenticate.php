<?php
include_once 'connectticket.php';
session_start();

if (isset($_POST['submit']))
{
	$user=$_POST['user'];
	$password=$_POST['password'];
	$user=strip_tags($user);
	$username=strip_tags($password);
	
	$query = "select username,password from user where username= '$user' and '$password'";
	$result = mysql_query($query) or die ("Could not query user correctly.");
	$results2= mysql_fetch_array($result);
	if ($results2)
	{
		$_SESSION['user']=$user;
		
		echo "<big>Successful Login.<br>";
		$userinfo="SELECT access from user where username='$user'";
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
}
	else
	{
		echo "<big> Invalid username or password.<A href='login.php'>Try Again.</a></big>";
	}
?>

<form align="right" name="form1" method="post" action="logout.php">
<label class="logoutLblPos">
<input name="submit2" type="submit" id="submit2" value="log out">
</label>
</form>
