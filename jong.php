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
<!-- <script src="https://unpkg.com/vue@2.2.6"></script> -->
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
						<!-- <option value="week">หนึ่งสัปดาห์</option> -->
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
				<form id="files" method="POST" enctype="multipart/formdata">
					<div class="col-lg-12" style="background-color: #ffffff">
					<input type="hidden" name="uid" value="<?=$_SESSION['uid']?>">
					<input type="hidden" name="date_time" id="data_time">
					<!-- <div id="data_time"></div> -->
					
						<div class="col-lg-6">
							<h3>ขนาดพื้นที่ของการทำความสะอาด</h3>
							<select class="form-control" id="area_size" name="area_size">
							
							</select>
						</div>
						<div class="col-lg-6">
							<h3>ประเภทการทำความสะอาด <small style="color:red">จำเป็นต้องเลือก</small></h3>
							<div id="app_room">
									<!-- {{ items }} -->
								<div id="room_category">
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-12" style="background-color: #ffffff">
						<div class="col-lg-6">
							<h3>อุปกรณ์ทำความสะอาด</h3>
							<div id="app_items">
								<div id="items_all">
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<h3>จุดที่ต้องการเน้นเป็นพิเศษ</h3>
							<!-- <form id="files" method="POST" enctype="multipart/formdata"> -->
								<input type="file" name="file">
							<!-- </form> -->
							<textarea id="comment" name="comment" class="form-control" rows="2" placeholder="ระบุข้อความ"></textarea>
						</div>
					</div>
					<div class="col-lg-12" style="background-color: #ffffff">
					<h3>รายชื่อแม่บ้าน</h3>	
						<div class="col-lg-9" style="max-height: 500px; overflow: scroll;" id="content_maid">
						</div>
						<div class="col-lg-3">
						<h4>แม่บ้านที่คุณเลือก</h4>
							<table class="table table-bordered" id="list_maid_booking">
								<tr>
									<td><i class="fa fa-calendar-check-o fa-sidebar"></i> <span id="date_th"></span></td>
								</tr>
							</table>
						</form>
							<button class="btn btn-success" id="confirm">ยืนยัน</button>
						</div>
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
		// var uid = "<?php echo $_SESSION['uid'] ?>";
		var list_maid_id = [];
		var vm_c = '';
		var vm_i = '';
		$('#load_page').hide();
		function render(arr_maid) {
			let patt = "<tr class='row-maid mid-{maid_id}'><td><img src='{img}' style='width: 30px; height: 30px;border-radius: 30px;'> {name} <input type='hidden' name='arr_maid[]' value='{maid_id_hidden}'><button class='btn btn-danger btn-xs rm-maid' mid={{maid_id}}>X ลบ</button></td></tr>";
			let temp = '';
			$('.row-maid').remove();
			$.each(arr_maid, function(index, val) {
				let maid_name = $('#maid_name-'+val).text();
				let maid_avatar = $('#img-'+val).attr('src');

				temp = 
				patt.replace('{img}',maid_avatar)
					.replace('{name}', maid_name)
					.replace('{maid_id}',val)
					.replace('{{maid_id}}',val)
					.replace('{maid_id_hidden}',val);
				$('#list_maid_booking').append(temp);
			});
			$('.rm-maid').click(function(event) {
				let	conf = confirm("คุณต้องการรบรายการนี้ ใช่หรือไม่ ?");
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
			
			$.post('service/show_size_area.php', function() {
				
			}).done(function(data) {
				let json_res = jQuery.parseJSON(data);
				// alert(data);
				if(json_res.status == true) {
					$.each(json_res.data, function(index, val) {
						// console.log(val); 
						$('#area_size').append("<option value='"+val.size_id+"'>"+val.size_name+"</option>");
						
					});
				} else {
					alert(json_res.message);
				}
			});

			$.post('service/show_items.php', function() {
				
			}).done(function(data) {
				let json_res = jQuery.parseJSON(data);
				// alert(data);
				if(json_res.status == true) {
					$("#items_all").empty();
					
					$.each(json_res.data, function(index, val) {
						// console.log(val);
						$('#items_all').append("<label class='checkbox'><input type='checkbox' v-model='items' id='items' name='items[]' value='"+val.item_id+"'>"+val.item_name+"</label>");
						
					});
				} else {
					alert(json_res.message);
				}
			});

			$.post('service/show_room_category.php', function() {
				/*optional stuff to do after success */
			}).done(function(data) {
				let json_res = jQuery.parseJSON(data);
				// alert(json_res.data);
				if(json_res.status == true) {
					$("#room_category").empty();
					$.each(json_res.data, function(index, val) {
						$('#room_category').append("<label class='checkbox-inline'><input type='checkbox' v-model='items' name='rooms[]' value='"+val.room_id+"'>"+val.room_name+"</label>");
					});
				} else {
					alert(json_res.message);
				}
			});
			$.post('service/show_maid.php', 
				{
					date: $('#date').val(), 
					package: $('#package').val()
				}, function() {
					
				}).done(function(data) {
				// alert(data);
				//$('#content').html(data);
				list_maid_id = [];
				render(list_maid_id);
				let patt = '<div class="maid_user" style="height: 180px"><div class="col-lg-3" style="height: inherit;"><img id="img-{maid_id_img}" class="img-responsive img-circle" src="backend/img/avatar_profile/{file_name}" style="padding: 10px; "></div><div class="col-lg-9" style="height:inherit;" ><h4 class="maid_name" id="maid_name-{maid_name}">{name}</h4>{detail}<div class="row"><a maid_id="{maid_id}" class="btn btn-info my-btn">เลือกแม่บ้าน</a></div></div></div><hr>';
				try{
					let json_res = jQuery.parseJSON(data);
					// alert(json_res.date_time);
					if(json_res.status === true){

						let $temp = "";
						let $temp2= "";
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
							// $('#date_time').html(json_res.date_time);
							// alert(json_res.date_time);
							// date.replace('{data}', json_res.date_time);
							$("#data_time").val(json_res.date_time);
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


			$('#confirm').click(function(event) {
				if (list_maid_id.length > 0) {
					var size =  $('#area_size').val();
					$('#comment').val();
					// $('input[name=items]').val();

					var formData = new FormData($("form#files")[0]);
					// alert(data[0]['value']);
					// console.log(data);
					// console.log(formData);

					//alert(formData);
					$.ajax({
				        url: 'service/add_bin.php',
				        type: 'POST',
				        data: formData,
				        async: false,
				        success: function (data) {
			            // console.log(data);
			            // alert(data);
			            let json_res = jQuery.parseJSON(data);
			            alert("กรุณาชำระเงิน ภายในวันเวลาที่บิลระบุ");
			            if(json_res.status == true) {
			            	window.location.href = "jong_detail.php";
				           //  $.simplyToast(json_res.message, 'success');
				           //  $('input').val("");
				           //  $('#show-img').attr('src', '');

			            } else {
			            	// $.simplyToast(json_res.message, 'danger');
			            	alert(json_res.message);
			            }
			        },
			        cache: false,
			        contentType: false,
			        processData: false
			    });

			    return false;

				} else {
					alert('ไม่มีแม่บ้านที่คุณเลือก กรุณาเลือกแม่บ้าน');
					return false;
				}
			});	
			});
		});
	});
</script>
</body>
</html>