<?php
	session_start();
?>
<div class="col-lg-12">
	<section class="panel">
	<header class="panel-heading">แจ้งชำระเงิน</header>
		<div class="panel-body">
			<section id="unseen">
				<table class="table table-bordered table-striped table-condensed">
					<thead>
						<tr>
							<th>เลขที่บิล</th>
							<th>ชื่อ-นามสกุล</th>
							<th class="numeric">เบอร์โทรศัพท์</th>
							<th class="numeric">email</th>
							<th class="numeric">จำนวนเงินที่แจ้ง</th>
							<th class="numeric">วันที่แจ้งชำระ</th>
							<th class="numeric">หลักฐานการโอนเงิน</th>
							<th class="numeric">สถานะ</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							include_once '../../connect.php';
							$sql = "SELECT * FROM `payment`";
							$data = mysqli_query($conn,$sql);
							$count = 0;
							while($show = mysqli_fetch_assoc($data)){
						?>
						<tr>
							<td><?=$show['num_bin']?></td>
							<td><?=$show['name']?></td>
							<td class="numeric"><?=$show['phone']?></td>
							<td class="numeric"><?=$show['email']?></td>
							<td class="numeric"><?=number_format($show['money'])?></td>
							<td class="numeric"><?=$show['created_at']?></td>
							<td class="numeric"><?=$show['file']?></td>
							<td class="numeric"><button>xxx</button></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</section>
		</div>
	</section>
</div>