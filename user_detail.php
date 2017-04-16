<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
<link rel="stylesheet" href="./css/bootstrap.min.css">
<link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
<script src="./js/jquery.js"></script>
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
	<div class="row">
		<div class="col-lg-12">
		<h4>กรุณากรอกข้อมูล <small style="color:red">เพื่อความสะดวกใช้บริการ</small></h4>
		<form>
		<input type="hidden" name="uid" value="<?=$_SESSION['uid']?>" id="uid">
		<input type="hidden" name="lat" id="latitude">
        <input type="hidden" name="lng" id="longitude">
			<div class="col-lg-6">
        	<div class="form-group">
			<label>ชื่อ :</label>
				<input type="text" name="fname" class="form-control" id="fname" placeholder="กรุณากรอกชื่อ">
			</div>
			</div>
			<div class="col-lg-6">
			<div class="form-group">
			<label>นามสกุล :</label>
				<input type="text" name="lname" class="form-control" id="lname" placeholder="กรุณากรอกนามสกุล">
			</div>
			</div>
			<div class="col-lg-6">
			<div class="form-group">
			<label>เบอร์โทรศัพท์ <span>(มือถือ)</span> :</label>
				<input type="text" name="phone" class="form-control" id="phone" placeholder="xxx-xxx-xxxx">
			</div>
			</div>
		</form>
			<div class="col-lg-6">
			<label>ที่อยู่ :</label>
			<div class="form-group">
				<input type="text" name="address" class="form-control" id="address" placeholder="">
				<span style="color:red">(หมายเหตุ: พิมพ์ข้อความเพื่อค้นหาตำแหน่งและเลื่อนหมุดไปยังตำแหน่งที่พักของคุณ)</span>
			</div>
			</div>
			<div class="col-lg-10 col-lg-offset-1">
			<div id="myMap"></div><br>
			</div>
			<div class="col-lg-12">
				<div class="col-lg-4 col-lg-offset-4">
					<button id="submit" class="btn btn-danger btn-block">ตกลง</button>
				<br><br>
				</div>
			</div>

		</div>
	</div>
</div>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAiN2gSbA1GuW8BeHF4CMVucHzGvl0_drs&libraries=places"></script>
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
<script src="js/gmap.js"></script>
<script>
	$("#phone").mask('000-000-0000');
	$("input").attr('required', 'required');

	$('#submit').click(function(event) {
		var data = $('form').serializeArray();
		data.push($('#address').val());
	 	// alert(data);
	 	// console.log(data);
	 	$.post('update.php', {data: data}, function() {
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