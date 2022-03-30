<?php
include("DBConnection.php");

if (isset($_POST['id']) == true && empty($_POST['id']) == false) {
    $sql = 
    "SELECT jegy,tema,suly,datum 
    FROM szd_beiras
    INNER JOIN szd_jegytipus ON szd_beiras.tipusId = szd_jegytipus.tipusId
    WHERE beirasId = ".$_POST['id'].";";
    $result=connect()->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $array = array($row["jegy"], $row["tema"], $row["suly"], $row["datum"]);
    }
    else {
        $array = null;
    }

    connect()->close();
    echo json_encode($array);
}
?>