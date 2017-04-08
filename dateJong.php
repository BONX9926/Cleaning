<?php
	session_start();
	include_once 'connect.php';
$wDay = $_POST['work-day'];
$package = $_POST['package'];
// var_dump($_POST);
// echo $wDay.$package;
// echo date('m-d-Y');
$today = date('d-m-Y');
	if (isset($wDay)  && isset($package)) {

		if ($package == 'day') {
	// $date = strtotime($wDay);
 //    $date = strtotime("+1 day", $date);
 //    echo date('d-m-Y', $date);
			// echo $wDay." To ".$wDay;
			$_SESSION['sDay'] = $wDay;
			$_SESSION['eDay'] = $wDay;
			# day
			// echo "5555";
			header('Location:jong2.php');
		} else {
			// echo "week";
			 // $date = "04-15-2013";
    $date = strtotime($wDay);
    $date = strtotime("+7 day", $date);
    $eDay = date('d-m-Y', $date);
    $_SESSION['sDay'] = $wDay;
    $_SESSION['eDay'] = $eDay;

    // echo $wDay." To ".$eDay;
// echo date('d-m-Y', strtotime('+7 days'));
			header('Location:jong2.php');
		}
	} else {
		echo "Error";
	}
?>