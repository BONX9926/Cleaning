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
							<li class="active"><a href="profile.html"> <i class="fa fa-user"></i> Profile</a></li>
							<li><a href="#"> <i class="fa fa-calendar"></i> Recent Activity <span class="label label-danger pull-right r-activity">9</span></a></li>
							<li><a href="profile_edit.php"> <i class="fa fa-edit"></i> Edit profile</a></li>
						</ul>
					</section>
				</aside>
				<aside class="profile-info col-lg-9">
					<section class="panel">
						<div class="panel-body bio-graph-info">
							<h1>โปรไฟล์</h1>
							<div class="row">
								<div class="bio-row">
									<p><span>ชื่อ </span>: <?=$_SESSION['fname']?></p>
								</div>
								<div class="bio-row">
									<p><span>นามสกุล </span>: <?=$_SESSION['lname']?></p>
								</div>
								<div class="bio-row">
									<p><span>ที่อยู่ </span>: <?=$_SESSION['address']?></p>
								</div>
								<div class="bio-row">
									<p><span>วันเกิด</span>: <?=$_SESSION['birthday']?></p>
								</div>
								<div class="bio-row">
									<p><span>Email </span>: <?=$_SESSION['email']?></p>
								</div>
								<div class="bio-row">
									<p><span>เบอร์โทรสัพท์ </span>: <?=$_SESSION['phone']?></p>
								</div>
								<div class="bio-row">
									<p><span>แนะนำตัว </span>: <?=$_SESSION['show_detail']?></p>
								</div>
							</div>
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

<script>

  //owl carousel

// $(document).ready(function() {
//   	$("#owl-demo").owlCarousel({
// 		navigation : true,
// 		slideSpeed : 300,
// 		paginationSpeed : 400,
// 		singleItem : true,
// 		autoPlay:true
// 	});
// });

//   //custom select box

// $(function(){
// 	$('select.styled').customSelect();
// });

</script>

</body>
</html>
<?php } else {
		echo "คุณไม่มีสิทธิใช้งานส่วนนี้";
	// header("Location: ../maid/index.php");
	}
?>