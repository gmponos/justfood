<?php //echo $_SERVER['HTTP_ACCEPT_LANGUAGE']; ?>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
        <script type="text/javascript">
        function initialize() {
        var address = (document.getElementById('where'));
        var autocomplete = new google.maps.places.Autocomplete(address);
		var componentRestrictions = {country: 'gr'};
autocomplete.setComponentRestrictions(componentRestrictions);
        autocomplete.setTypes(['geocode']);
        google.maps.event.addListener(autocomplete, 'place_changed', function() {
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                return;
            }

        var address = '';
        if (place.address_components) {
            address = [
                (place.address_components[0] && place.address_components[0].short_name || ''),
                (place.address_components[1] && place.address_components[1].short_name || ''),
                (place.address_components[2] && place.address_components[2].short_name || '')
                ].join(' ');
        }
      });
}
function codeAddress() {
    geocoder = new google.maps.Geocoder();
    var address = document.getElementById("where").value;
    geocoder.geocode( { 'address': address}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {

      alert("Latitude: "+results[0].geometry.location.lat());
      alert("Longitude: "+results[0].geometry.location.lng());
      } 

      else {
        alert("Geocode was not successful for the following reason: " + status);
      }
    });
  }
google.maps.event.addDomListener(window, 'load', initialize);

        </script>
  
<form id="popupform"  name="popupform" method="get" action="restaurantSearchText.php"  >
         <input type="text" name="address_auto_complete" required class="address3" id="where" placeholder=" Eg. Acharavi, Corfu, Greece" style="width:400px;" autocomplete="off">
           <input type="submit" value="<?php echo ucwords($TableLanguage['OrderNowButton']);?> &raquo;" id="order_address_btn" class="click"/>
        </form>
         <?php /*?><div class='popup'><?php include('googleverification.php'); ?></div>  <?php */?> 
