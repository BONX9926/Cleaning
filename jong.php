<?php
	session_start();
	
	$date = date('d-m-Y');
	// $date = "2015-11-17";
    $tomorrow = date('d-m-Y', strtotime($date. ' + 1 days'));
?>
<!DOCTYPE html>
<html>
<head>
	<title>จอง</title>
	<link rel="stylesheet" href="./css/bootstrap.min.css">
<link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
<script src="./js/jquery-3.2.0.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="backend/assets/bootstrap-fileupload/bootstrap-fileupload.css" />
    <link rel="stylesheet" type="text/css" href="backend/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
    <link rel="stylesheet" type="text/css" href="backend/assets/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="backend/assets/bootstrap-timepicker/compiled/timepicker.css" />
    <link rel="stylesheet" type="text/css" href="backend/assets/bootstrap-colorpicker/css/colorpicker.css" />
    <link rel="stylesheet" type="text/css" href="backend/assets/bootstrap-daterangepicker/daterangepicker-bs3.css" />
    <link rel="stylesheet" type="text/css" href="backend/assets/bootstrap-datetimepicker/css/datetimepicker.css" />
    <link rel="stylesheet" type="text/css" href="backend/assets/jquery-multi-select/css/multi-select.css" />
	<link href="backend/css/style.css" rel="stylesheet">
	<link href="css/mycss.css" rel="stylesheet">
	<link href="css/sweetalert.css" rel="stylesheet">
	<link href="backend/css/style-responsive.css" rel="stylesheet" />
	<style type="text/css">
		.maid_name {
			color: #000000;
		}
		.my-btn ,.rm-maid {
			float: right;
		}
	</style>
</head>
<body>
<?php include_once 'navbar.php'; ?>
<div class="loading" id="load_page">Loading&#8230;</div>
<div class="container" style="padding-top: 60px;">
	<div class="row">
		<div class="col-lg-12" id="content">
				<section class="panel">
				<header class="panel-heading">
				เลือกวันและประเภทในการจอง
				</header>
				<div class="panel-body">
				<form class="form-horizontal">
				<div class="form-group">
				<label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">วันที่ทำความสะอาด</label>
				<div class="col-lg-9">
					<div data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="<?php echo date('d-m-Y');?>" class="input-append date dpYears">
					<input type="text" readonly="" id="date" name="work-day" value="<?php echo $tomorrow; ?>" size="16" class="form-control">
					<span class="input-group-btn add-on">
					<button class="btn btn-danger" type="button"><i class="fa fa-calendar"></i></button>
					</span>
					</div>
				</div>
				</div>
				<div class="form-group">
				<label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">ประเภทการจอง</label>
				<div class="col-lg-9">
					<select class="form-control m-bot15" name="package" id="package">
						<option value="day">หนึ่งวัน</option>
						<option value="week">หนึ่งสัปดาห์</option>
					</select>
				</div>
				</div>
				</form>
				<div class="form-group">
				<div class="col-lg-offset-2 col-lg-10">
				<button id="submit" class="btn btn-danger">Next</button>
				</div>
				</div>
				</div>
				</section>
				<div id="display_maid" style="display: none;">
					<h3>รายชื่อแม่บ้าน</h3>	
					<div class="col-lg-12" style="background-color: #ffffff">
						<div class="col-lg-9" style="max-height: 500px; overflow: scroll;" id="content_maid">
						</div>
						<div class="col-lg-3">
						<h4>แม่บ้านที่คุณเลือก</h4>
							<table class="table table-bordered" id="list_maid_booking">
								<tr>
									<td><i class="fa fa-calendar-check-o fa-sidebar"></i> <span id="date_th">xxx</span></td>
								</tr>
							</table>
							<button class="btn btn-success" id="confirm">ยืนยัน</button>
						</div>
					</div>
					<h3>อุปกณ์ทำความสะอาดเพิ่มเติม</h3>
					<div class="col-lg-12" style="background-color: #ffffff">
						ปปปป
					</div>
					<h3>จุดที่ต้องการเน้นเป็นพิเศษ</h3>
					<div class="col-lg-12" style="background-color: #ffffff">
						ปปปป
					</div>
				</div>
		</div>	
	</div>
</div>
  <script type="text/javascript" src="backend/assets/fuelux/js/spinner.min.js"></script>
  <script type="text/javascript" src="backend/assets/bootstrap-fileupload/bootstrap-fileupload.js"></script>
  <script type="text/javascript" src="backend/assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
  <script type="text/javascript" src="backend/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
  <script type="text/javascript" src="backend/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="backend/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
  <script type="text/javascript" src="backend/assets/bootstrap-daterangepicker/moment.min.js"></script>
  <script type="text/javascript" src="backend/assets/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="backend/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
  <script type="text/javascript" src="backend/assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
  <script type="text/javascript" src="backend/assets/jquery-multi-select/js/jquery.multi-select.js"></script>
  <script type="text/javascript" src="backend/assets/jquery-multi-select/js/jquery.quicksearch.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.min.js"></script>
  <script src="backend/js/advanced-form-components.js"></script>
