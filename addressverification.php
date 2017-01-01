<style type="text/css">
.wrappereee{ width:100%; min-height:470px; }
.containersss{min-width:100%;text-align:left;width:75%;margin:auto;min-height:470px;}
.headerrrr{width:100%; height:40px;background:#C03434; color:#FFFFFF; font-weight:700;}
.map_content{width:100%; height:410px; margin-top:10px; }
.note{width:100%; height:50px;}
.map{width:35%; height:350px; float:left; margin-left:3%;}
.form{width:55%; height:350px; float:right; margin-right:0%;}
p.info{line-height:13px; padding:3px 1px 3px 30px; margin:3px 1px; color:#000000;}
.headerrrr h1{font-size:23px; padding:5px 1px 1px 10px; float:left; margin: 0.5% 0 0 1%!important; }
.textbox{border: 1px solid #ccc; border-radius: 0;box-shadow: 1px 1px 4px #BBBBBB inset;color: #000000;font-size: 12px;height: 34px;line-height: 28px;margin: 0;width: 67.3%;	padding:5px 1px 2px 7px;}
.dpdn{border: 1px solid #ccc; font-size:15px; border-radius: 0;box-shadow: 1px 1px 4px #BBBBBB inset;color: #000000;font-size: 12px;height: 35px;line-height: 28px;margin:5px 0px 0px 5px; width: 97%;	padding:5px 1px 2px 7px;}
.name{ font-size:18px; margin-bottom:5px;}
.submit_btn{width:30%; height:35px; background:#C03434; border:#C03434; border-radius:3px; color:#FFFFFF; font-size:18px; margin-top:15px;}
.submit_btn:hover{cursor:pointer;}
.clear{clear:both;}
#popcloseimg{float:right; width:20px; height:20px; margin-top:10px; margin-right:10px;}
#popcloseimg:hover{cursor:pointer;}
</style>

   <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
   <script type="text/javascript" language="javascript" src="js/jquery-1.8.2.min.js"></script>
    <script>
// This example displays an address form, using the autocomplete feature
// of the Google Places API to help users fill in the information.

var placeSearch, autocomplete;
var componentForm = {
  street_number: 'short_name',
  route: 'long_name',
  locality: 'long_name',
  administrative_area_level_1: 'short_name',
  country: 'long_name',
  postal_code: 'short_name'
};

function initialize() {
  // Create the autocomplete object, restricting the search
  // to geographical location types.
  		autocomplete = new google.maps.places.Autocomplete(document.getElementById('autocomplete'), { types:['geocode'], componentRestrictions:{'country':'gr'} });
  // When the user selects an address from the dropdown,
  // populate the address fields in the form.
  
  google.maps.event.addListener(autocomplete, 'place_changed', function() {
    fillInAddress();
	getMapAddress(document.getElementById('autocomplete').value);
  });
}

// [START region_fillform]
function fillInAddress() {
  // Get the place details from the autocomplete object.
  var place = autocomplete.getPlace();

  for (var component in componentForm) {
    document.getElementById(component).value = '';
    document.getElementById(component).disabled = false;
  }

  // Get each component of the address from the place details
  // and fill the corresponding field on the form.
  for (var i = 0; i < place.address_components.length; i++) {
    var addressType = place.address_components[i].types[0];
    if (componentForm[addressType]) {
      var val = place.address_components[i][componentForm[addressType]];
      document.getElementById(addressType).value = val;
    }
  }
}
// [END region_fillform]

// [START region_geolocation]
// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var geolocation = new google.maps.LatLng(
          position.coords.latitude, position.coords.longitude);
      autocomplete.setBounds(new google.maps.LatLngBounds(geolocation,
          geolocation));
    });
  }
  
  
}


	
// [END region_geolocation]

    </script>
      <script>
function getMapAddress(int)
{
if(int=="")
{
document.getElementById("autocomplete").style.background="#DD0000";
}
else
{
document.getElementById("autocomplete").style.background="";
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("displayMap").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","ajaxMap.php?vote="+int,true);
xmlhttp.send();
}
}
</script>
    <body  onload="initialize()">
<div class="wrappereee">
<div class="containersss">

<div class="headerrrr">

<h1>Your Address</h1><a href="index.php" target="_parent" ><img class="close" id="popcloseimg" src="images/popupclose.png" /></a>
</div>
<div class="map_content">
<div class="note">
<p class="info">Please verify that your address is correctly displayed on the map.</p>
<p class="info">Otherwise drag with your mouse to point at the right spot of the map</p>
</div>
<div class="map" id="displayMap">
<iframe width="350" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?&amp;q=&quot;?tt???, Greece&quot;&amp;output=embed"></iframe>
</div>
<div class="form">
<form action="restaurantSearchText.php"  method="get" target="_parent">
<input type="hidden" name="restaurant_cuisine" value="<?php echo $_GET['restaurant_cuisine'];?>" />
<div class="address_field" id="locationField">
<input type="text" name="address_auto_complete" required class="textbox" id="autocomplete"  placeholder="Enter Your Address" autocomplete="off">
<table width="100%"  id="address">
<tr><td><label class="name" for="" id="">State</label><span>*</span></td></tr>
<tr><td><input class="textbox"  id="administrative_area_level_1" type="text" disabled="true"></td></tr>
<tr><td><label class="name" for="" id="">City</label><span>*</span></td></tr>
<tr><td><input type="text" class="textbox" id="locality" name="restaurantCity"   disabled="true">
</td></tr>
<tr><td><label  class="name" for="" id="">Street</label><span>*</span></td></tr>
<tr><td id="street"><input  type="text" id="route" class="textbox" disabled="true"></td></tr>
<tr>
<td><label  class="name" for="" id="">Number</label><span>*</span></td>
</tr>
<tr><td><input class="textbox" type="text" id="street_number"   disabled="true"></td></tr>

<tr><td><label  class="name" for="" id="">Post Code</label><span>*</span></td></tr>
<tr><td><input class="textbox" type="text" name="RestaurantPostcode" id="postal_code"   disabled="true">
</td></tr>
<tr><td><label  class="name" for="" id="">Country</label><span>*</span></td></tr>
<tr><td><input class="textbox" id="country" type="text" disabled="true"></input>
</td></tr>
<tr>
<td><input type="submit" name="" value="Submit" class="submit_btn" /></td>
</tr>


</table></div>
</form>
</div>
</div>
<div class="clear"></div>
</div>
<div class="clear"></div>
</div>
</body>