<?php
ob_start();
session_start();
include('route/functions.php');
$db= new User();
include('config1.php');
mysql_query ("set character_set_results='utf8'"); 
$AdminDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_siteSetting order by id asc"));
$FoodDealsData=mysql_fetch_assoc(mysql_query("select * from cartfoodDeals where hotel_id='".$_GET['restaurant_id']."' and deal_id='".$_GET['deal_id']."'"));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta charset="utf-8">
<head>
<style type="text/css">
.cartwrapper {
	width:100%;
	margin:auto;
	color:#808080;
	-webkit-border-radius: 8px;
	-moz-border-radius: 8px;
	border-radius: 8px;
	border-color: rgba(0, 0, 0, 0.8);
	box-shadow: 0 1px 1px rgba(0, 0, 0, 0.75) inset, 0 0 8px rgba(0, 0, 0, 0.75);
	outline: 0 none;
	background:#fff;
	font-family: Calibri;
}
.cartcontainer {
	width:98%;
	margin:auto;
	padding-bottom:10px;
}
.cartheader {
	width:100%;
	height:36px;
	margin-top:19px;
	border-bottom:1px solid #ccc;
	background:#f25804;
	color:#FFFFFF;
	border-radius: 5px 5px 0 0;
}
.cartcontent {
	padding:10px;
}
.cartcontainer h2 {
	font-size:23px;
	font-weight:bold;
	font-family: Calibri;
	margin:5px 0px 5px 0px;
	color:#E50000;	
}
.cart_main {
	width:100%;
	margin-bottom:10px;
}
.checkboxcontent {
	width:100%;
	box-shadow:1px 1px 1px 2px #999;
	margin-top:5px;
	padding-top:10px;
	padding-left:10px;
}
.cartcontainer p {
	font-weight:bold;
}
.cartcontainer span {
	color:#f25804;
}
.cartcontainer span#PriceChange{
	color:#E50000;
}
.cartcontainer .rowcontent {
	width:100%;
	min-height:25px;
	background:#f7f9f9;
	padding:3px 0px 3px 0px;
}
.cartcontainer .third {
	width:33%;
	min-height:25px;
	float:left;
}
.cartcontainer .left {
	width:70%;
	float:left;
}
.cartcontainer .radiobox {
	width:13%;
	height:20px;
	text-align:center;
	float:left;
}
.cartcontainer .recipe {
	width:85%;
	min-height:20px;
	float:left;
}
.cartcontainer .right {
	width:30%;
	float:right;
}
.third_devide {
	width:100%;
	min-height:20px;
	padding-top:2%;
}
.cartcontainer .clear {
	clear:both;
}
.cartcontainer .txt_box {
	width:70%;
	border:1px solid #CCC;
}
.cartcontainer .txt_box:focus {
	border-color:#f8a71e;
	outline:0;
	-webkit-box-shadow:inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgba(249, 81, 8, .6);
	box-shadow:inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgba(249, 81, 8, .6)
}
.cartcontainer .submit {
	padding:2% 5%;
	background:#f25804;
	color:#fff;
	text-decoration:none;
	border:1px solid #f25804;
	border-radius:5px;
	margin-top:15px;
}
.cartcontainer .submit:hover {
	background:#FA3800;
	cursor:pointer;
}
</style>
<div class="cartwrapper">
  <div class="cartheader">
    <h2 style="padding: 2px 1px 1px 10px; float:left;">Food Deals</h2>
    <a href="restaurant.php?restaurants=<?php echo urlencode(trim($_GET['restaurants'])); ?>" target="_parent"><img src="images/popupclose.png" style="float:right; width:25px; margin:5px;" /></a> </div>
  <div class="cartcontainer">
    <div class="cartcontent" id="myDiv">
      <div>
        <h2>Edit Deal for item <?php echo ucwords($FoodDealsData['deal_name']);?><span id="PriceChange" style="float:right;"> <?php echo $FoodDealsData['deal_price'];?> <?php echo $AdminDataLoginVal['website_CurrencySymbole']; ?> </span></h2>
        <p style="font-size:14px; margin-bottom:10px;"><?php echo ucwords($FoodDealsData['foodDeals_description']);?></p>
        <div class="cart_main">
          <form class="addtc" id="myform" action="restaurant.php?restaurants=<?php echo urlencode(trim($_GET['restaurants'])); ?>" target="_parent" method="post">
            <input type="hidden" name="deal_id" value="<?php echo $FoodDealsData['deal_id'];?>"  />
            <input type="hidden" name="deal_name" value="<?php echo $FoodDealsData['deal_name'];?>"  />
            <input type="hidden" name="deal_price" value="<?php echo $FoodDealsData['deal_price'];?>"  />
              <input type="hidden" name="dealedit[]" value="<?php echo $_GET['cartID'];?>"  />
            
            <?php $FoodSlot=mysql_query("select * from tbl_fooddealsSlot where fooddeals_id='".$FoodDealsData['deal_id']."' and status='0'");
