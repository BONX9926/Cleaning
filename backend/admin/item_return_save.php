<?php

// array(3) {
//   ["item_return"]=>
//   array(2) {
//     [0]=>
//     array(2) {
//       ["name"]=>
//       string(18) "return-item-000001"
//       ["value"]=>
//       string(0) ""
//     }
//     [1]=>
//     array(2) {
//       ["name"]=>
//       string(18) "return-item-000002"
//       ["value"]=>
//       string(0) ""
//     }
//   }
//   ["item_wornout"]=>
//   array(2) {
//     [0]=>
//     array(2) {
//       ["name"]=>
//       string(21) "return-wornout-000001"
//       ["value"]=>
//       string(1) "0"
//     }
//     [1]=>
//     array(2) {
//       ["name"]=>
//       string(21) "return-wornout-000002"
//       ["value"]=>
//       string(1) "0"
//     }
//   }
//   ["br_id"]=>
//   string(6) "000006"
// }
include_once '../../connect.php';
$isset_item = array();
$limit_item = array();
$return = array();
	foreach ($_POST['item_return'] as $key => $value) {
		if($value['value'] != null || $value['value']!= ""){
			$isset_item[] = array(
				"item_id" => str_replace("return-item-", "", $value['name']) ,
				"amount"  => $value['value']
			);
		}
	}
	//
	foreach ($_POST['item_wornout'] as $key => $value) {
		$item = str_replace("return-wornout-", "", $value['name']);
		$amount = $value['value'];
		$sql_item_wornout = "UPDATE `items` SET `quantity_all`=`quantity_all` - '{$amount}' WHERE `item_id`='{$item}'";

		// mysqli_query($conn,$sql_item_wornout);
	}
$limit_item = true;
	foreach ($isset_item as $key => $value) {
	// echo $value['item_id']."\n";
		$sql_limit_item = "SELECT * FROM `borrow_detail` WHERE `item_id` = '{$value['item_id']}' AND `ref_borrow_id` = '{$_POST['br_id']}' ";

		// echo $sql_check_limit."\n";
		if($res = mysqli_query($conn,$sql_limit_item )){
			while ($row = mysqli_fetch_assoc($res)) {
				if($value['amount'] > $row['item_amount']){
					$limit_item = false;
					break;
				}
			}
		}
	}

	if($limit_item && count($isset_item) != 0){
	// update item return
	foreach ($isset_item as $key => $array_item) {
		$sql_update = "UPDATE `borrow_detail` SET `item_amount`= `item_amount`+'{$array_item['amount']}'  WHERE `ref_borrow_id` = '{$_POST['br_id']}' and `item_id` = '{$array_item['item_id']}'";

		$sql_return_stock = "UPDATE `sport_inventory` SET `item_total`= `item_total`+ {$array_item['amount']}  WHERE `item_id` = '{$array_item['item_id']}'";
		// if(mysqli_query($conn, $sql_update)){
		// 	mysqli_query($conn, $sql_return_stock);
		// }
	}


	$sql_check_item = "SELECT * FROM `borrow_detail` WHERE `item_amount` != `item_return_amount` and `ref_borrow_id` = '{$_POST['br_id']}'";
	// if($res = mysqli_query($conn, $sql_check_item)){
		if(mysqli_num_rows($res) != 0){
			// $update_status_br = "UPDATE `borrow_table` SET `br_status`='4' WHERE `borrow_id` = '{$_POST['br_id']}'"; 
			// mysqli_query($conn,$update_status_br);
			$return['status'] = true;
			$return['message'] = "เสร็จสิ้น";
			
		}else{
			$update_status_br = "UPDATE `borrow_table` SET `return_date`= '{$date}',`br_status`='5' WHERE `borrow_id` = '{$_POST['br_id']}'"; 
			// mysqli_query($conn,$update_status_br);
			$return['status'] = true;
			$return['message'] = "เสร็จสิ้น";
			
		}

	// update item return
	
}elseif( count($isset_item)==0){
	$return['status'] = false;
	$return['message'] = "ไม่ได้ป้อนข้อมูล";
	
}else{
	$return['status'] = false;
	$return['message'] = "ป้อนจำนวนเกิน การยืมกรุณาลองให่ม";
	
}

echo json_encode($return);
?>