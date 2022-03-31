<?php
include("functions.php");

if (isset($_POST['honap']) == true && empty($_POST['honap']) == false) {
    echo json_encode(MyDate($_POST['honap']));
}