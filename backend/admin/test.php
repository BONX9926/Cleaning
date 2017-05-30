<?php
	//Time->D
// date_timezone_set(date(), timezone_open("Asia/Bangkok"));
// echo date_format($date, 'Y-m-d H:i:sP') . "\n";
// date.timezone = "Asia/Bangkok";
date_default_timezone_set("Asia/Bangkok");
echo convert_date(1493683200);
	function convert_date($timestamp)
	{
		$patt = "d-m-Y H:i:s";
		return date($patt, $timestamp);

	}

	//D->Time
	function revert_date($fulldate)
	{
		return strtotime($fulldate);
	}


?>