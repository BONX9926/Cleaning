<?php
	session_start();
	// var_dump($_POST);
	// var_dump($_SESSION);
	include_once '../../connect.php';
	if ($_POST['event'] == "send") {
		$sql = "INSERT INTO `borrow_table`(`ref_maid_id`) VALUES ('{$_SESSION['id']}') ";
		if (mysqli_query($conn, $sql)) {
			$sql1 ="SELECT `borrow_id` FROM `borrow_table` WHERE `ref_maid_id`='{$_SESSION['id']}' AND `status`='1' ORDER BY `borrow_id` DESC LIMIT 1 ";
			if ($res = mysqli_query($conn, $sql1)) {
				$row = mysqli_fetch_assoc($res);
				// var_dump($row);

				foreach ($_SESSION['items_cart'] as $item_id => $amount) {

					$sql1 ="INSERT INTO `borrow_detail`(`ref_borrow_id`, `item_id`, `item_amount`) VALUES ('{$row['borrow_id']}','{$item_id}','{$amount}') ";
					// echo $sql1."<br>";
					if (mysqli_query($conn, $sql1)) {
						$_SESSION['items_cart'] = array();
						// echo "true";
					}
				}
				echo "true";
			}

		}
	} else {
		echo "ERROR SEND";
	}
?>