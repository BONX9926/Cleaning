<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
</head>
<link rel="stylesheet" href="./css/bootstrap.min.css">
<link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
<script src="./js/jquery-3.2.0.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<body>
<?php include_once 'navbar.php'; ?>
<div class="container" style="padding-top: 60px;">
	<div class="row">
		<div class="col-lg-4">
			<div class="thumbnail">
			<div class="caption">
			<h3><img src="<?=$_SESSION['avatar']?>" style='border-radius: 5px;display: inline;width: 50px;height:50px;' > <?=$_SESSION['fname']?> <?=$_SESSION['lname']?></h3>
				<ul class="nav nav-pills nav-stacked">
				<li id="profile"><a href="profile.php"> <i class="fa fa-user"></i> ข้อมูลส่วนตัว</a></li>
				<li><a href="profile-edit.php"> <i class="fa fa-edit"></i> แก้ไขข้อมูลส่วนตัว</a></li>
				<li id="profile-edit-address"><a href="profile-edit-address.php"> <i class="fa fa-edit"></i> แก้ไขที่พัก</a></li>
				<li id="jong_detail"><a href="jong_detail.php"> <i class="fa fa-edit"></i> ข้อมูลการจองของคุณ</a></li>
				</ul>
			</div>
			</div>
		</div>
		<div class="col-lg-8">
			<div class="thumbnail">
				<div class="caption">
				<h3>ข้อมูลการจอง</h3>
					<div class="row">
						<div class="col-lg-12" id="content">
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
jQuery(document).ready(function($) {
	var uid = "<?php echo $_SESSION['uid'] ?>";
		function get_jong_detail(){
			$.post('get_jong_detail.php',
			{
				uid:uid
			},
			function() {
				/*optional stuff to do after success */
			}).done(function(data){
				$("#content").html(data);
			});
		}
		get_jong_detail();
		$("#jong_detail").attr({
   			"class" : "active"
    	});
});

</script>
</body>
</html>