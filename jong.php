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
	<link href="backend/css/style-responsive.css" rel="stylesheet" />
</head>
<body>
<?php include_once 'navbar.php'; ?>
<div class="container" style="padding-top: 60px;">
<!-- 	<pre>
	<?php var_dump($_SESSION) ?>
	</pre> -->
	<div class="row">
		<div class="col-lg-12">
			<section class="panel">
			<header class="panel-heading">
			Horizontal Forms
			</header>
			<div class="panel-body">
			<form class="form-horizontal" role="form" action="dateJong.php" method="POST">
			<div class="form-group">
			<label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">วันที่ทำความสะอาด</label>
			<div class="col-lg-9">
				<div data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="<?php echo date('d-m-Y');?>" class="input-append date dpYears">
				<input type="text" readonly="" name="work-day" value="<?php echo $tomorrow; ?>" size="16" class="form-control">
				<span class="input-group-btn add-on">
				<button class="btn btn-danger" type="button"><i class="fa fa-calendar"></i></button>
				</span>
				</div>
			</div>
			</div>
			<div class="form-group">
			<label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">ทำกี่วัน</label>
			<div class="col-lg-9">
				<select class="form-control m-bot15" name="package">
					<option value="day">หนึ่งวัน</option>
					<option value="week">หนึ่งสัปดาห์</option>
				</select>
			</div>
			</div>
			<div class="form-group">
			<div class="col-lg-offset-2 col-lg-10">
			<button type="submit" class="btn btn-danger">Next</button>
			</div>
			</div>
			</form>
			</div>
			</section>
		</div>	
	</div>
	<!-- <label>เวลา</label> -->
<!-- <div data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="12-02-2012" class="input-append date dpYears">
<input type="text" readonly="" value="12-02-2012" size="16" class="form-control">
<span class="input-group-btn add-on">
<button class="btn btn-danger" type="button"><i class="fa fa-calendar"></i></button>
</span>
</div> -->
<!-- <div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
			<h1>จองบริการ</h1>
			</header>
			<div class="panel-body">
				<div class="stepy-tab">
					<ul id="default-titles" class="stepy-titles clearfix">
						<li id="default-title-0" class="current-step">
							<div>Step 1</div>
						</li>
						<li id="default-title-1" class="">
							<div>Step 2</div>
						</li>
						<li id="default-title-2" class="">
							<div>Step 3</div>
						</li>
					</ul>
				</div>
			<form class="form-horizontal" id="default">
				<fieldset title="Step1" class="step" id="default-step-0">
				<legend> </legend>
				<div class="form-group">
				<label class="col-lg-2 control-label">วันที่ต้องการจอง</label>
				<div class="col-lg-9">
					<div data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="<?php echo date('d-m-Y');?>" class="input-append date dpYears">
					<input type="text" readonly="" name="work-day" value="<?php echo date('d-m-Y');?>" size="16" class="form-control">
					<span class="input-group-btn add-on">
					<button class="btn btn-danger" type="button"><i class="fa fa-calendar"></i></button>
					</span>
					</div>
				</div>
				</div>
				<div class="form-group">
				<label class="col-lg-2 control-label">จองกี่วัน</label>
				<div class="col-lg-10">
					<select class="form-control m-bot15">
						<option value="">รายวัน</option>
						<option value="">รายสัปดาห์</option>
					</select>
				</div>
				</div>
				<div class="form-group">
				<label class="col-lg-2 control-label">User Name</label>
				<div class="col-lg-10">
				<input type="text" class="form-control" placeholder="Username">
				</div>
				</div>

				</fieldset>
				<fieldset title="Step 2" class="step" id="default-step-1" >
				<legend> </legend>
				<div class="form-group">
				<label class="col-lg-2 control-label">Phone</label>
				<div class="col-lg-10">
				<input type="text" class="form-control" placeholder="Phone">
				</div>
				</div>
				<div class="form-group">
				<label class="col-lg-2 control-label">Mobile</label>
				<div class="col-lg-10">
				<input type="text" class="form-control" placeholder="Mobile">
				</div>
				</div>
				<div class="form-group">
				<label class="col-lg-2 control-label">Address</label>
				<div class="col-lg-10">
				<textarea class="form-control" cols="60" rows="5"></textarea>
				</div>
				</div>

				</fieldset>
				<fieldset title="Step 3" class="step" id="default-step-2" >
				<legend> </legend>
				<div class="form-group">
				<label class="col-lg-2 control-label">Full Name</label>
				<div class="col-lg-10">
				<p class="form-control-static">Tawseef Ahmed</p>
				</div>
				</div>
				<div class="form-group">
				<label class="col-lg-2 control-label">Email Address</label>
				<div class="col-lg-10">
				<p class="form-control-static">tawseef@vectorlab.com</p>
				</div>
				</div>
				<div class="form-group">
				<label class="col-lg-2 control-label">User Name</label>
				<div class="col-lg-10">
				<p class="form-control-static">tawseef</p>
				</div>
				</div>
				<div class="form-group">
				<label class="col-lg-2 control-label">Phone</label>
				<div class="col-lg-10">
				<p class="form-control-static">01234567</p>
				</div>
				</div>
				<div class="form-group">
				<label class="col-lg-2 control-label">Mobile</label>
				<div class="col-lg-10">
				<p class="form-control-static">01234567</p>
				</div>
				</div>
				<div class="form-group">
				<label class="col-lg-2 control-label">Address</label>
				<div class="col-lg-10">
				<p class="form-control-static">
				Dreamland Ave, Suite 73
				AU, PC 1361
				P: (123) 456-7891 </p>
				</div>
				</div>
				</fieldset>
			<input type="submit" class="finish btn btn-danger" value="Finish"/>
			</form>
			</div>
		</section>
	</div>
</div> -->
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
<script src="backend/js/jquery.stepy.js"></script>
<script>

//step wizard

$(function() {
$('#default').stepy({
backLabel: 'Previous',
block: true,
nextLabel: 'Next',
titleClick: true,
titleTarget: '.stepy-tab'
});
});
</script>
</body>
</html>