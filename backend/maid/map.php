<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- <script src="../js/jquery.js"></script> -->
<style>
       #map {
        height: 400px;
        width: 100%;
       }
</style>
</head>
<body>
<div id="map"></div>
<!-- <?php var_dump($_GET['lat']) ?> -->
<script>
      function initMap() {
        var uluru = {lat: <?=$_GET['lat']?>, lng: <?=$_GET['lng']?>};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 16,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
<!-- <script>
// $(document).ready(function() {
	initMap(<?=$_GET['lat']?>,<?=$_GET['lng']?>);
	function initMap(lat,lng) {
	        var uluru = {lat: lat*1, lng: lng*1};
	        var map = new google.maps.Map(document.getElementById('map'), {
	          zoom: 5,
	          center: uluru
	        });
	        var marker = new google.maps.Marker({
	          position: uluru,
	          map: map
	        });
	}  
// });
</script> -->
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAiN2gSbA1GuW8BeHF4CMVucHzGvl0_drs&callback=initMap">
</script>
</body>
</html>