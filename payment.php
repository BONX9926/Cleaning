<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
<link rel="stylesheet" href="./css/bootstrap.min.css">
<link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
<script src="./js/jquery-3.2.0.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
</head>
<body>
<?php include_once 'navbar.php'; ?>
<div class="container" style="padding-top: 60px;">
	<?php if(isset($_GET['succ'])) { 
			if($_GET['succ'] == 1) {
	?>
	<div class="alert alert-success alert-block fade in">
	<button data-dismiss="alert" class="close close-sm" type="button">
	<i class="fa fa-times"></i>
	</button>
	<h4>
	<i class="fa fa-ok-sign"></i>
	สำเร็จ
	</h4>
	<p>แจ้งชำระเงินเรียบร้อยแล้ว รอตรวจสอบการแจ้งชำระเงิน</p>
	</div>
	<?php } ?>
	<?php if($_GET['succ'] == 2) { ?>
	<div class="alert alert-block alert-danger fade in">
	<button data-dismiss="alert" class="close close-sm" type="button">
	<i class="fa fa-times"></i>
	</button>
	<strong>ผิดพลาด!</strong> กรุณาตรวจสอบข้อมูล
	</div>
	<?php } ?>
	<?php } ?>
	<form class="well form-horizontal" action="add_payment.php" method="post" enctype="multipart/form-data">
	<fieldset>

	<!-- Form Name -->
	<legend><i class="fa fa-credit-card"></i> แจ้งชำระเงิน</legend>


	<div class="form-group">
	<label class="col-md-4 control-label">เลขที่บิล</label>  
	<div class="col-md-4 inputGroupContainer">
	<div class="input-group">
	<span class="input-group-addon"><i class="fa fa-file-o"></i></span>
	<input name="num_bin" class="form-control" type="text" placeholder="กรอกเลขที่บิล" required>
	</div>
	</div>
	</div>


	<div class="form-group">
	<label class="col-md-4 control-label">ชื่อ-นามสกุล</label>  
	<div class="col-md-4 inputGroupContainer">
	<div class="input-group">
	<span class="input-group-addon"><i class="fa fa-user"></i></span>
	<input name="name" class="form-control"  type="text" value="<?=$_SESSION['fname']." ".$_SESSION['lname'] ?>">
	</div>
	</div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	<label class="col-md-4 control-label">E-Mail</label>  
	<div class="col-md-4 inputGroupContainer">
	<div class="input-group">
	<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
	<input name="email" placeholder="E-Mail Address" class="form-control" type="text" value="<?=$_SESSION['email']?>">
	</div>
	</div>
	</div>


	<!-- Text input-->

	<div class="form-group">
	<label class="col-md-4 control-label">เบอร์โทร</label>  
	<div class="col-md-4 inputGroupContainer">
	<div class="input-group">
	<span class="input-group-addon"><i class="fa fa-phone"></i></span>
	<input name="phone"  class="form-control" type="text" value="<?=$_SESSION['phone']?>">
	</div>
	</div>
	</div>

	<div class="form-group">
	<label class="col-md-4 control-label">หลักฐานการโอนเงิน</label>  
	<div class="col-md-4 inputGroupContainer">
	<div class="input-group">
	<span class="input-group-addon"><i class="fa fa-file"></i></span>
	<input name="file" class="form-control" type="file" accept="image/.jpg, .png">
	</div>
	<span style="color:red">**นามสกุลไฟล์ .jpg .png เท่านั้น</span>
	</div>
	</div>	

	<div class="form-group">
	<label class="col-md-4 control-label">จำนวนเงินที่ชำระ</label>  
	<div class="col-md-4 inputGroupContainer">
	<div class="input-group">
	<span class="input-group-addon"><i class="fa fa-btc"></i></span>
	<input name="money" class="form-control" type="text" placeholder="กรอกจำนวนเงิน" required>
	</div>
	</div>
	</div>

	<!-- Button -->
	<div class="form-group">
	<label class="col-md-4 control-label"></label>
	<div class="col-md-4">
	<button type="submit" class="btn btn-warning" >แจ้งชำระ <span class="fa fa-send"></span></button>
	</div>
	</div>

	</fieldset>
	</form>
	</div><!-- /.container -->
</div>
</body>
</html>