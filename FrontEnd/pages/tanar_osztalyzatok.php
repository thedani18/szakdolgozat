<?php

function Honap($id,$honap,$megnevezes)
{
    $begin = MyDate($honap)["begin"];
    $end = MyDate($honap)["end"];
    $jegyek = Jegyek($id,$megnevezes,$begin,$end);
    $td = "<td class='tjegy' jegyid='";
        if ($jegyek != null) {
            for ($i=0; $i < count($jegyek); $i++) { 
                if ($i != count($jegyek)-1) {$td .= $jegyek[$i]["id"].",";}
                else {$td .= $jegyek[$i]["id"];}
            }
        }
    $td .= "'>";
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
            <td id="tnev" did="'.$diakok[$i]["id"].'">'
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
        echo "<tr id='".('table'.$i)."' onclick='Open(\"".('table'.$i)."\",\"".$osztalyok[$i]["osztalyelo"].". ".$osztalyok[$i]["osztalyuto"]." ".$osztalyok[$i]["tantargy"]."\")'>";
            echo "<th colspan='3'>";
                echo $osztalyok[$i]["osztalyelo"].". ".$osztalyok[$i]["osztalyuto"]." ".$osztalyok[$i]["tantargy"];
            echo "</th>";
        echo "</tr>";
    echo "</table>";
    echo '<div id="'.$osztalyok[$i]["osztalyelo"].". ".$osztalyok[$i]["osztalyuto"]." ".$osztalyok[$i]["tantargy"].'" tantargy="'.$osztalyok[$i]["tantargy"].'" class="collapse" style="overflow-x:auto;">';
        echo '<table class="ttables">';
            echo '<tr id="tbar">';
                echo '<th id="tnev">Név</th>';
                echo '<th id="tjegy" honap="9">Szeptember</th>';
                echo '<th id="tjegy" honap="10">Október</th>'; 
                echo '<th id="tjegy" honap="11">November</th>';
                echo '<th id="tjegy" honap="12">December</th>'; 
                echo '<th id="tjegy" honap="1">Január</th>'; 
                echo '<th id="tjegy" honap="2">Február</th>'; 
                echo '<th id="tjegy" honap="3">Március</th>'; 
                echo '<th id="tjegy" honap="4">Április</th>'; 
                echo '<th id="tjegy" honap="5">Május</th>';
                echo '<th id="tjegy" honap="6">Június</th>';
                echo '<th id="tatlag">Átlag</th>';
            echo '</tr>';
            echo Tmain($osztalyok[$i]["osztalyId"],$osztalyok[$i]["tantargy"]);
        echo '</table>';
    echo '</div>';
}

?>
<div id="myPopup" class="popup">
	<div class="popup-content">
		<div class="mod-header">
            <span id="modtantargy">Tantárgy</span>
			<span class="close" onclick="Close()">&times;</span>
		</div>
        <div class="mod-content" honap="">
            <div class="modhead">
                <div id="modnev">Tanuló neve - Hónap</div>
                <div id="modinsert"><img id="plusz" src="./FrontEnd/img/plusz.png" alt="plusz.png"></div>
            </div>
            <div class="modmain">
                <table id="popup_table">
                <tr>
                    <td id='pop_jegy'>jegy</td>
                    <td id='pop_tema'>téma</td>
                    <td id='pop_suly'>súly</td>
                    <td id='pop_datum'>dátum</td>
                    <td class='modositas'></td>
                    <td class='torles'></td>
                </tr>
                </table>
            </div>
        </div>
	</div>
</div>