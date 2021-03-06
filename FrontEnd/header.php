<!DOCTYPE html>
<html lang='hu'>
<head>
	<meta charset='utf-8' />
	<meta name='viewport' content='width=device-width, initial-scale=1.0' />
	<link rel = "icon" href = "./FrontEnd/img/e-penna_logo_ikon.png" type = "image/x-icon">
	<link rel='stylesheet' href='./FrontEnd/css/mystyle.css' />
	<link rel='stylesheet' href='./FrontEnd/css/bg.css' />	
	<link rel='stylesheet' href='./FrontEnd/css/login.css' />
	<link rel='stylesheet' href='./FrontEnd/css/nav.css' />
	<link rel='stylesheet' href='./FrontEnd/css/table.css' />
	<link rel='stylesheet' href='./FrontEnd/css/popup.css' />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://momentjs.com/downloads/moment.js"></script>
	<script type="text/javascript" src="./FrontEnd/functions/functions.js"></script>
	<title>E-Penna</title>
</head>

<body id='pagetop'>


<?php
if ($_POST["bg"] == 1) {
	echo "<div class='flex-container'>";
		echo "<div id='row' class='bg'>";
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
	$user = User($_SESSION["login"]);
	echo '<nav id="nav">
		<div class="nav_row">
			<div class="info_coll">
				<div id="info" class="info">
					<div class="usermenu" onclick="InfoDropdown()">
						<div class="userimg">
							<img src="./FrontEnd/img/profile.jpg" alt="profile.jpg">
						</div>
						<div class="username">
							<p id="name">'.$user["csaladnev"].' '.$user["utonev"].'</p>
							<p>(<span id="time">00:00</span>)</p>
						</div>
					</div>
					<div id="dropdown" class="dropdown-content">
						<a href="./">Főoldal</a>
						<a id="info" onclick="Info()">Info</a>
						<a href="./?logout">Kilépés</a>
					</div>
				</div>
			</div>
			<div class="menu_coll">
				<div id="menu">';
					if ($_SESSION["jogosultsag"] == "tanar") {
						echo '<a name="szoveg" href="./?p=osztalyzatok">Tantárgyak</a>';
					}
					elseif ($_SESSION["jogosultsag"] == "diak") {
						echo '<a name="szoveg" href="./?p=osztalyzatok">Osztályzatok</a>';
					}
			echo '</div>
			</div>
		</div>
	</nav>';
	if ($_SESSION["jogosultsag"] == "diak") {
		$osztaly = Osztalyfonok($_SESSION["login"]);
	}
	$infokiir =
	'<div id="myModal" class="modal">
		<div class="modal-content">
			<div class="info-header">
				<span class="close" onclick="Info()">&times;</span>
			</div>
			<div class="info-content">
				<div class="row">
					<span class="nevezes">Családnév:</span>
					<span>'.$user["csaladnev"].'</span>
				</div>
				<div class="row">
					<span class="nevezes">Utónév:</span>
					<span>'.$user["utonev"].'</span>
				</div>
				<div class="row">
					<span class="nevezes">Születési idő:</span>
					<span>'.$user["szulido"].'</span>
				</div>
				<div class="row">
					<span class="nevezes">Születési hely:</span>
					<span>'.$user["szulhely"].'</span>
				</div>';
				if ($_SESSION["jogosultsag"] == "diak") {
					$infokiir .= 
					'<div class="row">
						<span class="nevezes">Osztályfőnök:</span>
						<span>'.$osztaly["tcsaladnev"].' '.$osztaly["tutonev"].'</span>
					</div>
					<div class="row">
						<span class="nevezes">Osztály:</span>
						<span>'.$osztaly["osztalyelo"].'. '.$osztaly["osztalyuto"].'</span>
					</div>';
				}
	$infokiir .= '</div>
		</div>
	</div>';
	echo $infokiir;
	echo "<script type='text/javascript'>MenuSwap(".$_POST["bg"].");</script>";
	echo "<script type='text/javascript'>Timer(".$_SESSION["expire"].");</script>"; 
}
?>
<main>