<!--script for this page-->
<!-- <script src="backend/js/jquery.stepy.js"></script> -->
<script type="text/javascript" src="js/sweetalert.min.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		var uid = "<?php echo $_SESSION['uid'] ?>";
		var list_maid_id = [];
		$('#load_page').hide();
		function render(arr_maid) {
			let patt = "<tr class='row-maid mid-{maid_id}'><td><img src='{img}' style='width: 30px; height: 30px;border-radius: 30px;'> {name}  <button class='btn btn-danger btn-xs rm-maid' mid={{maid_id}}>X ลบ</button></td></tr>";
			let temp = '';
			$('.row-maid').remove();
			$.each(arr_maid, function(index, val) {
				let maid_name = $('#maid_name-'+val).text();
				let maid_avatar = $('#img-'+val).attr('src');

				temp = 
				patt.replace('{img}',maid_avatar)
					.replace('{name}', maid_name)
					.replace('{maid_id}',val)
					.replace('{{maid_id}}',val);
				$('#list_maid_booking').append(temp);
			});
			$('.rm-maid').click(function(event) {
				let	conf = confirm("คุณต้องการรบรายการนี้ ใช่หรืแไม่ ?");
				if (conf)  {
					let index =  list_maid_id.indexOf($(this).attr('mid'));
					list_maid_id.splice(index,1);
					render(list_maid_id);
					// // alert(list_maid_id);
					 
				}
			});
		}

		$('#submit').click(function(event) {
			$('#load_page').show();
			$.post('service/show_maid.php', 
				{date: $('#date').val(), package: $('#package').val()}, 
				function() {
					
				}
			).done(function(data) {
				// alert(data);
				//$('#content').html(data);
				list_maid_id = [];
				render(list_maid_id);
				let patt = '<div class="maid_user" style="height: 180px"><div class="col-lg-3" style="height: inherit;"><img id="img-{maid_id_img}" class="img-responsive img-circle" src="backend/img/avatar_profile/{file_name}" style="padding: 10px; "></div><div class="col-lg-9" style="height:inherit;" ><h4 class="maid_name" id="maid_name-{maid_name}">{name}</h4>{detail}<div class="row"><button maid_id="{maid_id}" class="btn btn-info my-btn">เลือกแม่บ้าน</button></div></div></div><hr>';
				try{
					let json_res = jQuery.parseJSON(data);
					if(json_res.status === true){

						let $temp = "";
						$("#content_maid").empty();
						$.each(json_res.data, function(index, val) {
							$temp = 
							patt.replace('{file_name}', val.avatar)
								.replace('{name}', val.fname +" "+val.lname)
								.replace('{detail}', val.show_detail)
								.replace('{maid_id}', val.id)
								.replace('{maid_id_img}', val.id)
								.replace('{maid_name}', val.id);
							$("#content_maid").append($temp);
						});
						$('#load_page').hide();
						$("#display_maid").show(800,function() {
							
							$('#date_th').html(json_res.date_th);
						});
					}
				}catch(e){

				}
			}, function() {
				
				$(".my-btn").click(function(event) {
					// alert();i
					let maid_id = $(this).attr('maid_id');
					// let maid_name = $('#maid_name-'+$(this).attr('maid_id')).text();
					// let maid_avatar = $('#img-'+$(this).attr('maid_id')).attr('src');
					if (list_maid_id.indexOf(maid_id) > -1) {

					} else {
						list_maid_id.push(maid_id);
						render(list_maid_id);

					}
				});	
			});
		});

		$('#confirm').click(function(event) {
			if (list_maid_id.length > 0) {
				// alert(true);
				$.post('service/add_booking.php', 
					{
						arr_maid: list_maid_id,
						user_id: uid,
						date: $('#date').val()
					}, 
					function() {
					
					}
				).done(function(data) {
					// alert(data);
					try {
						let json_res = jQuery.parseJSON(data);
						if(json_res.status === true) {
							swal({
								title: "จองแม่บ้านเรียบร้อยแล้ว",
								text: json_res.message +" "+"ต้องการเช้าอุปกรณ์ทำความสะอาดเพิ่มหรือไม่",
								type: "success",
								showCancelButton: true,
								confirmButtonColor: "#DD6B55",
								confirmButtonText: "ต้องการ!",
								cancelButtonText: "ไม่ต้องการ!",
								closeOnConfirm: false,
								closeOnCancel: false
							},
							function(isConfirm){
								if (isConfirm) {
									window.location.href = "item.php";
									// get_item_page();
									// swal("OK!", "Your imaginary file has been deleted.", "success");
								} else {
									swal("Cancelled", "Your imaginary file is safe :)", "error");
								}
							});
						} else {
							swal("Fail!!", json_res.message, "error")
						}
					} catch(e) {

					}
				});
			} else {
				alert('ไม่มีแม่บ้านที่คุณเลือก กรุณาเลือกแม่บ้าน');
			}
		});

		function get_item_page() {
			$.get('item.php', function() {
				/*optional stuff to do after success */
			}).done(function(data) {
				// alert()
				$('#content').html(data);
			});
		}
	});
</script>
</body>
</html>