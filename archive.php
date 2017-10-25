<?session_start();?>
<!DOCTYPE html>
<html>
<body>

<?php
echo "<table style='border: solid 1px black;'>";
 echo "<tr><th>UserID</th><th>AdminID</th><th>TicketID</th><th>Category</th><th>SubCategory</th><th>Description</th><th>Priority</th><th>Status</th></tr>";

class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }

    function current() {
        return "<td style='width: 150px; border: 1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() { 
        echo "<tr>"; 
    } 

    function endChildren() { 
        echo "</tr>" . "\n";
    } 
} 

$servername = 'localhost';
$username = 'isaadd4_db';
$password = '1234qwer!@#$QWER';
$dbname = 'isaadd4_db';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM TICKETV2 WHERE Status=2"); 
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?> 

<button onclick="goBack()">Go Back</button>
<script>
function goBack() {
    window.history.back();
}
</script>

</body>
</html>