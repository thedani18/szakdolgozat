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
?>