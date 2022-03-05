<!DOCTYPE html>
<html lang='hu'>
<head>
	<meta charset='utf-8' />
	<meta name='viewport' content='width=device-width, initial-scale=1.0' />
	<link rel='stylesheet' href='./FrontEnd/css/mystyle.css' />
	<link rel='stylesheet' href='./FrontEnd/css/bg.css' />
	<link rel='stylesheet' href='./FrontEnd/css/login.css' />
	<script type="text/javascript" src="./FrontEnd/js/visible.js"></script>
	<title>E-Penna</title>
</head>

<body id='pagetop'>


<?php
if ($_POST["bg"] == 1) {
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

<?php
if (isset($_SESSION["login"])) {
	echo '<nav id="nav">
		<div class="nav_row">
			<div class="info_coll">
				<div class="info">
					<button class="usermenu" onclick="InfoDropdown()">
						<div class="userimg">
							<img src="./FrontEnd/img/profile.jpg" alt="profile.jpg">
						</div>
						<div class="username">
							<p id="name">Teszt Elek</p>
							<p id="timer">(Visszaszámláló)</p>
						</div>
					</button>
					<div id="dropdown">
						<a href="./">Főoldal</a>
						<a href="./?logout">Kilépés</a>
					</div>
				</div>
			</div>
			<div class="menu_coll">
				<div id="menu">
					<a name="szoveg" href="./?p=adatok">Osztályzatok</a>
					<a name="szoveg" href="./?p=adatok">Osztályzatok2</a>
				</div>
			</div>
		</div>
	</nav>';
}
?>

<?php echo "<script type='text/javascript'>MenuSwap(".$_POST["bg"].");</script>"; ?>
<main>


<?php

?>