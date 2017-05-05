<?php
// get_items_borrow(000001);
	function get_items_borrow($borrow_id,$conn) {
		// include_once '../../connect.php';
		$borrow_items = array();
		$borrow_items_use = array();
		$sql = "SELECT CONCAT(items.item_name ,' ',borrow_detail.item_amount,' ชิ้น') as item FROM `borrow_detail`INNER JOIN `borrow_table`ON borrow_detail.ref_borrow_id = borrow_table.borrow_id INNER JOIN `items` ON items.item_id = borrow_detail.item_id WHERE borrow_table.borrow_id = '{$borrow_id}' ";
		
		// echo $sql;
		if ($res = mysqli_query($conn,$sql)) {
			while ($row = mysqli_fetch_assoc($res)) {
				$borrow_items[] = $row;
			}
			// var_dump($borrow_items);
			foreach ($borrow_items as $key => $value) {
				$borrow_items_use[] = implode(',',$value);
			}
			return implode(",", $borrow_items_use);
			// return implode(',', $borrow_items);
		}
	}
?>