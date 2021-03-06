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
    echo '<div id="'.$osztalyok[$i]["osztalyelo"].". ".$osztalyok[$i]["osztalyuto"]." ".$osztalyok[$i]["tantargy"].'" tantargy="'.$osztalyok[$i]["tantargy"].'" tantargyid="'.$osztalyok[$i]["tantargyid"].'" class="collapse" style="overflow-x:auto;">';
        echo '<table class="ttables">';
            echo '<tr id="tbar">';
                echo '<th id="tnev">N??v</th>';
                echo '<th id="tjegy" honap="9">Szeptember</th>';
                echo '<th id="tjegy" honap="10">Okt??ber</th>'; 
                echo '<th id="tjegy" honap="11">November</th>';
                echo '<th id="tjegy" honap="12">December</th>'; 
                echo '<th id="tjegy" honap="1">Janu??r</th>'; 
                echo '<th id="tjegy" honap="2">Febru??r</th>'; 
                echo '<th id="tjegy" honap="3">M??rcius</th>'; 
                echo '<th id="tjegy" honap="4">??prilis</th>'; 
                echo '<th id="tjegy" honap="5">M??jus</th>';
                echo '<th id="tjegy" honap="6">J??nius</th>';
                echo '<th id="tatlag">??tlag</th>';
            echo '</tr>';
            echo Tmain($osztalyok[$i]["osztalyId"],$osztalyok[$i]["tantargy"]);
        echo '</table>';
    echo '</div>';
}

?>
<div id="myPopup" class="popup">
	<div class="popup-content">
		<div class="mod-header">
            <span id="modtantargy">Tant??rgy</span>
			<span class="close" onclick="Close()">&times;</span>
		</div>
        <div class="mod-content" honap="" did="" tantargyid="">
            <div class="modhead">
                <div id="modnev">Tanul?? neve - H??nap</div>
                <div id="modinsert"><img id="plusz" src="./FrontEnd/img/plusz.png" alt="plusz.png"></div>
            </div>
            <div class="modmain">
                <table id="popup_table">
                <tr>
                    <td id='pop_jegy'>jegy</td>
                    <td id='pop_tema'>t??ma</td>
                    <td id='pop_suly'>s??ly</td>
                    <td id='pop_datum'>d??tum</td>
                    <td class='modositas'></td>
                    <td class='torles'></td>
                </tr>
                </table>
            </div>
        </div>
	</div>
</div>