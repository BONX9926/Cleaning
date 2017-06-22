<?php
	include_once '../../connect.php';
	$config = parse_ini_file("../config/config.ini");
	$price_maid = $config['price_maid'];
	if ($_POST['type'] == "item") {
		$name_itme = explode(' ', $_POST['word'])[0];
		// var_dump($arr_itme);
		// echo $arr_itme;
		$sql_item = "SELECT * FROM `items` WHERE `item_name`='{$name_itme}' ";
		if ($res = mysqli_query($conn,$sql_item)) {
			while($row = mysqli_fetch_assoc($res)){
			?>
			<div class="row">
				<div class="col-lg-4">
					<img class="img-thumbnail" src="../img/items/<?=$row['img']?>" style="width: 240;height: 240;">
				</div>
				<div class="col-lg-8">
					<div class="col-lg-12"><h4>ทั้งหมด :<?=$row['quantity_all']?> ชิ้น</h4></div>
					<div class="col-lg-12"><h4>คงเหลือ :<?=$row['quantity_remain']?> ชิ้น</h4></div>
					<div class="col-lg-12"><h4>ถูกยืม :<?=$row['quantity_all']-$row['quantity_remain']?> ชิ้น</h4></div>
					<div class="col-lg-12"><h4>ชำรุด :<?=$row['item_wongout']?> ชิ้น</h4></div>
				</div>
			</div>
				<?php
			}
		}
		// echo "item";
	} else if($_POST['type'] == "income"){
		$year = (isset($_POST['year'])) ? $_POST['year']  :  date("Y");
		$m = $_POST['word'];
		$name = $_POST['name'];

		$array_mount = array(
			"01" => "ม.ค.",
			"02" => "ก.พ.",
			"03" => "มี.ค.",
			"04" => "เม.ย.",
			"05" => "พ.ค.",
			"06" => "มิ.ย.",
			"07" => "ก.ค.",
			"08" => "ส.ค.",
			"09" => "ก.ย.",
			"10" => "ต.ค.",
			"11" => "พ.ย.",
			"12" => "ธ.ค."
		);

		$mount_num = array_search($m,$array_mount);
		$patt = "01-{$mount_num}-{$year}";
		$start = strtotime($patt);
		$end = strtotime("last day of this month",strtotime($patt));

			$sql_lup = "SELECT COUNT(`booking_detail`.`ref_maid`)*{$price_maid} as sum_maid,SUM(`price_area`) as sum_area,SUM(`room_price`) as sum_room,SUM(`item_price`) as sum_item FROM `booking_table` INNER JOIN `booking_detail` ON booking_table.booking_id = booking_detail.booking_id INNER JOIN `booking_rooms`ON `booking_table`.`booking_id` = `booking_rooms`.`booking_id` LEFT JOIN `booking_items`ON `booking_table`.`booking_id` = `booking_items`.`booking_id` WHERE booking_table.status_id ='true' AND `booking_table`.`start_work` >='{$start}' AND `booking_table`.`end_work`<='{$end}'";
			$sql_jay = "SELECT SUM(`salary`)-SUM(`vat`) AS total FROM `salary` WHERE `startMonth`>='{$start}' AND `endMonth`<='{$end}'";

			if($res = mysqli_query($conn,$sql_lup) ){
				$res1 = mysqli_query($conn,$sql_jay);
				$row1 = mysqli_fetch_assoc($res1);
				while ($row = mysqli_fetch_assoc($res)) {
					$sum = array_sum($row);
					// var_dump($row);
					$total = $sum-$row1['total'];
					?>
					<div class="row">
						<div class="col-lg-3" align="center">
							<img src="../img/maid.png">
							<p><b>รายได้รับแม่บ้าน</b></p>
							<p style="color: #2ef244">+<?= number_format($row['sum_maid'],0)?> บาท</p>
							<p style="color: #f14b2e">-<?= number_format($row1['total'],0)?> บาท</p>
						</div>
						<div class="col-lg-3" align="center">
							<img src="../img/areasize.png">
							<p><b>รายได้รับค่าพื้นที่</b></p>		
							<p style="color: #2ef244">+<?= number_format($row['sum_area'],0)?> บาท</p>					
						</div>
						<div class="col-lg-3" align="center">
							<img src="../img/rooms.png">
							<p><b>รายได้รับค่าห้อง</b></p>	
							<p style="color: #2ef244">+<?= number_format($row['sum_room'],0)?> บาท</p>						
						</div>
						<div class="col-lg-3" align="center">
							<img src="../img/items.png">
							<p><b>รายได้รับค่าอุปกรณ์</b></p>	
							<p style="color: #2ef244">+<?=number_format($row['sum_item'],0)?> บาท</p>							
						</div>
					</div>
					<div class="row">
						<?php $color = ($sum<$total)? "#f14b2e" : "#2ef244" ?>
						<div class="col-lg-12"><span style="float: right;color: <?=$color?>;font-size: 30px"> <b>รายได้สุทธิ <?=number_format($total)?> บาท</b></span></div>
					</div>
					<?php
			}
		}
	}
?>