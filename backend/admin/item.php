<?php
	session_start();
?>
<div class="col-lg-12">
	<section class="panel">
	<header class="panel-heading">รายชื่อแม่บ้าน</header>
		<div class="panel-body">
			<section id="unseen">
				<table class="table table-bordered table-striped table-condensed">
					<thead>
						<tr>
							<th>รหัสสินค้า</th>
							<th class="numeric">รูป</th>
							<th class="numeric">ชื่อ</th>
							<th class="numeric">ทั้งหมด</th>
							<th class="numeric">คงเหลือ</th>
							<th class="numeric">ราคาเช่าต่อชิ้น</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							include_once '../../connect.php';
							$sql = "SELECT * FROM `item` WHERE `quantity_remain`!= 0";
							$data = mysqli_query($conn,$sql);
							while($show = mysqli_fetch_assoc($data)){
						?>
						<tr>
							<td></td>
							<td><img src="<?=$show['img']?>"></td>
							<td class="numeric"><?=$show['item_name']?></td>
							<td class="numeric"><?=$show['quantity_all']?></td>
							<td class="numeric"><?=$show['quantity_remain']?></td>
							<td class="numeric"><?=$show['item_price']?></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</section>
		</div>
	</section>
</div>