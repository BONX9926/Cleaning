<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>บริการทำความสะอาดออนไลน์ | Backend</title>
</head>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link href="../font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="../css/style.css" rel="stylesheet">
<link href="../css/style-responsive.css" rel="stylesheet">
<link href="../css/bootstrap-reset.css" rel="stylesheet">
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
<body class="login-body">

<div class="container">
<?php if(isset($_GET['err'])) { 
	if ($_GET['err'] == 1) {
?>
<div class="alert alert-danger alert-dismissible" role="alert" style="margin-top: 20px;">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<strong>Warning!</strong> กรุณา กรอก username และ password
</div>
<?php
	} else {
?>
<div class="alert alert-danger alert-dismissible" role="alert" style="margin-top: 20px;">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<strong>ไม่ถุกต้อง</strong> username หรือ password ผิดพลาด!!!
</div>
<?php
	}
}
?>
<!-- <div class="alert alert-danger alert-dismissible" role="alert" style="margin-top: 20px;">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<strong>Warning!</strong> กรุณา กรอก username และ password
</div> -->

<div class="form-signin">
<h2 class="form-signin-heading">เข้าสู่ระบบ</h2>
<div class="login-wrap">
<form>
<input type="text" name="user" class="form-control" placeholder="User ID" autofocus>
<input type="password" name="pass" class="form-control" placeholder="Password">
</form>
<span class="pull-right">
<a data-toggle="modal" href="#myModal"> ลืมรหัสผ่าน?</a>
</span>
<button class="btn btn-lg btn-login btn-block" id="submit">เข้าสู่ระบบเลย</button>
</div>
</div>


<!-- Modal -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">Forgot Password ?</h4>
</div>
<div class="modal-body">
<p>Enter your e-mail address below to reset your password.</p>
<input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

</div>
<div class="modal-footer">
<button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
<button class="btn btn-success" type="button">Submit</button>
</div>
</div>
</div>
</div>
<!-- modal -->


</div>
<script>
$("input").attr('required', 'required');
	$('#submit').click(function(event) {
		// alert('Login');
		var data = $('form').serializeArray();
		// alert(data);
		// console.log(data[0]['value']);
		if (data[0]['value'] != '' && data[1]['value'] !='') {
			// console.log(data[0]['value']);
			// console.log(data[1]['value']);
			$.post('login_save.php', {data: data}, function() {
				// optional stuff to do after success 
			}).done(function(data) {
				// alert(data);
				// console.log(data);
				let json_res = jQuery.parseJSON(data);
				if(json_res.status == true) {
					// alert(json_res.access);
					if(json_res.access === 'A') {
						window.location.href = "admin/index.php";
					// console.log(json_res.access);
					} else {
						window.location.href = "maid/index.php";
				// console.log('else');
					}
				}else{
					window.location ='index.php?err=2';
				}
			});
		} else {
			// console.log('ERROR');
			window.location ='index.php?err=1';
		}
		// $.post('login.php', {data: data}, function() {
		// 	// optional stuff to do after success 
		// }).done(function(data) {
		// 	alert(data);
		// });
	});
</script>
</body>
</html>
