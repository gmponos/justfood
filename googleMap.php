<?php

// First, setup the variables you will use on your <iframe> code
// Your Iframe will need a Width and Height set
// as well as the address you plan to Iframe
// Don't forget to get a Google Maps API key

$latitude = '';
$longitude = '';
$iframe_width = '400px';
$iframe_height = '400px';
$address = 'Libyan Princess S.A., Palaiochora, Greece';
$address = urlencode($address);
$key = "900722620956.apps.googleusercontent.com";
$url = "http://maps.google.com/maps/geo?q=".$address."&output=json&key=".$key;
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER,0);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER["HTTP_USER_AGENT"]);
// Comment out the line below if you receive an error on certain hosts that have security restrictions
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$data = curl_exec($ch);
curl_close($ch);

$geo_json = json_decode($data, true);

// Uncomment the line below to see the full output from the API request
// var_dump($geo_json);

// If the Json request was successful (status 200) proceed
if ($geo_json['Status']['code'] == '200') {

$latitude = $geo_json['Placemark'][0]['Point']['coordinates'][0];
$longitude = $geo_json['Placemark'][0]['Point']['coordinates'][1]; ?>

<iframe width="<?php echo $iframe_width; ?>" height="<?php echo $iframe_height; ?>" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="

http://maps.google.com/maps

?f=q
&amp;source=s_q
&amp;hl=en
&amp;geocode=
&amp;q=<?php echo $address; ?>
&amp;aq=0
&amp;ie=UTF8
&amp;hq=
&amp;hnear=<?php echo $address; ?>
&amp;t=m
&amp;ll=<?php echo $longitude; ?>,<?php echo $latitude; ?>
&amp;z=12
&amp;iwloc=
&amp;output=embed"></iframe>

<?php

} else { echo "<p>No Address Available</p>";}

?>
   <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
<script type="text/javascript">
var autocomplete = new google.maps.places.Autocomplete($('Libyan Princess S.A., Palaiochora, Greece')[0], {types: ['geocode']});
  
google.maps.event.addListener(autocomplete, 'place_changed', function() {
    var place = autocomplete.getPlace();
    $('input[name="location_id"]').val(place.id);
    $('input[name="location_lat"]').val(place.geometry.location.lat());
    $('input[name="location_lng"]').val(place.geometry.location.lng());
    $('input[name="location_country"]').val(findComponent(place, 'country'));
    $('input[name="location_state"]').val(findComponent(place, 'administrative_area_level_1'));
    $('input[name="location_city"]').val(findComponent(place, 'administrative_area_level_3') || findComponent(place, 'locality'));
});

function findComponent(result, type) {
  var component = _.find(result.address_components, function(component) {
    return _.include(component.types, type);
  });
  return component && component.short_name;
}
</script>
<input name="location" type="text" placeholder="City, State, Country">
<input name="location_city" type="hidden">
<input name="location_state" type="hidden">
<input name="location_country" type="hidden">
<input name="location_lat" type="hidden">
<input name="location_lng" type="hidden">
<input name="location_id" type="hidden">