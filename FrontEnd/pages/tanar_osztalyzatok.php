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
                echo '<th id="tjegy">Szeptember</th>';
                echo '<th id="tjegy">Október</th>'; 
                echo '<th id="tjegy">November</th>'; 
                echo '<th id="tjegy">December</th>'; 
                echo '<th id="tjegy">Január</th>'; 
                echo '<th id="tjegy">Február</th>'; 
                echo '<th id="tjegy">Március</th>'; 
                echo '<th id="tjegy">Április</th>'; 
                echo '<th id="tjegy">Május</th>';
                echo '<th id="tjegy">Június</th>';
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
        <div class="mod-content">
            <table id="popup_table">
                <tr>
                    <th id="modnev" style="text-align:left;" colspan="5">Tanuló neve - Hónap</th>
                    <th><img id="plusz" src="./FrontEnd/img/plusz.png" alt="plusz.png"></th>
                </tr>
            </table>
        </div>
	</div>
</div>