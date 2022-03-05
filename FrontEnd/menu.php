<?php

$_POST["bg"] = 1;
if (isset($_SESSION["login"])) {
	$content="./FrontEnd/pages/home.php";
	if (isset($_GET['p']))
	{
		switch ($_GET['p'])
		{
			case "adatok": 
				//$content="./FrontEnd/pages/adatok.php";
				$_POST["bg"] = 0;
				break;
			default: 
				$content="./FrontEnd/pages/home.php";
				break;
		}
	}
}
else {
	$content="./FrontEnd/pages/login.php";
}
?>