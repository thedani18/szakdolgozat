<?php
session_start();
if (isset($_POST["send"])) {
	if (!isset($_SESSION["login"])) {
		$_SESSION["login"] = "login";
		$_SESSION["start"] = time();
		$_SESSION["expire"] = $_SESSION["start"] + (30 * 60);
		header("location: ./");
	}
}

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