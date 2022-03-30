<?php

$_POST["bg"] = 1;
if (isset($_SESSION["login"])) {
	$content="./FrontEnd/pages/home.php";
	if (isset($_GET['p']))
	{	
		if ($_SESSION["jogosultsag"] == "diak") {
			switch ($_GET['p'])
			{
				case "osztalyzatok": 
					$content="./FrontEnd/pages/diak_osztalyzatok.php";
					$_POST["bg"] = 0;
					break;
				default: 
					$content="./FrontEnd/pages/home.php";
					break;
			}
		}
		elseif ($_SESSION["jogosultsag"] == "tanar") {
			switch ($_GET['p'])
			{
				case "osztalyzatok": 
					$content="./FrontEnd/pages/tanar_osztalyzatok.php";
					$_POST["bg"] = 0;
					break;
				case "teszt": 
					$content="./FrontEnd/pages/teszt_lekerdezes.php";
					$_POST["bg"] = 0;
					break;
				default: 
					$content="./FrontEnd/pages/home.php";
					break;
			}
		}
	}
}
else {
	$content="./FrontEnd/pages/login.php";
}
?>