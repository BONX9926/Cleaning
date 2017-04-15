<?php
	session_start();
?>
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap-fileupload/bootstrap-fileupload.css" />
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap-timepicker/compiled/timepicker.css" />
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap-colorpicker/css/colorpicker.css" />
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap-daterangepicker/daterangepicker-bs3.css" />
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap-datetimepicker/css/datetimepicker.css" />
    <link rel="stylesheet" type="text/css" href="../assets/jquery-multi-select/css/multi-select.css" />
	<link rel="stylesheet" href="../css/simply-toast.min.css" type="text/css">

	<section class="panel">
	<header class="panel-heading">
	เพิ่มอุปกรณ์ทำความสะอาด
	</header>
	<div class="panel-body">
		<form class="form-horizontal" role="form" id="files" method="POST" enctype="multipart/formdata">
			<div class="form-group">
				<label class="col-lg-2 col-sm-2 control-label">รูปอุปกรณ์</label>
				<div class="col-lg-10">
					<div class="fileupload fileupload-new" data-provides="fileupload">
					<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
					<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" id="show-img" />
					</div>
					<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
					<div>
					<span class="btn btn-white btn-file">
					<span class="fileupload-new"><i class="fa fa-paper-clip"></i> เลือกรูป</span>
					<span class="fileupload-exists"><i class="fa fa-undo"></i> เปลี่ยน</span>
					<input type="file" name="img" id="img" accept="image/.jpg, .png" />
					</span>
					<!-- <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a> -->
					</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-lg-2 col-sm-2 control-label">ชื่ออุปกรณ์</label>
				<div class="col-lg-10">
					<input type="text" class="form-control" name="item_name" id="item_name">
				</div>
			</div>
			<div class="form-group">
				<label class="col-lg-2 col-sm-2 control-label">จำนวนทั้งหมด / ชิ้น</label>
				<div class="col-lg-10">
					<input type="number" class="form-control" name="quantity_all" id="quantity_all">
				</div>
			</div>
			<div class="form-group">
				<label class="col-lg-2 col-sm-2 control-label">ราคาเช่าต่อชิ้น</label>
				<div class="col-lg-10">
					<input type="text" class="form-control" name="item_price" id="item_price" >
				</div>
			</div>
		</form>
			<div class="form-group">
				<div class="col-lg-2 col-sm-2 control-label">
				</div>
				<div class="col-lg-10">
					<button class="btn btn-round btn-primary" id="submit" type="submit">เพิ่ม</button>
				</div>
			</div>
	</div>
	</section>
</div>

<script src="../js/simply-toast.min.js"></script>
    <!--this page plugins-->

  <script type="text/javascript" src="../assets/fuelux/js/spinner.min.js"></script>
  <script type="text/javascript" src="../assets/bootstrap-fileupload/bootstrap-fileupload.js"></script>
  <script type="text/javascript" src="../assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
  <script type="text/javascript" src="../assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
  <script type="text/javascript" src="../assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="../assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
  <script type="text/javascript" src="../assets/bootstrap-daterangepicker/moment.min.js"></script>
  <script type="text/javascript" src="../assets/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="../assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
  <script type="text/javascript" src="../assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
  <script type="text/javascript" src="../assets/jquery-multi-select/js/jquery.multi-select.js"></script>
  <script type="text/javascript" src="../assets/jquery-multi-select/js/jquery.quicksearch.js"></script>
  <script src="../js/jquery.mask.min.js"></script>
  <!--this page  script only-->
<script src="../js/advanced-form-components.js"></script>
<script>
	 // $("#phone").mask('000-000-0000');
	$('#submit').click(function(event) {
		// var data = $('form').serializeArray();
		var formData = new FormData($("form#files")[0]);
		// alert(data[0]['value']);
		// console.log(data);
		// console.log(formData);
		$.ajax({
	        url: 'add_item_save.php',
	        type: 'POST',
	        data: formData,
	        async: false,
	        success: function (data) {
            // console.log(data);
            // alert(data);
            let json_res = jQuery.parseJSON(data);
            // // alert(json_res.status);
            if(json_res.status == true) {
	            $.simplyToast(json_res.message, 'success');
	            $('input').val("");
	            $('#show-img').attr('src', '');

            } else {
            	$.simplyToast(json_res.message, 'danger');
            // alert('66666');
            }
        },
        cache: false,
        contentType: false,
        processData: false
    });

    return false;
		
	});
</script>
