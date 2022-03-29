<?php

function Honap($id,$honap,$megnevezes)
{
    $begin = MyDate($honap)["begin"];
    $end = MyDate($honap)["end"];
    $jegyek = Jegyek($id,$megnevezes,$begin,$end);
    $td = "<td id='tjegy'>";
        if ($jegyek != null) {
            for ($i=0; $i < count($jegyek); $i++) { 
                if ($i != count($jegyek)-1) {$td .= "<span>".$jegyek[$i]["jegy"].",</span>";}
                else {$td .= "<span>".$jegyek[$i]["jegy"]."</span>";}
            }
        }
    $td .= "</td>";
    return $td;
}

function Tmain($osztalyid,$tantargy)
{   
    $tmain = "";
    $diakok = Diakok($osztalyid);
    for ($i=0; $i < count($diakok); $i++) {
        $tmain .=
        '<tr id="tmain">
            <td id="tnev">'
                .$diakok[$i]["csaladnev"]." ".$diakok[$i]["utonev"].
            '</td>';
            $tmain .= Honap($diakok[$i]["id"],9,$tantargy);
            $tmain .= Honap($diakok[$i]["id"],10,$tantargy);
            $tmain .= Honap($diakok[$i]["id"],11,$tantargy);
            $tmain .= Honap($diakok[$i]["id"],12,$tantargy);
            $tmain .= Honap($diakok[$i]["id"],1,$tantargy);
            $tmain .= Honap($diakok[$i]["id"],2,$tantargy);
            $tmain .= Honap($diakok[$i]["id"],3,$tantargy);
            $tmain .= Honap($diakok[$i]["id"],4,$tantargy);
            $tmain .= Honap($diakok[$i]["id"],5,$tantargy);
            $tmain .= Honap($diakok[$i]["id"],6,$tantargy);
            $tmain .='<td id="tatlag">';
                $atlag = TAtlag($diakok[$i]["id"],$tantargy);
                if ($atlag != null) {
                    $tmain .= $atlag;
                }
            $tmain .= '</td>';
        $tmain .= '</tr>';
    }
    return $tmain;
}

$osztalyok = TanarOsztalyok($_SESSION["login"]);
for ($i=0; $i < count($osztalyok); $i++) { 
    echo "<table id='tables'>";
        echo "<tr id='".('table'.$i)."' onclick='Open(\"".('table'.$i)."\",\"".$osztalyok[$i]["osztalyelo"].".".$osztalyok[$i]["osztalyuto"]." ".$osztalyok[$i]["tantargy"]."\")'>";
            echo "<th colspan='3'>";
                echo $osztalyok[$i]["osztalyelo"].".".$osztalyok[$i]["osztalyuto"]." ".$osztalyok[$i]["tantargy"];
            echo "</th>";
        echo "</tr>";
    echo "</table>";
    echo '<div id="'.$osztalyok[$i]["osztalyelo"].".".$osztalyok[$i]["osztalyuto"]." ".$osztalyok[$i]["tantargy"].'" class="collapse" style="overflow-x:auto;">';
        echo '<table class="ttables">';
            echo '<tr id="tbar">';
                echo '<td id="tnev">Név</td>';
                echo '<td id="tjegy">Szeptember</td>';
                echo '<td id="tjegy">Október</td>'; 
                echo '<td id="tjegy">November</td>'; 
                echo '<td id="tjegy">December</td>'; 
                echo '<td id="tjegy">Január</td>'; 
                echo '<td id="tjegy">Február</td>'; 
                echo '<td id="tjegy">Március</td>'; 
                echo '<td id="tjegy">Április</td>'; 
                echo '<td id="tjegy">Május</td>';
                echo '<td id="tjegy">Június</td>';
                echo '<td id="tatlag">Átlag</td>';
            echo '</tr>';
            echo Tmain($osztalyok[$i]["osztalyId"],$osztalyok[$i]["tantargy"]);
        echo '</table>';
    echo '</div>';
}

?>