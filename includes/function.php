<?php

function date_xs($strDate){
	
    $strYear = date("Y",strtotime($strDate));
	$strYear = $strYear +543;
	$strYear = substr($strYear,2,2);
    $strMonth= date("m",strtotime($strDate));
    $strDay= date("d",strtotime($strDate));
    $time_thai = "  ".date("H:i",strtotime($strDate));
    return "$strDay/$strMonth/$strYear";
    //return "$strDay/$strMonth/$strYear $time_thai";
}
function date_time_request($time){
    global $thai_day_arr,$thai_month_arr;
    $thai_date_return="วัน".$thai_day_arr[date("w",strtotime($time))];
    $thai_date_return.= "ที่ ".date("j",strtotime($time));
    $thai_date_return.=" เดือน ".$thai_month_arr[date("n",strtotime($time))];
    $thai_date_return.= " พ.ศ.".(date("Y",strtotime($time))+543);
    $thai_date_return.= " &nbsp; เวลา ".date("H:i",strtotime($time))." น.";
    return $thai_date_return;
}
//$hcode = '12275';
$expire_date = "2022-10-07 13:00:00";
function project_year($d) {
	
	$end_month = date('m', strtotime($d));
	$end_year = date('Y', strtotime($d));
	if($end_month < 9) {
		$b_year = $end_year;
	} else {
		$b_year = $end_year + 1;
	}
	$yname = $b_year + 543;
	return $yname;

}
?>