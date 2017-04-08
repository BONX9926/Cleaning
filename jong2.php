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
	<link rel="stylesheet" type="text/css" href="backend/assets/bootstrap-fileupload/bootstrap-fileupload.css" />
    <link rel="stylesheet" type="text/css" href="backend/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
    <link rel="stylesheet" type="text/css" href="backend/assets/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="backend/assets/bootstrap-timepicker/compiled/timepicker.css" />
    <link rel="stylesheet" type="text/css" href="backend/assets/bootstrap-colorpicker/css/colorpicker.css" />
    <link rel="stylesheet" type="text/css" href="backend/assets/bootstrap-daterangepicker/daterangepicker-bs3.css" />
    <link rel="stylesheet" type="text/css" href="backend/assets/bootstrap-datetimepicker/css/datetimepicker.css" />
    <link rel="stylesheet" type="text/css" href="backend/assets/jquery-multi-select/css/multi-select.css" />
	<link href="backend/css/style.css" rel="stylesheet">
	<link href="backend/css/style-responsive.css" rel="stylesheet" />
</head>
<body>
<?php include_once 'navbar.php'; ?>
<div class="container" style="padding-top: 60px;">
<div class="row">
	<div class="col-lg-12">
		<?php  
			include_once 'connect.php';
			$sql = "SELECT * FROM `working` WHERE `status`= 'A'";
			$data = mysqli_query($conn,$sql);
			$count = 0;
			while($show = mysqli_fetch_assoc($data)){
			$count++;
		?>
			<?=$count?><br>
			<?=$show['start_work']?><br>
			<?=$show['end_work']?><br>

		<?php } ?>
	</div>
</div>
<pre>
<?php var_dump($_SESSION) ?>
</pre>
<?php
	if ($_SESSION['sDay'] >= '01-04-2017' && $_SESSION['eDay'] < '10-04-2017') {
		# code...
		echo "> มากกว่า";
	} else {
		echo "string";
	}
?>
</div>
</body>
</html>