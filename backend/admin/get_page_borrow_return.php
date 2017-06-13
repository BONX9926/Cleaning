<?php
	session_start();
	include_once '../../connect.php';
	include_once '../../lib/php/public_function.php';
	include_once 'get_items_borrow.php';
	$status_array = array();
	$sql1 ="SELECT * FROM `status`";
	if ($res = mysqli_query($conn,$sql1)) {
		while ($row = mysqli_fetch_assoc($res)) {
			$status_array[] = $row;
		}
	}
?>
<div class="col-lg-12">
	<section class="panel">
	<header class="panel-heading">รายการยืม-คืน</header>
		<div class="panel-body">
			<section id="unseen">
			<table class="table table-hover" id="list_re">
				<thead>
					<tr>
						<th>เลขที่บิล</th>
						<th>วันที่แจ้งยืม</th>
						<th>ชื่อ-นามสกุล</th>
						<th>รายละเอียด</th>
						<th>สถานะ</th>
					</tr>
				</thead>
				<tbody>
			<?php
				$sql = "SELECT `borrow_table`.`borrow_id`,`borrow_table`.`status`,`borrow_table`.`borrow_date`,`borrow_table`.`status`,`user_backend`.`fname`,`user_backend`.`lname`,`status`.`name` FROM `borrow_table`INNER JOIN `user_backend` ON borrow_table.ref_maid_id = user_backend.id INNER JOIN `status`ON `borrow_table`.`status` = `status`.`id`";
				// echo $sql;die();
				if ($res =mysqli_query($conn,$sql)) {
					while ($row = mysqli_fetch_assoc($res)) {
						// var_dump($row);

						?>
						<tr>
							<td class="borrow_id"><?=$row['borrow_id']?></td>
							<td><?=date_thai(revert_date($row['borrow_date']))?></td>
							<td><?=$row['fname']?> <?=$row['lname']?></td>
							<td class="numeric"><?php echo get_items_borrow($row['borrow_id'],$conn); ?></td>
							<td <?php if($row['status'] == 1){ echo "style='color:#ffcc00;font-weight: bold;'";} else if($row['status'] == 2){ echo "style='color:#ff8000;font-weight: bold;'";} else if($row['status'] == 3){ echo "style='color:black;font-weight: bold;'";}else if($row['status'] == 4){ echo "style='color:#009900;font-weight: bold;'";} else if($row['status'] == 5){ echo "style='color:red;font-weight: bold;'";} ?>>
							<?=$row['name']?></td>
						</tr>
						<?php
					}
				}
			?>
				<tbody>
			</table>
			</section>
		</div>
	</section>
</div>
<script type="text/javascript">
	$('#list_re').DataTable( {
        "pageLength": 10,
        "order":[[2,"desc"]]
    } );
</script>