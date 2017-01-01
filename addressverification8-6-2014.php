<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Address Verification</title>
</head>

<body>
<style type="text/css">
body{ font-family:Calibri; font-size:14px; line-height:normal;}
.wrapper{ width:100%; min-height:250px; }
.container{min-width:96%;text-align:left;width:75%;margin:auto;min-height:250px;}
.header{width:99%; height:40px;background:#C03434; color:#FFFFFF; font-weight:700;}
.map_content{width:100%; height:350px; margin-top:10px;}
.note{width:100%; height:30px;}
.form{width:90%; height:320px; float:left; margin-right:5%;}
p.info{line-height:13px; padding:3px 1px 3px 1px; margin:3px 1px;}
h1{font-size:23px; padding:5px 1px 1px 10px;}
.textbox{border: 1px solid #ccc; border-radius: 0;box-shadow: 1px 1px 4px #BBBBBB inset;color: #000000;font-size: 12px;height: 25px;line-height: 28px;margin: 0;width: 67.3%;	padding:5px 1px 2px 7px;}
.dpdn{border: 1px solid #ccc; font-size:15px; border-radius: 0;box-shadow: 1px 1px 4px #BBBBBB inset;color: #000000;font-size: 12px;height: 35px;line-height: 28px;margin: 0;width: 69%;	padding:5px 1px 2px 7px;}
.name{ font-size:18px; margin-bottom:5px;}
.submit_btn{width:20%; height:35px; background:#C03434; border:#C03434; border-radius:3px; color:#FFFFFF; font-size:18px; margin-top:15px;}
.submit_btn:hover{cursor:pointer;}
span{color:#C03434; font-size:18px;}
.clear{clear:both;}
</style>
<div class="wrapper">
<div class="container">

<div class="header">
<h1>Enter Address</h1>

</div>
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
xmlhttp.open("post","cityFetchpopup.php?q="+str,true);
xmlhttp.send();
}


function getOrgTypeListRestARea(str){
//alert(str);
if (str==""){
document.getElementById("RestaurantPostcode").innerHTML="";
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
document.getElementById("RestaurantPostcode").innerHTML=xmlhttp.responseText;
}
}
xmlhttp.open("post","areaFetch.php?q="+str,true);
xmlhttp.send();
}

</script>
<div class="map_content">
<div class="note">
<p class="info">To make sure that this restaurant serves you enter your address.</p>
</div>
<?php
include('config1.php');
mysql_query ("set character_set_results='utf8'"); 
?>
<div class="form">
<form action="restaurantSearchText.php"  method="get" target="_parent">
<input type="hidden" name="restaurant_cuisine" value="<?php echo $_GET['restaurant_cuisine'];?>" />
<table width="100%">
<tr><td><label class="name" for="" id="">State</label><span>*</span></td></tr>
<tr><td>
<select class="dpdn select_box" required  id="restaurantState" name="restaurantState" onchange="return getOrgTypeListRestState(this.value);">
<option value="" selected="selected">Select Your State</option>
 <?php
$fgff=mysql_query("select * from tbl_state where status='0' order by stateName");
while($dffgggf=mysql_fetch_assoc($fgff))
{ ?>
<option value="<?php echo $dffgggf['id']; ?>" <?php if($dffgggf['stateName']==$_GET['restaurantState']){?> selected="selected" <?php } ?> ><?php echo ucwords($dffgggf['stateName']); ?></option>
 <?php } ?>
 
 </select>
</td></tr>

<tr><td><label class="name" for="" id="">City</label><span>*</span></td></tr>
<tr><td>
 <select class="dpdn select_box"  required  id="restaurantCity" name="restaurantCity" onchange="getOrgTypeListRestARea(this.value)">
<option value="" selected="selected">Select Your City</option>
 <?php
 if($_GET['restaurantState']!=''){
$CityQuery=mysql_query("select * from tbl_city where status='0' order by cityName");
while($CityData=mysql_fetch_assoc($CityQuery))
{ ?>
<option value="<?php echo $CityData['cityName']; ?>" <?php if($CityData['cityName']==$_GET['restaurantCity']){?> selected="selected" <?php } ?> ><?php echo ucwords($CityData['cityName']); ?></option>
 <?php } } ?>
 
 </select>
</td></tr>

<tr><td><label class="name" for="" id="">Area</label><span>*</span></td></tr>
<tr><td>
 <select class="dpdn select_box"  required  id="RestaurantPostcode" name="RestaurantPostcode">
<option value="" selected="selected">Select Your Area</option>
 <?php
 if($_GET['restaurantCity']!=''){
$CityQuery=mysql_query("select * from tbl_city where status='0' order by cityName");
while($CityData=mysql_fetch_assoc($CityQuery))
{ ?>
<option value="<?php echo $CityData['cityName']; ?>" <?php if($CityData['cityName']==$_GET['restaurantState']){?> selected="selected" <?php } ?> ><?php echo ucwords($CityData['cityName']); ?></option>
 <?php } } ?>
 
 </select>
</td></tr>
<tr><td><label  class="name" for="" id="">Street</label><span>*</span></td></tr>
<tr><td><input type="text" required name="restaurantStreet" id="restaurantStreet" placeholder="e.g. 64 Lane, Connaught Place" class="textbox" /></td></tr>
<tr>
<td><label  class="name" for="" id="">Number</label><span>*</span></td>
</tr>
<tr><td><input type="text" required name="restaurantStreetNo" id="restaurantStreetNo" placeholder="" class="textbox" /></td></tr>

<tr><td><label  class="name" for="" id="">Post Code</label><span>*</span></td></tr>
<tr><td><input type="text" required name="restaurantStreetPostcode" id="restaurantStreetPostcode" placeholder="" class="textbox" /></td></tr>
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
</body>
</html>
