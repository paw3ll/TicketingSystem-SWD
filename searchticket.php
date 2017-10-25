<?php
session_start(); 
include 'connectticket.php';


echo "<br> <A href='trackticket.php'>Track Another Ticket</a><br>";


$ticketid = $_POST['ticketid'];
$ticketid=strip_tags($ticketid);

$sql="SELECT Status FROM TICKETV2 WHERE TicketId= $ticketid";
$status = mysql_result(mysql_query($sql),0);

echo "The Status of Your Ticket is "; 
switch ($status) {
    case 0:
        echo "Not Started<br>";
        break;
    case 1:
        echo "In Progress<br>";
        break;
    case 2:
        echo "Resolved<br>";
        break;
}
?>

<button onclick="goBack()">Go Back</button>
<script>
function goBack() {
    window.history.back();
}