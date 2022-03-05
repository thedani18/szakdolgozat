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

<?php
if (isset($_SESSION["login"])) {
	echo '<nav>
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
						<a href="./?logout">Kilépés</a>
					</div>
				</div>
			</div>
			<div class="menu_coll">
				<a href="./?p=adatok">Osztályzatok</a>
				<a href="./">home</a>
			</div>
		</div>
	</nav>';
}
?>
<main>


<?php

?>