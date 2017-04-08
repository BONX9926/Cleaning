<?php
// 04-07-2017 17:46:34
	// แปลง Timestamp เป็น Date
	function convert_date($timestamp) {
		$patt = "d-m-Y H:i:s";
		return date($patt, $timestamp);

	}
	// แปลง Timestamp เป็น Date

	// แปลง Date เป็น Timestamp
	function revert_date($fulldate) {

		return strtotime($fulldate);

	}
	// แปลง Date เป็น Timestamp

	 // var_dump(revert_date($_GET['date']));
	// var_dump(convert_date('1499183194'));
?>