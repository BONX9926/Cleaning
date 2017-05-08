<?php session_start(); ?>
<aside class="profile-info col-lg-12">
	<section class="panel">
		<div class="panel-body bio-graph-info">
			<h1>รายการที่ยืม</h1>
			<table class="table table-bordered">
				<tr>
					<th>เลขที่</th>
					<th>วันที่ยืม</th>
					<th>รายละเอียด</th>
					<th>สถานะ</th>
				</tr>
				<?php 
					include_once '../../connect.php';
					include_once 'get_items_borrow.php';
					include_once '../../lib/php/public_function.php';
					$sql = "SELECT`borrow_table`.`borrow_id`,`borrow_table`.`borrow_date`,`status`.`name` FROM `borrow_table`INNER JOIN `user_backend` ON borrow_table.ref_maid_id = user_backend.id INNER JOIN `status` ON borrow_table.status = status.id WHERE `ref_maid_id`= '{$_SESSION['id']}' ";
					if ($res = mysqli_query($conn,$sql)) {
						while ($row = mysqli_fetch_assoc($res)) {
						// var_dump($row);
				?><tr>
							<td class="borrow_id"><?=$row['borrow_id']?></td>
							<td><?=date_thai(revert_date($row['borrow_date']))?></td>
							<td class="numeric"><?php echo get_items_borrow($row['borrow_id'],$conn); ?></td>
							<td class="numeric"><?=$row['name']?></td>
						</tr>
								<?php
							}
						}
					?>
			</table>
		</div>
	</section>
</aside>