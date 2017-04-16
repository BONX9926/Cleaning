<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>บริการทำความสะอาดออนไลน์ | หน้าแรก</title>
</head>

<link rel="stylesheet" href="./css/bootstrap.min.css">
<link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
<script src="./js/jquery-3.2.0.min.js"></script>
<script src="./js/bootstrap.min.js"></script>

<body>
<?php include_once 'navbar.php'; ?>
<!-- <div class="container" style="padding-top: 60px;">
	1111
</div> -->
<style type="text/css">
			.business-header {
				height: 450px;
				background: url('./image/bg.jpg')
				center center no-repeat scroll;
				-webkit-background-size: cover;
				-moz-background-size: cover;
				background-size: 1400px 700px;
				-o-background-size: cover;
				color: #000000;
			}
			#bg {
				background:rgba(255, 255, 255,0.5);
				color: #000000;
				border-radius: 15px;
			}
			#margin-top {
				margin-top: 56px;
			}
			#padding {
				padding-top: 75px;
			}
			#pd {
				padding-left: 30px;
				padding-right: 30px;
				padding-bottom: 30px;
			}
        </style>
<header class="business-header">
    <div class="container" id="padding">

        <div class="row" id="bg">
            <div  class="col-lg-12 text-center">
                <hr>
                <h2 class="tagline">บริการทำความสะอาดออนไลน์</h2>
                <hr>
                <br><br>
                <p><h4>ให้ที่พักของคุณสะอาดน่าอยู่ในเวลาที่ต้องการ ด้วยแม่บ้านที่คุณวางใจ</h4></p>
                <p><h4>เรื่องความสะอาดไว้ใจเรา เลือกใช้บริการกับเรา ด้วยคุณภาพแล้วมาตราฐาน และพนักงานงานมืออาชีพ</h4></p>
                <p><h4>บริการทุกระดับประทับใจ</h4></p>
                <!-- <p style="padding-top: 20px;padding-bottom: 20px;"><a class="btn btn-success btn-lg" href="jong.php">จองบริการ »</a></p> -->
                <br><br><br><br>
            </div>
        </div>
    </div>
</header>

<!-- Example row of columns -->
<div class="row" style="background-color: #E8EAF6;">
	<h1 align="center">ขั้นตอนในการใช้บริการ</h1>
<div class="col-md-4">
<h2 align="center"><img src="./image/network.png"></h2>
<p>
	<h2 align="center">เช้าสู่ระบบ</h2>
<p id="pd" align="center">เข้าสู่ระบบผ่าน socail media เพื่อเป็นสมาชิกกับเรา เพื่อความสะดวกสบายและความปลอดภัยแก่ผู้ใช้งาน</p>
</p>
</div>
<div class="col-md-4">
<h2 align="center"><img src="./image/notepad.png"></h2>
<p>
<h2 align="center">กรอกข้อมูลเพิ่มเติม</h2>
<p id="pd" align="center">กรุณากรอกข้อมูลให้ครบถ้วน เพื่อความถูกต้องของตำแหน่งที่ตั้งของที่พักและข้อมูลอื่นๆ</p>
</p>
</div>
<div class="col-md-4">
<h2 align="center"><img src="./image/desktop.png"></h2>
<p>
<h2 align="center">เข้าใช้งาน</h2>
<p id="pd" align="center">หลังจากที่กรอกข้อมูล ครบถ้วนแล้วสามารถเข้าใช้งานในระบบได้ทันที</p>
</p>
</div>
</div>


<div class="row" style="background-color: #BBDEFB;">
	<h1 align="center">ทำไมต้องใช้บริการเรา</h1>
<div class="col-md-4">
<h2 align="center"><img src="./image/maid.png"></h2>
<p>
	<h2 align="center">แม่บ้านที่เชื่อถือได้</h2>
<p id="pd" align="center">เรามีการตรวจสอบประวัติ และคัดกรองแม่บ้านเพื่อให้มั่นใจได้ว่า พวกเขามีประสบการณ์ และพร้อมดูแลจัดการที่พักของคุณให้ได้ตามมาตรฐาน</p>	
</p>
</div>
<div class="col-md-4">
<h2 align="center"><img src="./image/calendar.png"></h2>
<p>
<h2 align="center">ทำความสะอาดตามนัดหมาย</h2>
<p id="pd" align="center">แม่บ้านจะไปทำความสะอาดตาม ที่ผู้ใช้ได้ทำการจองไว้ในวันและเวลาตามที่กำหนด</p>
</p>
</div>
<div class="col-md-4">
<h2 align="center"><img src="./image/cleaner.png"></h2>
<p>
<h2 align="center">ไว้ใจเรื่องความสะอาด</h2>
<p id="pd" align="center">แม่บ้านของเราได้ผ่านการฝึกและอบรมการทำความสะอาดให้ถูกวิธี ตามมาตราฐานของบริษัทแล้วทุกคนจึงมั่นใจได้ว่า จะไม่ทำให้คุณผิดหวัง</p>
</p>
</div>
</div>

<hr>

<footer>
<p>© 2016 Company, Inc.</p>
</footer>
<script type="text/javascript">
	$("#index").attr({
        "class" : "active"
    });
</script>
</body>
</html>