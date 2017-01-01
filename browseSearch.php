<script type="text/javascript">
function getOrgTypeListRestState(str){
//alert(str);
if (str==""){
document.getElementById("restaurantCity").innerHTML="";
return;} 
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
if (xmlhttp.readyState==4 && xmlhttp.status==200){
document.getElementById("restaurantCity").innerHTML=xmlhttp.responseText;
}
}
xmlhttp.open("post","cityFatech.php?q="+str,true);
xmlhttp.send();
}</script>
<div class="rightsearch">
        <h1><?php echo ucwords($TableLanguage['SearchPanelText']);?></h1>
        
        <form id="" action="restaurantSearchText.php"  method="get" >
        <div class="area">
<select class="text_box select_box" required style="border: 1px solid #ccc;border-radius: 4px;color: #000000; background:#FFFFFF;" id="restaurantState" name="restaurantState" onchange="return getOrgTypeListRestState(this.value);">
<option value="" selected="selected"><?php echo ucwords($TableLanguage['SelectStateText']);?></option>
 <?php
$fgff=mysql_query("select * from tbl_state where status='0' order by stateName");
while($dffgggf=mysql_fetch_assoc($fgff))
{ ?>
<option value="<?php echo $dffgggf['id']; ?>" <?php if($dffgggf['stateName']==$_GET['restaurantState']){?> selected="selected" <?php } ?> ><?php echo ucwords($dffgggf['stateName']); ?></option>
 <?php } ?>
 
 </select>
        </div>
         <div class="area">
        <select class="text_box select_box" required style="border: 1px solid #ccc;border-radius: 4px;color: #000000; background:#FFFFFF;" id="restaurantCity" name="restaurantCity">
<option value="" selected="selected"><?php echo ucwords($TableLanguage['SelectCityText']);?></option>
 <?php
 if($_GET['restaurantState']!=''){
$CityQuery=mysql_query("select * from tbl_city where status='0' order by cityName");
while($CityData=mysql_fetch_assoc($CityQuery))
{ ?>
<option value="<?php echo $CityData['cityName']; ?>" <?php if($CityData['cityName']==$_GET['restaurantState']){?> selected="selected" <?php } ?> ><?php echo ucwords($CityData['cityName']); ?></option>
 <?php } } ?>
 
 </select>
        </div>
         <div class="area">
           <select class="text_box select_box" style="border: 1px solid #ccc;border-radius: 4px;color: #000000; background:#FFFFFF;" id="restaurant_cuisine" name="restaurant_cuisine">
<option value="" selected="selected"><?php echo ucwords($TableLanguage['SelectCuisineText']);?></option>
 <?php
$CuisineQuery=mysql_query("select * from tbl_cuisine where status='0' order by RestaurantCuisineName");
while($CuisineData=mysql_fetch_assoc($CuisineQuery))
{ ?>
<option value="<?php echo $CuisineData['RestaurantCuisineName']; ?>" <?php if($CuisineData['RestaurantCuisineName']==$_GET['restaurant_cuisine']){?> selected="selected" <?php } ?> ><?php echo ucwords($CuisineData['RestaurantCuisineName']); ?></option>
 <?php } ?>
 
 </select>
       <!--  <input type="text" placeholder=" Enter Your Cuisine " / >-->
        </div>
         <div class="area">
         <input type="submit" value="<?php echo ucwords($TableLanguage['FindNowButton']);?>" id="bigbutton" />
        </div>
        </form>
      </div>