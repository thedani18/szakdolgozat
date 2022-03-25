<?php

function MyDate($honap)
{   
    $datum = ["0","január","február","március","április","május","június","július","augusztus","szeptember","október","november","december"];

    if ($honap > 8) {
        $time["begin"] = (date("Y")-1)."-".$honap."-01";
        $time["end"] =  (date("Y")-1)."-".$honap."-".cal_days_in_month(CAL_GREGORIAN, $honap, (date("Y")-1));
    }
    else {
        $time["begin"] = (date("Y")."-".$honap."-01");
        $time["end"] =  date("Y")."-".$honap."-".cal_days_in_month(CAL_GREGORIAN, $honap, date("Y"));
    }
    $time["month"] = $datum[$honap];
    return $time;
}

?>