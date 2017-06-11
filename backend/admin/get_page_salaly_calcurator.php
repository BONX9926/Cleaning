<div class="col-lg-12">
	<section class="panel">
		<header class="panel-heading">คำนวนเงินเดือน</header>
			<div class="panel-body">
				<section>
					<form class="form-inline" id="form">
					<div class="form-group">
					<label>ตั้งแต่วันที่ : </label>
					<input type="date" class="form-control" name="startDate">
					</div>
					<div class="form-group">
					<label>ถึงวันที่ : </label>
					<input type="date" class="form-control" name="endDate">
					</div>
					<button type="button" id="submit" class="btn btn-info">ตกลง</button>
					</form>
				</section>
				<hr>
				<section id="contentSalary">
					
				</section>
			</div>
	</section>
</div>
<script type="text/javascript">
	$("#submit").click(function(event) {
		var data = $("#form").serializeArray();
		var templateTable = "<table class='table table-hover' id='myTable'><thead><tr><th>#</th><th>ชื่อ - นามสกุล</th><th>คำนวณ</th></tr></thead><tbody>{{content}}</tbody></table>";
		var contentTable = "";
		// alert(data);
		// console.log(data);
		$.post('service_get_name_mount.php', {data: data}, function(data, textStatus, xhr) {
		// 	/*optional stuff to do after success */
		}).done(function(data){
			// alert(data);
			// console.log(data);
			var json_res = jQuery.parseJSON(data);
			if (json_res.status == true) {
				// console.log(json_res.data);
				$.each(json_res.data, function(index, val) {
					contentTable+= "<tr>";
					// console.log(val.maidname);
						contentTable+= "<td><img src='../img/avatar_profile/"+val.avatar+"' width='50' height='50'/></td>";
						contentTable+="<td>"+val.maidname+"</td>";
						// contentTable+= "<td><a class='btn btn-info' href='calcurator_salary.php?maid_id="+val.maid_id+"&startDate="+json_res.startDate+"&endDate="+json_res.endDate+"' target='_blank'>Click</a></td>";
						contentTable+= "<td><form action='calcurator_salary.php' method='post' target='_blank'><input type='hidden' name='maid_id' value='"+val.maid_id+"' /><input type='hidden' name='startDate' value='"+json_res.startDate+"' /><input type='hidden' name='endDate' value='"+json_res.endDate+"' /><button type='submit' class='btn btn-success'>คำนวณ</button></form></td>";

					contentTable+="</tr>";
					
				});
				var text = templateTable.replace('{{content}}',contentTable);

				$("#contentSalary").html(text);

			} else {	
				swal(json_res.message);
			}
		}, function() {
			 $('#myTable').DataTable({
			 	"pageLength": 10
			 });
		});
	});
</script>