<?php
	session_start();
	if(isset($_SESSION['login']) == false) {
?>
<!DOCTYPE html>
<html>
<head>
	<title>บริการทำความสะอาดออนไลน์ | เข้าสุ่ระบบ</title>
<link rel="stylesheet" href="./css/bootstrap.min.css">
<link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
<script src="./js/jquery-3.2.0.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
</head>
<body>
<?php include_once 'navbar.php'; ?>
<div class="container" style="padding-top: 60px;">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <h4 align="center">เข้าสู่ระบบ</h4>
            <div class="row">
                <div class="card">
                    <div class="row">
                        <div class="col-md-6 card-block" align="center">
                        คุณสามารถเชื่อมต่อ กับเราได้โดยผ่าน <b>Social</b> ผ่านทาง <b>Facebook</b> และ <b>Google</b> ได้ เพื่อความ<u>สะดวกและปลอดภัย</u>ของผู้ใช้
                        </div>
                        <div class="col-md-6 card-block">
						<button class="btn btn-primary btn-block" onclick="loginFacebook()">
							<i class="fa fa-facebook"></i> Login Your Facebook
						</button>
                        <button class="btn btn-danger btn-block" onclick="loginGoogle()">
                        	<i class="fa fa-google"></i> Login Your Google
                        </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } else { 

	include_once 'connect.php';
	$uid = $_SESSION['uid'];
	$sql = "SELECT * FROM user_detail WHERE uid='{$uid}'";
	// print $sql;exit;

	if ($res = mysqli_query($conn,$sql)) {
		// var_dump($res);exit;
		if ($res->num_rows === 0) {
			header("Location: user_detail.php");
		} else {
			$sql = "SELECT * FROM `user` INNER JOIN `user_detail` ON `user`.`uid` = `user_detail`.`uid` WHERE `user`.`uid`='{$uid}'";
				if ($res = mysqli_query($conn,$sql)) {
					if ($res->num_rows > 0) {
						$row = mysqli_fetch_assoc($res);

						$_SESSION['login'] = true;
						$_SESSION['uid'] = $row['uid'];
						$_SESSION['name'] = $row['name'];
						$_SESSION['email'] = $row['email'];
						$_SESSION['status'] = $row['status'];
						$_SESSION['avatar'] = $row['image'];
						$_SESSION['fname'] = $row['fname'];
						$_SESSION['lname'] = $row['lname'];
						$_SESSION['phone'] = $row['phone'];
						$_SESSION['address'] = $row['address'];
						$_SESSION['lat'] = $row['lat'];
						$_SESSION['lng'] = $row['lng'];
						
						header("Location: index.php"); 
					}
				}
				
				
			}
		}
	}
?>

<script src="https://www.gstatic.com/firebasejs/3.7.3/firebase.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyCzzDDXdRbqoV1pdROj5uiSt9lMasbVImo",
    authDomain: "applogin-5d907.firebaseapp.com",
    databaseURL: "https://applogin-5d907.firebaseio.com",
    storageBucket: "applogin-5d907.appspot.com",
    messagingSenderId: "649183123728"
  };
  firebase.initializeApp(config);

	var providerFacebook = new firebase.auth.FacebookAuthProvider();
	var providerGoogle = new firebase.auth.GoogleAuthProvider();

	function login(name,email,uid,photoURL,type){
		//alert(55555);
		$.post('save.php', 
				{
					name:name,
					email:email,
					uid:uid,
					image:photoURL,
					type:type
				}, 
				function() {
				/*optional stuff to do after success */
				}
			).done(function(data){
				// alert(555);
				// console.log(data);
				let json_res = jQuery.parseJSON(data);
				if(json_res.status == true){
					//alert(json_res.message);
					location.reload();
				}else{
					alert("error");
				}

			});
	}

	function loginGoogle() {
		firebase.auth().signInWithPopup(providerGoogle).then(function(result) {
			// This gives you a Google Access Token. You can use it to access the Google API.
			var token = result.credential.accessToken;
			// The signed-in user info.
			var user = result.user;
			var name = user.displayName;
			var email = user.email;
			var uid = user.uid;
			var photoURL = user.photoURL;
			// ...
			var type = "google";
			// console.log(token);
			// console.log(result.credential.provider);
			// console.log(name);
			// console.log(email);
			// console.log(uid);
			// console.log(photoURL);
			// console.log(type);
			login(name,email,uid,photoURL,type);

		}).catch(function(error) {
			// Handle Errors here.
			var errorCode = error.code;
			var errorMessage = error.message;
			// The email of the user's account used.
			var email = error.email;
			// The firebase.auth.AuthCredential type that was used.
			var credential = error.credential;
			// ...
			// console.log(errorCode);
			// console.log(errorMessage);
			if(errorMessage){
				alert(errorMessage);
			}
		});
	}

	function logout(){
	firebase.auth().signOut().then(function() {
	// Sign-out successful.
	console.log("Logout Successful!!");
	$.post('logout.php', function() {
		/*optional stuff to do after success */
	}).done(function(data){
		// alert(data);
		location.reload();
	});
	// <?php
	// 	session_start();
	// 	session_destroy();

	// 	header("Location: login.php");

	// ?>
	}).catch(function(error) {
	// An error happened.
	});
	}

function loginFacebook() {

window.fbAsyncInit = function() {
	FB.init({
		appId      : '707612856085319',
		xfbml      : true,
		version    : 'v2.8'
	});
	FB.AppEvents.logPageView();
	FB.login(function(response) {
	if (response.authResponse) {
		// console.log('Welcome!  Fetching your information.... ');
		FB.api('/me',{"fields":"id,name,email,picture"},function(response) {
		// console.log('Good to see you, ' + response.name + '.');
		// console.log('Good to see you, ' + response.email + '.');
		// console.log('Good to see you, ' + response.id + '.');
		// console.log(response.picture.data.url);
		var photoURL = response.picture.data.url;
		var name = response.name;
		var email = response.email;
		var uid = response.id;
		var type = "facebook";

		// console.log(photoURL);
		// console.log(name);
		// console.log(email);
		// console.log(uid);
		// console.log(type);
		login(name,email,uid,photoURL,type);

		});
		}
	});


};

	(function(d, s, id){
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) {return;}
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/sdk.js";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
}
	$("#login").attr({
        "class" : "active"
    });
</script>
</body>
</html>
