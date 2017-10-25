<?php
session_start();
include 'connectticket.php';

?>

<form method ="post" action ="ticketsave.php">
Select Category: <SELECT name="category">
<OPTION value="1" >Hardware Problem</OPTION>
<OPTION value="2" >Software Problem</OPTION>
</SELECT><br>
Select SubCategory(Only Select if Software Problem): <SELECT name="subcategory">
<OPTION value="">N/A</OPTION>
<OPTION value="1" >Permission</OPTION>
<OPTION value="2" >Bug</OPTION>
<OPTION value="3" >Other</OPTION>
</SELECT><br>					   
Description<input type="text" name="description" size="48"><br>

<!-- <textarea rows="4" cols="50">
This is the text that will default be in the box. Unknown how this saves or if it will save. 
</textarea> -->

<input type="submit" value ="Submit Ticket">

<button onclick="goBack()">Go Back</button>
<script>
function goBack() {
    window.history.back();
}