$totalSolt=mysql_num_rows($FoodSlot);
if($totalSolt>0){
 ?>
            <table>
              <tr>
                <td class="2"><span>Select Food Deals Items(Maximum <?php echo $totalSolt;?> items)</span></td>
              </tr>
            </table>
            <table width="100%" border="0">
              <?php while($SlotDataName=mysql_fetch_assoc($FoodSlot)){ ?>
              <tr>
                <td width="20%" height="38"><input type="checkbox" checked="checked" name="slot_id[]" value="<?php echo $SlotDataName['id'];?>" style="margin-right:5px;" />
                  <?php echo $SlotDataName['fooddeals_slotName'];?></td>
                <td width="80%"><select name="slot_itemName[]" style="border: 1px solid #C3C3C3;color: #666;float: left;font-weight: bold; margin-top:10px;
height: 36px;padding: 7px;width: 385px;">
                    <?php $FoodSlotItem=mysql_query("select * from tbl_fooddealslotitem where slot_id='".$SlotDataName['id']."' and status='0'"); 
if(mysql_num_rows($FoodSlotItem)>0){
?>
                    <?php while($SlotDataNameItem=mysql_fetch_assoc($FoodSlotItem)){ ?>
                    <option value="<?php echo $SlotDataNameItem['id'];?>" <?php if(strstr($FoodDealsData['slotItemID'],$SlotDataNameItem['id'])){?> selected="selected" <?php } ?>><?php echo $SlotDataNameItem['slot_itemName'];?></option>
                    <?php } } else {?>
                    <option value="">No Food Deals Item</option>
                    <?php } ?>
                  </select></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <?php } } ?>
              <tr>
                <td colspan="2" align="center"><input type="submit" name="" value="Done" class="submit" />
                  <br />
            </table>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<style type="text/css">
.register_selection {
border: 1px solid rgba(0, 0, 0, 0.15);
box-shadow: 0 1px 1px rgba(50, 50, 50, 0.1);
font-size: 13px;
color: #535252;
padding: 5px;
background: none;
height: 30px;
width: 250px;
float: left;
border-radius:4px;
color: #f25804; font-weight:bold;
}
*, *:after, *:before {
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
	padding: 0;
	margin: 0;
}

::selection {
 background: transparent;
}

::-moz-selection {
 background: transparent;
}
.wrapper-demo {
	margin: 60px 0 0 0;
 *zoom: 1;
	font-weight: 400;
}
.wrapper-demo:after {
	clear: both;
	content: "";
	display: table;
}
.wrapper-dropdown-3 {	
    position: relative;
	width: 250px;
	margin: 0 auto;
	padding: 4px;	
    background: #fff;
	border-radius: 4px;
	border: 1px solid rgba(0, 0, 0, 0.15);
	box-shadow: 0 1px 1px rgba(50, 50, 50, 0.1);
	cursor: pointer;
	outline: none;	
    font-weight: bold;
	color: #8AA8BD;
	float:left;
	margin-bottom:10px;
}
.wrapper-dropdown-3:after {
	content: "";
	width: 0;
	height: 0;
	position: absolute;
	right: 15px;
	top: 50%;
	margin-top: -3px;
	border-width: 6px 6px 0 6px;
	border-style: solid;
	border-color: #8aa8bd transparent;
}
.wrapper-dropdown-3 .dropdown {	
    position: absolute;
	top: 101%;
	left: 0;
	right: 0;	
    background: white;
	border-radius: inherit;
	border: 1px solid rgba(0, 0, 0, 0.17);
	box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
	font-weight: normal;
	-webkit-transition: all 0.5s ease-in;
	-moz-transition: all 0.5s ease-in;
	-ms-transition: all 0.5s ease-in;
	-o-transition: all 0.5s ease-in;
	transition: all 0.5s ease-in;
	list-style: none;	
    opacity: 0;
	pointer-events: none;
	z-index:99;
}

.wrapper-dropdown-3 .dropdown li a {
	display: block;
	padding:4px;
	text-decoration: none;
	color: #8aa8bd;
	border-bottom: 1px solid #e6e8ea;
	box-shadow: inset 0 1px 0 rgba(255, 255, 255, 1);
	-webkit-transition: all 0.3s ease-out;
	-moz-transition: all 0.3s ease-out;
	-ms-transition: all 0.3s ease-out;
	-o-transition: all 0.3s ease-out;
	transition: all 0.3s ease-out;
}
.wrapper-dropdown-3 .dropdown li i {
	float: right;
	color: inherit;
}
.wrapper-dropdown-3 .dropdown li:first-of-type a {
	border-radius: 4px 4px 0 0;
}
.wrapper-dropdown-3 .dropdown li:last-of-type a {
	border: none;
	border-radius: 0 0 4px 4px;
}
/* Hover state */

.wrapper-dropdown-3 .dropdown li:hover a {
	background: #f3f8f8;
}
/* Active state */

.wrapper-dropdown-3.active .dropdown {
	opacity: 1;
	pointer-events: auto;
}
/* No CSS3 support */

.no-opacity .wrapper-dropdown-3 .dropdown, .no-pointerevents .wrapper-dropdown-3 .dropdown {
	display: none;
	opacity: 1; /* If opacity support but no pointer-events support */
	pointer-events: auto; /* If pointer-events support but no pointer-events support */
}
.no-opacity .wrapper-dropdown-3.active .dropdown, .no-pointerevents .wrapper-dropdown-3.active .dropdown {
	display: block;
}

</style>
</head>
</html>
