<?php
	session_start();
	// var_dump($_GET);
	// var_dump($_SESSION)
	if (isset($_GET['maid']) && isset($_GET['bin'])) {
		include_once 'connect.php';
		// echo "Send method get OK";
		$sql = "SELECT * FROM `booking_table`INNER JOIN `booking_detail` ON booking_table.booking_id = booking_detail.booking_id INNER JOIN `user_backend`ON user_backend.id = booking_detail.ref_maid WHERE booking_table.booking_id ='{$_GET['bin']}' AND booking_table.ref_booking_uid ='{$_SESSION['uid']}' AND booking_detail.ref_maid ='{$_GET['maid']}' LIMIT 1 ";
		// echo $sql;
		if ($res = mysqli_query($conn,$sql)) {
			if ($res->num_rows >0) {
				$row = mysqli_fetch_assoc($res);
				// var_dump($row);
				?>
				<!DOCTYPE html>
				<html>
				<head>
					<title></title>
						<link rel="stylesheet" href="./css/rating.css">
						<link rel="stylesheet" href="./css/bootstrap.min.css">
						<link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
						<script src="./js/jquery-3.2.0.min.js"></script>
						<script src="./js/rating.js"></script>
						<script src="./js/bootstrap.min.js"></script>
				</head>
				<body>
				<?php
					include_once 'navbar.php';
				?>
				<div class="container" style="padding-top: 60px;">
				<h1 align="center">แสดงความคิดให้และให้ระดับความพึงพอใจ</h1>
					<div class="row">
						<!-- <?php var_dump($row) ?> -->
						<div class="col-md-4" align="center"><img src="backend/img/avatar_profile/<?=$row['avatar']?>" style="width: 171px;height: 180px;"></div>
						<div class="col-md-8">
						<h2><?=$row['fname']?> <?=$row['lname']?></h2>
						<h4>ระดับความพึงพอใจ</h4>
						<form action="rating_save.php" method="post">
						<input type="hidden" name="uid" value="<?=$_SESSION['uid']?>">
						<input type="hidden" name="maid_id" value="<?=$row['id']?>">
						<p id="star-rating" style="display: inline-block;">
							<input type="radio" name="point" class="rating" value="1" required="required"/>
						    <input type="radio" name="point" class="rating" value="2" required="required"/>
						    <input type="radio" name="point" class="rating" value="3" required="required"/>
						    <input type="radio" name="point" class="rating" value="4" required="required"/>
						    <input type="radio" name="point" class="rating" value="5" required="required"/>
						</p>
						<p>
							<h4>แสดงความคิดเห็น :</h4>
							<textarea class="form-control" name="comment" rows="5" required="required"></textarea><br>
							<button class="btn btn-info" style="float: right;" type="submit">แสดงความคิดเห็น</button>
						</p>
						</form>
						</div>
					</div>
				</div>
				<script type="text/javascript">
					$('#star-rating').rating(function(vote, event){
						// alert(vote);
						

					});
				</script>
				</body>
				</html>
				<?php
			} else {
				echo "ไม่พบ";
			}
		}
	} else {
		echo "error method get";
	}
?>