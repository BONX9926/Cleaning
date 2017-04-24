<?php 
	// var_dump($_POST);
// var_dump($_FILES);

	if (isset($_FILES['file'])) {
		if ($_FILES['file']['size'] > 0) {
			if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['money'])) {
				// header("Location:payment.php?succ=1");
				include_once 'connect.php';
				$tmp_path = "image/payment/";
				// var_dump($_FILES);
				if(move_uploaded_file($_FILES['file']['tmp_name'], $tmp_path.$_FILES["file"]["name"])) {
				$sql = "INSERT INTO `payment`(`num_bin`, `name`, `email`, `phone`, `money`, `file`) VALUES ('{$_POST['num_bin']}', '{$_POST['name']}', '{$_POST['email']}', '{$_POST['phone']}', '{$_POST['money']}', '{$_FILES['file']['name']}')";
					if (mysqli_query($conn,$sql)) {
						# code...
						header("Location:payment.php?succ=1");
					} else {
						echo "$sql error";
					}
				} else {
					echo "Error UPLOAD Fail!!";
				}
				// echo "string";
			} else {
				header("Location:payment.php?succ=2");
			}
		} else {
			header("Location:payment.php?succ=2");
		}

	} else {
		header("Location:payment.php?succ=2");
	}
?>