<?php

session_start();
if (isset($_SESSION["start"]) && isset($_SESSION["expire"])) {
	$currentTime = time();
	if (isset($_GET["logout"]) || $currentTime > $_SESSION["expire"]) 
	{ 
		session_unset(); 
		session_destroy(); 
		unset($_COOKIE["login"]);
		header('Location: ./');
	}
}
?>