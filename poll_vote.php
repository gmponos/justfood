<style type="text/css">
.wrappereee{ width:100%; min-height:470px; }
.containersss{min-width:100%;text-align:left;width:75%;margin:auto;min-height:470px;}
.headerrrr{width:100%; height:40px;background:#C03434; color:#FFFFFF; font-weight:700;}
.map_content{width:100%; height:410px; margin-top:10px; }
.note{width:100%; height:50px;}
.map{width:43%; height:350px; float:left; margin-left:3%;}
.form{width:45%; height:350px; float:right; margin-right:5%;}
p.info{line-height:13px; padding:3px 1px 3px 30px; margin:3px 1px; color:#000000;}
.headerrrr h1{font-size:23px; padding:5px 1px 1px 10px; float:left; margin: 0.5% 0 0 1%!important; }
.textbox{border: 1px solid #ccc; border-radius: 0;box-shadow: 1px 1px 4px #BBBBBB inset;color: #000000;font-size: 12px;height: 25px;line-height: 28px;margin: 0;width: 67.3%;	padding:5px 1px 2px 7px;}
.dpdn{border: 1px solid #ccc; font-size:15px; border-radius: 0;box-shadow: 1px 1px 4px #BBBBBB inset;color: #000000;font-size: 12px;height: 35px;line-height: 28px;margin:5px 0px 0px 5px; width: 97%;	padding:5px 1px 2px 7px;}
.name{ font-size:18px; margin-bottom:5px;}
.submit_btn{width:30%; height:35px; background:#C03434; border:#C03434; border-radius:3px; color:#FFFFFF; font-size:18px; margin-top:15px;}
.submit_btn:hover{cursor:pointer;}
.clear{clear:both;}
#popcloseimg{float:right; width:20px; height:20px; margin-top:10px; margin-right:10px;}
#popcloseimg:hover{cursor:pointer;}
</style>

<?php 
//Call the json API URL
$address = $_GET['vote'];
$address = urlencode($address);
$url = "http://maps.googleapis.com/maps/api/geocode/json?address=".$address."&sensor=true";
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

function parse_address_google($address) { 
    $url = 'http://maps.googleapis.com/maps/api/geocode/json?sensor=false&address='.urlencode($address); 
    $results = json_decode(file_get_contents($url),1); 
    //die('<pre>'.print_r($results,true)); 
  
    $parts = array( 
      'address'=>array('street_number','route'), 
	  'streetNo'=>array('street_number'), 
      'city'=>array('locality'), 
	   'city'=>array('political'), 
	   'country'=>array('country'),
	    'latitude'=>array('lat'),
		 'longitude'=>array('lng'), 
      'state'=>array('administrative_area_level_1'), 
      'zip'=>array('postal_code'), 
    ); 
    if (!empty($results['results'][0]['address_components'])) { 
      $ac = $results['results'][0]['address_components']; 
      foreach($parts as $need=>&$types) { 
        foreach($ac as &$a) { 
          if (in_array($a['types'][0],$types)) $address_out[$need] = $a['long_name']; 
          elseif (empty($address_out[$need])) $address_out[$need] = ''; 
        } 
      } 
    } else echo ''; 
    return $address_out; 
  } 
 $plk=parse_address_google($address);

 $streeAddress=$plk['address'];
 $streeAddressNo=$plk['streetNo'];
 $streeAddressCity=$plk['city'];
$streeAddressState=$plk['state']; 
$streeAddressCountry=$plk['country'];
$streeAddressZip=$plk['zip']; 
$latitude=$geo_json['results'][0]['geometry']['location']['lat'];
$longitude=$geo_json['results'][0]['geometry']['location']['lng'];
  
  
 ?>
<div class="wrappereee">
<div class="containersss">

<div class="headerrrr">

<h1>Your Address</h1><a href="index.php" ><img class="close" id="popcloseimg" src="images/popupclose.png" /></a>
</div>
<div class="map_content">
<div class="note">
<p class="info">Please verify that your address is correctly displayed on the map.</p>
<p class="info">Otherwise drag with your mouse to point at the right spot of the map</p>
</div>
<div class="map">


<iframe width='350' height='340' frameborder='0' scrolling='no'  marginheight='0' marginwidth='0'   src='https://maps.google.com/maps?&amp;q="<?php echo $_GET['vote'];?>"&amp;output=embed'></iframe>
</div>
<div class="form">
<form action="restaurantSearchText.php"  method="get">
<input type="hidden" name="latitude" value="<?php echo $latitude;?>">
<input type="hidden" name="longitude" value="<?php echo $longitude;?>">
<input type="hidden" name="AddressSearch" value="<?php echo $address;?>">

<table width="100%">
<tr><td><label class="name" for="" id="">State</label><span>*</span></td></tr>
<tr><td>
<?php 
include('config1.php');
mysql_query ("set character_set_results='utf8'"); 
$COuntryDAt=mysql_fetch_assoc(mysql_query("select * from tbl_country where countryName=N'".$streeAddressCountry."'"));
$StateQuery=mysql_query("select * from tbl_state where countryID='".$COuntryDAt['id']."'");
?>
<select id="restaurantState" name="restaurantState" class="dpdn">
<?php if($streeAddressState!=''){ ?>
<option value="<?php echo $streeAddressState;?>"><?php echo $streeAddressState;?></option>
<?php } else { ?>
<option value="">Select State</option>
<?php } ?>
<?php 

while($stateData=mysql_fetch_assoc($StateQuery)){
?>
<option value="<?php echo $stateData['stateName'];?>" <?php if($stateData['stateName']==$streeAddressState){ ?> selected <?php } ?>><?php echo $stateData['stateName'];?></option>
<?php } ?>
</select>
</td></tr>
<tr><td><label class="name" for="" id="">City</label><span>*</span></td></tr>
<tr><td>
<select id="restaurantCity" name="restaurantCity" class="dpdn">
<?php if($streeAddressCity!=''){ ?>
<option value="<?php echo $streeAddressCity;?>"><?php echo $streeAddressCity;?></option>
<?php } else { ?>
<option value="">Select city</option>
<?php } ?>
</select>
</td></tr>
<tr><td><label  class="name" for="" id="">Street</label><span>*</span></td></tr>
<tr><td id="street"><input type="text" name="StreeAddressSearch" value="<?php echo $streeAddress; ?>" id="AddressSearch" required placeholder="e.g. 64 Lane, Connaught Place" class="textbox" /></td></tr>
<tr>
<td><label  class="name" for="" id="">Number</label><span>*</span></td>
</tr>
<tr><td><input type="text" name="StreetNo" id="StreetNo" value="<?php echo $streeAddressNo; ?>" placeholder="" required class="textbox" /></td></tr>

<tr><td><label  class="name" for="" id="">Post Code</label><span>*</span></td></tr>
<tr><td><input type="text" name="RestaurantPostcode" id="RestaurantPostcode" value="<?php echo $streeAddressZip; ?>" placeholder="" required class="textbox" /></td></tr>
<tr>
<td><input type="submit" name="" value="Submit" class="submit_btn" /></td>
</tr>


</table>
</form>
</div>
</div>
<div class="clear"></div>
</div>
<div class="clear"></div>
</div>
