<?php
function connect()
{
	$host="localhost";
	$user="root";
	$pw="";
	$db="school";

	$connect= new mysqli($host,$user,$pw,$db);
	if($connect ->connect_error)
	{ 
		die ("Nem nyert!");
	}
	return $connect;
}
?>