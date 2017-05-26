<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<link rel="stylesheet" href="./css/bootstrap.min.css">
<link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
<script src="./js/jquery-3.2.0.min.js"></script>
<script src="./js/bootstrap.min.js"></script>

<body>
<?php include_once 'navbar.php'; ?>
<div class="container" style="padding-top: 60px;">
	<div class="row">
	<h1 align="center">บริการของเราครอบคลุมอะไรบ้าง</h1>
		<div class="col-md-6" class="img-responsive">
			<img align="right" src="./image/bedroom.jpg" style="width: 400px;height: 267px;">
		</div>
		<div class="col-md-6">
			<h3>ห้องนอน ห้องนั่งเล่น พื้นที่ส่วนรวม</h3>
			<ul class="condition">
			<li>ทำความสะอาดทุกจุดที่ฝุ่นเข้าถึงได้</li>
			<li>เช็ดกระจก และเฟอร์นิเจอร์ที่ทำจากแก้ว</li>
			<li>ทำความสะอาดพื้นห้อง</li>
			<li>จัดวางเครื่องใช้ตามที่เจ้าของห้องกำหนด</li>
			<li>นำขยะออกไปทิ้งให้</li>
			</ul>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-6" class="img-responsive">
			<img align="right" src="./image/kitchen.jpg" style="width: 400px;height: 267px;">
		</div>
		<div class="col-md-6">
		<h3>ห้องครัว</h3>
		<ul>
			<li>ทำความสะอาดทุกจุดที่ฝุ่นเข้าถึงได้</li>
			<li>ล้างและจัดเก็บภาชนะ และความสะอาดอ่างล้างจาน</li>
			<li>เช็ดคราบสกปรกบริเวณเตาแก๊ส ตู้ไมโครเวฟ และตู้เย็น</li>
			<li>ทำความสะอาดพื้นห้องครัว</li>
			<li>จัดวางเครื่องใช้ตามที่เจ้าของห้องกำหนด</li>
			<li>นำขยะออกไปทิ้งให้</li>
		</ul>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-6" class="img-responsive">
			<img align="right" src="./image/bathroom.jpg" style="width: 400px;height: 267px;">
		</div>
		<div class="col-md-6">
			<h3>ห้องน้ำ</h3>
			<ul>
			<li>ทำความสะอาดห้องน้ำ ฝักบัว อ่างอาบน้ำ และอ่างล้างหน้า</li>
			<li>ทำความสะอาดทุกจุดที่ฝุ่นเข้าถึงได้</li>
			<li>เช็ดกระจก และเฟอร์นิเจอร์ที่ทำจากแก้ว</li>
			<li>ทำความสะอาดพื้นห้องน้ำ</li>
			<li>จัดวางเครื่องใช้ตามที่เจ้าของห้องกำหนด</li>
			<li>นำขยะออกไปทิ้งให้</li>
			</ul>
		</div>
	</div><br><br>
<!-- 	<div class="row">
		<div class="col-md-12">
<p><span style="color: red">หมายเหตุ</span><br>
1. เจ้าของที่พักอาจเตรียมอุปกรณ์ทำความสะอาดพื้นฐานให้กับแม่บ้าน เช่น ไม้กวาด ไม้ถูพื้น หากเจ้าของที่พักไม่อุปกรณ์เหล่านี้ กรุณาแจ้งแม่บ้านไว้ในหมายเหตุ หรือถ้าต้องการอุปกรณ์เพิ่มเติมกรุณาเลือกตามที่ต้องการและจะมีค่าบริการเพิ่มเติม<br>
2. บริการของเราไม่ครอบคลุมกิจกรรมต่อไปนี้<br>
การทำความสะอาดแบบ Big Cleaning** (งานทำความสะอาดหลังงานก่อสร้าง หรือ ไม่ได้ทำความสะอาดมาเกิน 2 เดือน), ทำความสะอาดหน้าต่างด้านนอกที่พัก, ขจัดคราบฝังลึก, กำจัดสิ่งรบกวน, กำจัดเชื้อรา, กำจัดแมลง</p>
		</div>
	</div> -->
</div>
<script type="text/javascript">
	$("#about").attr({
        "class" : "active"
    });
</script>
</body>
</html>