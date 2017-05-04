<?php
	 // var_dump($_POST);
	 // die();
	session_start();
	// $return = array();
	if($_POST["event"] == 'get_count_item'){
		$count = 0;
		foreach ($_SESSION['items_cart'] as $key => $value) {
			$count+= $value;
		}
		echo $count;
	}elseif ($_POST["event"] == 'set') {
			if (isset($_POST['data'][0]['value']) != "") {
				$item_id = $_POST['data'][0]['value'];
				$amount = $_POST['data'][1]['value'];
				include_once '../../connect.php';
				$sql = "SELECT * FROM `items` WHERE `item_id`='{$item_id}' ";
				if ($res = mysqli_query($conn,$sql)) {
					$row = mysqli_fetch_assoc($res);
					// var_dump($row);
					// var_dump($_POST);
					if ($amount <= $row['quantity_remain']) {
						if (isset($_SESSION['items_cart'][$item_id])) {
							$_SESSION['items_cart'][$item_id]+= $amount;
							echo "true";
						} else {
							$_SESSION['items_cart'][$item_id] = $amount;
							echo "true";
						}
					} else {
						echo "อุปกรณ์ไม่เพียงพอ";
					}
				} else {
					// SQL ERROR
					echo "SQL ERROR";
				}
			} else {
				echo "DATA ERROR SEND";
			}
		# code...
	}else{

	}

	// if (count($_SESSION['items_cart']) > 0) {
	// 	# code...
	// 	echo "IF";
	// } else {
	// 	echo "ELSE";
	// }

	// echo json_encode($return);
?>