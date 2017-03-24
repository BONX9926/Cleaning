<?php 

	include_once 'connect.php';
	$return = array();
	session_start();
	 // $_POST['name'] = "ice";
	 // $_POST['email'] = "ice@hotmail.com";
	 // $_POST['uid'] = "asdsfdwfdgdsfdfdg";
	 // $_POST['image'] = "asdsfdwfdgdsfdfdg";
	if(isset($_POST['name']) && isset( $_POST['email']) && isset($_POST['uid']) && isset($_POST['type'])){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$uid = $_POST['uid'];
		$image = $_POST['image'];
		$social_provider = $_POST['type'];
		// file_put_contents("save_json.json", json_encode($_POST));
		$sql = "SELECT * FROM user WHERE email='{$email}' AND uid='{$uid}' ";

		if($res = mysqli_query($conn,$sql)){
			if($res->num_rows >0){
				$row = mysqli_fetch_assoc($res);
				// $sql = "SELECT * FROM `user` INNER JOIN `user_detail` on(`user`.`uid`=`user_detail`.`uid`) WHERE `user`.`uid` = '{$uid}'";
				// $return['message'] = "มีผู้มใช้แล้ว";
				$_SESSION['login'] = true;
				$_SESSION['uid'] = $row['uid'];
				$_SESSION['name'] = $row['name'];
				$_SESSION['email'] = $row['email'];
				$_SESSION['status'] = $row['status'];
				$_SESSION['avatar'] = $row['image'];
				$return['status'] = true;

			}else{
				$return['status'] = true;
				$return['message'] = "ผู้ใช้ใหม่";
				// insert
				$sql = "INSERT INTO `user`(`uid`, `name`, `email`, `image`, `social_provider`) VALUES ('{$uid}','{$name}','{$email}','{$image}','{$social_provider}')";
					if(mysqli_query($conn,$sql)){
						$_SESSION['login'] = true;
						$return['status'] = true;
						$return['message'] = "log in true";
						$_SESSION['uid'] = $uid;
						$_SESSION['name'] = $name;
						$_SESSION['email'] = $email;
						$_SESSION['status'] = "U";
						$_SESSION['img_user'] = $image;
					}else{
						$return['status'] = false;
						$return['message'] = "login error";

					}
					
				// insert
			}
		}else{
			$return['status'] = false;
			$return['message'] = "error";
		}
			
	}else{
		$return['status'] = false;
		$return['message'] = "error";
	}
	

	echo json_encode($return);
?>