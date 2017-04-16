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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
</head>
<style>
  #myMap{
    width: 100%;
    height: 400px;
  }
</style>
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
			<h3><img src="<?=$_SESSION['avatar']?>" style='border-radius: 5px;display: inline;width:50px;height: 50px;' > <?=$_SESSION['name']?></h3>
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
<li id="profile-edit"><a href="profile-edit.php"> <i class="fa fa-edit"></i> แก้ไขข้อมูลส่วนตัว</a></li>
<li id="profile-edit-address"><a href="profile-edit-address.php"> <i class="fa fa-edit"></i> แก้ไขที่พัก</a></li>
<li id="jong_detail"><a href="jong_detail.php"> <i class="fa fa-edit"></i> ข้อมูลการจองของคุณ</a></li>
</ul>
			</div>
			</div>
		</div>
		<div class="col-lg-8">
			<div class="thumbnail">
			<div class="caption">
			<h3>แก้ไขข้อมูลที่อยู่</h3>
				<div class="row">
<!-- 				<input type="text" name="fname" value="<?=$_SESSION['fname']?>">
				<input type="text" name="lname" value="<?=$_SESSION['lname']?>">
				<input type="text" name="phone" value="<?=$_SESSION['phone']?>"> -->
				<form>
					<div class="col-lg-12">
					<input type="hidden" name="uid" value="<?=$_SESSION['uid']?>" id="uid">
					<input type="hidden" name="lat" id="latitude">
        			<input type="hidden" name="lng" id="longitude">
					<label>ที่อยู่ :</label>
					<input type="text" name="address" class="form-control" id="address" required="required">
					</div>
					<div class="col-lg-12">
						<div id="myMap"></div>
					</div>
				</form>
					<div class="col-lg-6">
					<br>
					<button id="submit" class="form-control btn btn-danger">แก้ไขข้อมูล</button>
					</div>
				</div>
			</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAiN2gSbA1GuW8BeHF4CMVucHzGvl0_drs&libraries=places"></script>
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
<script src="js/gmap.js"></script>
<script>
	$("#profile-edit-address").attr({
        "class" : "active"
    });
	// $("input").attr('required', 'required');

	$('#submit').click(function(event) {
		var data = $('form').serializeArray();

	 	// alert(data);
	 	// console.log(data);
	 	$.post('profile_edit_address_save.php', {data: data}, function() {
	 		/*optional stuff to do after success */
	 	}).done(function(data){

	 		let json_res = jQuery.parseJSON(data);
			if(json_res.status == true){
				//alert(json_res.message);
				window.location.href = "profile.php";
			}else{
				alert("error");
			}
	 	});
	});
</script>
</body>
</html>