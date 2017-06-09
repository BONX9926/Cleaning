<?php
	session_start();
?>

 <!--    <link rel="stylesheet" type="text/css" href="../assets/bootstrap-fileupload/bootstrap-fileupload.css" />
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap-timepicker/compiled/timepicker.css" />
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap-colorpicker/css/colorpicker.css" />
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap-daterangepicker/daterangepicker-bs3.css" />
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap-datetimepicker/css/datetimepicker.css" />
    <link rel="stylesheet" type="text/css" href="../assets/jquery-multi-select/css/multi-select.css" /> -->
<link rel="stylesheet" href="../css/simply-toast.min.css" type="text/css">
<!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

	<aside class="profile-info col-lg-12">
		<section class="panel">
			<div class="panel-body bio-graph-info">

				<h1> แก้ไขข้อมูลส่วนตัว</h1>
				<form class="form-horizontal" role="form">


					<div class="form-group">
						<label  class="col-lg-2 control-label">แนะนำตัว</label>
						<div class="col-lg-10">
							<textarea name="show_detail" id="show_detail" class="form-control" cols="30" rows="10"><?=$_SESSION['show_detail']?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label  class="col-lg-2 control-label">ชื่อ</label>
						<div class="col-lg-6">
							<input type="text" name="fname" class="form-control" id="fname" value="<?=$_SESSION['fname']?>">
						</div>
					</div>
					<div class="form-group">
					<label  class="col-lg-2 control-label">นามสกุล</label>
					<div class="col-lg-6">
					<input type="text" name="lname" class="form-control" id="lname" value="<?=$_SESSION['lname']?>">
					</div>
					</div>
					<div class="form-group">
					<label  class="col-lg-2 control-label">ที่อยู่</label>
					<div class="col-lg-6">
					<input type="text" name="address" class="form-control" id="address" value="<?=$_SESSION['address']?>">
					</div>
					</div>
					<div class="form-group">
					<label  class="col-lg-2 control-label">วันเกิด</label>
					<div class="col-lg-6">
						<!-- <div data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="<?=$_SESSION['birthday']?>" class="input-append date dpYears">
							<input type="text" readonly="" name="birthday" value="<?=$_SESSION['birthday']?>" size="16" class="form-control" >
							<span class="input-group-btn add-on">
								<button class="btn btn-danger" type="button"><i class="fa fa-calendar"></i></button>
							</span>
						</div> -->
						<input type="date" name="birthday" value="<?=$_SESSION['birthday']?>" class="form-control">


					</div>
					</div>
					<div class="form-group">
					<label  class="col-lg-2 control-label">Email</label>
					<div class="col-lg-6">
					<input type="text" name="email" class="form-control" id="email" value="<?=$_SESSION['email']?>">
					</div>
					</div>
					<div class="form-group">
					<label  class="col-lg-2 control-label">เบอร์โทรศัพท์</label>
					<div class="col-lg-6">
					<input type="text" name="phone" class="form-control" id="phone" value="<?=$_SESSION['phone']?>">
					</div>
					</div>
					<input type="hidden" name="id" id="id" value="<?=$_SESSION['id']?>">
				</form>

					<div class="form-group">
					<div class="col-lg-offset-2 col-lg-10">
					<button type="submit" id="submit" class="btn btn-success">บันทึก</button>
					<!-- <button type="button" class="btn btn-default">Cancel</button> -->
					</div>
					</div>
			</div>
		</section>
	</aside>
<!-- <script src="../js/simply-toast.min.js"></script>
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
  <script type="text/javascript" src="../assets/jquery-multi-select/js/jquery.quicksearch.js"></script>-->
  <script src="../js/jquery.mask.min.js"></script>
  <!--this page  script only-->
<!-- <script src="../js/advanced-form-components.js"></script> -->
<script>
    $("#phone").mask('000-000-0000');
	$('#submit').click(function(event) {
		// alert('5555');
		var data = $('form').serializeArray();
		console.log(data);
		// if (data[0]['value'] != '' && data[1]['value'] != '') {}
		$.post('profile_edit_save.php', {data: data}, function() {

		}).done(function(data){
			// alert(data);
			let json_res = jQuery.parseJSON(data);
			if(json_res.status == true){
				$.simplyToast(json_res.message, 'success');
			}else{
				$.simplyToast(json_res.message, 'danger');
			}
		});
	});
</script>
</body>
</html>