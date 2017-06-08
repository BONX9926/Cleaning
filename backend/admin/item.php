<?php
	session_start();
?>
<div class="col-lg-12">
	<section class="panel">
	<header class="panel-heading">รายชื่อแม่บ้าน</header>
		<div class="panel-body">
			<section id="unseen">
				<table class="table table-bordered table-striped table-condensed" id="it">
					<thead>
						<tr>
							<th>รหัสสินค้า</th>
							<th class="numeric">รูป</th>
							<th class="numeric">ชื่อ</th>
							<th class="numeric">ทั้งหมด</th>
							<th class="numeric">คงเหลือ</th>
							<th class="numeric">ชำรุด</th>
							<th class="numeric">ราคาเช่าต่อชิ้น</th>
							<th class="numeric"></th>
						</tr>
					</thead>
					<tbody>
						<?php 
							include_once '../../connect.php';
							$sql = "SELECT * FROM `items` WHERE `quantity_remain`!= 0";
							$data = mysqli_query($conn,$sql);
							while($show = mysqli_fetch_assoc($data)){
						?>
						<tr>
							<td><?=$show['item_id']?></td>
							<td align="center"><img src="../img/items/<?=$show['img']?>" style="width: 100px;height: 100px;" ></td>
							<td class="numeric"><?=$show['item_name']?></td>
							<td class="numeric"><?=$show['quantity_all']?></td>
							<td class="numeric"><?=$show['quantity_remain']?></td>
							<td class="numeric"><?=$show['item_wongout']?></td>
							<td class="numeric"><?=$show['item_price']?></td>
							<td class="numeric">
								<button class="btn btn-primary btn-xs edit-btn" item_id="<?=$show['item_id']?>" ><i class="fa fa-pencil"></i></button>
								<button class="btn btn-danger btn-xs rm-btn" item_id="<?=$show['item_id']?>"><i class="fa fa-trash-o "></i></button>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</section>
		</div>
	</section>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel">แก้ไขข้อมูล</h4>
</div>
<div class="modal-body">
<form class="form-horizontal" role="form" id="files" method="POST" enctype="multipart/formdata">
<div class="form-group">
<label class="col-lg-3 col-sm-3 control-label">รูปอุปกรณ์</label>
<div class="col-lg-9">
<input type="hidden" name="item_id" id="item_id">
<input type="file" name="img">
</div>
</div>
<div class="form-group">
<label class="col-lg-3 col-sm-3 control-label">ชื่ออุปกรณ์</label>
<div class="col-lg-9">
<input type="text" class="form-control" name="item_name" id="item_name">
</div>
</div>
<div class="form-group">
<label class="col-lg-3 col-sm-3 control-label">จำนวนที่เพิ่ม / ชิ้น</label>
<div class="col-lg-9">
<input type="number" class="form-control" name="quantity_new" id="quantity_new">
</div>
</div>
<div class="form-group">
<label class="col-lg-3 col-sm-3 control-label">ราคาเช่าต่อชิ้น</label>
<div class="col-lg-9">
<input type="text" class="form-control" name="item_price" id="item_price">
</div>
</div>
</form>
</div>
<div class="modal-footer">
<button class="btn btn-primary" id="confirm_edit">ยืนยันการแก้ไข</button>
<button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>
</div>
</div>
</div>
</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
	 	$('#it').DataTable( {
	        "pageLength": 10
	    } );
	});
</script>
