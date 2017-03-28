<aside>
	<div id="sidebar"  class="nav-collapse ">
		<!-- sidebar menu start-->
		<ul class="sidebar-menu" id="nav-accordion">
			<li>
				<a href="index.php" id="profile">
					<i class="fa fa-user"></i>
					<span>โปรไฟล์ส่วนตัว</span>
				</a>
			</li>
			<?php if(isset($_SESSION['status']) == 'A') {?>
			<li class="sub-menu">
				<a href="javascript:;" id="submenu_maid">
					<i class="fa fa-book"></i>
					<span>แม่บ้าน</span>
				</a>
				<ul class="sub" id="sub_maid">
					<li id="maid"><a href="maid.php">รายชื่อแม่บ้าน</a></li>
					<li><a href="add_maid.php">เพิ่มแม่บ้าน</a></li>
				</ul>
			</li>
			<?php } ?>

			<li class="sub-menu">
				<a href="javascript:;" >
					<i class="fa fa-book"></i>
					<span>UI Elements</span>
				</a>
				<ul class="sub">
					<li><a  href="#">General</a></li>
					<li><a  href="#">Buttons</a></li>
					<li><a  href="#">Widget</a></li>
					<li><a  href="#">Slider</a></li>
					<li><a  href="#">Nestable</a></li>
					<li><a  href="#">Font Awesome</a></li>
				</ul>
			</li>

			<li class="sub-menu">
				<a href="javascript:;" >
					<i class="fa fa-cogs"></i>
					<span>Components</span>
				</a>
				<ul class="sub">
					<li><a  href="#">Grids</a></li>
					<li><a  href="#">Calendar</a></li>
					<li><a  href="#">Gallery</a></li>
					<li><a  href="#">Todo List</a></li>
					<li><a  href="#">Draggable Portlet</a></li>
					<li><a  href="#">Tree View</a></li>
				</ul>
			</li>
		</ul>
	<!-- sidebar menu end-->
	</div>
</aside>