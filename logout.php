<?php
session_start();
unset($_SESSION["user"]);

header( "refresh:1;url=index.php" )

?>