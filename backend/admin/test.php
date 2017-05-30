<?php
	//Time->D
// date_timezone_set(date(), timezone_open("Asia/Bangkok"));
// echo date_format($date, 'Y-m-d H:i:sP') . "\n";
// date.timezone = "Asia/Bangkok";
// date_default_timezone_set("Asia/Bangkok");
// date_default_timezone_set('Asia/Bangkok');
// echo $a = date("d-m-Y H:i:s");
echo "<br>";
echo convert_date(1490997600);
echo "<br>";
// echo convert_date();
echo convert_date($a = (1491004800-7200));
echo "<br>";
echo $a = (1491004800-7200);
echo "<br>";
echo $b = 1496188800-7200;
echo "<br>";
echo convert_date(1496188800);
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