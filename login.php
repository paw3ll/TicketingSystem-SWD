<?
include 'connectticket.php';
?>

<form method ="POST" action="authenticate.php">
Username <input type="text" name ="user" size="21"><br>
Password <input type="password" name="password" size="21" mask="x"><br>
<br>
<input type ="submit" value ="Login" name="submit">
<?php
/* if(isset($_GET['logout']))
{
	$expire = time()-60*60*24*30;//One Month Timer
	setcookie("uid", $row['uid'], $expire);
}
if(isset($_POST['user']))
{
	$user = $_POST['user']; // ExampleUserName
	$pass = md5($_POST['pass']); // 12345 MD5 even though md5 sucks
	
	// Below is ued to connect to server
	$connection = @mysql_connect("localhost","isaadd4_db","1234qwer!@#$QWER");
	if(!connection)
	{
		die("Could Not Establish Connection to Database through login.php. Sql Error: " . mysql_error());	
	}	
	mysql_select_db("users",$connection);
	if(mysql_num_rows(mysql_query("SELECT username,password from users where username = '$user' AND password = '$password'")));
	{
		// Username and Password are correct.
		$result = mysql_query("SELECT username,password FROM users where username = '$user' AND password= '$password'");
		while($row = mysql_fetch_array($result))
			{
				$expire = time()+60*60*24*30; // One month timer.
				setcookie("uid", $row['uid'], $expire);
				echo "Logged in as <b>" .$row['username']."</b><br>";
				$userID = $row['uid'];
			}
	}
}
else
	{ 
		// Username and Password are incorrect.
		echo"<b>Username or password is invalid </b><br><br>";
	}
	
mysql_close($connection);

if(isset($_COOKIE['uid']))
{
	$userID = $_COOKIE['uid'];
}

if(isset($userID))
{
	echo " (<a href='?logout'>Logout?</a>";
}

else
{

<center>
echo "<form method = 'post' action='login.php'>
Username:<input type='text' name='user'><br>
Password:<input type='password' name='pass'><br>
<input type='submit' value='LOG IN'>
</center>
</form>";
}*/ 
?>