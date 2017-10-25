<?php

$database = @mysql_connect('localhost','isaadd4_db','1234qwer!@#$QWER') or die ("Could not connect to local host database ");
if(!$database)
	die("Database is not defined. There is no local host.");
if(!mysql_select_db("isaadd4_db",$database))
	die("No Database Selected");


?>