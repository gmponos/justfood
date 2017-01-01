<?php 

include("route/config1.php");

mysql_query ("set character_set_results='utf8'"); 



$cate_id=@$_REQUEST['c'];

$qry1=mysql_query("SELECT * FROM `tbl_PostcodeArea` where `cityName` =N'$cate_id'");

if(mysql_num_rows($qry1)>0)

{

?>

<table width="100%" border="0" id="zipcode">

  <tr>

  <td align="center">#</td>

  <td align="center"><label id="">Postcode</label> </td>

    <td align="center"><label id="">Delivery Area</label> </td>

    <td align="center"><label id="">Delivery Charge</label> </td>


    <td align="center"><label id="">Min Order</label> </td>

	 <td align="center"><label id="">Shipping Charge</label> </td>

	
     <td align="center"><label id="">Latitude</label> </td>

	 <td align="center"><label id="">Longitude</label> </td>

  </tr>

   

 <?php 

  $c=1;

while($res1=mysql_fetch_array($qry1))

{

?>

<tr>

 <td><input type="checkbox" name="seleted[]" value="<?php echo $res1['id']; ?>"  style="width:20px;"></td>

   <td><input type="text" name="restaurant_postcode" id="restaurant_postcode" value="<?php echo $res1['postcode'];?>" style="width:80px; " /></td>

	

    <td><input type="text" name="restaurant_delivery_area" id="restaurant_delivery_area" value="<?php echo $res1['delivery_areaName'];?>" style="width:150px; " /></td>

	

    <td><input type="text" name="restaurant_delivery_charge" id="restaurant_delivery_charge" value="<?php echo $res1['delivery_charge'];?>" style="width:80px; " /> </td>

    <td><input type="text" name="restaurant_minimum_order" id="restaurant_minimum_order" value="<?php echo $res1['minimum_order'];?>" style="width:80px; " /></td>

	

	 <td><input type="text" name="restaurant_shipping_charge" id="restaurant_shipping_charge" value="<?php echo $res1['shipping_charge'];?>" style="width:100px; " /></td>

	
     <td><input type="text" name="restaurant_postcodelatitude" id="restaurant_postcodelatitude" value="<?php echo $res1['postcodelatitude'];?>" style="width:100px; " /></td>

 <td><input type="text" name="restaurant_postcodelongitude" id="restaurant_postcodelongitude" value="<?php echo $res1['postcodelongitude'];?>" style="width:100px; " /></td>


	

  </tr>

  <?php 

  $c++;

  } ?>

<?php } else {?>

<tr><td colspan="6"><strong style="color:#FF0000; font-size:16px;">There is no Delivery Area/Postcode</strong></td></tr>

<?php }?>

  

  </table>





