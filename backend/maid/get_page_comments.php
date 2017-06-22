<?php
	include_once '../../connect.php';
	include '../../lib/php/public_function.php';
	session_start();
?>
<style type="text/css">
	img{
		width: 50px;
		height: 46.88px;
	}
</style>
<aside class="profile-info col-lg-12">
	<section class="panel">
		<div class="panel-body bio-graph-info">
			<h1>ความคิดเห็นจากผู้ใช้งาน</h1>
			<div class="fb-status-container fb-border fb-gray-bg" style="background-color: #FFFFFF;">

			<ul class="fb-comments">
			<?php

				$sql_comment = "SELECT * FROM `comment_point`INNER JOIN `user`ON comment_point.uid = user.uid  WHERE comment_point.maid_id ='{$_SESSION['id']}'";
				if ($res = mysqli_query($conn,$sql_comment)) {
					while($row = mysqli_fetch_assoc($res)){
						// var_dump($row);
						?>
			<li>
				<a href="#" class="cmt-thumb">
					<img src="<?=$row['image']?>" alt="">
				</a>
				<div class="cmt-details">
					<a href="#"><?=$row['name']?></a>
					<span><?=$row['comment']?></span>
					<p><?=date_thai(revert_date($row['created_at']))?> จากเลขที่บิล : <?=$row['bin']?></p>
				</div>
			</li>
						<?php
						// var_dump($row);
					}
				}
			?>
			</ul>

			<!-- <div class="clearfix"></div> -->

			</div>
		</div>
	</section>
</aside>