<?php
session_start();
include 'connectticket.php';
?>
<html>
<body>

<?php

$current_user = $_SESSION['user'];

$sql = "SELECT * from TICKETV2 
	WHERE Status !=2  AND AdminID = '$current_user'
	ORDER BY Priority ASC";					
$result = mysql_query($sql);
$i = 0; 
?>

<form method=post action="<?php echo $_SERVER['PHP_SELF'];?>">
<table style ="font-family:arial; font-size:15" width="600" border="1" cellpadding="1" align=center>
<font face=arial size = 5 color =blue>


<tr bgcolor=#FF3333>
<th><b>USER ID</b></th>
<th><b>TICKET ID</b></th>
<th><b>CATEGORY</b></th>
<th><b>SUBCATEGORY</b></th>
<th><b>DESCRIPTION</b></th>
<th><b>PRIORITY</b></th>
<th><b>STATUS</b></th>
<th><b>UPDATE</b></th>
<th><b>CHECK</b></th>
</tr>

<?php

while ($arr= mysql_fetch_array($result)){						// CHANGE TEXTBOXES TO DROPDOWN MENUS WHERE APPROPRIATE
	echo "<tr>";	
	echo "<td>";
	echo '<input type = "text" value="'.$arr['UserID'].'"name="us'.$i.'"readonly />';
	echo "</td>";	
	
	echo "<td>";
	echo '<input type = "text" value="'.$arr['TicketId'].'"name="id'.$i.'"readonly />';
	echo "</td>";
	
	echo "<td>";
	echo '<input type = "text" value="'.$arr['Category'].'"name="cat'.$i.'" />';
	echo "</td>";
	
	echo "<td>";
	echo '<input type = "text" value="'.$arr['SubCategory'].'"name="scat'.$i.'"/>';
	echo "</td>";
	
	echo "<td>";
	echo '<input type = "text" value="'.$arr['Description'].'"name="desc'.$i.'"/>';
	echo "</td>";
	
	echo "<td>";
	echo '<input type = "text" value="'.$arr['Priority'].'"name="pri'.$i.'"/>';
	echo "</td>";
	
	echo "<td>";
	echo '<input type = "text" value="'.$arr['Status'].'"name="sts'.$i.'"/>';
	echo "</td>";
	
	echo "<td>";
	
	echo '<input type="submit" value="update" name="submitbutt'.$i.'"/>';
	
	//Get Inputs
	if (isset($_POST['submitbutt'.$i.''])){
		if (isset($_POST['check'.$i.''])){
	 		 $user= $_POST['us'.$i.''];		
	 		 $id= $_POST['id'.$i.''];
	  		 $cat= $_POST['cat'.$i.''];
	  		 $scat= $_POST['scat'.$i.''];
	  		 $desc= $_POST['desc'.$i.''];
	  		 $pri= $_POST['pri'.$i.''];
	  		 $sts= $_POST['sts'.$i.''];
	  		 
	  		 //Update Table with New Values
	  		 $update="UPDATE TICKETV2 SET Category ='$cat',SubCategory='$scat',Description ='$desc',Priority='$pri',Status ='$sts'
	  		 	  WHERE TicketId = '$id'";
	   		 $qry = mysql_query($update) or die("Couldn't Update");
	   		 
	   		 //Decrement Ticket Count of Admin
	   		 if($sts = 2){
	   		 	$sql = "UPDATE users SET ticketcount = ticketcount-1 WHERE username = '$current_user' ";
				mysql_query($sql) or die ("Could Not update Ticket Count") ; 
	   		 }
		 	 //Refresh Page
		 	 $URL="http://www.ticketmanagementse.com/viewactiveticket.php";
			 echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
	   		 
	   	}
	  	else {
	  		echo "Please Select Checkbox";
	  	}
	  }
	  echo "</td>";
	  echo "<td>";
	  echo '<input type = "checkbox" name = "check'.$i.'" />';
	  echo "</tr>";
	  $i++;  
} 
?>
<button onclick="goBack()">Go Back</button>
<script>
function goBack() {
    window.history.back();
</font>
</form>
</table>
</body>
</html>