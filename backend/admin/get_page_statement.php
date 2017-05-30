<?php
	session_start();
	date_default_timezone_set("Asia/Bangkok");
?>
<style type="text/css">
	.ui-menu-item {
		background-image:linear-gradient(to top, #cfd9df 0%, #e2ebf0 100%);
		padding: 5px 5px 5px;
	}
</style>
<div class="col-lg-12">
	<section class="panel">
	<header class="panel-heading">Statement</header>
		<div class="panel-body">
			<section id="unseen">
				<div class="form-group">
					<label>ค้นหา :</label>
					<input type="text" name="search" class="form-control" id="search">
				</div>
			</section>
			<hr>
			<section id="contentStatement">
			</section>
		</div>
	</section>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		var availableTags = [];
		$.post('service_autocomplate_statement.php', function() {
			/*optional stuff to do after success */
		}).done(function(data){
			var json_res = jQuery.parseJSON(data);
			// $.each(json_res, function(index, val) {
			// 	  iterate through array or object 
			// 	 var res = val.substr(-6, 6);
			// 	 // console.log(res);
			// });
			 availableTags=json_res;
			// console.log(json_res);
		}, function(json_res) {
			$( "#search" ).autocomplete({

		  		source: availableTags
	   		});
		});
		//eventEnter
		$("#search").keypress(function(event) {
			var x = event.which || event.keyCode;
		    if(x == 13){
		    	var str = $(this).val();
		    	var maid_id = str.substr(-6, 6);
		    	$.post('statement_by_id.php', {maid_id: maid_id}, function() {
		    		/*optional stuff to do after success */
		    	}).done(function(data){
		    		$("#contentStatement").html(data);
		    	},function() {
    			 	$('#state').DataTable( {
				        "pageLength": 10
				    } );
		    	});
		    }
		});
		//eventEnter
	});
</script>