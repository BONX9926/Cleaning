<?php 
	session_start();
	if (isset($_SESSION['login'])) {
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
	<!-- <link href="../assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/> -->
	<link rel="stylesheet" href="../css/owl.carousel.css" type="text/css">
	<link rel="stylesheet" type="text/css" href="../../css/sweetalert.css">
<!-- 	<link rel="stylesheet" href="../css/simply-toast.min.css" type="text/css"> -->

	<!--right slidebar-->
	<link href="../css/slidebars.css" rel="stylesheet">

	<!-- Custom styles for this template -->

	<link href="../css/style.css" rel="stylesheet">
	<link href="../css/style-responsive.css" rel="stylesheet" />
	<link rel="stylesheet" href="../css/simply-toast.min.css" type="text/css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" type="text/css">
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	
<style type="text/css">
	.btn-xs {
		color: white;
	}
</style>
</head>

<body>

<section id="container">
<!--header start-->
<?php 
	include_once '../header.php';
?>
<!--header end-->
<!--sidebar start-->
<aside>
	<div id="sidebar"  class="nav-collapse ">
		<!-- sidebar menu start-->
		<ul class="sidebar-menu" id="nav-accordion">
			<li>
				<a id="dashboard"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
			</li>
			<li>
				<a id="payment"><i class="fa fa-credit-card"></i><span>แจ้งชำระเงิน</span> <b id="alert_pay"></b></a>
			</li>
			<li class="sub-menu">
				<a href="javascript:;" id="borrow-return">
					<i class="fa fa-building-o"></i>
					<span>ยืม-คืน อุปกรณ์ </span>
				</a>
				<ul class="sub">
					<li id="borrow" domain-menu="borrow-return"><a>แจ้งขอยืม-คืน</a></li>
					<li id="list-return" domain-menu="borrow-return"><a>รายการยืม-คืน</a></li>
				</ul>
			</li>
			<li class="sub-menu">
				<a href="javascript:;" id="salary-domain">
					<i class="fa fa-money"></i>
					<span>ระบบเงินเดือน</span>
				</a>
				<ul class="sub">
					<li id="calcurator" domain-menu="salary-domain"><a>คำนวณเงินเดือน</a></li>
					<li id="statement" domain-menu="salary-domain"><a>Statement</a></li>
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
				<a id="maid-table"><i class="fa fa-credit-card"></i><span>รายการจองแม่บ้าน</span></a>
			</li>			

<!-- 			<li>
				<a id="money"><i class="fa fa-credit-card"></i><span>คำนวณเงินเดือน</span></a>
			</li> -->

<!-- 			<li>
				<a id="select"><i class="fa fa-credit-card"></i><span>ค้นหาบิลจากแม่บ้าน</span></a>
			</li> -->
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
<!-- <script src="../assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script> -->
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
<!-- <script src="../js/sparkline-chart.js"></script> -->
<!-- <script src="../js/easy-pie-chart.js"></script> -->
<script src="../js/count.js"></script>
<script src="../../js/sweetalert.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<!-- <script src="https://code.highcharts.com/highcharts-3d.js"></script> -->


<script>

	$(document).ready(function() {
		//set cussor
		$("a").css('cursor', 'pointer');
		//set cussor

		function chart_items(target,title,data){
			Highcharts.chart(target, {
			    chart: {
			        type: 'pie',
			        options3d: {
			            enabled: true,
			            alpha: 45,
			            beta: 0
			        }
			    },
			    title: {
			        text: title
			    },
			    tooltip: {
			        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
			    },
			    plotOptions: {
			        pie: {
			            allowPointSelect: true,
			            cursor: 'pointer',
			            depth: 35,
			            dataLabels: {
			                enabled: true,
			                format: '{point.name}'
			            }
			        }
			    },
			    series: [{
			        type: 'pie',
			        name: 'Browser share',
			        data: data,
			        point:{
			        	events:{
			        		click: function(){
			        			// alert(this.y);
			        			$('#titlemodal').html(title);

			        			$.post('render_table_to_show_index.php', {word: this.name ,type: 'item'}, function(data, textStatus, xhr) {
			        				/*optional stuff to do after success */
			        			}).done(function(data){
				        			$('#modal-content').html(data);
			        			});
			        			$('#myModal').modal('toggle');
			        		}
			        	}
			        }
			    }]
			});
		}

		function chart_social(target,title_name,title_sub,data){
			Highcharts.chart(target, {
			    chart: {
			        type: 'pie',
			        options3d: {
			            enabled: true,
			            alpha: 45,
			        },

			    },
			    title: {
			        text: title_name
			    },
			    subtitle: {
			        text: title_sub
			    },
			    plotOptions: {
			        pie: {
			            innerSize: 100,
			            depth: 45
			        },
			    },
			    series: [{
			        name: 'Delivered amount',
			        data: data,
			        colors:['#4267b2','#ff471a'],
			        // point:{
			        // 	events:{
			        // 		click: function(){
			        // 			$('#titlemodal').html(title_name);
			        // 			$('#myModal').modal('toggle');

			        // 			// console.log(this.y);
			        // 		}
			        // 	}
			        // }
			    }]
			});
		}

		


		function show_index(){
			$.get('show_index.php', function() {
				/*optional stuff to do after success */
			}).done(function(data){
				$("#content").html(data);
				$.get('service_chart/chart_income_jay.php', function(data) {
				/*optional stuff to do after success */
				}).done(function(data){
					var json_res = jQuery.parseJSON(data);
					//alert();
					chart_income_jay('unseen',json_res.income,"รายรับรายจ่าย",'บาท','จำนวนเงิน');
					chart_social('user','เข้าใช้ผ่าน','',json_res.user);
					chart_items('items','อุปกรณ์ทำความสะอาด',json_res.item);
				});

			});
		}
		show_index();
		$("#dashboard").click(function(event) {
			$("li .active").attr('class','');
			show_index();
			$(this).attr('class','active');
			// var domain = $(this).attr('domain-menu');
			// alert(domain);
			// $("#"+domain).addClass('dcjq-parent active');
			//alert("555");
		});

		$("#list-return").click(function(event) {
			$("li .active").attr('class','');
			get_page_borrow_return();
			$(this).attr('class','active');
			var domain = $(this).attr('domain-menu');
			// alert(domain);
			$("#"+domain).addClass('dcjq-parent active');
			//alert("555");
		});

		function get_page_borrow_return(){
			$.get('get_page_borrow_return.php', function() {
				// optional stuff to do after success 
			}).done(function(data){
				$("#content").html(data);
			});
		}


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
				// console.log(data);
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
							//$('#quantity_all').val(json_res.data.quantity_all);
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

					swal({
						title: "คุณแน่่ใจใช่ไหม?",
						text: "จะลบรายการที่ "+item_id,
						type: "warning",
						showCancelButton: true,
						confirmButtonClass: "btn-danger",
						confirmButtonText: "Yes, delete it!",
						cancelButtonText: "No, cancel plx!",
						closeOnConfirm: false,
						closeOnCancel: false
						},
						function(isConfirm) {
						if (isConfirm) {
							$.post('del_item_save.php', {item_id: item_id}, function() {
								
							}).done(function(data) {
								// alert(data);
								var json_res = jQuery.parseJSON(data);
								if (json_res.status == true) {
									swal("Deleted!", json_res.message, "error");
									get_page_item();
								} else {
									swal("Deleted!", json_res.message, "error");
								}
							});
						} else {
						swal("Cancelled", "ยกเลิกการทำรายการ", "error");
						}
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
			});
		}		

		$("#maid-table").click(function(event) {
			$("li .active").attr('class','');
			maid_table();
			$(this).attr('class','active');
			// var domain = $(this).attr('domain-menu');
			// alert(domain);
			// $("#"+domain).addClass('dcjq-parent active');
		});

		function maid_table() {
			$.get('maid-table.php', function() {
				/*optional stuff to do after success */
			}).done(function(data){
				$("#content").html(data);
				// Switch()
			});
		}

		$("#select").click(function(event) {
			$("li .active").attr('class','');
			select();
			$(this).attr('class','active');
			// var domain = $(this).attr('domain-menu');
			// alert(domain);
			// $("#"+domain).addClass('dcjq-parent active');
		});

		function select() {
			$.get('select.php', function() {
				/*optional stuff to do after success */
			}).done(function(data){
				$("#content").html(data);
				// Switch()
			});
		}		

		$("#calcurator").click(function(event) {
			$("li .active").attr('class','');
			get_page_saraly_calcurator();
			$(this).attr('class','active');
			var domain = $(this).attr('domain-menu');
			// alert(domain);
			$("#"+domain).addClass('dcjq-parent active');
		});

		function get_page_saraly_calcurator() {
			$.get('get_page_salaly_calcurator.php', function() {
				/*optional stuff to do after success */
			}).done(function(data){
				$("#content").html(data);
				// Switch()
			});
		}		

		$("#statement").click(function(event) {
			$("li .active").attr('class','');
			get_page_statement();
			$(this).attr('class','active');
			var domain = $(this).attr('domain-menu');
			// alert(domain);
			$("#"+domain).addClass('dcjq-parent active');
		});

		function get_page_statement() {
			$.get('get_page_statement.php', function() {
				/*optional stuff to do after success */
			}).done(function(data){
				$("#content").html(data);
				// Switch()
			});
		}



var notification_pay;
var notification_bin;
		function noti_pay(){
			
			notification_pay =  setTimeout(function(){ 
				try{

					$.get('service_alert_paymeny.php', function() {
						/*optional stuff to do after success */
					}).done(function(data){
						$("#alert_pay").html(data);
						// console.log("processAlert_pay");
						noti_pay();
					});
				}catch(e){
					clearTimeout(notification_pay);
					noti_pay();
				}
	
			}, 5000);
		}
		function noti_bin(){
			
		}

		noti_pay();
	});

</script>

</body>
</html>
<?php } else { header("Location:../index.php"); } ?>