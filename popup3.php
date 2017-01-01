<?php
ob_start();
session_start();
include('route/functions.php');
$db= new User();
include('config1.php');
mysql_query ("set character_set_results='utf8'");
$AdminDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_siteSetting order by id asc"));

if($_GET['restaurants']!='')
{
$_GET['restaurants']=$_GET['restaurants'];
} 
else
{
$resdata=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantAdd where id='".$_GET['restaurantID']."'"));
$_GET['restaurants']=$resdata['id'].'-'.$resdata['restaurantCity'].'-'.$resdata['restaurant_name'].'.html';
}
$MainMenuSingleData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItem where id='".$_GET['menuID']."' and RestaurantPizzaID='".$_GET['restaurantID']."' "));
$menuDoughTitle=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemdough where menuitemID='".$_GET['menuID']."' and SizeRestaurantPizzaID='".$_GET['restaurantID']."' "));
$menuBaseTitle=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemPizzaBase where menuitemID='".$_GET['menuID']."' and SizeRestaurantPizzaID='".$_GET['restaurantID']."' "));

$menuCheesTitle=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemPizzaChees where menuitemID='".$_GET['menuID']."' and SizeRestaurantPizzaID='".$_GET['restaurantID']."' "));

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta charset="utf-8">
<head>
<style type="text/css">
.cartwrapper
{
width:100%;margin:auto;
color:#808080;
-webkit-border-radius: 8px;
-moz-border-radius: 8px;
border-radius: 8px;
border-color: rgba(0, 0, 0, 0.8);
box-shadow: 0 1px 1px rgba(0, 0, 0, 0.75) inset, 0 0 8px rgba(0, 0, 0, 0.75);
outline: 0 none;
background:#fff;
font-size:13px;
font-family: Calibri;
background:#FFFFFF;
}
.cartcontainer{width:94%; margin:auto; padding-bottom:10px;}
.cartheader{width:100%; height:36px; border-bottom:1px solid #ccc; background:#f25804; color:#FFFFFF;border-radius: 5px 5px 0 0; margin-bottom:7px;
}
.cartcontent{}
.cartcontainer h2{font-size:20px;font-weight:bold;font-family: Calibri;margin:0px;}
.cart_main{width:100%; margin-bottom:10px;}
.checkboxcontent{width:100%; box-shadow:1px 1px 1px 2px #999; margin-top:5px; padding-top:10px; padding-left:10px;}
.cartcontainer p{font-weight:bold;margin:2px;}
.cartcontainer span{color:#f25804;}
.cartcontainer .rowcontent{width:100%;min-height:25px;background:#f7f9f9;padding:3px 0px 3px 0px;}
.cartcontainer .third{width:33%; min-height:25px;float:left; height:20px;}
.cartcontainer .left{width:75%;  float:left; text-align:left; margin-left:-5px; border:none;}
.cartcontainer .left lable{font-size:13px; font-family:Calibri; font-weight:bold;}
.cartcontainer .radiobox{width:13%; height:20px; text-align:center; float:left;}
.cartcontainer .recipe{width:85%; min-height:20px; float:left;}
.cartcontainer .right{width:25%;  float:right; text-align:right;}
.third_devide{width:100%; min-height:20px;padding-top:2%;}
.cartcontainer .clear{clear:both;}
.cartcontainer .txt_box{width:70%;border:1px solid #CCC;}
.cartcontainer .txt_box:focus{
border-color:#f8a71e;
outline:0;
-webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(249,81,8,.6);
box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(249,81,8,.6)
}
.cartcontainer .submit{
padding:2% 5%;
background:#f25804;
color:#fff;
text-decoration:none;
border:1px solid #f25804; 
border-radius:5px;
margin-top:15px;
}
.cartcontainer .submit:hover{background:#FA3800;cursor:pointer;}
.clear{clear:both;}
.qty {    width: 40px;    height: 20px;    text-align: center;}
input.qtyplus {width:25px;height: 25px;background: #009900;color: #FFFFFF;border: 0 none;font-size: 18px;cursor: pointer;
-webkit-border-radius: 5px;border-radius: 5px;}
input.qtyminus {  width: 25px;height: 25px;background:#C60000;color: #FFFFFF;border: 0 none;font-size: 18px;cursor: pointer;
-webkit-border-radius: 5px;border-radius: 5px;}
.cartheader h2{padding: 2px 1px 1px 10px; float:left; margin:3px;}
.cartheader img{float:right; margin:5px; width:25px; height:25px;}
.cartheader img:hover{cursor:pointer;}
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
function loadXMLDoc(str,mainmenuId,restaurantId,PriceBalance)
{
 var PriceBalance1= document.getElementById("quantity").value;
    var xmlhttp;
	
    xmlhttp=new XMLHttpRequest();

    xmlhttp.onreadystatechange=function()
      {
      if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
        document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
		
        }
    }
    xmlhttp.open("GET","ajaxData.php?size="+str+"&menuID="+mainmenuId+"&restaurantID="+restaurantId+"&PriceBalance="+PriceBalance1,true);
    xmlhttp.send();
}
function getdoughValueAjax(str,mainmenuId,restaurantId,menusizeID,PriceBalance)
{
 var PriceBalance1= document.getElementById("quantity").value;
    var xmlhttp;
    xmlhttp=new XMLHttpRequest();

    xmlhttp.onreadystatechange=function()
      {
      if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
        document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","ajaxData.php?dough="+str+"&menuID="+mainmenuId+"&restaurantID="+restaurantId+"&size="+menusizeID+"&PriceBalance="+PriceBalance1,true);
    xmlhttp.send();
}


function getBaseValueAjax(str,mainmenuId,restaurantId,menusizeID,menudoughID,PriceBalance)
{
 var PriceBalance1= document.getElementById("quantity").value;
    var xmlhttp;
    xmlhttp=new XMLHttpRequest();

    xmlhttp.onreadystatechange=function()
      {
      if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
        document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","ajaxData.php?base="+str+"&menuID="+mainmenuId+"&restaurantID="+restaurantId+"&size="+menusizeID+"&dough="+menudoughID+"&PriceBalance="+PriceBalance1,true);
    xmlhttp.send();
}


function getCheesValueAjax(str,mainmenuId,restaurantId,menusizeID,menudoughID,menubaseID,PriceBalance)
{
 var PriceBalance1= document.getElementById("quantity").value;
    var xmlhttp;
    xmlhttp=new XMLHttpRequest();

    xmlhttp.onreadystatechange=function()
      {
      if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
        document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","ajaxData.php?chees="+str+"&menuID="+mainmenuId+"&restaurantID="+restaurantId+"&size="+menusizeID+"&dough="+menudoughID+"&base="+menubaseID+"&PriceBalance="+PriceBalance1,true);
    xmlhttp.send();
}



function getExtarValueAjax(str,mainmenuId,restaurantId,menusizeID,menudoughID,menubaseID,menucheesID,numb,PriceBalance)
{
//alert(numb);
 var PriceBalance1= document.getElementById("quantity").value;
    var xmlhttp;
    xmlhttp=new XMLHttpRequest();

    xmlhttp.onreadystatechange=function()
      {
      if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
        document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","ajaxData.php?checkboxid="+str+"&menuID="+mainmenuId+"&restaurantID="+restaurantId+"&size="+menusizeID+"&dough="+menudoughID+"&base="+menubaseID+"&chees="+menucheesID+"&numValue="+numb+"&PriceBalance="+PriceBalance1,true);
    xmlhttp.send();
}


function getExtarValueAjax1(str,mainmenuId,restaurantId,menusizeID,menudoughID,menubaseID,menucheesID,numb,selection,PriceBalance)
{
//alert(selection);
 var PriceBalance1= document.getElementById("quantity").value;
    var xmlhttp;
    xmlhttp=new XMLHttpRequest();

    xmlhttp.onreadystatechange=function()
      {
      if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
        document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","ajaxData.php?checkboxid1="+str+"&menuID="+mainmenuId+"&restaurantID="+restaurantId+"&size="+menusizeID+"&dough="+menudoughID+"&base="+menubaseID+"&chees="+menucheesID+"&numValue1="+numb+"&selectiona="+selection+"&PriceBalance="+PriceBalance1,true);
    xmlhttp.send();
}



function getExtarValueAjaxPrcie(str,mainmenuId,restaurantId,menusizeID,menudoughID,menubaseID,menucheesID,checkboxid1,checkboxid11)
{
//alert(selection);
    var xmlhttp;
    xmlhttp=new XMLHttpRequest();

    xmlhttp.onreadystatechange=function()
      {
      if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
        document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","ajaxData.php?PriceBalance="+str+"&menuID="+mainmenuId+"&restaurantID="+restaurantId+"&size="+menusizeID+"&dough="+menudoughID+"&base="+menubaseID+"&chees="+menucheesID+"&checkboxid="+checkboxid1+"&checkboxid1="+checkboxid11,true);
    xmlhttp.send();
}

</script>
<script type='text/javascript' src='http://code.jquery.com/jquery-1.9.1.js'></script>
<script type="text/javascript">
jQuery(document).ready(function(){
    // This button will increment the value
    $('.qtyplus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If is not undefined
        if (!isNaN(currentVal)) {
            // Increment
            $('input[name='+fieldName+']').val(currentVal + 1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(1);
        }
    });
    // This button will decrement the value till 0
    $(".qtyminus").click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 1) {
            // Decrement one
            $('input[name='+fieldName+']').val(currentVal - 1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(1);
        }
    });
});

</script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add to Cart</title>
</head>
<body>
<div class="cartwrapper">
<div class="cartheader">
<h2>Add to Cart</h2><a href="restaurant.php?restaurants=<?php echo urlencode(trim($_GET['restaurants'])); ?>" target="_parent" onclick="return confirm('Are sure to close product item !')"><img src="images/popupclose.png" /></a></div>
<div class="cartcontainer">

<div class="cartcontent" id="myDiv">
<table width="100%">
  <tr>
    <td><h2><?php echo $MainMenuSingleData['RestaurantPizzaItemName']; ?> <span id="PriceChange" style="float:right;"><?php echo $AdminDataLoginVal['website_CurrencySymbole']; ?> <?php 
								if($MainMenuSingleData['RestaurantPizzaItemPrice']!=''){
								echo number_format($MainMenuSingleData['RestaurantPizzaItemPrice'],2);
								}
								else
								{
								echo '0.00';
								}
								?>
</span></h2></td>
   
  </tr>
  <tr>
    <td><?php if($MainMenuSingleData['ResPizzaImg']!=''){ ?>
<img style="float:left;" src="control/MenuItemImg/MenuItemImgSmall/<?php echo $MainMenuSingleData['ResPizzaImg'];?>" width="50" height="40" />
<div style="margin-left:10px; min-height:40px; float:left;"><?php echo $MainMenuSingleData['ResPizzaDescription'];?></div>
<?php } else {?>
<div style="width:100%; min-height:30px; float:left;"><?php echo $MainMenuSingleData['ResPizzaDescription'];?></div>
   <?php } ?> 
   </td>
  </tr>
  
  <tr>
    <td><?php 
$Sizenumrows=mysql_num_rows(mysql_query("select * from tbl_restaurantMainMenuItemSize where SizeRestaurantMenuItemID='".$_GET['menuID']."'"));
if($Sizenumrows>0){
?>

<?php if($MainMenuSingleData['sizeTitle']!=''){ ?>
<p><?php echo ucwords($MainMenuSingleData['sizeTitle']); ?><span>(*mandatory field)</span></p>
<?php } else { ?>
<p>Select size<span>(*mandatory field)</span></p>
<?php } ?>
<?php } ?></td>
   
  </tr>
  <form class="addtc" id="myform" action="restaurant.php?restaurants=<?php echo urlencode(trim($_GET['restaurants']));?>" target="_parent"  method="post">
<input type="hidden" name="item_id" value="<?php echo $_GET['menuID'];?>"  />
<input type="hidden" name="price" value="<?php echo $MainMenuSingleData['RestaurantPizzaItemPrice'];?>"  />
<?php
$SizeQuery=mysql_query("select * from tbl_restaurantMainMenuItemSize where SizeRestaurantMenuItemID='".$_GET['menuID']."' and status='0' order by sizePosition asc");
 ?>
 <?php if(mysql_num_rows($SizeQuery)>0){ ?>
  <tr>
    <td><div class="rowcontent">
    <?php   
  while($MainMenuSizeData=mysql_fetch_assoc($SizeQuery)){
  ?>
  <div class="third">
  <table width="99%">
  <tr>
    <td valign="top" width="10%"><input id="<?php echo $count;?>" required type="radio" name="MenuSize" onclick="loadXMLDoc('<?php echo $MainMenuSizeData['id']?>','<?php echo $_GET['menuID'];?>','<?php echo $_GET['restaurantID'];?>')" value="<?php echo $MainMenuSizeData['id']?>">
    </td>
    <td width="90%"><div class="left"><label for="<?php echo $count;?>"><?php echo $MainMenuSizeData['SizeMenuName']; ?>
<span style="font-size:13px; padding:8px;"><?php echo $MainMenuSizeData['SizeMenuDescription']; ?></span>
</label></div>
<div class="right"><?php 
if($MainMenuSizeData['SizeMenuPrice']!=''){
echo number_format($MainMenuSizeData['SizeMenuPrice'],2);
}
else
{
echo '0.00';
}
 ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole']; ?></div>
</td>
  </tr>
 
</table>

  </div>
   <?php 
$count++;
} ?>
<div class="clear"></div>
    </div>
    </td>
   
  </tr>
   <?php } ?>
  <?php  $ploDough=mysql_query("select * from tbl_restaurantMainMenuItemdough where menuitemID='".$_GET['menuID']."' and status='0'  group by menuDoughName order by doughPosition asc"); 
  ?>  
 <?php if(mysql_num_rows($ploDough)>0){ ?>
  <tr>
    <td> <?php if($MainMenuSingleData['OptionOneTitle']!=''){ ?>
    <p><?php echo ucwords($MainMenuSingleData['OptionOneTitle']);?> <span>(*mandatory field)</span></p>
    <?php } else { ?>
     <p>Select Dough <span>(*mandatory field)</span></p>
     <?php } ?></td>
   
  </tr>
  <tr>
    <td><div class="rowcontent">
    <?php 
 $i=13;
  
   while($MainMenuOPtion1Data=mysql_fetch_assoc($ploDough)){
  ?>
  <div class="third">
  <table width="99%">
  <tr>
    <td width="10%" valign="top"><input id="<?php echo $i;?>" required type="radio"  name="doughValue" onclick="getdoughValueAjax('<?php echo $MainMenuOPtion1Data['id']?>','<?php echo $_GET['menuID'];?>','<?php echo $_GET['restaurantID'];?>','<?php echo $MainMenuOPtion1Data['menuSizeID'];?>')" value="<?php echo $MainMenuOPtion1Data['id']?>"></td>
    <td width="90%"><div class="left"><label for="<?php echo $i;?>"><?php echo $MainMenuOPtion1Data['menuDoughName']; ?>
<span style="font-size:13px; padding:8px;"><?php echo $MainMenuSizeData['menuDoughDescription']; ?></span>
</label></div>
<div class="right"><?php  
if($MainMenuOPtion1Data['menuDoughPrice']!=''){
echo number_format($MainMenuOPtion1Data['menuDoughPrice'],2);
}
else
{
echo '0.00';
}
 ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole']; ?></div>
    </td>
  </tr>
 
</table>
<div class="clear"></div>
  </div>
   <?php 
$i++;
}
 ?>
 <div class="clear"></div>
    </div></td>
    
  </tr>
   <?php } ?>
  
  <?php 
  $ploDough=mysql_query("select * from tbl_restaurantMainMenuItemPizzaBase where menuitemID='".$_GET['menuID']."' and status='0'  group by menuBaseName order by basePosition asc");
  if(mysql_num_rows($ploDough)>0){
  ?>
  <tr id="option2data">
    <td><?php if($MainMenuSingleData['OptionTwoTitle']!=''){ ?>
    <p><?php echo ucwords($MainMenuSingleData['OptionTwoTitle']);?> <span>(*mandatory field)</span></p>
    <?php } else { ?>
     <p>Select Base <span>(*mandatory field)</span></p>
     <?php } ?>
     <div class="rowcontent">
     <?php 
  
   while($MainMenuOPtion1Data=mysql_fetch_assoc($ploDough)){
  ?>
  <div class="third">
  <table width="99%">
  <tr>
    <td width="10%" valign="top"><input id="<?php echo $i;?>" required type="radio" name="baseValue" onclick="getBaseValueAjax('<?php echo $MainMenuOPtion1Data['id']?>','<?php echo $_GET['menuID'];?>','<?php echo $_GET['restaurantID'];?>','<?php echo $MainMenuOPtion1Data['menuSizeID'];?>','<?php echo $MainMenuOPtion1Data['menudoughID'];?>')"   value="<?php echo $MainMenuOPtion1Data['id']?>"></td>
    <td width="90%"><div class="left"><label for="<?php echo $i;?>"><?php echo $MainMenuOPtion1Data['menuBaseName']; ?>
<span style="font-size:13px; padding:8px;"><?php echo $MainMenuSizeData['menuBaseDescription']; ?></span>
</label></div>
 <div class="right"><?php 
 if($MainMenuOPtion1Data['menuBasePrice']!=''){
 echo number_format($MainMenuOPtion1Data['menuBasePrice'],2);
 }
 else
 {
 echo '0.00';
 }
  ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole']; ?></div>   
    </td>
  </tr>
 
</table>

  </div>
   <?php 
$i++;
}
 ?>
 <div class="clear"></div>
     </div>
     </td>
   
  </tr>
  <?php } ?>
  <?php 
    $ploDough=mysql_query("select * from tbl_restaurantMainMenuItemPizzaChees where menuitemID='".$_GET['menuID']."' and status='0'  group by menuCheesName order by cheesPosition asc");
	if(mysql_num_rows($ploDough)>0){
  ?>
  <tr>
    <td><?php if($MainMenuSingleData['OptionThreeTitle']!=''){ ?>
    <p><?php echo ucwords($MainMenuSingleData['OptionThreeTitle']);?> <span>(*mandatory field)</span></p>
    <?php } else { ?>
     <p>Select Cheese <span>(*mandatory field)</span></p>
     <?php } ?></td>
   
  </tr>
  <tr>
    <td><div class="rowcontent">
    <?php 
 

   while($MainMenuOPtion1Data=mysql_fetch_assoc($ploDough)){
  ?>

    <div class="third">
    <table width="99%">
  <tr>
    <td valign="top" width="10%"><input required id="<?php echo $i;?>" type="radio"  onclick="getCheesValueAjax('<?php echo $MainMenuOPtion1Data['id']?>','<?php echo $_GET['menuID'];?>','<?php echo $_GET['restaurantID'];?>','<?php echo $MainMenuOPtion1Data['menuSizeID'];?>','<?php echo $MainMenuOPtion1Data['menudoughID'];?>','<?php echo $MainMenuOPtion1Data['menubasedID'];?>')"  name="cheesValue" value="<?php echo $MainMenuOPtion1Data['id']?>"></td>
    <td width="90%"><div class="left"><label for="<?php echo $i;?>"><?php echo $MainMenuOPtion1Data['menuCheesName']; ?>
<span style="font-size:13px; padding:8px;"><?php echo $MainMenuSizeData['menuCheesDescription']; ?></span>
</label></div>
<div class="right"><?php 
if($MainMenuOPtion1Data['menuCheesPrice']!='')
{
echo $MainMenuOPtion1Data['menuCheesPrice'];
}
else
{
echo '0.00';
}
 ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole']; ?></div>
</td>
  </tr>
 
</table>

    </div>
     <?php 
$i++;
}
 ?><div class="clear"></div>
    </div></td>
   
  </tr>
  <?php } ?>
  <?php 
  $ExtraploGroup=mysql_query("select * from tbl_restaurantMainMenuItemPizzaExtraitemGroup where menuitemID='".$_GET['menuID']."' and status='0' group by menuExtraNameTitle");
    if(mysql_num_rows($ExtraploGroup)>0){
  ?>
   <?php 
 $c=1;
  
   while($ExtraMainMenuOPtion1DataGroupTitle=mysql_fetch_assoc($ExtraploGroup)){
  ?>
  <tr>
  <td><table width="100%" >
  
   <tr>
    <td><p><?php echo $ExtraMainMenuOPtion1DataGroupTitle['menuExtraNameTitle'];?></p>
<div class="rowcontent" style="height:80px; width:100%; overflow-y:auto; background:#f7f9f9;">
<div class="radio">

   <?php 
   
    $ExtraploGroupData=mysql_query("select * from tbl_restaurantMainMenuItemPizzaExtraitemGroup where menuitemID='".$_GET['menuID']."' and menuExtraNameTitle=N'".$ExtraMainMenuOPtion1DataGroupTitle['menuExtraNameTitle']."' and status='0' group by menuExtraName ");
   
 $c=1;
  
   while($ExtraMainMenuOPtion1DataGroup=mysql_fetch_assoc($ExtraploGroupData)){
  ?>
 
 <div class="third">
 <div style="float:left; width:100%; min-height:20px; padding-bottom:2px;">
       <?php if($ExtraMainMenuOPtion1DataGroup['menuExtraQuantity']==1 || $ExtraMainMenuOPtion1DataGroup['menuExtraQuantity']=='' ){?>
        <div style="width:11%; min-height:15px; float:left;">
        <div style="width:100%; height:10px; margin-bottom:2px; margin-left:4px; font-size:11px;">1X</div>
        <div style="width:100%; height:15px;font-size:11px;">
        <?php if($ExtraMainMenuOPtion1DataGroup['menuExtraChecked']==1){ ?>
          <input type="checkbox" <?php if($_GET['numValue1']==1 || $ExtraMainMenuOPtion1DataGroup['menuExtraChecked']==1){ ?>  checked="checked"<?php }?> disabled="disabled"   />
          <?php } else { ?>
           <input type="checkbox" <?php if($_GET['numValue1']==1 || $ExtraMainMenuOPtion1DataGroup['menuExtraChecked']==1){ ?>  checked="checked"<?php }?> onclick="getExtarValueAjax1('<?php echo $ExtraMainMenuOPtion1DataGroup['id']?>','<?php echo $_GET['menuID'];?>','<?php echo $_GET['restaurantID'];?>','<?php echo $_GET['size'];?>','<?php echo $_GET['dough'];?>','<?php echo $_GET['base'];?>','<?php echo $_GET['chees'];?>','1','1')" />
          <?php } ?>
        </div>
      </div>
      <div style="margin-top:15px; float:left; min-height:15px; width:78%">
    <table width="100%" style="margin-top:-5px; margin-left:-5px;">
    <tr>
    <td width="68%">
	<?php echo $ExtraMainMenuOPtion1DataGroup['menuExtraName'];?>  
    
    
    <span style="font-size:13px; padding:5px;"><?php echo $ExtraMainMenuOPtion1DataGroup['menuExtraDescription']; ?></span>
    </td>
    <td width="30%" valign="top" style="text-align:right;">
    <?php 
	if($ExtraMainMenuOPtion1DataGroup['menuExtraPrice']!=''){
	echo number_format($ExtraMainMenuOPtion1DataGroup['menuExtraPrice'],2);
	}
	else
	{
	echo '0.00';
	}
	
	?> <?php echo $AdminDataLoginVal['website_CurrencySymbole']; ?>
  
    </td>
    </tr>
    </table>
    </div>
      <?php } ?>
      
        <?php if($ExtraMainMenuOPtion1DataGroup['menuExtraQuantity']==2){?>
        <div style="width:11%; min-height:15px; float:left;">
        <div style="width:100%; height:10px; margin-bottom:2px; margin-left:4px; font-size:11px;">1X</div>
        <div style="width:100%; height:15px;font-size:11px;">
        <?php if($ExtraMainMenuOPtion1DataGroup['menuExtraChecked']==1){ ?>
          <input type="checkbox" <?php if($_GET['numValue1']==1 || $ExtraMainMenuOPtion1DataGroup['menuExtraChecked']==1){ ?> checked="checked"<?php }?>  disabled="disabled"  />
          <?php } else { ?>
          
          <input type="checkbox" <?php if($_GET['numValue1']==1 || $ExtraMainMenuOPtion1DataGroup['menuExtraChecked']==1){ ?> checked="checked"<?php }?> onclick="getExtarValueAjax1('<?php echo $ExtraMainMenuOPtion1DataGroup['id']?>','<?php echo $_GET['menuID'];?>','<?php echo $_GET['restaurantID'];?>','<?php echo $_GET['size'];?>','<?php echo $_GET['dough'];?>','<?php echo $_GET['base'];?>','<?php echo $_GET['chees'];?>','1','1')" />
          
          <?php } ?>
        </div>
      </div>
      
      <div style="width:11%; min-height:15px; float:left;">
        <div style="width:100%; height:10px; margin-bottom:2px; margin-left:4px;font-size:11px;">2X</div>
        <div style="width:100%; height:15px;font-size:11px;">
        <?php if($ExtraMainMenuOPtion1DataGroup['menuExtraChecked']==1){ ?>
          <input type="checkbox" <?php if($_GET['numValue1']==2 || $ExtraMainMenuOPtion1DataGroup['menuExtraChecked']==1){ ?> checked="checked"<?php }?> disabled="disabled"   />
          <?php } else { ?>
          <input type="checkbox" <?php if($_GET['numValue1']==2 || $ExtraMainMenuOPtion1DataGroup['menuExtraChecked']==1){ ?> checked="checked"<?php }?> onclick="getExtarValueAjax1('<?php echo $ExtraMainMenuOPtion1DataGroup['id']?>','<?php echo $_GET['menuID'];?>','<?php echo $_GET['restaurantID'];?>','<?php echo $_GET['size'];?>','<?php echo $_GET['dough'];?>','<?php echo $_GET['base'];?>','<?php echo $_GET['chees'];?>','2','2')" />
          <?php } ?>
        </div>
      </div>
      <div style="margin-top:15px; float:left; min-height:15px; width:78%">
    <table width="100%" style="margin-top:-5px; margin-left:-5px;">
    <tr>
    <td width="68%">
	<?php echo $ExtraMainMenuOPtion1DataGroup['menuExtraName'];?>  
    
    
    <span style="font-size:13px; padding:5px;"><?php echo $ExtraMainMenuOPtion1DataGroup['menuExtraDescription']; ?></span>
    </td>
    <td width="30%" valign="top" style="text-align:right;">
    
    <?php 
	if($ExtraMainMenuOPtion1DataGroup['menuExtraPrice']!=''){
	echo number_format($ExtraMainMenuOPtion1DataGroup['menuExtraPrice'],2);
	}
	else
	{
	echo '0.00';
	}
	
	?> <?php echo $AdminDataLoginVal['website_CurrencySymbole']; ?>
   
    </td>
    </tr>
    </table>
    </div>
      <?php } ?>
    
    <div style="clear:both;"></div>
      </div>    
      </div>
     
  <?php $c++;}?> 
 
 
 
</div>
<div style="clear:both;"></div>
</div>
</td>
  </tr>
 
 </table></td>
  </tr>
  <?php }  }?>
  
  <?php 
  $ExtraploDough=mysql_query("select * from tbl_restaurantMainMenuItemPizzaExtraitem where menuitemID='".$_GET['menuID']."' and status='0' group by menuExtraName order by extraPosition asc ");
  if(mysql_num_rows($ExtraploDough)>0){
  ?>
  <tr>
  <td><table width="100%" >
   <tr>
    <td><p>Choose Materials <span>(*mandatory field)</span></p>
<div class="rowcontent" style="height:80px; width:100%; overflow-y:auto; background:#f7f9f9;">
<div class="radio">

<?php 
 $c=1;
   while($ExtraMainMenuOPtion1Data=mysql_fetch_assoc($ExtraploDough)){
  ?>

   
    <div class="third">
    <div style="float:left; width:100%; min-height:20px; padding-bottom:2px;">
       <?php if($ExtraMainMenuOPtion1Data['menuExtraQuantity']==1 || $ExtraMainMenuOPtion1Data['menuExtraQuantity']=='' ){?>
        <div style="width:11%; min-height:15px; float:left;">
        <div style="width:100%; height:10px; margin-bottom:2px; margin-left:4px; font-size:11px;">1X</div>
        <div style="width:100%; height:15px;font-size:11px;">
        <?php if($ExtraMainMenuOPtion1Data['menuExtraChecked']==1){ ?>
          <input style="width:10px; height:10px;" type="checkbox" <?php if($_GET['numValue']==1 || $ExtraMainMenuOPtion1Data['menuExtraChecked']==1){ ?>  checked="checked"<?php }?> disabled="disabled"   />
          <?php } else { ?>
           <input style="width:10px; height:10px;" type="checkbox" <?php if($_GET['numValue']==1 || $ExtraMainMenuOPtion1Data['menuExtraChecked']==1){ ?>  checked="checked"<?php }?> onclick="getExtarValueAjax('<?php echo $ExtraMainMenuOPtion1Data['id']?>','<?php echo $_GET['menuID'];?>','<?php echo $_GET['restaurantID'];?>','<?php echo $_GET['size'];?>','<?php echo $_GET['dough'];?>','<?php echo $_GET['base'];?>','<?php echo $_GET['chees'];?>','1')" />
          <?php } ?>
        </div>
      </div>
      <div style="margin-top:13px; float:left; width:89%; min-height:15px;">
    <table width="100%" style="margin-top:-5px; margin-left:-5px;">
    <tr>
    <td width="68%">
	<?php echo $ExtraMainMenuOPtion1Data['menuExtraName'];?>   <span style="font-size:13px; padding:5px;"><?php echo $ExtraMainMenuOPtion1Data['menuExtraDescription']; ?></span>
    </td>
    <td width="30%" valign="top" style="text-align:right;">
    <?php  
	if($ExtraMainMenuOPtion1Data['menuExtraPrice']!=''){
	echo number_format($ExtraMainMenuOPtion1Data['menuExtraPrice'],2);
	}
	else
	{
	echo '0.00';
	}
	?> <?php echo $AdminDataLoginVal['website_CurrencySymbole']; ?>
    </td>
   
    </tr>
    </table>
    </div>
      <?php } ?>
      
        <?php if($ExtraMainMenuOPtion1Data['menuExtraQuantity']==2){?>
        <div style="width:11%; min-height:15px; float:left;">
        <div style="width:100%; height:10px; margin-bottom:2px; margin-left:4px; font-size:11px;">1X</div>
        <div style="width:100%; height:15px;font-size:11px;">
        <?php if($ExtraMainMenuOPtion1Data['menuExtraChecked']==1){ ?>
          <input style="width:10px; height:10px;" type="checkbox" <?php if($_GET['numValue']==1 || $ExtraMainMenuOPtion1Data['menuExtraChecked']==1){ ?> checked="checked"<?php }?>  disabled="disabled" />
          
          <?php } else { ?>
          <input style="width:10px; height:10px;" type="checkbox" <?php if($_GET['numValue']==1 || $ExtraMainMenuOPtion1Data['menuExtraChecked']==1){ ?> checked="checked"<?php }?> onclick="getExtarValueAjax('<?php echo $ExtraMainMenuOPtion1Data['id']?>','<?php echo $_GET['menuID'];?>','<?php echo $_GET['restaurantID'];?>','<?php echo $_GET['size'];?>','<?php echo $_GET['dough'];?>','<?php echo $_GET['base'];?>','<?php echo $_GET['chees'];?>','1')" />
          <?php } ?>
        </div>
      </div>
      
      <div style="width:11%; min-height:15px; float:left;">
        <div style="width:100%; height:10px; margin-bottom:2px; margin-left:4px;font-size:11px;">2X</div>
        <div style="width:100%; height:15px;font-size:11px;">
        <?php if($ExtraMainMenuOPtion1Data['menuExtraChecked']==1){ ?>
          <input style="width:10px; height:10px;" disabled="disabled"  type="checkbox" <?php if($_GET['numValue']==2 || $ExtraMainMenuOPtion1Data['menuExtraChecked']==1){ ?> checked="checked"<?php }?> disabled="disabled"   />
          <?php } else { ?>
            <input style="width:10px; height:10px;" type="checkbox" <?php if($_GET['numValue']==2 || $ExtraMainMenuOPtion1Data['menuExtraChecked']==1){ ?> checked="checked"<?php }?> onclick="getExtarValueAjax('<?php echo $ExtraMainMenuOPtion1Data['id']?>','<?php echo $_GET['menuID'];?>','<?php echo $_GET['restaurantID'];?>','<?php echo $_GET['size'];?>','<?php echo $_GET['dough'];?>','<?php echo $_GET['base'];?>','<?php echo $_GET['chees'];?>','2')" />
          <?php } ?>
        </div>
      </div>
      <div style="margin-top:13px; float:right; width:78%; min-height:15px;">
    <table width="100%" style="margin-top:-5px; margin-left:-5px;">
    <tr>
    <td width="68%">
	<?php echo $ExtraMainMenuOPtion1Data['menuExtraName'];?>   <span style="font-size:13px; padding:5px;"><?php echo $ExtraMainMenuOPtion1Data['menuExtraDescription']; ?></span>
    </td>
    <td width="30%" valign="top" style="text-align:right;">
    <?php  
	if($ExtraMainMenuOPtion1Data['menuExtraPrice']!=''){
	echo number_format($ExtraMainMenuOPtion1Data['menuExtraPrice'],2);
	}
	else
	{
	echo '0.00';
	}
	?> <?php echo $AdminDataLoginVal['website_CurrencySymbole']; ?>
    </td>
   
    </tr>
    </table>
    </div>
      <?php } ?>
   
  
      </div>
      
    
      
     
 
 <?php /*?> <?php if($c==3) { echo "</td></tr><tr><td></td></tr>"; $c= 0; } ?> <?php */?> 
 
 
 
</div><?php $c++;}?> 
 
<div style="clear:both;"></div>
</div>
</td>
  </tr>
  <?php } ?>
  </table></td>
  </tr>
  
</table>
<table width="100%">
 <tr><td>Quantity</td><td>
 <!--<input type='button' value='-' class='qtyminus' field='quantity' />-->
    <input type='text' name='quantity' value='1' id="quantity" class='qty' onchange="getExtarValueAjaxPrcie(this.value,'<?php echo $_GET['menuID'];?>','<?php echo $_GET['restaurantID'];?>','<?php echo $_GET['size'];?>','<?php echo $_GET['dough'];?>','<?php echo $_GET['base'];?>','<?php echo $_GET['chees'];?>','<?php echo $_GET['checkboxid'];?>','<?php echo $_GET['checkboxid1'];?>')"  />
    <!--<input type='button' value='+' class='qtyplus' field='quantity' />-->
 </td></tr>
   <tr><td colspan="2">&nbsp;</td></tr>
    <tr><td colspan="2"><textarea cols="50" rows="5" name="SpecialInstruction" placeholder="Special Instructions"></textarea></td></tr>
     <!--<tr><td colspan="2">&nbsp;</td></tr>-->
      <tr><td colspan="2" align="center"><input type="submit" name="" value="Submit Now" class="submit" />
</td></tr>
</table>
</form>
</div>
</div>
</div>

</body>
</html>
