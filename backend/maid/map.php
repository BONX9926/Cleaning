<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- <script src="../js/jquery.js"></script> -->
<style>
       #map {
        height: 100vh;
        width: 100%;
       }
</style>
</head>
<body>
<div id="map"></div>
<script>
      function initMap() {
        var uluru = {lat: <?=$_POST['lat']?>, lng: <?=$_POST['lng']?>};
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

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAiN2gSbA1GuW8BeHF4CMVucHzGvl0_drs&callback=initMap">
</script>
</body>
</html>