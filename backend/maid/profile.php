<?php 
session_start();
?>

<aside class="profile-nav col-lg-3">
	<section class="panel">
		<div class="user-heading round">
			<a href="#">
				<img src="../img/avatar_profile/<?=$_SESSION['avatar']?>" alt="">
			</a>
			<p><?=$_SESSION['email']?></p>
		</div>
		<!-- <ul class="nav nav-pills nav-stacked">
			<li class="active"><a href="profile.html"> <i class="fa fa-user"></i> โปรไฟล์ส่วนตัว</a></li>
			<li><a href="profile_edit.php"> <i class="fa fa-edit"></i> แก้ไขข้อมูลส่วนตัว</a></li>
			<li><a href="#"> <i class="fa fa-calendar"></i> ตารางงาน<span class="label label-danger pull-right r-activity">9</span></a></li>
		</ul> -->
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
					<p><span>เบอร์โทรศัพท์ </span>: <?=$_SESSION['phone']?></p>
				</div>
				<div class="bio-row">
					<p><span>แนะนำตัว </span>: <?=$_SESSION['show_detail']?></p>
				</div>
			</div>
		</div>
	</section>
</aside>


