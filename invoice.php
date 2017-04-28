<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	    <!-- Bootstrap core CSS -->
    <link href="backend/css/bootstrap.min.css" rel="stylesheet">
    <link href="backend/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="backend/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
      <!--right slidebar-->
      <link href="backend/css/slidebars.css" rel="stylesheet">
      <!-- Custom styles for this template -->
    <link href="backend/css/style.css" rel="stylesheet">
    <link href="backend/css/style-responsive.css" rel="stylesheet" />
    <link href="backend/css/invoice-print.css" rel="stylesheet" media="print">
</head>
<body>
<!-- <div class="container"> -->
	<section>
	<!-- <pre> -->
	<?php 
	include_once 'connect.php';
	include_once 'lib/php/public_function.php';
	// var_dump($_GET);
	// var_dump($_SESSION);
	// print $_GET['num'];
	// print $_SESSION['uid'];
	$sql = "SELECT * FROM `booking_table` WHERE `booking_id`='{$_GET['num']}' AND `ref_booking_uid`='{$_SESSION['uid']}' limit 1";
	if($res = mysqli_query($conn,$sql)) {
		if($res->num_rows > 0) {
			$data = mysqli_fetch_assoc($res);
			// var_dump($data);
			// $sql = "";
			$sql1 = "SELECT * FROM `booking_detail` WHERE `booking_id`= '{$data['booking_id']}' ";
			// $sql1 = "SELECT * FROM `booking_detail` INNER JOIN `user_backend` ON booking_detail.ref_maid = user_backend.id WHERE `id`= '{$data['booking_id']}'";
			if ($res1 = mysqli_query($conn,$sql1)) {
				//loop
				while ($data1 = mysqli_fetch_assoc($res1)) {
					$arr_maid[] = $data1['ref_maid'];
				}

				foreach ($arr_maid as $key => $value) {
					$sql2 = "SELECT `fname`, `lname` FROM `booking_detail` INNER JOIN `user_backend` ON booking_detail.ref_maid = user_backend.id WHERE `id`= '{$value}' ";
					if($res2 = mysqli_query($conn,$sql2)) {
						//loop
						while ($data2 = mysqli_fetch_assoc($res2)) {
							// var_dump($data2);
							$arr_Nmaid[] = $data2;
							// echo $sql2;
						}
					} else {
						echo "SQL2 ERROR";
					}
				}
				// var_dump(($row));

			} else {
				echo "SQL1 ERROR";
			}
			//SQL3 
			$sql3 = "SELECT `size_id`, `size_name`, `size_pirce` FROM `size_area` INNER JOIN `booking_table`ON (size_area.size_id = booking_table.area_size) WHERE `size_id`='{$data['area_size']}'";
			if ($res3 = mysqli_query($conn,$sql3) ) {
				$arr_size = mysqli_fetch_assoc($res3);
				// var_dump($data3);
				// $arr_size คือ บนาดพื้นที่
			} else {
				echo "SQL3 ERROR";
			}

			$sql4 = "SELECT items.item_name,items.item_price FROM `booking_table` INNER JOIN booking_items ON(booking_table.booking_id=booking_items.booking_id) INNER JOIN items ON booking_items.item_name = items.item_id WHERE booking_table.booking_id ='{$data['booking_id']}' ";
			if ($res4 = mysqli_query($conn,$sql4)) {
				while ($data4 = mysqli_fetch_assoc($res4)) {
					$arr_item[] = $data4;
				}
				// $arr_item[] คือ อุปกรณ์
				// var_dump($arr_item);
				// echo implode(" ", $arr_item);
			} else {
				echo "SQL4 ERROR";
			}

		} else {
			header("Location:error.php");
		}
	} else {
		echo "SQL ERROR";
	}
	?>
	<!-- </pre> -->
		<div class="panel panel-primary">
		<!--<div class="panel-heading navyblue"> INVOICE</div>-->
			<div class="panel-body">
				<div class="row invoice-list">
					<div class="text-center corporate-id">
						<img src="image/clean-home-logo-design.jpg" alt="" style="width: 177px;height: 80px;">
					</div>
					<div class="col-lg-4 col-sm-4">
						<h4>ที่อยู่เจ้าของบ้าน</h4>
						<p>
						ชื่อ : <?=$_SESSION['fname']." ".$_SESSION['lname']?> <br>
						ที่อยู่ :<?=$_SESSION['address']?> <br>
						เบอร์โทร: <?=$_SESSION['phone']?>
						</p>
					</div>
					<div class="col-lg-4 col-sm-4">
						<h4>ที่อยู่บริษัท</h4>
						<p>
						Vector Lab<br>
						Road 1, House 2, Sector 3<br>
						ABC, Dreamland 1230<br>
						P: +38 (123) 456-7890<br>
						</p>
					</div>
				<div class="col-lg-4 col-sm-4">
					<h4>INVOICE INFO</h4>
					<ul class="unstyled">
						<li>Invoice Number		: <strong><?=$_GET['num']?></strong></li>
						<li>Invoice Date		: <?=date_thai(revert_date($data['created_at']))?></li>
						<li>Due Date			: </li>
						<li>Invoice Status		: <?php if($data['status_id'] == "true") { echo "ชำระเงินเรียบร้อย"; } else { echo "รอการชำระเงิน"; }?></li>
					</ul>
				</div>
				</div>
			<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th class="hidden-phone">รายละเอียด</th>
					<th class="">ราคา(บาท)</th>
					<th class="">จำนวน</th>
					<th>ราคารวม</th>
				</tr>
			</thead>
				<tbody>
				<?php if(isset($arr_Nmaid)) { ?>
					<tr>
						<td>แม่บ้าน</td>
						<td class="hidden-phone">
							<?php 
							foreach ($arr_Nmaid as $key => $value) {
								$arrayName[] = implode(' ',$value);
								
							} 
							echo implode(",", $arrayName);
							?>
						</td> 
						<td class="">300</td>
						<td class=""><?php echo count($arrayName);?></td>
						<td><?php echo $maid_price = 300*count($arrayName);?></td>
					</tr>
				<?php } ?>
				<?php if(isset($arr_size)) { ?>
					<tr>
						<td>พื่นที่</td>
						<td class="hidden-phone"><?=$arr_size['size_name']; ?></td>
						<td class=""><?=$arr_size['size_pirce']; ?></td>
						<td class="">1</td>
						<td><?=$arr_size['size_pirce']*1; ?></td>
					</tr>
				<?php } ?>
				<?php if(isset($arr_item)) { ?>
					<tr>
						<td>อุปกรณ์</td>
						<td class="hidden-phone">
						<?php 
							foreach ($arr_item as $key => $value) {
								// foreach ($value as $key => $v) {
									$arr_name[] =  $value['item_name'];
								// }
							}
							echo implode(',', $arr_name);
							// var_dump($v);
						?>
						</td>
						<td class="">
						<?php 
							foreach ($arr_item as $key => $value) {
								// foreach ($value as $key => $v) {
									$arr_price[] =  $value['item_price'];
								// }
							}
							echo implode(",", $arr_price);
							// var_dump($v);
						?>
						</td>
						<td class=""><?php echo count($arr_price); ?></td>
						<td><?php echo $item_pice = array_sum($arr_price); ?></td>
					</tr>
					<?php } ?>
					<tr>
						<td colspan="4" align="center"><b>รวมทั้งหมด</b></td>
						<td></td>
					</tr>
				</tbody>
			</table>
			<div class="row">
				<div class="col-lg-4 invoice-block pull-right">
					<ul class="unstyled amounts">
						<li><strong>ราคารวมสุทธิ :</strong>
							<!-- <?php $total = $maid_price+$arr_size['size_pirce']+$item_pice; echo number_format($total); ?> บาท -->
							<?php if(isset($item_pice)) {
									$total = $maid_price+$arr_size['size_pirce']+$item_pice;
									echo number_format($total);
								} else {
									$total = $maid_price+$arr_size['size_pirce'];
									echo number_format($total);
								}
							?> บาท
						</li>
						<li><strong>Discount :</strong> 10%</li>
						<li><strong>ภาษี :</strong> -----</li>
						<li><strong>Grand Total :</strong> $6138</li>
					</ul>
				</div>
			</div>
			<br><br><br><br><br><br><br><br>
				<div class="text-center invoice-btn">
					<a href="jong_detail.php" class="btn btn-danger btn-lg"><i class="fa fa-check"></i> กลับ </a>
					<a class="btn btn-info btn-lg" onclick="javascript:window.print();"><i class="fa fa-print"></i> พิมพ์ </a>
				</div>
			</div>
		</div>
	</section>
<!-- </div> -->
  <!-- js placed at the end of the document so the pages load faster -->
    <script src="backend/js/jquery.js"></script>
    <script src="backend/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="backend/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="backend/js/jquery.scrollTo.min.js"></script>
    <script src="backend/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="backend/js/respond.min.js" ></script>

  <!--right slidebar-->
  <script src="backend/js/slidebars.min.js"></script>

    <!--common script for all pages-->
    <script src="backend/js/common-scripts.js"></script>
</body>
</html>