<?php
include('route/DB_Functions.php');
include('route/pagination.php');
$dbb = new DB_Functions();
mysql_query ("set character_set_results='utf8'"); 
if($_GET['eid']!='')
{
 $CuisineQuery = $dbb->showtabledata("tbl_restaurantMenuItem","id",$_GET['eid']);
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
}
 $MainMenuSingleData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItem where id='".$_GET['menuID']."' and RestaurantPizzaID='".$_GET['restaurantID']."' "));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style type="text/css">
.cartwrapper
{
width:100%; min-height:900px; margin:auto;
}
.cartcontainer
{
width:70%; min-height:1000px; margin:auto; margin-top:5%;
}
.cartheader
{
width:100%; height:45px; border-bottom:1px solid #ccc; background:#DB1010; color:#FFFFFF;
}
.cartcontent
{
width:98%; min-height:900px; padding:1%; margin-bottom:20px;
}
.cart_main
{
width:100%; min-height:650px; margin-bottom:10px;
}
.checkboxcontent
{
width:100%; min-height:250px; box-shadow:1px 1px 1px 2px #999; margin-top:5px; padding-top:10px; padding-left:10px;
}
.cartcontainer p
{
font-weight:bold;
}
.cartcontainer span
{
color:#DB1010;
}
.cartcontainer .rowcontent
{
width:98%; margin:1%; min-height:65px; margin-bottom:10px;
}
.cartcontainer .third
{
width:33%; min-height:25px;float:left;
}
.cartcontainer .left
{
width:70%; height:100%; float:left; 
}
.cartcontainer .radiobox
{
width:13%; height:20px; text-align:center; float:left;
}
.cartcontainer .recipe
{
width:85%; min-height:20px; float:left;
}
.cartcontainer .right
{
width:30%; height:100%; float:right;
}
.third_devide
{
width:100%; min-height:20px;padding-top:2%;
}
.cartcontainer .clear
{
clear:both;
}
.cartcontainer .txt_box
{
width:70%;
border:1px solid #CCC;
}
.cartcontainer .txt_box:focus
{

border-color:#f8a71e;
outline:0;
-webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(249,81,8,.6);
box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(249,81,8,.6)
}
.cartcontainer .submit
{
padding:2% 5%;
background:#CE0606;
color:#fff;
text-decoration:none;
border:1px solid #CE0606; 
border-radius:5px;
margin-top:15px;
}
.cartcontainer .submit:hover
{
background:#FA3800;
}

