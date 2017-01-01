<script  type="text/javascript"  language="javascript">
function getzipcodeListRest(str)
{
//alert(str);
if (str=="")
{
  document.getElementById("zipcode").innerHTML="";
  return;
  } 
if(window.XMLHttpRequest)
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
    document.getElementById("zipcode").innerHTML=xmlhttp.responseText;
	//alert(xmlhttp.responseText);
    }
  }
xmlhttp.open("post","deliveryarea.php?c="+str,true);
xmlhttp.send();
}


function getOrgTypeListRestCity(str){
if (str=="")
{
document.getElementById("restaurant_city").innerHTML="There are no city";
return;
} 
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
document.getElementById("restaurant_city").innerHTML=xmlhttp.responseText;
}
}
xmlhttp.open("post","cityFatechRes.php?q="+str,true);
xmlhttp.send();
}
</script>
<table width="100%" border="0">
                          <tr>
                            <td><label for="restaurant_state">Restaurant State <span style="color:#FF0000;">*</span></label></td>
                            <td><select class="chzn-select" data-placeholder="Select State..."  onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);" id="restaurant_state" name="restaurant_state" style="width:317px;"  onChange="getOrgTypeListRestCity(this.value)" >
                                <option value="">Select</option>
                                <?php 
											  
											  $StateQuery = $dbb->showtable("tbl_state","stateName","asc");
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                <option value="<?php echo $StateData['id']; ?>" <?php if($CuisineData['restaurantState']==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['stateName']); ?></option>
                                <?php } ?>
                              </select></td>
                            <td><label for="restaurant_city">Restaurant City <span style="color:#FF0000;">*</span></label></td>
                            <td id="restaurant_city"><select onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"   data-placeholder="Select Restaurant City..." id="restaurant_city" onchange="getzipcodeListRest(this.value);" name="restaurant_city" style="width:317px;">
                                <option value="">Select First State</option>
                                <?php 
											  if($_GET['eid']!=''){
											  $StateQuery = $dbb->showtabledata("tbl_city","stateID",$CuisineData['restaurantState']);
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                <option value="<?php echo $StateData['cityName']; ?>" <?php if($CuisineData['restaurantCity']==$StateData['cityName']){ ?> selected <?php } ?>><?php echo ucwords($StateData['cityName']); ?></option>
                                <?php } ?>
                                <?php } ?>
                              </select></td>
                          </tr>
                          <?php if($_GET['eid']!=''){ ?>
                          <tr>
                          
                          <td colspan="4">
                          
                          <table width="100%" border="0" >
                            <?php 
$qry1=mysql_query("SELECT * FROM `tbl_restaurantDeliveryArea` where `restaurant_id` ='".$_GET['eid']."'");
  $c=1;
  $ipd='';
while($resData1=mysql_fetch_array($qry1))
{
$ipd .=$resData1['delivery_id'].'|';
?>
                            <input type="hidden" name="alreadyID" value="<?php echo rtrim($ipd,'|');?>" />
                            <tr>
                              <td><input type="checkbox" name="seleted1[]" value="<?php echo $c; ?>" checked="checked"  style="width:20px;"></td>
                              <td><input type="text" name="restaurant_postcode1<?php echo $c; ?>" id="restaurant_postcode" value="<?php echo $resData1['restaurant_postcode'];?>" style="width:80px; " /></td>
                              <td><input type="text" name="restaurant_delivery_area1<?php echo $c; ?>" id="restaurant_delivery_area" value="<?php echo $resData1['restaurant_delivery_area'];?>" style="width:150px; " /></td>
                              <td><input type="text" name="restaurant_delivery_charge1<?php echo $c; ?>" id="restaurant_delivery_charge" value="<?php echo $resData1['restaurant_delivery_charge'];?>" style="width:80px; " />
                              </td>
                              <td><input type="text" name="restaurant_minimum_order1<?php echo $c; ?>" id="restaurant_minimum_order" value="<?php echo $resData1['restaurant_minimum_order'];?>" style="width:80px; " /></td>
                              <td><input type="text" name="restaurant_shipping_charge1<?php echo $c; ?>" id="restaurant_shipping_charge" value="<?php echo $resData1['restaurant_shipping_charge'];?>" style="width:100px; " /></td>
                              <td><input type="text" name="restaurant_postcodelatitude1<?php echo $c; ?>" id="restaurant_postcodelatitude" value="<?php echo $resData1['restaurant_postcodelatitude'];?>" style="width:100px; " /></td>
                              <td><input type="text" name="restaurant_postcodelongitude1<?php echo $c; ?>" id="restaurant_postcodelongitude" value="<?php echo $resData1['restaurant_postcodelatitude'];?>" style="width:100px; " /></td>
                            </tr>
                            <?php 
$c++;} ?>
                            </td>
                            
                            </tr>
                            
                          </table>
                          </td>
                          </tr>
                          
                          <?php } ?>
                          <tr>
                            <td colspan="4" id="zipcode"></td>
                          </tr>
                          <tr>
                            <td colspan=""><label for="restaurant_address">Restaurant Address <span style="color:#FF0000;">*</span></label></td>
                            <td colspan="3"><textarea name="restaurant_address" id="restaurant_address" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  style="width:800px; height:80px;"><?php echo $CuisineData['restaurant_address']; ?></textarea>
                            </td>
                          </tr>
                          <tr>
                            <td colspan=""><label for="restaurant_description">Restaurant Description <span style="color:#FF0000;">*</span></label></td>
                            <td colspan="3"><textarea name="restaurant_description" id="restaurant_description" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  class="twys" style="width:800px; height:80px;"><?php echo $CuisineData['restaurant_description']; ?></textarea>
                            </td>
                          </tr>
                          <?php /*?> <tr>
    <td><label for="restaurant_LatitudePoint">Latitude Point </label></td>
    <td><input id="restaurant_LatitudePoint"  name="restaurant_LatitudePoint" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  value="<?php echo $CuisineData['restaurant_LatitudePoint']; ?>" type="text"  style="width:300px;" /></td>
    <td><label for="restaurant_LongitudePoint">Longitude Point</label></td>
    <td><input id="restaurant_LongitudePoint"  name="restaurant_LongitudePoint" onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  value="<?php echo $CuisineData['restaurant_LongitudePoint']; ?>" type="text"  style="width:300px;" /></td>
  </tr><?php */?>
                          <?php /*?> <tr style="display: none;">
    <td><label for="restaurant_deliveryDistance">Delivery Distance (miles) </label></td>
    <td><input id="restaurant_deliveryDistance"  name="restaurant_deliveryDistance" value="<?php echo $CuisineData['restaurant_deliveryDistance']; ?>" type="text"  style="width:300px;" /></td>
    <td><label for="restaurant_FaxGateway">Fax Gateway</label></td>
    <td><input id="restaurant_FaxGateway"  name="restaurant_FaxGateway" value="<?php echo $CuisineData['restaurant_FaxGateway']; ?>" type="text"  style="width:300px;" /></td>
  </tr><?php */?>
  <tr>
  <td colspan="4" align="center">
    <a href="" data-toggle="tab" id="checkaddressdata" class="btn btn-primary" onclick="return RestaurantValidateLocation();">Next</a>
  <a href="#astep3" data-toggle="tab"  id="checkaddressdata1" style="display:none;" class="btn btn-primary" onclick="return RestaurantValidateLocation();">Next</a>
<!--   <a href="#astep3" data-toggle="tab" class="btn btn-primary" onclick="return RestaurantValidateLocation();">Next</a>-->
  <!--<input type="button" class="btn btn-primary" onclick="return RestaurantValidate();" value="Next" />--></td>
  </tr>
                        </table>
