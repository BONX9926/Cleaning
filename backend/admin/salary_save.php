<?php
// array(5) {
//   ["id"]=>
//   string(6) "000002"
//   ["salary"]=>
//   string(4) "2750"
//   ["vat"]=>
//   string(3) "193"
//   ["startMonth"]=>
//   string(10) "1490997600"
//   ["endMonth"]=>
//   string(10) "1496181600"
// }
	if (isset($_POST['id']) && isset($_POST['salary']) && isset($_POST['vat']) && isset($_POST['startMonth']) && isset($_POST['endMonth'])) {
		include_once '../../connect.php';
		$sql_salary = "INSERT INTO `salary`(`ref_maid_id`, `salary`, `vat`, `startMonth`, `endMonth`) VALUES ('{$_POST['id']}','{$_POST['salary']}','{$_POST['vat']}','{$_POST['startMonth']}','{$_POST['endMonth']}')";
		if (mysqli_query($conn,$sql_salary)) {
			echo "<h1 style='color:green;'>บันทึกข้อมูลเรียบร้อย</h1>";
		}
	}


?>