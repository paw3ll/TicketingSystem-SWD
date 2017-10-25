<?php
include 'connectticket.php';

?>

<form method ="post" action ="ticketsave.php">
Please provide your first name: <input type="text" name="firstname" size="30"><br></INPUT>
Last Name: <input type="text" name="lastname" size="30"><br></INPUT>
Select Category: <SELECT name="category">
<OPTION value="1" >Hardware Problem</OPTION>
<OPTION value="2" >Software Problem</OPTION>
</SELECT><br>
Select SubCategory(Only Select if Software Problem): <SELECT name="subcategory">
<OPTION value="">N/A</OPTION>
<OPTION value="1" >Sub-1</OPTION>
<OPTION value="2" >Sub-2</OPTION>
</SELECT><br>					   
Description<input type="text" name="description" size="100"><br>

<!-- <textarea rows="4" cols="50">
This is the text that will default be in the box. Unknown how this saves or if it will save. 
</textarea> -->

<input type="submit" value ="Submit Ticket">
<input type="button" VALUE="Logout" onClick="history.go(-1);return true;">
