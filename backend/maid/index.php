<?php 
	session_start();
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

</head>

<body>

<section id="container">
<!--header start-->
<?php include_once '../header.php'; ?>
<!--header end-->
<!--sidebar start-->
<aside>
	<div id="sidebar"  class="nav-collapse ">
		<!-- sidebar menu start-->
		<ul class="sidebar-menu" id="nav-accordion">
			<li class="sub-menu" id="sbmu_pro">
				<a href="javascript:;">
					<i class="fa fa-user"></i>
					<span>โปรไฟล์ส่วนตัว</span>
				</a>
				<ul class="sub">
					<li id="profile"><a><i class="fa fa-edit"></i>ข้อมูลโปรไฟล์</a></li>
					<li id="profile-edit"><a><i class="fa fa-edit"></i>แก้ไขโปรไฟล์</a></li>
					<li id="avatar-edit"><a><i class="fa fa-edit"></i>แก้ไขรูปโปรไฟล์</a></li>
					<!-- <li id="add-maid"><a>เพิ่มแม่บ้าน</a></li> -->
				</ul>
			</li>
			<li class="sub-menu">
				<a href="javascript:;" >
					<i class="fa fa-book"></i>
					<span>UI Elements</span>
				</a>
				<ul class="sub">
					<li><a  href="#">General</a></li>
					<li><a  href="#">Buttons</a></li>
					<li><a  href="#">Widget</a></li>
					<li><a  href="#">Slider</a></li>
					<li><a  href="#">Nestable</a></li>
					<li><a  href="#">Font Awesome</a></li>
				</ul>
			</li>

			<li class="sub-menu">
				<a href="javascript:;" >
					<i class="fa fa-cogs"></i>
					<span>Components</span>
				</a>
				<ul class="sub">
					<li><a  href="#">Grids</a></li>
					<li><a  href="#">Calendar</a></li>
					<li><a  href="#">Gallery</a></li>
					<li><a  href="#">Todo List</a></li>
					<li><a  href="#">Draggable Portlet</a></li>
					<li><a  href="#">Tree View</a></li>
				</ul>
			</li>
		</ul>
	<!-- sidebar menu end-->
	</div>
</aside>
<!--sidebar end-->
	
<!--main content start-->
	<section id="main-content">
		<section class="wrapper">
			<!-- page start-->
			<div class="row" id="content">
				
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

<script src="../js/simply-toast.min.js"></script>

<script>
	$(document).ready(function() {
		//set cussor
		$("a").css('cursor', 'pointer');
		//set cussor

		// event but maid click
		$("#profile").click(function(event) {
			$("li .active").attr('class','');
			get_page_profile();
			$(this).attr('class','active');
			// $("#sbmu_pro").attr('class','active');
			//alert("555");
		});
		// event but maid click

		// event but maid click
		$("#profile-edit").click(function(event) {
			$("li .active").attr('class','');
			get_page_profile_edit();
			$(this).attr('class','active');
			//alert("555");
		});

		$("#avatar-edit").click(function(event) {
			$("li .active").attr('class','');
			get_page_avatar_edit();
			$(this).attr('class','active');
			//alert("555");
		});

		//function get page maid
		function get_page_profile(){
			$.get('profile.php', function() {
				/*optional stuff to do after success */
			}).done(function(data){
				$("#content").html(data);
			});
		}
		//function get page maid	

		//function get page maid
		function get_page_profile_edit(){
			$.get('profile_edit.php', function() {
				/*optional stuff to do after success */
			}).done(function(data){
				$("#content").html(data);
			});
		}

		function get_page_avatar_edit(){
			$.get('avatar_edit.php', function() {
				/*optional stuff to do after success */
			}).done(function(data){
				$("#content").html(data);
			});
		}

		function init(){
			get_page_maid();
		}
		//function get page maid

		//start
		// init();
		//start

	});
</script>