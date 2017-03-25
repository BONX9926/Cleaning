<?php 
	session_start();
	if (isset($_SESSION['login']) && isset($_SESSION['status']) == 'M') {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- <meta name="description" content="">
	<meta name="author" content="Mosaddek"> -->
	<!-- <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina"> -->
	<link rel="shortcut icon" href="img/favicon.png">

	<title>โปรไฟล์</title>

	<!-- Bootstrap core CSS -->
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/bootstrap-reset.css" rel="stylesheet">
	<!--external css-->
	<link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<link href="../assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
	<link rel="stylesheet" href="../css/owl.carousel.css" type="text/css">

	<!--right slidebar-->
	<link href="../css/slidebars.css" rel="stylesheet">

	<!-- Custom styles for this template -->

	<link href="../css/style.css" rel="stylesheet">
	<link href="../css/style-responsive.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="../assets/bootstrap-fileupload/bootstrap-fileupload.css" />
   

    <!-- <link rel="stylesheet" type="text/css" href="../assets/bootstrap-fileupload/bootstrap-fileupload.css" /> -->
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap-timepicker/compiled/timepicker.css" />
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap-colorpicker/css/colorpicker.css" />
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap-daterangepicker/daterangepicker-bs3.css" />
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap-datetimepicker/css/datetimepicker.css" />
    <link rel="stylesheet" type="text/css" href="../assets/jquery-multi-select/css/multi-select.css" />

<!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
</head>

<body>

<section id="container">
<!--header start-->
<?php include_once '../header.php'; ?>
<!--header end-->
<!--sidebar start-->
<?php include_once '../sidebar.php'; ?>
<!--sidebar end-->

<!--main content start-->
	<section id="main-content">
		<section class="wrapper">
			<!-- page start-->
			<div class="row">
				<aside class="profile-nav col-lg-3">
					<section class="panel">
						<div class="user-heading round">
							<a href="#">
								<img src="../img/profile-avatar.jpg" alt="">
							</a>
							<h1><?=$_SESSION['fname']." ".$_SESSION['lname']?></h1>
							<p><?=$_SESSION['email']?></p>
						</div>
						<ul class="nav nav-pills nav-stacked">
							<li><a href="index.php"> <i class="fa fa-user"></i> Profile</a></li>
							<li><a href="#"> <i class="fa fa-calendar"></i> Recent Activity <span class="label label-danger pull-right r-activity">9</span></a></li>
							<li  class="active"><a href="profile_edit.php"> <i class="fa fa-edit"></i> Edit profile</a></li>
						</ul>
					</section>
				</aside>
				<aside class="profile-info col-lg-9">
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
									<div data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="<?=$_SESSION['birthday']?>" class="input-append date dpYears">
										<input type="text" readonly="" name="birthday" value="<?=$_SESSION['birthday']?>" size="16" class="form-control" >
										<span class="input-group-btn add-on">
											<button class="btn btn-danger" type="button"><i class="fa fa-calendar"></i></button>
										</span>
									</div>

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

								<div class="form-group">
								<div class="col-lg-offset-2 col-lg-10">
								<button type="submit" class="btn btn-success">Save</button>
								<button type="button" class="btn btn-default">Cancel</button>
								</div>
								</div>
							</form>
						</div>
					</section>
				</aside>
			</div>
			<!-- page end-->
		</section>
	</section>
<!--main content end-->
</section>


<!-- js placed at the end of the document so the pages load faster -->
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="../js/jquery.dcjqaccordion.2.7.js"></script>
<script src="../js/jquery.scrollTo.min.js"></script>
<script src="../js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="../js/jquery.sparkline.js" type="text/javascript"></script>
<script src="../assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
<script src="../js/owl.carousel.js" ></script>
<script src="../js/jquery.customSelect.min.js" ></script>
<script src="../js/respond.min.js" ></script>

<!--right slidebar-->
<script src="../js/slidebars.min.js"></script>

<!--common script for all pages-->
<script src="../js/common-scripts.js"></script>

<!--script for this page-->
<script src="../js/sparkline-chart.js"></script>
<script src="../js/easy-pie-chart.js"></script>
<script src="../js/count.js"></script>

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
  <!--this page  script only-->
<script src="../js/advanced-form-components.js"></script>
</body>
</html>
<?php } else {
		echo "คุณไม่มีสิทธิใช้งานส่วนนี้";
	// header("Location: ../maid/index.php");
	}
?>