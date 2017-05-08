<?php
	var_dump($_POST);
	// echo $_POST['borrow_id'];
	// include_once '../../connect.php';
	// $borrow_items_id = array();

	// $sql = "SELECT items.item_id,borrow_detail.item_amount as item FROM `borrow_detail`INNER JOIN `borrow_table`ON borrow_detail.ref_borrow_id = borrow_table.borrow_id INNER JOIN `items` ON items.item_id = borrow_detail.item_id WHERE borrow_table.borrow_id = '{$_POST['borrow_id']}' ";

	// if ($res = mysqli_query($conn,$sql)) {
	// 	while ($row = mysqli_fetch_assoc($res)) {
	// 		$borrow_items_id[] = $row;
	// 	}
		// var_dump($borrow_items_id);
// array(2) {
//   [0]=>
//   array(2) {
//     ["item_id"]=>
//     string(6) "000001"
//     ["item"]=>
//     string(1) "1"
//   }
//   [1]=>
//   array(2) {
//     ["item_id"]=>
//     string(6) "000002"
//     ["item"]=>
//     string(1) "1"
//   }
// }
	// 	foreach ($borrow_items_id as $key => $value) {
	// 		// echo $value['item_id'];
	// 		$sql1 ="UPDATE `items` SET `quantity_remain`=quantity_remain-'{$value['item']}' WHERE `item_id` ='{$value['item_id']}' ";
	// 		// echo $sql1;
	// 		if(mysqli_query($conn,$sql1)) {
	// 		}
	// 			echo "true";
	// 	}
	// }
?>