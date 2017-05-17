<?php
	session_start();
?>
<aside class="profile-info col-lg-12">
	<section class="panel">
		<div class="panel-body bio-graph-info">
			<h1>ตารางงานทั้งหมด</h1>
			<?php 
				$list_info_maid = array();
				include_once '../../connect.php';
				include_once '../../lib/php/public_function.php';
				$sql = "SELECT booking_table.booking_id,booking_table.ref_booking_uid,booking_table.start_work,user_detail.fname,user_detail.lname,user_detail.lat,user_detail.lng,user_detail.phone FROM `booking_detail` INNER JOIN booking_table on (booking_detail.booking_id=booking_table.booking_id) INNER JOIN user_detail on (booking_table.ref_booking_uid = user_detail.uid) WHERE `ref_maid` = '{$_SESSION['id']}' AND `booking_table`.`status_id` ='true' ";
				// echo $sql;
				if($res = mysqli_query($conn,$sql)) {
					while ($row = mysqli_fetch_assoc($res)) {
						// print "<pre>";
						 // print_r($row);
						$row['items'] = get_item_maid($row['booking_id'],$conn);
						$row['start_date_full'] = date_thai($row['start_work']); 
						unset($row['start_work']);
						array_push($list_info_maid, $row);

					}
					// echo $sql;
					// echo "<pre>";
					// var_dump($list_info_maid);
				}else{
					// var_dump($_SESSION);
				}
				function room_name($room_id,$connect) {
					$sql = "SELECT room_category.room_name FROM `booking_table`INNER JOIN `booking_rooms` ON booking_table.booking_id = booking_rooms.booking_id INNER JOIN `room_category` ON booking_rooms.room_name = room_category.room_id WHERE booking_table.booking_id ='{$room_id}' AND `booking_table`.`status_id` ='true' ";
					$arr_room_name = array();
					if($res = mysqli_query($connect,$sql)) {
						while ($row = mysqli_fetch_assoc($res)) {
							$arr_room_name[] = $row;
						}
						foreach ($arr_room_name as $key => $value) {
							$arrayName[] = implode(' ', $value);
						}
						echo implode(",", $arrayName);
					}
				}
				// echo "<pre>";
				// var_dump($_SESSION);
			?>
			<table class="table">
				<tr>
					<td>วันที่ทำงาน</td>
					<td>ชื่อผู้จ้างงาน</td>
					<td>รายละเอียด</td>
					<td>สิ่งที่ต้องเตรียมไปด้วย</td>
					<td>พิกัด</td>
					<td>จุดที่เน้นทำความสะอาด</td>
				</tr>
				<?php
					foreach ($list_info_maid as $index => $lists) {
				
				?>
				<tr>
					<td><?=$lists['start_date_full'] ?></td>
					<td><?=$lists['fname'] ?> <?=$lists['lname'] ?></td>
					<td><?=room_name($lists['booking_id'],$conn) ?></td>
					<td><?=$lists['items'] ?></td>
					<td><a  class="map" target="_blank" href="map.php?lat=<?=$lists['lat'] ?>&lng=<?=$lists['lng'] ?>" ><?=$lists['lat'] ?>,<?=$lists['lng'] ?></a></td>
					<td><a class="view-spc" href="#"  book-id="<?=$lists['booking_id'] ?>" >view</a></td>
				</tr>
				<?php 
					}
				
				?>
			</table>
		</div>
		
		</table>
	</section>
</aside>


<div class="modal fade in" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
	<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h4 class="modal-title">Modal Tittle</h4>
		</div>
		<div class="modal-body" id="md-body" align="center">
			
		</div>
		<div class="modal-footer">
			<button data-dismiss="modal" class="btn btn-danger" type="button">Close</button>
		</div>
	</div>
	</div>
</div>
<?php 
	function get_item_maid($booking_id,$connect){
		$sql = "SELECT `items`.`item_name` as `item_name` FROM `booking_items` INNER JOIN items ON (booking_items.item_name=items.item_id) WHERE `booking_id` = '{$booking_id}'";
		$items =array();
		if($res = mysqli_query($connect,$sql)){
			while ($row = mysqli_fetch_assoc($res)) {
				$items[] = $row['item_name'];
			}
			return implode(",", $items);
		}else{
			return "";
		}
	}



?>
<script type="text/javascript">
	$(function(){
		$(".view-spc").click(function(event) {
			var book_id = $(this).attr('book-id');
			// alert(book_id);
			$.post('focus_area.php', {book_id: book_id}, function() {
				/*optional stuff to do after success */
			}).done(function(data){

				if (data != "null") {
					// console.log("data");
					var json_res = jQuery.parseJSON(data);
					var _img = json_res.data.img_file_cm;
					var _detail = json_res.data.comment;
					console.log(json_res.data.img_file_cm);
					$("#md-body").html("<table class='table-bordered'><tr><td><img src='../../image/img_comment/"+_img+"'></td></tr><tr><td><h3>รายละเอียด :</h3><span>"+_detail+"</span></td></tr>");
					$("#modal").modal("toggle");
				} else {
					// console.log("data null");
					$("#md-body").html("<h1>ไม่มีรายการ</h1>");
					$("#modal").modal("toggle");
				}

			});
		});

	});

</script>
   