<?php 
	session_start();
	if (isset($_SESSION['login']) && isset($_SESSION['status']) === 'A') {
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Index</title>
</head>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link href="../font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
<script src="../js/jquery-3.2.0.js"></script>
<script src="../js/bootstrap.min.js"></script>
<body>

<h1>admin</h1>
<?php var_dump($_SESSION) ?>
</body>
</html>
<?php } else {
		// echo "คุณไม่มีสิทธิใช้งานส่วนนี้";
	header("Location: ../maid/index.php");
	}
?>