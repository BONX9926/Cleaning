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
	<legend><i class="fa fa-credit-card"></i> แจ้งชำระเงิน <small style="color:red" id="txtNoti1">กรุณาตรวจสอบข้อมูลให้เรียบร้อยก่อนแจ้งชำระ</small></legend>


	<div class="form-group">
	<label class="col-md-4 control-label">เลขที่บิล</label>  
	<div class="col-md-4 inputGroupContainer">
	<div class="input-group">
	<span class="input-group-addon"><i class="fa fa-file-o"></i></span>
	<input name="num_bin" class="form-control" type="text" value="<?php if($_POST){ echo $_POST['numbin'];}else if($_GET) { echo $_GET['numbin'];}?>" required>
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
	<label class="col-md-4 control-label">หลักฐานการโอนเงิน <small style="color:red" id="txtNoti2">(ต้องมี)</small></label>  
	<div class="col-md-4 inputGroupContainer">
	<div class="input-group">
	<span class="input-group-addon"><i class="fa fa-file"></i></span>
	<input name="file" class="form-control" type="file" accept="image/.png,.jpg">
	</div>
	<span style="color:red" id="txtNoti3">**นามสกุลไฟล์ .jpg .png เท่านั้น</span>
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
<script type="text/javascript">
	jQuery(document).ready(function($) {
		// alert(window.location);
		 var url = window.location+" ";
		//var url = "http://localhost/project/payment.php?succ=1&numbin=000035";

		try{
			var word = url.match(/succ=1/gm);
			// alert(word);
			if (word != null) {
				$("#txtNoti1 , #txtNoti2 , #txtNoti3").hide();
				
			}
		}catch(e){
			alert(e);	
		}

		// if () {}
		// http://localhost/project/payment.php?succ=1&numbin=000035
	});
</script>
</body>
</html>