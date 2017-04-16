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
<!-- 	<pre>
	<p><?php var_dump($_SESSION) ?></p>
	</pre> -->
	<div class="row">
		<div class="col-lg-4">
			<div class="thumbnail">
	<!-- <h1 align="center">Profile</h1> -->
			
			<div class="caption">
			<h3><img src="<?=$_SESSION['avatar']?>" style='border-radius: 5px;display: inline;width: 50px;height:50px;' > <?=$_SESSION['name']?></h3>
<!-- <div class="list-group">
<a href="#" class="list-group-item active">
Cras justo odio
</a>
<a href="#" class="list-group-item">Dapibus ac facilisis in</a>
<a href="#" class="list-group-item">Morbi leo risus</a>
<a href="#" class="list-group-item">Porta ac consectetur ac</a>
<a href="#" class="list-group-item">Vestibulum at eros</a>
</div> -->
<ul class="nav nav-pills nav-stacked">
<li id="profile"><a href="profile.php"> <i class="fa fa-user"></i> ข้อมูลส่วนตัว</a></li>
<!-- <li><a href="profile-activity.html"> <i class="fa fa-calendar"></i> Recent Activity <span class="label label-danger pull-right r-activity">9</span></a></li> -->
<li><a href="profile-edit.php"> <i class="fa fa-edit"></i> แก้ไขข้อมูลส่วนตัว</a></li>
<li id="profile-edit-address"><a href="profile-edit-address.php"> <i class="fa fa-edit"></i> แก้ไขที่พัก</a></li>
<li id="jong_detail"><a href="jong_detail.php"> <i class="fa fa-edit"></i> ข้อมูลการจองของคุณ</a></li>
<!-- <li id="profile-edit-address"><a href="jong.php"> <i class="fa fa-edit"></i> จองแม่บ้าน</a></li> -->
</ul>
			</div>
			</div>
		</div>
		<div class="col-lg-8">
			<div class="thumbnail">
				<div class="caption">
				<h3>ข้อมูลส่วนตัว</h3>
					<div class="row">
						<div class="col-lg-6">
						<label>ชื่อ : <?=$_SESSION['fname']?></label>
						</div>
						<div class="col-lg-6">
						<label>นามสกุล : <?=$_SESSION['lname']?></label>
						</div>
						<div class="col-lg-6">
						<label>E-Mail : <?=$_SESSION['email']?></label>
						</div>
						<div class="col-lg-6">
						<label>เบอร์โทรศัพท์ <small>(มือถือ)</small> : <?=$_SESSION['phone']?></label>
						</div>
						<div class="col-lg-12">
						<label>ที่อยู่: <?=$_SESSION['address']?></label>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$("#profile").attr({
        "class" : "active"
    });
</script>
</body>
</html>