<?php
	session_start();
?>

<!-- <link rel="stylesheet" type="text/css" href="../assets/bootstrap-fileupload/bootstrap-fileupload.css" /> -->
<!-- <link rel="stylesheet" href="../css/simply-toast.min.css" type="text/css"> -->
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