<?php
	session_start();
?>
<div class="col-lg-12">
	<section class="panel">
	<header class="panel-heading">Welcome</header>
		<div class="panel-body">
		<section>
			<div class="row state-overview">
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol terques">
                              <i class="fa fa-user"></i>
                          </div>
                          <div class="value">
                              <h1 id="count_user"></h1>
                              <p>ผู้ใช้</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol red">
                              <i class="fa fa-tags"></i>
                          </div>
                          <div class="value">
                              <h1 id="count_maid"></h1>
                              <p>แม่บ้าน</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol yellow">
                              <i class="fa fa-shopping-cart"></i>
                          </div>
                          <div class="value">
                              <h1 id="count_bin"></h1>
                              <p>จำนวนบิลทั้งหมด</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol blue">
                              <i class="fa fa-bar-chart-o"></i>
                          </div>
                          <div class="value">
                              <h1 class=" count4">10328</h1>
                              <p>Total Profit</p>
                          </div>
                      </section>
                  </div>
              </div>
		</section>
			<section>
				<div class="col-lg-6" id="user" style="width: 475px;height: 500px;">
					
				</div>
				<div class="col-lg-6" id="maid" style="width: 475px;height: 500px;">
					
				</div>
			</section>
			<section id="unseen">
			</section>
		</div>
	</section>
</div>
<script type="text/javascript">
  $("#count_user").html('50');
  $("#count_maid").html('4');
  $("#count_bin").html('10');
</script>
