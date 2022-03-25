<?php

//TODO átírni showos megoldásra és úgy megcsinálni, ha másikra nyom rá akkor bezárja a többit

function Atlag($jegyek)
{
    $sum = 0;
    for ($i=0; $i < count($jegyek); $i++) { 
        $sum += $jegyek[$i]["jegy"] * $jegyek[$i]["suly"];
    }
    return ($sum / count($jegyek));
}

function Tmain($honap,$megnevezes)
{
    $begin = MyDate($honap)["begin"];
    $end = MyDate($honap)["end"];
    $jegyek = Jegyek($_SESSION["login"],$megnevezes,$begin,$end);
    $tmain =
    '<tr id="tmain">
        <td id="honap">'.MyDate($honap)["month"].'</td>
        <td id="jegyek">';
            if ($jegyek != null) {
                for ($j=0; $j < count($jegyek); $j++) { 
                    $tmain .= $jegyek[$j]["jegy"];
                }
            }
    $tmain .=
        '</td>
        <td id="atlag">';
        if ($jegyek != null) {
            $tmain .= Atlag($jegyek);
        }
    $tmain .=
        '</td>
    </tr>';
    return $tmain;
}

$tantargyak = Tantargyak($_SESSION["login"]);
for ($i=0; $i < count($tantargyak); $i++) { 
    echo "<table id='tables'>";
        echo "<tr id='".('table'.$i)."' onclick='Open(\"".('table'.$i)."\",\"".$tantargyak[$i]["megnevezes"]."\")'>";
            echo "<th colspan='3'>";
                echo $tantargyak[$i]["megnevezes"];
            echo "</th>";
        echo "</tr>";
    echo "</table>";
    echo '<div id="'.$tantargyak[$i]["megnevezes"].'" class="collapse">';
        echo '<table>';
            echo '<tr id="tbar">';
                echo '<td id="honap">Hónap</td>';
                echo '<td id="jegyek"></td>';   
                echo '<td id="atlag">Átlag</td>';
            echo '</tr>';
            echo Tmain(9,$tantargyak[$i]["megnevezes"]); //Szeptember
            echo Tmain(10,$tantargyak[$i]["megnevezes"]); //Október
            echo Tmain(11,$tantargyak[$i]["megnevezes"]); //November
            echo Tmain(12,$tantargyak[$i]["megnevezes"]); //December
            echo Tmain(1,$tantargyak[$i]["megnevezes"]); //Január
            echo Tmain(2,$tantargyak[$i]["megnevezes"]); //Február
            echo Tmain(3,$tantargyak[$i]["megnevezes"]); //Március
            echo Tmain(4,$tantargyak[$i]["megnevezes"]); //Április
            echo Tmain(5,$tantargyak[$i]["megnevezes"]); //Május
            echo Tmain(6,$tantargyak[$i]["megnevezes"]); //Június
        echo '</table>';
    echo '</div>';
}

?>