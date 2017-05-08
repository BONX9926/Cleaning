<?php
session_start();
// var_dump($_POST['event']);
// echo $_POST['info'];
//"status_id:2,borrow_id:000001 "

//update status borrow
if(check_pass($_POST['password'])) {
	if ($_POST['event'] = "update_status") {
		$info = $_POST['info'];
		$status = explode(":", explode(",",$info)[0])[1];
		$borrow_id = explode(":", explode(",", $info)[1])[1];
		// echo $status;
		include_once '../../connect.php';
		if ($status == "1") {
			// echo $status;
			$sql = "UPDATE `borrow_table` SET `status`='{$status}' WHERE `borrow_id`='{$borrow_id}' ";
			if (mysqli_query($conn,$sql)) {
				echo "เปลี่ยนสถานะเรียบร้อยแล้ว";
			}
		} else if ($status == "2") {
			$sql = "UPDATE `borrow_table` SET `status`='{$status}' WHERE `borrow_id`='{$borrow_id}' ";
			// echo $status;
			// echo $sql;
			if (mysqli_query($conn,$sql)) {
				$sql = "SELECT items.item_id,borrow_detail.item_amount as item FROM `borrow_detail`INNER JOIN `borrow_table`ON borrow_detail.ref_borrow_id = borrow_table.borrow_id INNER JOIN `items` ON items.item_id = borrow_detail.item_id WHERE borrow_table.borrow_id = '{$borrow_id}' ";

				if ($res = mysqli_query($conn,$sql)) {
					while ($row = mysqli_fetch_assoc($res)) {
						$borrow_items_id[] = $row;
					}
					foreach ($borrow_items_id as $key => $value) {
						// echo $value['item_id'];
						$sql1 ="UPDATE `items` SET `quantity_remain`=quantity_remain-'{$value['item']}' WHERE `item_id` ='{$value['item_id']}' ";
						// echo $sql1;
						if(mysqli_query($conn,$sql1)) {
						}
					}
						echo "เปลี่ยนสถานะเรียบร้อยแล้ว";
				}
			}
		} else if($status == "3"){
			$sql = "UPDATE `borrow_table` SET `status`='{$status}' WHERE `borrow_id`='{$borrow_id}' ";
				if (mysqli_query($conn,$sql)) {
					echo "เปลี่ยนสถานะเรียบร้อยแล้ว";
				}
		} else if($status == "4"){
			$sql = "UPDATE `borrow_table` SET `status`='{$status}' WHERE `borrow_id`='{$borrow_id}' ";
				if (mysqli_query($conn,$sql)) {
					echo "เปลี่ยนสถานะเรียบร้อยแล้ว";
				}
		}
		
	} else {
		echo "ERROR";
	}
} else {
	echo "Password ไม่ถูกต้อง";
}

function check_pass($password){
	if(md5($password) === $_SESSION['pass']){
			return  true;
	}else{
			return  false;
	}
}
?>