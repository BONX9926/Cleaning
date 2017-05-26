<?php
// array(1) {
//   ["file"]=>
//   array(5) {
//     ["name"]=>
//     string(51) "17814257_1456317611106951_5746767837973418459_o.jpg"
//     ["type"]=>
//     string(10) "image/jpeg"
//     ["tmp_name"]=>
//     string(24) "C:\xampp\tmp\phpF50B.tmp"
//     ["error"]=>
//     int(0)
//     ["size"]=>
//     int(151472)
//   }
// }
// array(7) {
//   ["uid"]=>
//   string(28) "DOessgtlMVMyJWI1OaUHBdpRYUy2"
//   ["date_time"]=>
//   string(10) "1492293600"
//   ["area_size"]=>
//   string(6) "000001"
//   ["rooms"]=>
//   array(3) {
//     [0]=>
//     string(6) "000001"
//     [1]=>
//     string(6) "000002"
//     [2]=>
//     string(6) "000003"
//   }
//   ["items"]=>
//   array(2) {
//     [0]=>
//     string(6) "000001"
//     [1]=>
//     string(6) "000002"
//   }
//   ["comment"]=>
//   string(4) "text"
//   ["arr_maid"]=>
//   array(2) {
//     [0]=>
//     string(6) "000002"
//     [1]=>
//     string(6) "000004"
//   }
// }
	$return = array();
	// var_dump($_FILES);
	// var_dump($_POST);
	if (isset($_POST['arr_maid']) && isset($_POST['uid']) && isset($_POST['date_time'])) {
		include_once '../connect.php';
		include_once '../lib/php/public_function.php';
		$date = ($_POST['date_time'])*1;
		$one_day = ($date*1) + (86400-1);
		$sql ="SELECT * FROM `booking_table` WHERE `ref_booking_uid` = '{$_POST['uid']}' AND `status_id` ='false' ";
		if ($res = mysqli_query($conn,$sql)) {
			if($res->num_rows > 0) {
				$return['status'] = false;
				$return['message'] = "คุณมีรายการจองที่ค้างชำระอยู่";
			} else {
	// 			//pass
				// echo "PASS";
				// $sql="";
				$sql="SELECT `size_pirce` FROM `size_area` WHERE `size_id`='{$_POST['area_size']}' LIMIT 1";
				if ($res = mysqli_query($conn,$sql)) {
					$data = mysqli_fetch_assoc($res);
					$price_area =$data['size_pirce'];
				} else {
					echo "SQL ERROR get price_area";
				}

				$sql = "";
				$sql ="INSERT INTO `booking_table`(`ref_booking_uid`, `area_size`, `price_area`, `start_work`, `end_work`) VALUES ('{$_POST['uid']}', '{$_POST['area_size']}', '{$price_area}', '{$date}','{$one_day}')";
				if(mysqli_query($conn,$sql)) {
					$return['booking_table'] = "สร้างบิลเรียบร้อย";
					$sql = "";
					$sql ="SELECT `booking_id` FROM `booking_table` WHERE `ref_booking_uid` = '{$_POST['uid']}' AND `status_id` ='false' limit 1";
					$res = null;
					if ($res = mysqli_query($conn,$sql)) {
						$return['booking_id'] = "เพิ่มแม่บ้านในบิล OK";
						$booking_id = mysqli_fetch_assoc($res)['booking_id']; // หมายเลขบิล
	// 					// echo $booking_id;
						foreach ($_POST['arr_maid'] as $key => $value) {
							$arr_maid[] = "('{$booking_id}','{$value}')";
						}
						$sql = "";
						$sql = "INSERT INTO `booking_detail`(`booking_id`, `ref_maid`) VALUES ".implode(' , ',$arr_maid);
						if(mysqli_query($conn,$sql)) {
							$return['booking_detail'] = "เพิ่มรายการห้องที่ต้องการทำความสะอาด OK";
							$arr_room_price = array();
							foreach ($_POST['rooms'] as $key => $value) {
								$sql = "";
								$sql = "SELECT `room_price` FROM `room_category` WHERE `room_id`='{$value}' ";
								if($res = mysqli_query($conn,$sql)) {
									// echo $sql;
									while($row = mysqli_fetch_assoc($res)) {
										// while ($row = mysqli_fetch_assoc($res)) {
											$arr_room_price[] = $row['room_price'];
										// }
									}
										// var_dump($row);
									// echo "<br/>";
								} else {
									echo "SQL ITEMS ERROR";
								}
							}
							foreach ($_POST['rooms'] as $key => $value) {
								$arr_room[] = "('{$booking_id}','{$value}','{$arr_room_price[$key]}')";
							}

							$sql = "";
							$sql = "INSERT INTO `booking_rooms`(`booking_id`, `room_name`, `room_price`) VALUES ".implode(' , ',$arr_room);
							if(mysqli_query($conn,$sql)) {
								
								if ($_FILES['file']['size'] > 0) {
									$temp = "../image/img_comment/";
									if(move_uploaded_file($_FILES["file"]["tmp_name"],$temp.$_FILES["file"]["name"])) {
										$sql = "";
										$sql = "INSERT INTO `booking_comment`(`booking_id`, `img_file_cm`, `comment`) VALUES ('{$booking_id}','{$_FILES['file']['name']}', '{$_POST['comment']}')";
										if(mysqli_query($conn,$sql)) {
											$return['booking_comment'] = "เพิ่มข้อมูลใน booking_comment เรียบร้อยแล้ว";
											
											// true
										} else {
											$return['booking_comment'] = "เพิ่มข้อมูลใน booking_comment ไม่สำเร็จ";
										}
									} else {
										$return['message'] = 'อัฟโหลดรูป Fail!!';
									}
								}

								// var_dump($POST['items']);
								if(isset($_POST['items'])) {
									// foreach ($_POST['items'] as $key => $value) {
									// 	$sql = "";
									// 	$sql = "SELECT `item_price` FROM `items` WHERE `item_id`='{$value}' ";
									// 	if(mysqli_query($conn,$sql)) {

									// 	} else {
									// 		echo "SQL ITEMS ERROR";
									// 	}
									// }
									$arr_item_price = array();
									foreach ($_POST['items'] as $key => $value) {
										$sql = "";
										$sql = "SELECT `item_price` FROM `items` WHERE `item_id`='{$value}' ";
										if($res = mysqli_query($conn,$sql)) {
											// echo $sql;
											while($row = mysqli_fetch_assoc($res)) {
												// while ($row = mysqli_fetch_assoc($res)) {
													$arr_item_price[] = $row['item_price'];
												// }
											}
												// var_dump($row);
											// echo "<br/>";
										} else {
											echo "SQL ITEMS ERROR";
										}
									}
									foreach ($_POST['items'] as $key => $value) {
										$arr_item[] = "('{$booking_id}','{$value}','{$arr_item_price[$key]}')";
									}
									$sql = "";
									$sql = "INSERT INTO `booking_items`(`booking_id`, `item_name`, `item_price`) VALUES ".implode(' , ',$arr_item);
									if(mysqli_query($conn,$sql)) {
										$return['booking_items'] = "เพิ่มข้อมูลใน booking_items เรียบร้อยแล้ว";
										// true
									} else {
										$return['booking_items'] = "ไม่สามารถเพิ่มข้อมูลใน booking_items ได้";
									}
								}
								$return['status'] = true;
							} else {
								$return['booking_rooms'] = "ไม่สามารถเพิ่มข้อมูลใน booking_rooms ได้";
							}

							
						} else {
							$return['status'] = false;
							$return['message'] = "ไม่สารถเพิ่ม แม่บ้านในบิลได้";
						}

					} else {
						$sql_del ="DELETE FROM `booking_table` WHERE `booking_table`.`booking_id` = '{$booking_id}'";
						if(mysqli_query($conn,$sql_del)) {
							$return['status'] = false;
							$return['message'] = "ไม่สามาถทำการจองได้ และระบบทำการยกเลิก หมายเลขการจองเรียบร้อย";
						}
					}

				} else {
					$return['status'] = false;
					$return['message'] = "ไม่สามาถสร้างหมายเลขการจองได้1";
				}
			}
		} else {
			$return['status'] = false;
			$return['message'] = "ไม่สามาถสร้างหมายเลขการจองได้2";
		}
	} else {
		$return['status'] = false;
		$return['message'] = "data No";
	}

	echo json_encode($return);
?>