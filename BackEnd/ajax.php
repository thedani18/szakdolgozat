<?php
include("DBConnection.php");

//popup jegy lekérdezés
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

if (isset($_POST['bid']) == true && empty($_POST['bid']) == false) {
    switch ($_POST['bsuly']) {
        case '100%':
            $suly = 1;
            break;

        case '200%':
            $suly = 2;
            break;

        case '300%':
            $suly = 3;
            break;
    }
    $siker = false;
    $sql = "UPDATE szd_beiras SET datum = '".$_POST['bdatum']."', tema = '".$_POST['btema']."', jegy = '".$_POST['bjegy']."', tipusId = '$suly' WHERE beirasId = '".$_POST['bid']."';"; 
    $result = connect()->query($sql);
    if ($result) {
        $siker = true;
    }

    connect()->close();
    return $siker;
}

if (isset($_POST['torlesid']) == true && empty($_POST['torlesid']) == false) {
    $siker = false;
    $sql = "DELETE FROM szd_beiras WHERE beirasId = ".$_POST['torlesid'].";"; 
    $result = connect()->query($sql);
    if ($result) {
        $siker = true;
    }

    connect()->close();
    return $siker;
}

if (isset($_POST['last']) == true && empty($_POST['last']) == false) {
    $sql = "SELECT MAX(beirasId) as 'maxid' FROM szd_beiras;"; 
    $result=connect()->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id = $row["maxid"];
    }
    connect()->close();
    echo json_encode($id);
}

if (isset($_POST['vjegy']) == true && empty($_POST['vjegy']) == false) {
    $siker = false;
    switch ($_POST['vsuly']) {
        case '100%':
            $suly = 1;
            break;

        case '200%':
            $suly = 2;
            break;

        case '300%':
            $suly = 3;
            break;
    }
    $sql =
    "INSERT INTO szd_beiras (datum, tanarID, diakId, tantargyId, tema, jegy, TipusId) VALUES
    ('".$_POST['vdatum']."',".$_SESSION['login'].",".$_POST['vdiak'].",".$_POST['tantargy'].",'".$_POST['vtema']."',".$_POST['vjegy'].",".$suly.");"; 
    $result = connect()->query($sql);
    if ($result) {
        $siker = true;
    }

    connect()->close();
    return $siker;
}