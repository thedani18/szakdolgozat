<?php

$tantargyak = Tantargyak($_SESSION["login"]);
for ($i=0; $i < count($tantargyak); $i++) { 
    echo "<table id='tables'>";
        echo "<tr id='".('table'.$i)."' onclick='Open(\"".('table'.$i)."\",\"".$tantargyak[$i]["megnevezes"]."\")'>";
            echo "<th colspan='3'>";
                echo $tantargyak[$i]["megnevezes"];
            echo "</th>";
        echo "</tr>";
    echo "</table>";

    echo '<table id="'.$tantargyak[$i]["megnevezes"].'" style="display: none;">';
        echo '<tr id="tbar">';
            echo '<td id="honap">Hónap</td>';
            echo '<td id="jegyek"></td>';   
            echo '<td id="atlag">Átlag</td>';
        echo '</tr>';
        echo '<tr id="tmain">';
            echo '<td id="honap">szeptember</td>';
            echo '<td id="jegyek">';
                $begin = (date("Y")-1)."-09-01";
                $end = (date("Y")-1)."-09-30";
                $jegyek = Jegyek($_SESSION["login"],$tantargyak[$i]["megnevezes"],$begin,$end);
                if ($jegyek != null) {
                    for ($j=0; $j < count($jegyek); $j++) { 
                        echo $jegyek[$j]["jegy"];
                    }
                }
            echo '</td>';
            echo '<td id="atlag">3,2</td>';
        echo '</tr>';
        echo '<tr id="tmain">';
            echo '<td id="honap">október</td>';
            echo '<td id="jegyek">';
                $begin = (date("Y")-1)."-10-01";
                $end = (date("Y")-1)."-10-31";
                $jegyek = Jegyek($_SESSION["login"],$tantargyak[$i]["megnevezes"],$begin,$end);
                if ($jegyek != null) {
                    for ($j=0; $j < count($jegyek); $j++) { 
                        echo $jegyek[$j]["jegy"];
                    }
                }
            echo '</td>';
            echo '<td id="atlag">3,2</td>';
        echo '</tr>';
        echo '<tr id="tmain">';
            echo '<td id="honap">november</td>';
            echo '<td id="jegyek">';
                $begin = (date("Y")-1)."-11-01";
                $end = (date("Y")-1)."-11-30";
                $jegyek = Jegyek($_SESSION["login"],$tantargyak[$i]["megnevezes"],$begin,$end);
                if ($jegyek != null) {
                    for ($j=0; $j < count($jegyek); $j++) { 
                        echo $jegyek[$j]["jegy"];
                    }
                }
            echo '</td>';
            echo '<td id="atlag">3,2</td>';
        echo '</tr>';
        echo '<tr id="tmain">';
            echo '<td id="honap">december</td>';
            echo '<td id="jegyek">';
                $begin = (date("Y")-1)."-12-01";
                $end = (date("Y")-1)."-12-31";
                $jegyek = Jegyek($_SESSION["login"],$tantargyak[$i]["megnevezes"],$begin,$end);
                if ($jegyek != null) {
                    for ($j=0; $j < count($jegyek); $j++) { 
                        echo $jegyek[$j]["jegy"];
                    }
                }
            echo '</td>';
            echo '<td id="atlag">3,2</td>';
        echo '</tr>';
        echo '<tr id="tmain">';
            echo '<td id="honap">január</td>';
            echo '<td id="jegyek">';
                $begin = date("Y")."-01-01";
                $end = date("Y")."-01-31";
                $jegyek = Jegyek($_SESSION["login"],$tantargyak[$i]["megnevezes"],$begin,$end);
                if ($jegyek != null) {
                    for ($j=0; $j < count($jegyek); $j++) { 
                        echo $jegyek[$j]["jegy"];
                    }
                }
            echo '</td>';
            echo '<td id="atlag">3,2</td>';
        echo '</tr>';
        echo '<tr id="tmain">';
            echo '<td id="honap">február</td>';
            echo '<td id="jegyek">';
                $begin = date("Y")."-02-01";
                if (date("Y") % 4 == 0)
                    $end = date("Y")."-02-29";
                else
                    $end = date("Y")."-02-28";
                $jegyek = Jegyek($_SESSION["login"],$tantargyak[$i]["megnevezes"],$begin,$end);
                if ($jegyek != null) {
                    for ($j=0; $j < count($jegyek); $j++) { 
                        echo $jegyek[$j]["jegy"];
                    }
                }
            echo '</td>';
            echo '<td id="atlag">3,2</td>';
        echo '</tr>';
        echo '<tr id="tmain">';
            echo '<td id="honap">március</td>';
            echo '<td id="jegyek">';
                $begin = date("Y")."-03-01";
                $end = date("Y")."-03-31";
                $jegyek = Jegyek($_SESSION["login"],$tantargyak[$i]["megnevezes"],$begin,$end);
                if ($jegyek != null) {
                    for ($j=0; $j < count($jegyek); $j++) { 
                        echo $jegyek[$j]["jegy"];
                    }
                }
            echo '</td>';
            echo '<td id="atlag">3,2</td>';
        echo '</tr>';
        echo '<tr id="tmain">';
            echo '<td id="honap">április</td>';
            echo '<td id="jegyek">';
                $begin = date("Y")."-04-01";
                $end = date("Y")."-04-30";
                $jegyek = Jegyek($_SESSION["login"],$tantargyak[$i]["megnevezes"],$begin,$end);
                if ($jegyek != null) {
                    for ($j=0; $j < count($jegyek); $j++) { 
                        echo $jegyek[$j]["jegy"];
                    }
                }
            echo '</td>';
            echo '<td id="atlag">3,2</td>';
        echo '</tr>';
        echo '<tr id="tmain">';
            echo '<td id="honap">május</td>';
            echo '<td id="jegyek">';
                $begin = date("Y")."-05-01";
                $end = date("Y")."-05-31";
                $jegyek = Jegyek($_SESSION["login"],$tantargyak[$i]["megnevezes"],$begin,$end);
                if ($jegyek != null) {
                    for ($j=0; $j < count($jegyek); $j++) { 
                        echo $jegyek[$j]["jegy"];
                    }
                }
            echo '</td>';
            echo '<td id="atlag">3,2</td>';
        echo '</tr>';
        echo '<tr id="tmain">';
            echo '<td id="honap">június</td>';
            echo '<td id="jegyek">';
                $begin = date("Y")."-06-01";
                $end = date("Y")."-06-31";
                $jegyek = Jegyek($_SESSION["login"],$tantargyak[$i]["megnevezes"],$begin,$end);
                if ($jegyek != null) {
                    for ($j=0; $j < count($jegyek); $j++) { 
                        echo $jegyek[$j]["jegy"];
                    }
                }
            echo '</td>';
            echo '<td id="atlag">3,2</td>';
        echo '</tr>';
    echo '</table>';
}

?>