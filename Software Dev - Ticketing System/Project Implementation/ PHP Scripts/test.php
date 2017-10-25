<?php
 include 'connectticket.php';
 
 $ticketinfo = "Select * from ticketv2 where PhoneNumber = '5558651510'";
 $ticketinfo2 = mysql_query($ticketinfo) or die ("Couldn't select vairable asked for");
 $ticketinfo3 = mysql_fetch_array($ticketinfo2);
 
 echo "The first tickets phone number is "  . $ticketinfo3['PhoneNumber'];
 echo "<br>The first ticket number has a first name of " . $ticketinfo3['FirstName'];
?>

