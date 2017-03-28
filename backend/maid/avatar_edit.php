<?php
	session_start();
?>

<link rel="stylesheet" type="text/css" href="../assets/bootstrap-fileupload/bootstrap-fileupload.css" />
<link rel="stylesheet" href="../css/simply-toast.min.css" type="text/css">
<aside class="profile-info col-lg-12">
<section class="panel">
<div class="panel-body bio-graph-info">
<!-- <form class="form-horizontal" id="files"> -->
<form class="form-horizontal" id="files" method="POST" enctype="multipart/formdata">
<div class="form-group">
<label  class="col-lg-2 control-label">รูปโปร์ไฟล์</label>
<div class="col-lg-10">
<div class="fileupload fileupload-new" data-provides="fileupload">
<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
</div>
<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
<div>
<span class="btn btn-white btn-file">
<span class="fileupload-new"><i class="fa fa-paper-clip"></i> เลือกรูป</span>
<span class="fileupload-exists"><i class="fa fa-undo"></i> เปลี่ยน</span>
<input type="file" name="avatar" id="avatar" accept="image/.jpg, .png" />
<input type="hidden" name="id" value="<?=$_SESSION['id']?>">
</span>
<!-- <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a> -->
</div>
</div>
</div>
</div>
<div class="form-group">
<div class="col-lg-offset-2 col-lg-10">
<button id="submit" type="button" class="btn btn-success">บันทึก</button>
<!-- <button type="button" class="btn btn-default">Cancel</button> -->
</div>
</div>
</form>
</div>

</section>
</aside>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="../js/jquery.js"></script>
    <script src="../js/simply-toast.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="../js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="../js/jquery.scrollTo.min.js"></script>
    <script src="../js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="../js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="../assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="../js/owl.carousel.js" ></script>
    <script src="../js/jquery.customSelect.min.js" ></script>
    <script src="../js/respond.min.js" ></script>
  	<script type="text/javascript" src="../assets/bootstrap-fileupload/bootstrap-fileupload.js"></script>

    <!--right slidebar-->
    <!-- <script src="../js/slidebars.min.js"></script> -->

    <!--common script for all pages-->
    <!-- <script src="../js/common-scripts.js"></script> -->

    <!--script for this page-->
    <!-- <script src="../js/sparkline-chart.js"></script> -->
    <!-- <script src="../js/easy-pie-chart.js"></script> -->
    <!-- <script src="../js/count.js"></script> -->

<script>
$("#submit").click(function(){

    var formData = new FormData($("form#files")[0]);
    // console.log(formData);

    $.ajax({
        url: 'avatar_save.php',
        type: 'POST',
        data: formData,
        async: false,
        success: function (data) {
            // alert(data);
            let json_res = jQuery.parseJSON(data);
            // alert(json_res.status);
            if(json_res.status == true) {
            $.simplyToast(json_res.message, 'success');
            // alert('5555');
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