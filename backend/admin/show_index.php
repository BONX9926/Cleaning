<?php
	session_start();
  include_once '../../connect.php';
  $sql_count_user = "SELECT COUNT(`uid`) AS num_user  FROM `user_detail`";
  if ($res1 = mysqli_query($conn,$sql_count_user)) {
    $count_user = mysqli_fetch_assoc($res1);
  }
  $sql_count_maid = "SELECT COUNT(`id`) AS num_miad FROM `user_backend` WHERE `status`='M'";
  if ($res2 = mysqli_query($conn,$sql_count_maid)) {
    $count_maid = mysqli_fetch_assoc($res2);
  }
  $sql_count_bin = "SELECT COUNT(`booking_id`) AS num_bin FROM `booking_table`WHERE `status_id`='true'";
  if ($res3 = mysqli_query($conn,$sql_count_bin)) {
    $count_bin = mysqli_fetch_assoc($res3);
  }
  $sql_count_comment = "SELECT COUNT(`uid`) AS num_comment FROM `comment_point`";
  if ($res4 = mysqli_query($conn,$sql_count_comment)) {
    $count_comment = mysqli_fetch_assoc($res4);
  }
?>
<div class="col-lg-12">
	<section class="panel">
	<header class="panel-heading">Welcome</header>
		<div class="panel-body">
		<section>
			<div class="row state-overview">
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel pointer" id="users">
                          <div class="symbol terques">
                              <i class="fa fa-user"></i>
                          </div>
                          <div class="value" class="font-black">
                              <h1><b id="count_user" style="color:#484848"></b></h1>
                              <p style="color:#484848">ผู้ใช้</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel pointer" id="maids">
                          <div class="symbol red">
                              <i class="fa fa-users"></i>
                          </div>
                          <div class="value">
                              <h1><b id="count_maid" style="color:#484848"></b></h1>
                              <p style="color:#484848">แม่บ้าน</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel pointer" id="bins">
                          <div class="symbol yellow">
                              <i class="fa fa-file-text-o"></i>
                          </div>
                          <div class="value">
                              <h1><b id="count_bin" style="color:#484848"></b></h1>
                              <p style="color:#484848">จำนวนบิลทั้งหมด</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel pointer" id="comments">
                          <div class="symbol blue">
                              <i class="fa fa-comment-o"></i>
                          </div>
                          <div class="value">
                              <h1><b id="count_comment" style="color:#484848"></b></h1>
                              <p style="color:#484848">ความคิดเห็น</p>
                          </div>
                      </section>
                  </div>
              </div>
		</section>
			<section>
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="titlemodal"></h4>
      </div>
      <div class="modal-body" id="modal-content">
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>
      </div>
      </div>
      </div>
      </div>
        <section>
          <select name="year" class="form-control" style="float: right;width: 90px" id="sel">
          <?php 
          $yearNow = date("Y")*1;
          $yearMin = $yearNow-10;
          $yearMax =  $yearNow+10;
          
          for ($yearMin; $yearMin <=$yearMax ; $yearMin++) { 
            $selected = ($yearMin == $yearNow) ? "selected" : "";
          ?>
          <option value="<?=$yearMin?>" <?=$selected ?> ><?=$yearMin?></option>
          <?php
          }
         
           
         ?>
          </select>
        </section>
        <section id="unseen">
        </section>
				<div class="col-lg-6" align="center">
					<div id="user" style="min-width: 310px; max-width: 600px; height: 400px; margin: 0 auto"></div>
				</div>
				<div class="col-lg-6" align="center">
        <div id="items" style="min-width: 310px; max-width: 600px; height: 400px; margin: 0 auto"></div>
				</div>
			</section>
		</div>
	</section>
</div>
<script type="text/javascript">
    $(".pointer").css('cursor', 'pointer');
    $("#users").click(function(event) {
      alert($(this).attr('id'));
    });
    $("#maids").click(function(event) {
      alert($(this).attr('id'));
    });    
    $("#bins").click(function(event) {
      alert($(this).attr('id'));
    });    
    $("#comments").click(function(event) {
      alert($(this).attr('id'));
    });
  $("#count_user").html(<?php  echo $count_user['num_user'];  ?>);
  $("#count_maid").html(<?php  echo $count_maid['num_miad'];  ?>);
  $("#count_bin").html(<?php echo $count_bin['num_bin']; ?>);
  $("#count_comment").html(<?php echo $count_comment['num_comment']; ?>);
  $("#dashboard").attr('class', 'active');
  $("#sel").change(function(event) {
      
      var year = $(this).val();
      // alert(year);
      $.post('service_chart/chart_income_jay.php', {year: year}, function() {
       /*optional stuff to do after success */
      }).done(function(data){
       var json_res = jQuery.parseJSON(data);

       chart_income_jay('unseen',json_res.income,"รายรับรายจ่าย",'บาท','จำนวนเงิน',json_res.year);
      });
    });
  // render chart function start
    function chart_income_jay(target,data,title_name,unit,title_y,year) {
      Highcharts.chart(target, {
          chart: {
              type: 'column'
          },
          title: {
              text: title_name
          },
          subtitle: {
              text: ''
          },
          xAxis: {
              categories: [
                  'ม.ค.',
                  'ก.พ.',
                  'มี.ค.',
                  'เม.ย.',
                  'พ.ค.',
                  'มิ.ย.',
                  'ก.ค.',
                  'ส.ค.',
                  'ก.ย.',
                  'ต.ค.',
                  'พ.ย.',
                  'ธ.ค.'
              ],
              crosshair: true
          },
          yAxis: {
              min: 0,
              title: {
                  text: title_y+' ('+unit+')'
              }
          },
          tooltip: {
              headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
              pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                  '<td style="padding:0"><b>{point.y:.1f} '+unit+'</b></td></tr>',
              footerFormat: '</table>',
              shared: true,
              useHTML: true
          },
          plotOptions: {
              column: {
                  pointPadding: 0.2,
                  borderWidth: 0
              },
              series: {
                point:{
                  events:{
                    click: function(){
                      // $('#titlemodal').html(title_name);
                      // console.log(this.series.name);
                      // console.log(thicategory);
                      $('#titlemodal').html(title_name);
                      $.post('render_table_to_show_index.php', {word: this.category , name:this.series.name, type: 'income',year:year}, function(data, textStatus, xhr) {
                      }).done(function(data){
                       // alert(data);
                       $('#modal-content').html(data);
                      });
                      $('#myModal').modal('toggle');
                      // $('#myModal').modal('toggle');
                    }
                  }
                }
              }
          },
          series: data,
          colors:['#00E676','#FF6E40'],

      });
    }
    // render chart function stop
</script>
