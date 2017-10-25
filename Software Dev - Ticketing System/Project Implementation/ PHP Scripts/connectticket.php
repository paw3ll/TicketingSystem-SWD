<?php

$database = @mysql_connect('localhost','root','') or die ("Could not connect to local host database ");
if(!$database)
	die("Database is not defined. There is no local host.");
if(!mysql_select_db("ticketingsystem",$database))
	die("No Databse Selected");

?>