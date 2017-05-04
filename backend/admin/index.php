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
	<link rel="shortcut icon" href="../img/favicon.png">

	<title>โปรไฟล์</title>

	<!-- Bootstrap core CSS -->
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/bootstrap-reset.css" rel="stylesheet">
	<!--external css-->
	<link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<link href="../assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
	<link rel="stylesheet" href="../css/owl.carousel.css" type="text/css">
<!-- 	<link rel="stylesheet" href="../css/simply-toast.min.css" type="text/css"> -->

	<!--right slidebar-->
	<link href="../css/slidebars.css" rel="stylesheet">

	<!-- Custom styles for this template -->

	<link href="../css/style.css" rel="stylesheet">
	<link href="../css/style-responsive.css" rel="stylesheet" />
	<link rel="stylesheet" href="../css/simply-toast.min.css" type="text/css">


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
<aside>
	<div id="sidebar"  class="nav-collapse ">
		<!-- sidebar menu start-->
		<ul class="sidebar-menu" id="nav-accordion">
			<li class="sub-menu">
				<a href="javascript:;" id="maid-domain">
					<i class="fa fa-group"></i>
					<span>แม่บ้าน</span>
				</a>
				<ul class="sub" id="sub_maid">
					<li id="maid" domain-menu="maid-domain"><a >รายชื่อแม่บ้าน</a></li>
					<li id="add-maid" domain-menu="maid-domain"><a>เพิ่มแม่บ้าน</a></li>
				</ul>
			</li>
			<li class="sub-menu">
				<a href="javascript:;" id="item-domain">
					<i class="fa fa-gavel"></i>
					<span>อุปกรณ์ทำความสะอาด</span>
				</a>
				<ul class="sub">
					<li id="item_list" domain-menu="item-domain"><a>อุปกรณ์ทั้งหมด</a></li>
					<li id="add-item" domain-menu="item-domain"><a>เพิ่มอุปกรณ์</a></li>
				</ul>
			</li>

			<li>
				<a id="payment"><i class="fa fa-credit-card"></i><span>แจ้งชำระเงิน</span></a>
			</li>
			<li id="work_table">
				<a id="work_items"><i class="fa fa-calendar"></i><span>คืนอุปกรณ์</span></a>
			</li>
			<li class="sub-menu">
				<a href="javascript:;" id="borrow-return">
					<i class="fa fa-cogs"></i>
					<span>ยืม-คืน อุปกรณ์</span>
				</a>
				<ul class="sub">
					<li id="borrow" domain-menu="borrow-return"><a>แจ้งขอยืม</a></li>
					<li id="return" domain-menu="borrow-return"><a>คืนอุปรกรณ์</a></li>
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
<script src="../js/simply-toast.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<!-- <script src="../js/jquery-ui-1.9.2.custom.min.js"></script> -->
<script class="include" type="text/javascript" src="../js/jquery.dcjqaccordion.2.7.js"></script>
<script src="../js/jquery.scrollTo.min.js"></script>
<script src="../js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="../js/jquery.sparkline.js" type="text/javascript"></script>
<script src="../assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
<script src="../js/owl.carousel.js" ></script>
<script src="../js/jquery.customSelect.min.js" ></script>
<script src="../js/respond.min.js" ></script>

<!-- //test -->


<!--right slidebar-->
<script src="../js/slidebars.min.js"></script>

<!--common script for all pages-->
<script src="../js/common-scripts.js"></script>
<!-- <script src="../js/simply-toast.min.js"></script> -->

<!--script for this page-->
<script src="../js/sparkline-chart.js"></script>
<script src="../js/easy-pie-chart.js"></script>
<script src="../js/count.js"></script>

    <!--this page plugins-->

