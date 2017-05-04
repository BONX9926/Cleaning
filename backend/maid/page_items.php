<?php
	session_start();
?>
<style type="text/css">
	#cart {
		cursor: pointer;
		border-style: solid;
		border-color: #ff6c60;
		width: 50px;height: 50px;
		border-radius: 50%;
		text-align:center;
		vertical-align:middle;
		padding-top:1%;
	}
</style>
<div class="col-lg-12">
	<section class="panel">
	<header class="panel-heading">รายชื่ออุปกรณ์</header>
		<div class="panel-body">
			<section id="unseen">
				<div class="row" align="right" style="padding-right: 50px;">
				<div id="cart">
					<i class="fa fa-shopping-cart fa-2x"></i>
					<span class="badge right btn-danger myCount" >
							0
					</span>
				</div>
				<br>
				</div>
				<div class="row">
				<?php 
					include_once '../../connect.php';
					$dis = "";
					$sql = "SELECT `item_id`, `img`, `item_name`, `quantity_all`, `quantity_remain` FROM `items`";
					$res = mysqli_query($conn,$sql);
					while ($row = mysqli_fetch_assoc($res)) {
						if ($row['quantity_remain'] <= 0) {
							$dis ="disabled";
						} else {
							$dis = "";
						}
				?>
					<div class="col-sm-6 col-md-4">
						<div class="thumbnail">
							<img src="../img/items/<?=$row['img']?>" id="img-<?=$row['item_id'] ?>" style="width: 233px;height: 233px;">
							<div class="caption">
							<h3 id="name-<?=$row['item_id']?>"><?=$row['item_name']?></h3>
							<p id="detail-<?=$row['item_id']?>">จำนวนที่สามารถยืมได้ : <?=$row['quantity_remain'] ?> ชิ้น</p>
							<p><a item_id="<?=$row['item_id'] ?>" <?=$dis?> class="btn btn-primary my-btn">ยืมเดี๋ยวนี้</a></p>
							</div>
						</div>
					</div>
				<?php
					}
				?>
				</div>
			</section>
		</div>
	</section>
</div>
<div class="modal fade in" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
	<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h4 class="modal-title" id="md-title">รายชื่ออุปกรณ์ที่ต้องการยืม</h4>
		</div>
		<div class="modal-body" >
			<!-- <h1 align="center">ไม่มีรายการ</h1> -->
			<div class="row" id="md-content1">
				<div class="col-md-3"><img src="" width="100" height="100" id="md-img"></div>
				<div class="col-md-9">
				<form id="form">
					<p id="md-item-name">name</p>
					<p id="md-detail">detail</p>
					<input type="hidden" id="hid-item-id" name="item_id">
					<p><input type="number" id="amount" class="form-control" name="amount"></p>
					<button type="button" class="btn btn-success btn-confirm">ยืนยัน</button>
				</form>
				</div>
			</div>
			<div class="row" id="md-content2">
			</div>
		</div>
		<div class="modal-footer">
			<!-- <button class="btn btn-success" type="button">ยืนยัน</button> -->
			<button type="button" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">close</button>
		</div>
	</div>
	</div>
</div>
<script type="text/javascript">
jQuery(document).ready(function($) {
	get_count_items();
	$("#cart").click(function() {
		icon_cart();
		// $("#modal").modal("toggle");
	});
	$(".my-btn").click(function() {
		$("#md-content1").show();
		$("#md-content2").hide();
		
		var item_id = $(this).attr('item_id');
		$("#hid-item-id").val(item_id);
		var img = $("#img-"+item_id).attr("src");
		var name = $("#name-"+item_id).text();
		var detail = $("#detail-"+item_id).text();
		$("#md-item-name").text(name);
		$("#md-detail").text(detail);
		$("#md-img").attr('src', img);

		$("#modal").modal("toggle");

	});

	$(".btn-confirm").click(function(event) {
		var data = $("#form").serializeArray();
		// console.log(data[1].value);
		if(data[1].value != "") {
			$.post('borrow.php', {data: data,event:'set'}, function(data, textStatus, xhr) {
				
			}).done(function(data){
				 // alert(data);
				if (data == "true") {
					get_count_items();
				}
				// console.log(data);
				$("#modal").modal("toggle");
			});
		} else {
			alert("กรุณาระบุจำนวน");
		}
		// var $("")
		// if()

	});


	function icon_cart() {
		$.get('list-items-cart.php', function(data) {
			/*optional stuff to do after success */
		}).done(function(data){
			$("#md-content1").hide();
			$("#md-content2").html(data);
			$("#md-content2").show();
			$("#modal").modal("toggle");
		});
	}

	function get_count_items() {
		$.post('borrow.php', {event: 'get_count_item'}, function() {
			/*optional stuff to do after success */
		}).done(function(data) {
			//alert(data);
			$(".myCount").html(data);
		});
	}
});
</script>