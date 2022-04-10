<?php
function connect()
{
	$host="localhost";
	$user="root";
	$pw="";
	$db="epenna";

	$connect= new mysqli($host,$user,$pw,$db);
	if($connect ->connect_error)
	{ 
		die ("Nem nyert!");
	}
	return $connect;
}
?>