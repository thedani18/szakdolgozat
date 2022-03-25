<?php

function UserCheck($user) 
{
    $van = false;
    $sql = "SELECT * FROM szd_felhasznalo WHERE felhnev LIKE '$user';";
    $result = connect()->query($sql);
    if ($result->num_rows > 0) {
        $van = true;
    }

    connect()->close();
    return $van;
}

function PwCheck($user, $pw)
{
    $van = false;
    $pw = crypt($pw,'$6$'.PwSalt($user).'$');
    $sql = "SELECT * FROM szd_felhasznalo WHERE felhnev LIKE '$user' AND jelszo LIKE '$pw';";
    $result = connect()->query($sql);
    if ($result->num_rows > 0) {
        $van = true;
    }

    connect()->close();
    return $van;
}

function PwSalt($user)
{
    $sql = "SELECT salt FROM szd_felhasznalo WHERE felhnev LIKE '$user'";
    $result = connect()->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $info = $row["salt"];
    }

    connect()->close();
    return $info;
}

function UserDefault($user)
{
    $sql = 
    "SELECT szd_felhasznalo.felhId, jogosultsag
    FROM szd_felhasznalo
    INNER JOIN szd_jogosultsag ON szd_felhasznalo.jogId = szd_jogosultsag.jogId
    WHERE felhnev LIKE '$user';";
    $result=connect()->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $info["felhId"] = $row["felhId"];
        $info["jogosultsag"] = $row["jogosultsag"];
    }
    else {
        $info = null;
    }

    connect()->close();
    return $info;
}

function User($id)
{
    $sql = "SELECT csaladnev, utonev, szulido, szulhely FROM szd_felhasznalo WHERE felhId = $id";
    $result=connect()->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $info["csaladnev"] = $row["csaladnev"];
        $info["utonev"] = $row["utonev"];
        $info["szulido"] = $row["szulido"];
        $info["szulhely"] = $row["szulhely"];
    }
    else {
        $info = null;
    }

    connect()->close();
    return $info;
}

function Osztalyfonok($id)
{
    $sql = 
    "SELECT megnevezes, csaladnev, utonev 
    FROM szd_osztaly
    INNER JOIN szd_felhasznalo ON szd_osztaly.ofId = szd_felhasznalo.felhId
    WHERE osztalyId = ".Osztaly($id).";";
    $result=connect()->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $info["osztaly"] = $row["megnevezes"];
        $info["tcsaladnev"] = $row["csaladnev"];
        $info["tutonev"] = $row["utonev"];
    }
    else {
        $info = null;
    }

    connect()->close();
    return $info;
}

function Osztaly($id)
{
    $sql =
    "SELECT osztalyId
    FROM szd_diakosztaly
    INNER JOIN szd_felhasznalo ON szd_diakosztaly.diakId = szd_felhasznalo.felhId
    WHERE felhId = $id;";
    $result=connect()->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $info = $row["osztalyId"];
    }
    else {
        $info = null;
    }

    connect()->close();
    return $info;
}

function Tantargyak($id)
{
    $sql =
    "SELECT szd_tantargy.megnevezes
    FROM szd_osztaly
    INNER JOIN szd_diakosztaly On szd_osztaly.osztalyId = szd_diakosztaly.osztalyId
    INNER JOIN szd_felhasznalo ON szd_diakosztaly.diakId = szd_felhasznalo.felhId
    INNER JOIN szd_oszttgytr ON szd_osztaly.osztalyId = szd_oszttgytr.osztalyId
    INNER JOIN szd_tgytr ON szd_oszttgytr.TTId = szd_tgytr.TTId
    INNER JOIN szd_tantargy ON szd_tgytr.tantargyId = szd_tantargy.tantargyId
    WHERE felhId = $id;";
    $result=connect()->query($sql);
    if($result->num_rows >0) {
        $n = 0;
        while ($row = $result->fetch_assoc()) 
        {
            $list[$n]["megnevezes"] = $row["megnevezes"];
            $n++;
        }
    }
    else {
        $list = null;
    }
    connect()->close();
    return $list;
}

function Jegyek($id,$tantargy,$begin,$end)
{
    $sql =
    "SELECT jegy, tipusId
    FROM szd_beiras
    INNER JOIN szd_tantargy ON szd_beiras.tantargyId = szd_tantargy.tantargyId
    INNER JOIN szd_felhasznalo ON szd_beiras.diakId = szd_felhasznalo.felhId
    WHERE felhId = $id
    AND megnevezes LIKE '$tantargy'
    AND datum BETWEEN '$begin' AND '$end';";
    $result=connect()->query($sql);
    if($result->num_rows >0) {
        $n = 0;
        while ($row = $result->fetch_assoc()) 
        {
            $list[$n]["jegy"] = $row["jegy"];
            $list[$n]["suly"] = $row["tipusId"];
            $n++;
        }
    }
    else {
        $list = null;
    }
    connect()->close();
    return $list;
}
?>