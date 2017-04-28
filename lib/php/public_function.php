<?php
// 04-07-2017 17:46:34
	// แปลง Timestamp เป็น Date
	function convert_date($timestamp)
	{
		$patt = "d-m-Y H:i:s";
		return date($patt, $timestamp);

	}
	// แปลง Timestamp เป็น Date

	// แปลง Date เป็น Timestamp
	function revert_date($fulldate)
	{
		return strtotime($fulldate);
	}
	// แปลง Date เป็น Timestamp

	//เดือนไทย
	function date_thai($timestamp) 
	{
		$mount 	= array(
			"01" => "ม.ค.",
			"02" => "ก.พ.",
			"03" => "มี.ค",
			"04" => "เม.ย",
			"05" => "พ.ค.",
			"06" => "มิ.ย.",
			"07" => "ก.ค",
			"08" => "ส.ค.",
			"09" => "ก.ย.",
			"10" => "ตุ.ค.",
			"11" => "พ.ย.",
			"12" => "ธ.ค.",
		);

		$patt 		= "d-m-Y";
		$fulldate 	= date($patt, $timestamp);
		$fulldate_arr = explode("-", $fulldate);
		$fulldate_arr[0] = 'วันที่ '.($fulldate_arr[0]*1);
		$fulldate_arr[1] = $mount[$fulldate_arr[1]];
		$fulldate_arr[2] = ($fulldate_arr[2]*1)+543;
		
		return implode(" ", $fulldate_arr);


	}
	

	 // var_dump(revert_date($_GET['date']));
	// var_dump(convert_date('1499183194'));
?>