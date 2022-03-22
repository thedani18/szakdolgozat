<?php
session_start();
$kiiras = "";
if (isset($_POST["send"])) {
	if (isset($_POST["fnev"]) && isset($_POST["pw"])) {
		if (UserCheck($_POST["fnev"])) {
			if (PwCheck($_POST["fnev"],$_POST["pw"])) {
				if (!isset($_SESSION["login"])) {
					$info = UserDefault($_POST["fnev"]);
					$_SESSION["login"] = $info["felhId"];
					$_SESSION["jogosultsag"] = $info["jogosultsag"];
					$_SESSION["start"] = time();
					$_SESSION["expire"] = $_SESSION["start"] + (30 * 60);
					header("location: ./");
				}
			}
			else
				$kiiras = "Nem megfelelő a jelszó!";
		}
		else
			$kiiras = "Nem létezik ilyen felhasználónév!";
	}
	if (!isset($_SESSION["login"])) {
		
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