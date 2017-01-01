<?php 
ob_start();
session_start();
include('route/functions.php');
$db= new User();
include('config1.php');
mysql_query ("set character_set_results='utf8'"); 
$AdminDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_siteSetting order by id asc"));
?>
<?php 
$MenuData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMenuItem where RestaurantPizzaID='".$_GET['hotel_id']."'  and id ='".$_GET['itemid']."' order by RestaurantPizzaItemName asc"));?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style type="text/css">
body{font-family:"Verdana", sans-serif;font-style:normal;font-weight:normal;
  font-size: 13px;}
.cartwrapper
{
width:100%; margin:auto;
}
.cartcontainer
{
width:70%; margin:auto; margin-top:5%;
}
.cartheader
{
width:100%; height:45px; border-bottom:1px solid #ccc; background:#f25804; color:#FFFFFF;
}
.cartcontent
{
width:98%; padding:1%; margin-bottom:20px;
}
.cart_main
{
width:100%;margin-bottom:10px;
}
.checkboxcontent
{
width:100%; min-height:25px; box-shadow:1px 1px 1px 2px #999; margin-top:5px; padding-top:10px; padding-left:10px;
}
.cartcontainer p
{
font-weight:bold;
}
.cartcontainer span
{
color:#f25804;
}
.cartcontainer .rowcontent
{
width:98%; margin:1%;margin-bottom:10px;
}
.cartcontainer .third
{
width:100%; float:left;
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
width:85%;  float:left;
}
.cartcontainer .right
{
width:30%; float:right;
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
.cartcontainer .txt_select
{
width:70%;
height:25px;
border:1px solid #CCC;
}
.cartcontainer .txt_box:focus,.cartcontainer .txt_select:focus
{

border-color:#f8a71e;
outline:0;
-webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(249,81,8,.6);
box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(249,81,8,.6)
}
.cartcontainer .submit
{
padding:2% 5%;
background:#f25804;
color:#fff;
text-decoration:none;
border:1px solid #f25804; 
border-radius:5px;
margin-top:15px;
}
.cartcontainer .submit:hover
{
background:#FA3800;
cursor:pointer;
}

/*css for checkbox and radio button*/
label {
	display: inline-block;
	cursor: pointer;
	position: relative;
	padding-left: 25px;
	margin-right: 15px;
	font-size: 13px;
}
label:hover
{
color:#FA3800;
}
						input[type=radio],
input[type=checkbox] {
	display: none;
}
label:before {
	content: "";
	display: inline-block;
	width: 16px;
	height: 16px;
	margin-right: 0px;
	position:relative;	
	left: -21px;
	bottom: 1px;	
	background:#FA3800;
	background:rgba(250,56,0,0.8);
	box-shadow: inset 0px 2px 3px 0px rgba(0, 0, 0, .3), 0px 1px 0px 0px rgba(255, 255, 255, .8);
}
.radio label:before{
	border-radius: 8px;
}
.checkbox label{
	margin-bottom: 10px;
}
.checkbox label:before{
    border-radius: 3px;
}
input[type=radio]:checked + label:before{
    content: "\2022";   
   color:#ffffff;
    font-size: 21px;
    text-align: center;
    line-height: 13px;
}
input[type=checkbox]:checked + label:before{
	content: "\2713";
	text-shadow: 1px 1px 1px rgba(0, 0, 0, .2);
	font-size: 15px;	
	color:#ffffff;
	text-align: center;
    line-height: 15px;
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

<script type="text/javascript">
function getOrgTypeListRest(str)
{
//alert(str);
if (str=="")
{
document.getElementById("extraitem").innerHTML="";
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

document.getElementById("extraitem2").innerHTML=xmlhttp.responseText;
document.getElementById("extraitem5").style.display='none';

//alert(xmlhttp.responseText);

}
}
xmlhttp.open("post","SIzeWisePrice.php?c="+str+"&itemid=<?php echo $_GET['itemid'];?>&hotel_id=<?php echo $_GET['hotel_id'];?>",true);
xmlhttp.send();}
</script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add to Cart</title>
</head>
<body>
<div class="cartwrapper">
<div class="cartcontainer">
<div class="cartheader">
<h2 style="padding:5px 1px 1px 3px; font-family:Verdana, Arial, Helvetica, sans-serif;" >Add to Cart</h2></div>
<form class="addtc" action="restaurant.php?restaurants=<?php echo urlencode(trim($_GET['restaurants'])); ?>" target="_parent"  method="post">

<div class="cartcontent">
<h3><?php echo ucwords($MenuData['RestaurantPizzaItemName']);?>(<?php echo ucwords($MenuData['RestaurantCategoryName']);?>) 
<span id="extraitem2" style="float:right;"><input type="hidden" name="choiceofmeat" id="extraitem2" value="<?php echo $MenuData['RestaurantPizzaItemPrice'];?>" /></span>
<span style="float:right;" id="extraitem5"><?php echo $AdminDataLoginVal['website_CurrencySymbole']; ?> <?php echo number_format($MenuData['RestaurantPizzaItemPrice'],2);?> </span></h3>
<?php if($MenuData['RestaurantPizzaItemPrice']!=''){ ?>
<img src="control/MenuItemImg/MenuItemImgSmall/<?php echo $MenuData['ResPizzaImg'];?>" />\
<?php } ?>
<div class="cart_main">
<?php if($MenuData['ResPizzaSmallSize']!=''){ ?>
<p>Select size<span>(*mandatory field)</span></p>
<?php } ?>

<input type="hidden" name="item_id" value="<?php echo $_GET['itemid'];?>"  />

<div class="rowcontent">
  <div class="radio">  
  <table width="100%"><tr>  
 <?php 
 $i=1;
 $hkl=explode(',',$MenuData['ResPizzaSmallSize']);
							 $prc=explode(',',$MenuData['ResPizzaSmallSizePrice']);
							 foreach($hkl as $yy=>$vvv){
							 if($vvv!=''){

?>    
<td>
<div class="third">
<div class="left"><input id="<?php echo $i;?>" type="radio" name="PizzaPrice" onclick="getOrgTypeListRest(this.value)" value="<?php echo $vvv;?>-<?php echo $prc[$yy];?>"><label for="<?php echo $i;?>"><?php echo $vvv;?></label>
</div>
<div class="right"><?php echo number_format($prc[$yy],2);?> <?php echo $AdminDataLoginVal['website_CurrencySymbole']; ?></div>
 </div>
 </td>
  <?php if($i==3) { echo "</td></tr><tr><td></td></tr>"; $i= 0; } ?>  
 <?php
}
$i++;
}
 ?>
</tr></table>


</div>
</div>
<?php if($MenuData['ResPizzaSmallSizeExtra']!=''){ ?>
<p>Select Extra<span>(*mandatory field)</span></p>
<?php } ?>
<div class="rowcontent" id="extraItemData">
<?php $hkl=explode(',',$MenuData['ResPizzaSmallSizeExtra']);
							 $prc=explode(',',$MenuData['ResPizzaSmallSizeExtraPrice']);
							 $j=1;
							 foreach($hkl as $yy=>$vvv){
							 if($vvv!=''){?>
<div class="third">
<div class="left"><input id="<?php echo $j;?>" type="checkbox" name="pizzaExtarItem[]" value="<?php echo $vvv;?>-<?php echo $prc[$yy];?>"><label for="<?php echo $j;?>"><?php echo $vvv;?></label></div>
<div class="right"><?php echo number_format($prc[$yy],2); ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole']; ?></div></div>
<?php }
$j++;
 } ?>






</div>


<?php if($MenuData['ResPizzaExtra']!=''){ ?>
<p>Select Extra<span>(*mandatory field)</span></p>
<?php } ?>
<div class="rowcontent" id="extraItemData">
<?php $hkl=explode(',',$MenuData['ResPizzaExtra']);
							 $prc=explode(',',$MenuData['ResPizzaExtraPrice']);
							 $g=1;
							 foreach($hkl as $yy=>$vvv){
							 if($vvv!=''){?>
<div class="third">
<div class="left"><input id="<?php echo $g;?>" type="checkbox" name="pizzaExtarItem[]" value="<?php echo $vvv;?>-<?php echo $prc[$yy];?>"><label for="<?php echo $g;?>"><?php echo $vvv;?></label></div>
<div class="right"><?php echo number_format($prc[$yy],2); ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole']; ?></div></div>
<?php } 
$g++;
} ?>

</div>


<?php if($MenuData['ExtraAddons']!=''){ ?>
<p>Add Extra</p>
<?php } ?>
<div class="rowcontent" id="extraItemData">
<?php $hkl=explode(',',$MenuData['ExtraAddons']);
foreach($hkl as $yy=>$vvv){
							 if($vvv!=''){
							 $Test=explode('-',$vvv);
							 ?>
<div class="third">
<div class="left"><input id="<?php echo $vvv;?>1" type="checkbox" name="ExtraAddons[]" value="<?php echo $Test[0];?>-<?php echo $Test[1];?>"><label for="<?php echo $vvv;?>1"><?php echo $Test[0];?></label></div>
<div class="right"><?php echo number_format($Test[1],2); ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole']; ?></div></div>
<?php } } ?>

</div>

<div class="rowcontent">
<?php if($MenuData['ResPizzaExtraMaterials']!=''){ ?>
<a id="displayText" href="javascript:toggle();" style="color:#FF0000; font-weight:bold;">Add materials  +</a>
<?php } ?>
<div id="toggleText" style="display: none">
<div class="checkboxcontent">           
<?php $ExtraMetrirahkl=explode(',',$MenuData['ResPizzaExtraMaterials']);
							 $prc=explode(',',$MenuData['ResPizzaExtraMaterialsPrice']);
							 foreach($ExtraMetrirahkl as $yy=>$yy1){
							 if($Evvv!=''){?>
<div class="third">
<div class="left"><input id="<?php echo $Evvv;?>41" type="checkbox" name="ExtraAddons[]" value="<?php echo $Evvv;?>-<?php echo $prc[$yy1];?>"><label for="<?php echo $Evvv;?>41"><?php echo $Evvv;?></label>
<!--<div class="radiobox"><input type="checkbox" name="" id="" /></div><div class="recipe">Salami pepperoni</div>--></div>
<div class="right"><?php echo number_format($prc[$yy1],2);?> <?php echo $AdminDataLoginVal['website_CurrencySymbole']; ?></div></div>

<?php }  } ?> 

</div>
</div>
</div>
<br />
<div class="rowcontent">
<select id="qty" name="qty" class="txt_select">
<?php for($i=1;$i<=200;$i++){ ?>
<option value="<?php echo $i; ?>"><font><font><?php echo $i; ?></font></font></option>
<?php } ?>
</select>
</div>
<div class="rowcontent">
<textarea class="txt_box" cols="50" name="SpecialInstruction" id="SpecialInstruction" rows="4" placeholder="Special Instructions"></textarea>
</div>
</div>

<input type="submit" name="" value="Add to Cart" class="submit" />
</div>
</form>
</div>
</div>

</div>
</body>
</html>
