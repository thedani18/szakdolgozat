<?php

$_POST["bg"] = true;
if (isset($_SESSION["login"])) {
	$content="./FrontEnd/pages/home.php";
	if (isset($_GET['p']))
	{
		switch ($_GET['p'])
		{
			case "adatok": 
				//$content="./FrontEnd/pages/adatok.php";
				$_POST["bg"] = false;
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