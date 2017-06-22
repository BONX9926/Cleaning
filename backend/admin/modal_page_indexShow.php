<?php
include_once '../../connect.php';
include_once '../../lib/php/public_function.php';
	if($_POST['event'] == "users"){
		
		$sql_sel_users = "SELECT * FROM `user` INNER JOIN `user_detail`ON `user`.`uid`=`user_detail`.`uid`";
		if($res =mysqli_query($conn,$sql_sel_users)){
			if ($res->num_rows >0) {
				?>
				<table  class="table table-hover" id="TbUsers">
					<thead>
						<tr>
							<th>#</th>
							<th>ชื่อ-นามสกุล</th>
							<th>E-mail</th>
							<th>Social</th>
							<th>เข้าใช้งานครั้งล่าสุด</th>
						</tr>
					</thead>
					<tbody>
					<?php while ($row = mysqli_fetch_assoc($res)) { ?>
						<tr>
							<td><img src="<?=$row['image']?>" style="width: 50;height: 50px;"></td>
							<td><?=$row['fname']?> <?=$row['lname']?></td>
							<td><?=$row['email']?></td>
							<td><?=$row['social_provider']?></td>
							<td><?=$row['updated_at']?></td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
				<script type="text/javascript">
					$('#TbUsers').DataTable( {
				        "pageLength": 10,
				        "order":[[4,"desc"]]
			    	} );
				</script>
				<?php
			}
		}
	}else if($_POST['event'] == "maids"){

		$sql_sel_maids = "SELECT * FROM `user_backend` WHERE `status`='M'";
		if($res =mysqli_query($conn,$sql_sel_maids)){
			if ($res->num_rows >0) {
				?>
				<h3>รายชื่อแม่บ้าน</h3>
				<hr>
				<table class="table table-hover" id="TbMaids">
					<thead>
						<tr>
							<th>ชื่อ-นามสกุล</th>
							<th>E-mail</th>
							<th>เบอร์โทรศัพท์</th>
						</tr>
					</thead>
					<tbody>
					<?php while ($row = mysqli_fetch_assoc($res)) { ?>
						<tr>
							<td><?=$row['fname']?> <?=$row['lname']?></td>
							<td><?=$row['email']?></td>
							<td><?=$row['phone']?></td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
				<script type="text/javascript">
					$('#TbMaids').DataTable( {
				        "pageLength": 10,
				        "order":[[0,"desc"]]
			    	} );
				</script>
				<?php
			}
		}

	}else if ($_POST['event'] == "bins") {

		function name_maid($booking_id,$connect) {
			$home = array();
			$arrName = array();
			$sql1 = "SELECT user_backend.fname, user_backend.lname FROM `booking_table` INNER JOIN `booking_detail` ON booking_table.booking_id = booking_detail.booking_id INNER JOIN `user_backend`ON booking_detail.ref_maid = user_backend.id WHERE booking_table.booking_id ='{$booking_id}'";
			// $sql1 = "SELECT user_backend.fname, user_backend.lname FROM `booking_table` INNER JOIN `booking_detail` ON booking_table.booking_id = booking_detail.booking_id INNER JOIN `user_backend`ON booking_detail.ref_maid = user_backend.id WHERE booking_table.booking_id ='000005'";
			if ($res = mysqli_query($connect,$sql1)) {
				while ($row = mysqli_fetch_assoc($res)) {
					$home[] = $row; 
				}
					// var_dump($home);
				foreach ($home as $key => $value) {
					$arrName[] = implode(' ', $value);
				}
				echo implode(",", $arrName);
			}
		}

		$sql_sel_bins = "SELECT * FROM `booking_table` INNER JOIN `user_detail` ON booking_table.ref_booking_uid = user_detail.uid ";
		if ($res =mysqli_query($conn,$sql_sel_bins)) {
			if ($res->num_rows > 0) {

				
				?>
				<h3>บิลการจอง</h3>
				<hr>
				<table class="table table-hover" id="TbBins">
					<thead>
						<tr>
							<th>เลขที่บิล</th>
							<th>แม่บ้าน</th>
							<th>คนจ้าง</th>
							<th>วันที่ทำงาน</th>
							<th>สถานะการชำระ</th>
							<th>สถานะงาน</th>
						</tr>
					</thead>
					<tbody>
					<?php while ($row = mysqli_fetch_assoc($res)) { ?>
						<tr>
							<td><?=$row['booking_id'];?></td>
							<td><?php name_maid($row['booking_id'],$conn) ?></td>
							<td><?=$row['fname'];?> <?=$row['lname'];?></td>
							<td><?=date_thai($row['start_work'])?></td>
							<td><?=($row['status_id'] == "true") ? "<span style='color:green'>ชำระเรียบร้อยแล้ว</span>":"<span style='color:red'>ยังไม่ชำระ</span>"; ?></td>
							<td><?=($row['work_status'] == "true") ? "<span style='color:green'>เสร็จเรียบร้อย</span>":"<span style='color:red'>กำลังดำเนินการ</span>";  ?></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
				<script type="text/javascript">
					$('#TbBins').DataTable( {
				        "pageLength": 10,
				        "order":[[3,"desc"]]
			    	} );
				</script>
				<?php
			}else{
				?>
				<h3>ไม่พบข้อมูล</h3>
				<?php
			}
		}
	}else if($_POST['event'] == "comments"){
		$sql_sel_comments = "SELECT * FROM `comment_point` INNER JOIN `user`ON comment_point.uid = user.uid INNER JOIN `user_backend` ON `comment_point`.`maid_id`= user_backend.id";
		if ($res =mysqli_query($conn,$sql_sel_comments)) {
			if ($res->num_rows >0) {
				?>
				<h3>ความคิดเห็น</h3>
			<div class="fb-status-container fb-border fb-gray-bg" style="background-color: #FFFFFF;">

			<ul class="fb-comments">
			<?php while ($row = mysqli_fetch_assoc($res)) { ?>
				<li>
					<a href="#" class="cmt-thumb">
						<img src="<?=$row['image']?>" alt="">
					</a>
					<div class="cmt-details">
						<a href="#"><?=$row['name']?></a>
						<span><?=$row['comment']?></span>
						<p><?=$row['created_at']?> จากเลขที่บิล : <?=$row['bin']?>, แสดงความคิดเห็นไปยัง :<?=$row['fname']?> <?=$row['lname']?></p>
						<!-- <p>แสดงความคิดเห็นไปยัง :</p> -->
					</div>
				</li>
			<?php } ?>
			</ul>
			</div>
				<?php
			}
		}
	}
?>