</style>
<script language="javascript">
function toggle() {
    var ele = document.getElementById("toggleText");
    var text = document.getElementById("displayText");
    if(ele.style.display == "block") {
            ele.style.display = "none";
        text.innerHTML = "Add materials  +";
      }
    else {
        ele.style.display = "block";
        text.innerHTML = "Add materials  -";
    }
}
</script>
<script>
function loadXMLDoc(str,mainmenuId,restaurantId)
{

    var xmlhttp;
    xmlhttp=new XMLHttpRequest();

    xmlhttp.onreadystatechange=function()
      {
      if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
        document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
		
        }
    }
    xmlhttp.open("GET","ajaxData.php?size="+str+"&menuID="+mainmenuId+"&restaurantID="+restaurantId,true);
    xmlhttp.send();
}
function getdoughValueAjax(str,mainmenuId,restaurantId,menusizeID)
{

    var xmlhttp;
    xmlhttp=new XMLHttpRequest();

    xmlhttp.onreadystatechange=function()
      {
      if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
        document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","ajaxData.php?dough="+str+"&menuID="+mainmenuId+"&restaurantID="+restaurantId+"&size="+menusizeID,true);
    xmlhttp.send();
}


function getBaseValueAjax(str,mainmenuId,restaurantId,menusizeID,menudoughID)
{

    var xmlhttp;
    xmlhttp=new XMLHttpRequest();

    xmlhttp.onreadystatechange=function()
      {
      if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
        document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","ajaxData.php?base="+str+"&menuID="+mainmenuId+"&restaurantID="+restaurantId+"&size="+menusizeID+"&dough="+menudoughID,true);
    xmlhttp.send();
}


function getCheesValueAjax(str,mainmenuId,restaurantId,menusizeID,menudoughID,menubaseID)
{

    var xmlhttp;
    xmlhttp=new XMLHttpRequest();

    xmlhttp.onreadystatechange=function()
      {
      if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
        document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","ajaxData.php?chees="+str+"&menuID="+mainmenuId+"&restaurantID="+restaurantId+"&size="+menusizeID+"&dough="+menudoughID+"&base="+menubaseID,true);
    xmlhttp.send();
}



function getExtarValueAjax(str,mainmenuId,restaurantId,menusizeID,menudoughID,menubaseID,menucheesID,numb)
{

    var xmlhttp;
    xmlhttp=new XMLHttpRequest();

    xmlhttp.onreadystatechange=function()
      {
      if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
        document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","ajaxData.php?checkboxid="+str+"&menuID="+mainmenuId+"&restaurantID="+restaurantId+"&size="+menusizeID+"&dough="+menudoughID+"&base="+menubaseID+"&chees="+menucheesID+"&numValue="+numb,true);
    xmlhttp.send();
}
</script>

<style type="text/css">

</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add to Cart</title>
</head>
<body>
<div class="cartwrapper">
<div class="cartcontainer">
<div class="cartheader">
<h2 style="padding:5px 1px 1px 3px;" >Add to Cart</h2></div>
<div class="cartcontent" id="myDiv">
<h2><?php echo $MainMenuSingleData['RestaurantPizzaItemName']; ?> <span id="PriceChange" style="float:right;"><?php echo number_format($MainMenuSingleData['RestaurantPizzaItemPrice'],2); ?></span></h2>
<!--<img src="images/offers.png" />-->
<div class="cart_main">
<p>Select size<span>(*mandatory field)</span></p>
<form name="" action="" method="get">
<table width="100%" border="0">
  <tr>
    <td><div class="rowcontent">
  <div class="radio">   
  <?php 
  $SizeQuery=mysql_query("select * from tbl_restaurantMainMenuItemSize where SizeRestaurantMenuItemID='".$_GET['menuID']."'");
  while($MainMenuSizeData=mysql_fetch_assoc($SizeQuery)){
  ?>        
<div class="third">
<div class="left"><input id="<?php echo $count;?>" type="radio" name="a" onclick="loadXMLDoc('<?php echo $MainMenuSizeData['id']?>','<?php echo $_GET['menuID'];?>','<?php echo $_GET['restaurantID'];?>')" value=""><label for="<?php echo $count;?>"><?php echo $MainMenuSizeData['SizeMenuName']; ?></label>
<!--<div class="radiobox"><input type="radio" name="1" id="" /></div><div class="recipe">Chick</div>--></div>
<div class="right"><?php echo number_format($MainMenuSizeData['SizeMenuPrice'],2); ?> &euro;</div>
 </div>
<?php 
$count++;
} ?>

</div>
</div></td>
  </tr>
  <tr >
    <td><p>Select Dough <span>(*mandatory field)</span></p>
<div class="rowcontent">
<div class="radio">
<?php 
 $i=13;
  $ploDough=mysql_query("select * from tbl_restaurantMainMenuItemdough where menuitemID='".$_GET['menuID']."'");
   while($MainMenuOPtion1Data=mysql_fetch_assoc($ploDough)){
  ?>
<div class="third">
<div class="left"><input id="<?php echo $i;?>" type="radio"  name="doughValue" onclick="getdoughValueAjax('<?php echo $MainMenuOPtion1Data['id']?>','<?php echo $_GET['menuID'];?>','<?php echo $_GET['restaurantID'];?>','<?php echo $MainMenuOPtion1Data['menuSizeID'];?>')" value=""><label for="<?php echo $i;?>"><?php echo $MainMenuOPtion1Data['menuDoughName']; ?></label></div>
<div class="right"><?php echo number_format($MainMenuOPtion1Data['menuDoughPrice'],2); ?> &euro;</div></div>
<?php 
$i++;
}
 ?>

</div>
</div>
</td>
  </tr>
  
  
  
  <tr id="option2data">
    <td><p>Select Base <span>(*mandatory field)</span></p>
<div class="rowcontent">
<div class="radio">
<?php 
 
  $ploDough=mysql_query("select * from tbl_restaurantMainMenuItemPizzaBase where menuitemID='".$_GET['menuID']."'");
   while($MainMenuOPtion1Data=mysql_fetch_assoc($ploDough)){
  ?>
<div class="third">
<div class="left"><input id="<?php echo $i;?>" type="radio" name="base" onclick="getBaseValueAjax('<?php echo $MainMenuOPtion1Data['id']?>','<?php echo $_GET['menuID'];?>','<?php echo $_GET['restaurantID'];?>','<?php echo $MainMenuOPtion1Data['menuSizeID'];?>','<?php echo $MainMenuOPtion1Data['menudoughID'];?>')"   value=""><label for="<?php echo $i;?>"><?php echo $MainMenuOPtion1Data['menuBaseName']; ?></label></div>
<div class="right"><?php echo number_format($MainMenuOPtion1Data['menuBasePrice'],2); ?> &euro;</div></div>
<?php 
$i++;
}
 ?>

</div>
</div>
</td>
  </tr>
  
  
  <tr>
    <td><p>Select Chees <span>(*mandatory field)</span></p>
<div class="rowcontent">
<div class="radio">
<?php 
 
  $ploDough=mysql_query("select * from tbl_restaurantMainMenuItemPizzaChees where menuitemID='".$_GET['menuID']."'");
   while($MainMenuOPtion1Data=mysql_fetch_assoc($ploDough)){
  ?>
<div class="third">
<div class="left"><input id="<?php echo $i;?>" type="radio"  onclick="getCheesValueAjax('<?php echo $MainMenuOPtion1Data['id']?>','<?php echo $_GET['menuID'];?>','<?php echo $_GET['restaurantID'];?>','<?php echo $MainMenuOPtion1Data['menuSizeID'];?>','<?php echo $MainMenuOPtion1Data['menudoughID'];?>','<?php echo $MainMenuOPtion1Data['menubasedID'];?>')"  name="chees" value=""><label for="<?php echo $i;?>"><?php echo $MainMenuOPtion1Data['menuCheesName']; ?></label></div>
<div class="right"><?php echo number_format($MainMenuOPtion1Data['menuCheesPrice'],2); ?> &euro;</div></div>
<?php 
$i++;
}
 ?>

</div>
</div>
</td>
  </tr>
  <tr><td colspan="2">
  <table width="100%" style="height:300px; overflow:scroll;">
   <tr>
    <td><p>Choose Materials <span>(*mandatory field)</span></p>
<div class="rowcontent">
<div class="radio">
<table width="100%" cellpadding="2" cellspacing="2" style="height:300px; overflow:scroll;">
  <tr>
<?php 
 $c=1;
  $ExtraploDough=mysql_query("select * from tbl_restaurantMainMenuItemPizzaExtraitem where menuitemID='".$_GET['menuID']."' group by menuExtraName");
   while($ExtraMainMenuOPtion1Data=mysql_fetch_assoc($ExtraploDough)){
  ?>

    <td><div style="float:left;">
        <div style="width:30px; height:30px; float:left;">
        <div style="width:30px; height:10px; margin-bottom:5px; font-size:11px;">1X</div>
        <div style="width:30px; height:15px;font-size:11px;">
            <input type="checkbox" <?php if($_GET['numValue']==1 && $AjaxExtraMainMenuOPtion1Data['id']==$_GET['checkboxid']){ ?> checked="checked"<?php }?> onclick="getExtarValueAjax('<?php echo $AjaxExtraMainMenuOPtion1Data['id']?>','<?php echo $_GET['menuID'];?>','<?php echo $_GET['restaurantID'];?>','<?php echo $_GET['size'];?>','<?php echo $_GET['dough'];?>','<?php echo $_GET['base'];?>','<?php echo $_GET['chees'];?>','1')" />
        </div>
      </div>
      <div style="width:30px; height:30px; float:left;">
        <div style="width:30px; height:10px; margin-bottom:5px;font-size:11px;">2X</div>
        <div style="width:30px; height:15px;font-size:11px;">
          <input type="checkbox" <?php if($_GET['numValue']==2 && $AjaxExtraMainMenuOPtion1Data['menuExtraPrice']==$_GET['checkboxid']){ ?> checked="checked"<?php }?> onclick="getExtarValueAjax('<?php echo $AjaxExtraMainMenuOPtion1Data['id']?>','<?php echo $_GET['menuID'];?>','<?php echo $_GET['restaurantID'];?>','<?php echo $_GET['size'];?>','<?php echo $_GET['dough'];?>','<?php echo $_GET['base'];?>','<?php echo $_GET['chees'];?>','2')" />
        </div>
      </div>
    <div style="margin-top:10px; float:left;"><?php echo $ExtraMainMenuOPtion1Data['menuExtraName'];?>  &nbsp;(<?php echo number_format($ExtraMainMenuOPtion1Data['menuExtraPrice'],2)?> &euro;)</div>
      </div>
      
    
      
      </td>
      <td></td>
 
  <?php if($c==3) { echo "</td></tr><tr><td></td></tr>"; $c= 0; } ?>  
 <?php $c++;}?> 
 
 
 </tr>
</table>
</div>
</div>
</td>
  </tr>
  </table>
  
  </td></tr>
   <tr><td colspan="2"><input type="text" name="Quanities" value="1" /></td></tr>
   <tr><td colspan="2">&nbsp;</td></tr>
    <tr><td colspan="2"><textarea style="width:600px; height:80px;" name="SpecialInstruction"></textarea></td></tr>
     <tr><td colspan="2">&nbsp;</td></tr>
</table>
<input type="submit" name="" value="Add to Cart" class="submit" />


</form>
</div>

</div>
</div>
</div>

</body>
</html>
