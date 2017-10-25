<?php
session_start();
?>

<form method ="post" action ="searchticket.php">
Please Enter Your Ticket Number: <input type="text" name="ticketid" size="30"><br></INPUT>
<input type="submit" value ="Submit Ticket">
<button onclick="goBack()">Go Back</button>
<script>
function goBack() {
    window.history.back();}