<script>
	$(document).ready(function() {
		//set cussor
		$("a").css('cursor', 'pointer');
		//set cussor


		$("#borrow").click(function(event) {
			$("li .active").attr('class','');
			get_page_borrow();
			$(this).attr('class','active');
			var domain = $(this).attr('domain-menu');
			// alert(domain);
			$("#"+domain).addClass('dcjq-parent active');
			//alert("555");
		});

		function get_page_borrow(){
			$.get('get_page_borrow.php', function() {
				// optional stuff to do after success 
			}).done(function(data){
				$("#content").html(data);
			});
		}

		$("#return").click(function(event) {
			$("li .active").attr('class','');
			get_page_return();
			$(this).attr('class','active');
			var domain = $(this).attr('domain-menu');
			// alert(domain);
			$("#"+domain).addClass('dcjq-parent active');
		});

		function get_page_return(){
			$.get('get_page_return.php', function() {
				// optional stuff to do after success 
			}).done(function(data){
				$("#content").html(data);
			});
			// alert(555);
		}

		// event but maid click
		$("#maid").click(function(event) {
			$("li .active").attr('class','');
			get_page_maid();
			$(this).attr('class','active');
			var domain = $(this).attr('domain-menu');
			// alert(domain);
			$("#"+domain).addClass('dcjq-parent active');
			//alert("555");
		});
		// event but maid click

		//function get page maid
		function get_page_maid(){
			$.get('maid.php', function() {
				/*optional stuff to do after success */
			}).done(function(data){
				$("#content").html(data);
			});
		}
		//function get page maid


		$("#add-maid").click(function(event) {
			$("li .active").attr('class','');
			get_page_add_maid();
			$(this).attr('class','active');
			var domain = $(this).attr('domain-menu');
			// alert(domain);
			$("#"+domain).addClass('dcjq-parent active');
			//alert("555");
		});



		function get_page_add_maid(){
			$.get('add_maid.php', function() {
				/*optional stuff to do after success */
			}).done(function(data){
				$("#content").html(data);
			});
		}

		$("#item_list").click(function(event) {
			$("li .active").attr('class','');
			get_page_item();
			$(this).attr('class','active');
			var domain = $(this).attr('domain-menu');
			// alert(domain);
			$("#"+domain).addClass('dcjq-parent active');
		});

		function get_page_item() {
			$.get('item.php', function() {
				/*optional stuff to do after success */
			}).done(function(data){
				$("#content").html(data);
			}, function() {
				$('.edit-btn').click(function() {
					let item_id = $(this).attr('item_id');
					$.post('get_item_by_id.php', {item_id: item_id}, function() {
						/*optional stuff to do after success */
					}).done(function(data) {
						let json_res = jQuery.parseJSON(data);
						if (json_res.status == true) {
							$('#item_id').val(json_res.data.item_id);
							$('#item_name').val(json_res.data.item_name);
							$('#quantity_all').val(json_res.data.quantity_all);
							$('#item_price').val(json_res.data.item_price);
							$('#myModal').modal('toggle');
						}
					});
					// alert($(this).attr('item_id'));
				});

				$('#confirm_edit').click(function() {
						var formData = new FormData($("form#files")[0]);

						$.ajax({
					        url: 'edit_item_save.php',
					        type: 'POST',
					        data: formData,
					        async: false,
					        success: function (data) {
					        	// console.log(data);
					        	// alert(data);
				            let json_res = jQuery.parseJSON(data);

				            if(json_res.status == true) {
					            $.simplyToast(json_res.message, 'success');
					            
					            $('.modal-backdrop').fadeOut('400');
					            get_page_item();

				            } else {
				            	$.simplyToast(json_res.message, 'danger');
				            	// alert(json_res.message);
				            	$('#myModal').modal('toggle');
				            }
				        },
					        cache: false,
					        contentType: false,
					        processData: false
				    	});

			    	return false;
				});

				$('.rm-btn').click(function() {
					// alert("rm");
					let item_id = $(this).attr("item_id");
					// alert(item_id);
					$.post('del_item_save.php', {item_id: item_id}, function() {
						
					}).done(function(data) {
						alert(data);
					});
				});

			});
		}

		$("#add-item").click(function(event) {
			$("li .active").attr('class','');
			get_page_add_item();
			$(this).attr('class','active');
			var domain = $(this).attr('domain-menu');
			// alert(domain);
			$("#"+domain).addClass('dcjq-parent active');
		});

		function get_page_add_item() {
			$.get('add_item.php', function() {
				/*optional stuff to do after success */
			}).done(function(data){
				$("#content").html(data);
			});
		}		

		$("#work_items").click(function(event) {
			$("li .active").attr('class','');
			work_items();
			$(this).attr('class','active');
			// var domain = $(this).attr('domain-menu');
			// alert(domain);
			// $("#"+domain).addClass('dcjq-parent active');
		});

		function work_items() {
			$.get('work_items.php', function() {
				/*optional stuff to do after success */
			}).done(function(data){
				$("#content").html(data);
			});
		}

		$("#payment").click(function(event) {
			$("li .active").attr('class','');
			payment();
			$(this).attr('class','active');
			// var domain = $(this).attr('domain-menu');
			// alert(domain);
			// $("#"+domain).addClass('dcjq-parent active');
		});

		function payment() {
			$.get('payment.php', function() {
				/*optional stuff to do after success */
			}).done(function(data){
				$("#content").html(data);
				// Switch()
			}, function Switch() {
				$(".switch-right").click(function() {
					$('.switch-off').attr('class', 'switch-on switch-animate');
					$("#bin").attr('id_bin');
					// console.log($("#bin").attr('id_bin'));
					$.post('update_bin.php', {status_id: "true", id:$("#bin").attr('id_bin')}, function() {
						/*optional stuff to do after success */
					}).done(function(data){
						// console.log(data);
						var json_res = jQuery.parseJSON(data);
							if(json_res.status == true) {
								$.simplyToast(json_res.message, 'success');
							} else {
								$.simplyToast(json_res.message, 'danger');
							}
					});

				});

				$(".switch-left").click(function() {
					$('.switch-on').attr('class', 'switch-off switch-animate');
					$("#bin").attr('id_bin');
					// console.log("false");
					$.post('update_bin.php', {status_id: "false", id:$("#bin").attr('id_bin')}, function() {
						/*optional stuff to do after success */
					}).done(function(data){
						// console.log(data);
						var json_res = jQuery.parseJSON(data);
							if(json_res.status == true) {
								$.simplyToast(json_res.message, 'success');
							} else {
								$.simplyToast(json_res.message, 'danger');
							}
					});
				});

			});
		}
	});

</script>

</body>
</html>
