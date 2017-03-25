<header class="header white-bg">
	<div class="sidebar-toggle-box">
		<div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
	</div>
	<!--logo start-->
	<a href="index.html" class="logo">Clean<span>service</span></a>
	<!--logo end-->
	<div class="top-nav ">
		<!--search & user info start-->
		<ul class="nav pull-right top-menu">
			<!-- user login dropdown start-->
			<li class="dropdown">
				<a data-toggle="dropdown" class="dropdown-toggle" href="#">
					<img alt="" src="../img/avatar1_small.jpg">
					<span class="username"><?=$_SESSION['fname']." ".$_SESSION['lname']?></span>
					<b class="caret"></b>
				</a>
				<ul class="dropdown-menu extended logout">
					<div class="log-arrow-up"></div>
					<li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
					<li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
					<li><a href="#"><i class="fa fa-bell-o"></i> Notification</a></li>
					<li><a href="../logout.php"><i class="fa fa-key"></i> Log Out</a></li>
				</ul>
			</li>
			<!-- user login dropdown end -->
		</ul>
		<!--search & user info end-->
	</div>
</header>