<?php 
	// var_dump($_POST);
// var_dump($_FILES);

	if (isset($_FILES['file'])) {
		if ($_FILES['file']['size'] > 0) {
			if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['money'])) {
				// header("Location:payment.php?succ=1");
				$money = str_ireplace(',', '', $_POST['money']);
				include_once 'connect.php';
				$tmp_path = "image/payment/";
				// var_dump($_FILES);
				if(move_uploaded_file($_FILES['file']['tmp_name'], $tmp_path.$_FILES["file"]["name"])) {
				$sql = "INSERT INTO `payment`(`num_bin`, `name`, `email`, `phone`, `money`, `file`) VALUES ('{$_POST['num_bin']}', '{$_POST['name']}', '{$_POST['email']}', '{$_POST['phone']}', '{$money}', '{$_FILES['file']['name']}')";
					if (mysqli_query($conn,$sql)) {
						$numbin= $_POST['num_bin'];
						header("Location:payment.php?succ=1&numbin=$numbin");
					} else {
						echo "$sql error";
					}
				} else {
					echo "Error UPLOAD Fail!!";
				}
				// echo "string";
			} else {
				$numbin= $_POST['num_bin'];
				header("Location:payment.php?succ=2&numbin=$numbin");

			}
		} else {
			$numbin= $_POST['num_bin'];
			header("Location:payment.php?succ=2&numbin=$numbin");
		}

	} else {
		$numbin= $_POST['num_bin'];
		header("Location:payment.php?succ=2&numbin=$numbin");
	}
?>