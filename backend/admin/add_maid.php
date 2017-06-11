<?php
	session_start();
?>
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap-fileupload/bootstrap-fileupload.css" />
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap-timepicker/compiled/timepicker.css" />
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap-colorpicker/css/colorpicker.css" />
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap-daterangepicker/daterangepicker-bs3.css" />
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap-datetimepicker/css/datetimepicker.css" />
    <link rel="stylesheet" type="text/css" href="../assets/jquery-multi-select/css/multi-select.css" />
	<link rel="stylesheet" href="../css/simply-toast.min.css" type="text/css">
	<div class="col-lg-12">
	<section class="panel">
	<header class="panel-heading">
	เพิ่มแม่บ้าน
	</header>
	<div class="panel-body">
		<form class="form-horizontal" role="form">
			<div class="form-group">
				<label class="col-lg-2 col-sm-2 control-label">username</label>
				<div class="col-lg-10">
					<input type="text" class="form-control" name="user" id="user">
				</div>
			</div>
			<div class="form-group">
				<label class="col-lg-2 col-sm-2 control-label">password</label>
				<div class="col-lg-10">
					<input type="password" class="form-control" name="pass" id="pass">
				</div>
			</div>
			<div class="form-group">
				<label class="col-lg-2 col-sm-2 control-label">ชื่อ</label>
				<div class="col-lg-10">
					<input type="text" class="form-control" name="fname" id="fname">
				</div>
			</div>
			<div class="form-group">
				<label class="col-lg-2 col-sm-2 control-label">นามสกุล</label>
				<div class="col-lg-10">
					<input type="text" class="form-control" name="lname" id="lname">
				</div>
			</div>
			<div class="form-group">
				<label class="col-lg-2 col-sm-2 control-label">ที่อยู่</label>
				<div class="col-lg-10">
					<input type="text" class="form-control" name="address" id="address">
				</div>
			</div>
			<div class="form-group">
				<label class="col-lg-2 col-sm-2 control-label">Email</label>
				<div class="col-lg-10">
					<input type="email" class="form-control" name="email" id="email">
				</div>
			</div>
			<div class="form-group">
				<label class="col-lg-2 col-sm-2 control-label">เบอร์โทรศัพท์</label>
				<div class="col-lg-10">
					<input type="text" name="phone" placeholder="" data-mask="999-999-9999" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-lg-2 col-sm-2 control-label">วันเกิด</label>
				<div class="col-lg-10">
					<!-- <div data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="22-06-1994" class="input-append date dpYears">
						<input type="text" readonly="" name="birthday" size="16" class="form-control" >
						<span class="input-group-btn add-on">
							<button class="btn btn-danger" type="button"><i class="fa fa-calendar"></i></button>
						</span>
					</div> -->
					<input type="date" name="birthday" class="form-control">
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-lg-2 col-sm-2 control-label">แนะนำตัว</label>
				<div class="col-lg-10">
					<input type="text" class="form-control" name="show_detail" id="show_detail">
				</div>
			</div>
		</form>
			<div class="form-group">
				<div class="col-lg-2 col-sm-2 control-label">
				</div>
				<div class="col-lg-10">
					<button class="btn btn-round btn-primary" id="submit" type="submit">เพิ่ม</button>
				</div>
			</div>
	</div>
	</section>
	</div>
</div>
<!-- js placed at the end of the document so the pages load faster -->
<!-- <script src="../js/jquery.js"></script> -->
<!--  <script src="../js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="../js/jquery.dcjqaccordion.2.7.js"></script>
<script src="../js/jquery.scrollTo.min.js"></script>
<script src="../js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="../js/jquery.sparkline.js" type="text/javascript"></script>
<script src="../assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
<script src="../js/owl.carousel.js" ></script>
<script src="../js/jquery.customSelect.min.js" ></script>
<script src="../js/respond.min.js" ></script> -->


<script src="../js/simply-toast.min.js"></script>
    <!--this page plugins-->

  <script type="text/javascript" src="../assets/fuelux/js/spinner.min.js"></script>
  <script type="text/javascript" src="../assets/bootstrap-fileupload/bootstrap-fileupload.js"></script>
  <script type="text/javascript" src="../assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
  <script type="text/javascript" src="../assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
  <script type="text/javascript" src="../assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="../assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
  <script type="text/javascript" src="../assets/bootstrap-daterangepicker/moment.min.js"></script>
  <script type="text/javascript" src="../assets/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="../assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
  <script type="text/javascript" src="../assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
  <script type="text/javascript" src="../assets/jquery-multi-select/js/jquery.multi-select.js"></script>
  <script type="text/javascript" src="../assets/jquery-multi-select/js/jquery.quicksearch.js"></script>
  <script src="../js/jquery.mask.min.js"></script>
  <!--this page  script only-->
<script src="../js/advanced-form-components.js"></script>
<script>
	$('#submit').click(function(event) {
		var data = $('form').serializeArray();
		// alert(data[0]['value']);
		// console.log(data);
		if (data[0]['value'] != '' && data[1]['value'] != '' && data[2]['value'] != ''&& data[3]['value'] != ''&& data[4]['value'] != ''&& data[5]['value'] != ''&& data[6]['value'] != ''&& data[7]['value'] != '') {
			$.post('add_maid_save.php', {data: data}, function() {
				
			}).done(function(data) {
				// alert(data);
				// console.log(data);
				let json_res = jQuery.parseJSON(data);
				if(json_res.status == true){
					$.simplyToast(json_res.message, 'success');
					//alert()
					//window.location = "add_maid.php?success=1";
				}else{
					// alert(json_res.message);
					$.simplyToast(json_res.message, 'danger');
				}
			});
		} else {
			// alert("error");
			$.simplyToast('กรุณากรอกข้อมูลให้ครบทุกช่อง', 'danger');
			// window.location ='add_maid.php?err=1';
		}
	});
</script>
