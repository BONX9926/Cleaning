var map;
var marker;
var myLatlng = new google.maps.LatLng(13.733262,100.489422);
var geocoder = new google.maps.Geocoder();
var infowindow = new google.maps.InfoWindow();
function initialize(){
var mapOptions = {
zoom: 18,
center: myLatlng,
mapTypeId: google.maps.MapTypeId.ROADMAP
};

var searchBox = new google.maps.places.SearchBox(document.getElementById('address'));
google.maps.event.addListener(searchBox, 'places_changed', function(){

var places = searchBox.getPlaces();


var bounds = new google.maps.LatLngBounds();
var i, place;

for(i=0; place=places[i]; i++){
bounds.extend(place.geometry.location);
marker.setPosition(place.geometry.location);
}
$('#latitude').val(marker.getPosition().lat());
$('#longitude').val(marker.getPosition().lng());

map.fitBounds(bounds);
map.setZoom(15);
});

map = new google.maps.Map(document.getElementById("myMap"), mapOptions);

marker = new google.maps.Marker({
map: map,
position: myLatlng,
draggable: true 
}); 

geocoder.geocode({'latLng': myLatlng }, function(results, status) {
if (status == google.maps.GeocoderStatus.OK) {
if (results[0]) {
// $('#latitude,#longitude').show();
// $('#address').val(results[0].formatted_address);
$('#latitude').val(marker.getPosition().lat());
$('#longitude').val(marker.getPosition().lng());
// infowindow.setContent(results[0].formatted_address);
// infowindow.open(map, marker);
}
}
});

google.maps.event.addListener(marker, 'dragend', function() {

geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
if (status == google.maps.GeocoderStatus.OK) {
if (results[0]) {
$('#address').val(results[0].formatted_address);
$('#latitude').val(marker.getPosition().lat());
$('#longitude').val(marker.getPosition().lng());
// infowindow.setContent(results[0].formatted_address);
// infowindow.open(map, marker);
}
}
});
});

}
google.maps.event.addDomListener(window, 'load', initialize);