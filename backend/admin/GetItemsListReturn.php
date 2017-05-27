<?php
	session_start();
	include_once '../../connect.php';
	$sql_sel_items = "SELECT * FROM `items`INNER JOIN `borrow_detail`ON items.item_id = borrow_detail.item_id WHERE borrow_detail.ref_borrow_id='{$_POST['id']}'";
	// echo $sql_sel_items;

?>
<form id="form" br-id="<?=$_POST['id']?>">
	<table class="table">
	<tr>
		<th></th>
		<th>ชื่ออุปกรณ์</th>
		<th>จำนวนที่ยืม</th>
		<th>จำนวนที่คืนแล้ว</th>
		<th>จำนวนที่ต้องการคืน</th>
		<th>จำนวนที่ชำรุด</th>
		<?php
		if($res = mysqli_query($conn,$sql_sel_items)){
			while ($row = mysqli_fetch_assoc($res)) {
				echo "<tr>";
				echo "<td><img style='width: 80px;height: 80px;' src='../img/items/{$row['img']}'></td>";
				echo "<td>{$row['item_name']}</td>";
				echo "<td>{$row['item_amount']}</td>";
				echo "<td>{$row['item_return']}</td>";
				$max = $row['item_amount']*1 - $row['item_return']*1;
				$dis = ($row['item_amount']*1 == $row['item_return']*1) ? "disabled" : "" ;
				echo "<td><input class='form-control' type='number' min='1' max = '{$max}' name='return-item-{$row['item_id']}' {$dis}></td>";
				echo "<td><input class='form-control' type='number' min='1' max = '{$row['item_amount']}' name='return-wornout-{$row['item_id']}' value='0' {$dis}></td>";
				echo "</tr>";
			}
		}
		?>
	</tr>
	<tr>
		<td colspan="6"><button type="button" class="btn btn-info" id="submit">Ok</button></td>
	</tr>
	</table>
</form>
<script type="text/javascript">
	function get_page_borrow(){
		$.get('get_page_borrow.php', function() {
			// optional stuff to do after success 
		}).done(function(data){
			$("#content").html(data);
		});
	}
	$("#submit").click(function(event) {
		var br_id = $("form").attr('br-id');
		var item_return = $("input[name^='return-item-']").serializeArray();
		var item_wongout = $("input[name^='return-wornout-']").serializeArray();

		$.post('item_return_save.php', {item_return: item_return,item_wongout: item_wongout, br_id:br_id}, function(data, textStatus, xhr) {
			/*optional stuff to do after success */
		}).done(function(data){
			// console.log(data);
			
			// get_page_borrow();
			// try {
				
				var json_res = jQuery.parseJSON(data);
				// swal(json_res.message);
				if(json_res.status == true){
					swal("",json_res.message , "success");
					get_page_borrow();
					$("#return-modal-list").modal('toggle');
					$(".modal-backdrop").hide();
				}else{
					swal("",json_res.message , "error");
					$("#return-modal-list").modal('toggle');
				}

			// } catch(e) {
			// 	// statements
			// 	console.log(e);
			// }
		});
		// alert(br_id);
	});
</script>