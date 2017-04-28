<?php
	session_start();
?>
<aside class="profile-info col-lg-12">
	<section class="panel">
		<div class="panel-body bio-graph-info">
			<h1>อุปกรณ์ทำความสะอาด</h1>
			<div class="row"><i class="fa fa-shopping-cart"></i></div>
			<div class="row">
				<?php
					include_once '../../connect.php';
					$sql = "SELECT * FROM `items`";
					if($res = mysqli_query($conn,$sql)) {
						while ($row = mysqli_fetch_assoc($res)) {
							// print_r($row);
							?>
							<div class="col-sm-6 col-md-4">
							<div class="thumbnail">
							<img src="../img/items/<?=$row['img']?>" style="width: 233px;height: 233px;" alt="...">
							<div class="caption">
							<h3><?=$row['item_name']?></h3>
							<p>จำนวนทั้งหมด : <?=$row['quantity_all']?> ชิ้น</p>
							<p>จำนวนที่สามารถยืมได้ : <?=$row['quantity_remain']?> ชิ้น</p>
							<p><a href="#" class="btn btn-primary" role="button">button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
							</div>
							</div>
							</div>
							<?php
						}
					} else {
						echo "SQL ERROR";
					}
				?>
			</div>
		</div>
	</section>
</aside>