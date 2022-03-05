<!DOCTYPE html>
<html lang='hu'>
<head>
	<meta charset='utf-8' />
	<meta name='viewport' content='width=device-width, initial-scale=1.0' />
	<link rel='stylesheet' href='./FrontEnd/css/mystyle.css' />
	<link rel='stylesheet' href='./FrontEnd/css/bg.css' />
	<link rel='stylesheet' href='./FrontEnd/css/login.css' />
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' />
	<title>E-Penna</title>
</head>

<body id='pagetop'>

<?php
if ($_POST["bg"]) {
	echo "<div class='flex-container'>";
		echo "<div id='row'>";
			echo "<div id='col1'></div>";
			echo "<div id='col2'>";
				echo "<div id='triangle'></div>";
			echo "</div>";
			echo "<div id='col3'></div>";
		echo "</div>";
	echo "</div>";
}

?>
<div class='full'>

<header>
</header>
<?php
if (isset($_SESSION["login"])) {
	echo "<nav>";
		echo "<ul>";
			echo "<li><a href='./?p=adatok'>Menüpont</a></li>";
			echo "<li><a href='./'>home</a></li>";
			echo "<li><a href='./?logout'>Kilépés</a></li>";
		echo "</ul>";
	echo "</nav>";
}
?>
<main>


<?php

?>