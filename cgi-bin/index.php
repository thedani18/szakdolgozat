<?php
include("./BackEnd/DBConnection.php");
include("./BackEnd/DBFunctions.php");
include("./BackEnd/session.php"); // session kezelés
include("./BackEnd/functions.php");// függvények és eljárások
include("./FrontEnd/menu.php"); // menükezelés
include("./FrontEnd/header.php"); // fejrész
include($content); // tartalmi rész
include("./FrontEnd/footer.php");// lábrész
?>