<?php 
ob_start();
session_start();
include('route/functions.php');
$db= new User();
include('config1.php');
mysql_query ("set character_set_results='utf8'"); 
date_default_timezone_set('US/Eastern');
$AdminDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_siteSetting order by id asc"));
include('domainName.php');
include('generateTimeCalculation.php');
?>
<?php 

if($_GET['address_auto_complete']!='')
{
$_SESSION['search_address']=$_GET['address_auto_complete'];
}
if($_GET['address_auto_complete']!='')
{
$add = urlencode($_GET['address_auto_complete']);
$geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$add.'&sensor=false');
$output= json_decode($geocode);
  $origLat=$output->results[0]->geometry->location->lat;
 $origLon=$output->results[0]->geometry->location->lng;
 $dist=20;
 $resIDbySearchPostUsed=" and restaurant_LongitudePoint between ($origLon-$dist/abs(cos(radians($origLat))*69)) 
          and ($origLon+$dist/abs(cos(radians($origLat))*69)) 
          and restaurant_LatitudePoint between ($origLat-($dist/69)) 
          and ($origLat+($dist/69)) 
          having restaurant_deliveryDistance < $dist";
$codeRestaurant=", 3956 * 2 * 
          ASIN(SQRT( POWER(SIN(($origLat - abs(restaurant_LatitudePoint))*pi()/180/2),2)
          +COS($origLat*pi()/180 )*COS(abs(restaurant_LatitudePoint)*pi()/180)
          *POWER(SIN(($origLon-restaurant_LongitudePoint)*pi()/180/2),2))) 
          as restaurant_deliveryDistance";		  
$RestaurantPostcodeUrl="&q=".urldecode($_GET['address_auto_complete']);	
$SearchAutoBracum=$_GET['address_auto_complete'].',';		  
}


if($_GET['restaurant_cuisine']!='')
{
$ExCuisineName=explode(',',$_GET['restaurant_cuisine']);
$Copl='';
foreach($ExCuisineName as $cui){
if($cui!='')
{
$Copl .=$cui.'|';
}
else
{
$Copl .=$cui;
}
}
$seracrbyCuisine=" and restaurant_cuisine REGEXP N'(".rtrim($Copl,'|').")'";
$restaurant_cuisineUrl="&restaurant_cuisine=".urldecode($_GET['restaurant_cuisine']);
}

if($_GET['rating']!='')
{
$RatingValue=" and rating='".$_GET['rating']."'";
$ratingUrl="&rating=".$_GET['rating'];
}

if($_GET['RestaurantDeals']!='')
{
$RestaurantDealsValue=" and RestaurantDeals='".$_GET['RestaurantDeals']."'";
$RestaurantDealsUrl="&RestaurantDeals=".$_GET['RestaurantDeals'];
}

if($_GET['delivery']!='')
{
$deliveryValue=explode('-',$_GET['delivery']);
$deliveryValueBy=" and restaurant_default_min_order >=$deliveryValue[0] and restaurant_default_min_order<= $deliveryValue[1]";
$deliveryUrl="&delivery=".$_GET['delivery'];
}

if($_GET['open_status']!='')
{
$open_statusValue=" and open_status='".$_GET['open_status']."'";
$open_statusUrl="&open_status=".$_GET['open_status'];
}

if($_GET['restaurantState']!='')
{
$seracrbyState=" and restaurantState='".$_GET['restaurantState']."'";
$restaurantStateUrl="&restaurantState=".$_GET['restaurantState'];
}
if($_GET['restaurantCity']!='')
{
$seracrbyCity=" and restaurantCity=N'".$_GET['restaurantCity']."'";
$restaurantCityUrl="&restaurantCity=".urldecode($_GET['restaurantCity']);
}

if($_GET['RestaurantService']!='')
{
$seracrbyRestaurantService=" and restaurant_service REGEXP N'(".$_GET['RestaurantService'].")'";
$RestaurantServiceUrl="&RestaurantService=".urldecode($_GET['RestaurantService']);
}
if($_GET['BookaTableOrdersupport']!='')
{
$seracrbyBookaTableOrdersupport=" and BookaTableOrdersupport='".$_GET['BookaTableOrdersupport']."'";
$BookaTableOrdersupportUrl="&BookaTableOrdersupport=".urldecode($_GET['BookaTableOrdersupport']);
}


$Wheredata=" where status='0' ";
$MAINSQL="select * $codeRestaurant  FROM tbl_restaurantAdd $Wheredata $seracrbyCuisine $resIDbySearchPostUsed  $RatingValue  $RestaurantDealsValue $deliveryValueBy $open_statusValue $seracrbyState $seracrbyCity $seracrbyRestaurantService $seracrbyBookaTableOrdersupport";
//echo $MAINSQL;
$result = mysql_query($MAINSQL);
$result1 = mysql_query($MAINSQL);
$result3 = mysql_query($MAINSQL);
$result4 = mysql_query($MAINSQL);
$numrows=mysql_num_rows($result); 
$numrows=mysql_num_rows($result); 
$RestaurantID='';
	while($data1=mysql_fetch_assoc($result1)){
	$cuisinee=explode(',',$data1['restaurant_cuisine']);
	foreach($cuisinee as $c)
	{
	$RestaurantID.=$c.'|'; 
	}
	}
	//echo $MAINSQL;
?>
 <?php 
if($_GET['restaurantState']!='')
  {
  $mplh=mysql_fetch_assoc(mysql_query("select * from tbl_state where id='".$_GET['restaurantState']."'"));
  $StateName=$mplh['stateName'];
  }
 if($_GET['restaurantState']!='')
{
$StateBracumb=$StateName.',';
}
if($_GET['restaurantCity']!='')
{

$CityBracumb=$_GET['restaurantCity'].',';
}
if($_GET['restaurant_cuisine']!='')
{
$ExpCuis=explode(',',$_GET['restaurant_cuisine']);
$CoplCC='';
foreach($ExpCuis as $cuDDi){
if($cuDDi!='')
{
$CoplCC .=$cuDDi.',';
}
else
{
$CoplCC .=$cuDDi;
}
}
$CuisineBracumb=$CoplCC;
}
if($_GET['RestaurantService'])
{
$SeviceBracumb2=$_GET['RestaurantService'].',';
}

$_SESSION['URlCookies']="q=0".$RestaurantService."".$restaurant_cuisineUrl."".$ratingUrl."".$deliveryUrl."".$RestaurantPostcodeUrl."".$restaurantStateUrl."".$restaurantCityUrl."". $RestaurantDealsUrl."".$AddressSearchUrl."";
$MakeBracumb=$SeviceBracumb2.$CuisineBracumb.$SearchAutoBracum.$StateBracumb.$CityBracumb;
$_SESSION['URlBracumbCookies']=rtrim($MakeBracumb,',');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

		<link rel="stylesheet" type="text/css" href="tables/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="tables/DT_bootstrap.css">
<link href="css/reset2.css" type="text/css" rel="stylesheet" media="all" />

		<script type="text/javascript" charset="utf-8" language="javascript" src="tables/jquery.js"></script>
		<script type="text/javascript" charset="utf-8" language="javascript" src="tables/jquery.dataTables.js"></script>
		<script type="text/javascript" charset="utf-8" language="javascript" src="tables/DT_bootstrap.js"></script>
        
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $_SESSION['URlBracumbCookies'];?> | Justfood Online Food Ordering | Developed by Php Expert Group</title>


        <style type="text/css">
		::-webkit-scrollbar-track-piece{
background-color: #ccc;
border-left: 1px solid #CCC;
-webkit-box-shadow: inset 0 0 12px rgba(0,0,0,0.3);
}
::-webkit-scrollbar{
width:10px;
height:10px;);
}
::-webkit-scrollbar-thumb{
background-color:#f45400;
}
::-webkit-scrollbar-thumb:hover{
height:50px;
background-color:#E31616;
-webkit-border-radius:4px;
}



::moz-scrollbar-track-piece{
background-color: #ccc;
border-left: 1px solid #CCC;
moz-box-shadow: inset 0 0 12px rgba(0,0,0,0.1);
}
::moz-scrollbar{
width:10px;
height:10px;);
}
::moz-scrollbar-thumb{
background-color: #f45400;
}
::moz-scrollbar-thumb:hover{
height:50px;
background-color:#ff6156;
moz-border-radius:4px;
}


        </style>
        <script type="text/javascript">
<!--
var timeout         = 500;
var closetimer		= 0;
var ddmenuitem      = 0;

// open hidden layer
function mopen(id)
{	
	// cancel close timer
	mcancelclosetime();

	// close old layer
	if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';

	// get new layer and show it
	ddmenuitem = document.getElementById(id);
	ddmenuitem.style.visibility = 'visible';

}
// close showed layer
function mclose()
{
	if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';
}

// go close timer
function mclosetime()
{
	closetimer = window.setTimeout(mclose, timeout);
}

// cancel close timer
function mcancelclosetime()
{
	if(closetimer)
	{
		window.clearTimeout(closetimer);
		closetimer = null;
	}
}

// close layer when click-out
document.onclick = mclose; 
// -->

</script>

</head>

<body>
<!--wrapper starts-->
<div id="wrapper">
  <!--header starts-->
   <?php include("route/TopHeader.php"); ?>
  <!--header ends-->
</div>
<script type="text/javascript">
function getOrgTypeListRestDistict(str){
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
//alert(xmlhttp.responseText);
}
}
xmlhttp.open("post","PostcodeFatech.php?q="+str,true);
xmlhttp.send();
}
</script>
<link rel="stylesheet" href="css/colorbox.css" />
		<script src="http://www.jacklmoore.com/colorbox/jquery.colorbox.js"></script>
       
		<script>
			$(document).ready(function(){
				
				$(".verifyaddress").colorbox({iframe:true, width:"45%", height:"75%"});
				
				
			});			
			
			
		</script>
<!--contentwrapper starts-->
<div id="contentwrapper" style="padding-top:30px;">
  <!--content container starts-->
  
  <link rel="stylesheet" href="jqmodal/simplemodal.css" />
<script src="jqmodal/jquery.js"></script>
<script src="jqmodal/jquery.simplemodal.js"></script>
</head>
<body>

  <div class="container" style="min-height:1280px;">
 <!-- mid search  starts-->
  <div class="midserach">
  <div class="steps">
   <ul>
                <li> <a href="./"> <span>1</span> <?php echo ucwords($TableLanguage['SetpSearchText']);?> </a> </li>
                <li> <a href="restaurantSearchText.php?<?php echo $_SESSION['URlCookies'];?>" class="selected"> <span class="selected">2</span> <?php echo ucwords($TableLanguage['SetpSelectRestaurantText']);?> </a> </li>
                <li> <a href="restaurantSearchText.php?<?php echo $_SESSION['URlCookies'];?>" style="cursor:pointer;"> <span>3</span> <?php echo ucwords($TableLanguage['SetpPlaceOrderText']);?> </a> </li>
                <li> <a href="" style="cursor:pointer;" > <span>4</span> <?php echo ucwords($TableLanguage['SetpCheckoutText']);?> </a> </li>
              </ul>
  </div>
  </div>

  <!-- mid search  ends-->
 <div class="midcontainer">
 <?php include('LeftPanel.php'); ?>
 
 
 <div class="right">
 
                
            <div class="table_container"  id="ajax_contents">
          
 
<div class="list-h">
                  <h2 style="padding:0 0 1px;"><span style="color:#000; font-weight:bold;">&nbsp;&nbsp;<?php echo $numrows;?> <?php echo $TableLanguage2['RestaurantServeFilterText']; ?></span> </h2>
                  <h2 style="padding:0 0 1px;"> <span> 
              
                  
                 <?php echo $_SESSION['URlBracumbCookies'];?></span> </h2><?php /*?><h2><a class="verifyaddress" href="addressverification.php" style="color:#777;"><?php echo ucwords($TableLanguage1['ChangeAddressText']);?> </a></h2><?php */?>
                  
                </div>
                <table  cellpadding="0"  cellspacing="0" border="0" class="table table-striped " <?php if($numrows>0){?>id="example" <?php } ?>>
	<thead>
		<tr style="background:url(images/img/results-stripe-bg.png) repeat-x top; height:40px; font-size:11.5px; font-family:Georgia;">
			<th style="max-width:564px;"><?php echo ucwords($TableLanguage1['RestaurantHeadingText']);?></th>
			
			<th style="max-width:130px;"><?php echo ucwords($TableLanguage1['GradeText']);?></th>
			<th style="max-width:130px;"><?php echo ucwords($TableLanguage1['DeliveryTimeText']);?></th>
			<th style="max-width:130px;"><?php echo ucwords($TableLanguage1['MinOrderText']);?></th>
            <th style="width:55px;"><?php echo ucwords($TableLanguage1['DealsText']);?></th>
			<th style="max-width:120px; margin-right:1px;"></th>
		</tr>
	</thead>
	<tbody >
    <?php 
	$result1 = mysql_query($MAINSQL);
$numrows1=mysql_num_rows($result1); 
	if($numrows1>0){$i=1;
	$CuisineDataView='';
	while($data=mysql_fetch_assoc($result1)){
	$CuisineDataView.=$data['restaurant_cuisine'].','; 
    ?>
   
    <tr style="border:none;">
			<td><div class="rest_img">
          
            <?php if($close==1 && $data['preOrdersupport']==1) {?>
            <a style="cursor:pointer;"  class="confirm7777">
            <?php if($data['restaurant_Logo']!=''){ ?>
            <img src="control/restaurantlogoimg/small/<?php echo $data['restaurant_Logo'];?>" id="restaurant.php?preorder=1&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html"  style="width:80px; height:80px;"  alt="<?php echo $data['restaurant_name'];?>" onclick=""> 
            <?php } else {?>
            <img src="images/noimage.jpg" id="restaurant.php?preorder=1&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html"  style="width:80px; height:80px;" class="" alt="<?php echo $data['restaurant_name'];?>" /> 
            <?php }?>
            </a>
            <?php } else if($close==1) {?>
           
           
              <a style="cursor:pointer;" class="close" id="restaurant.php?close=1&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html">
            <?php if($data['restaurant_Logo']!=''){ ?>
            <img src="control/restaurantlogoimg/small/<?php echo $data['restaurant_Logo'];?>" style="width:80px; height:80px;" id="restaurant.php?close=1&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html"  alt="<?php echo $data['restaurant_name'];?>" onclick=""> 
            <?php } else {?>
            <img src="images/noimage.jpg" style="width:80px; height:80px;" id="restaurant.php?close=1&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html" class="" alt="<?php echo $data['restaurant_name'];?>" /> 
            <?php }?>
            </a>
         
            <?php } else{?>
            
             
            <a href="restaurant.php?restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html">
            <?php if($data['restaurant_Logo']!=''){ ?>
            <img src="control/restaurantlogoimg/small/<?php echo $data['restaurant_Logo'];?>" style="width:80px; height:80px;"  alt="<?php echo $data['restaurant_name'];?>" onclick=""> 
            <?php } else {?>
            <img src="images/noimage.jpg" style="width:80px; height:80px;" class="" alt="<?php echo $data['restaurant_name'];?>" /> 
            <?php }?>
            </a>
            
            <?php } ?>
            </div>
            <div class="rest_name">
              <?php if($close==1 && $data['preOrdersupport']==1) {?>
            <a style="cursor:pointer;" >
            <span class="redhead" ><?php echo stripslashes(ucwords($data['restaurant_name']));?></span></a>
            <p style="margin-top: 1px;color: rgb(58, 57, 57);font-size:12px;">Distance : <?php echo round($data['restaurant_deliveryDistance'],1);?> miles</p>
             <?php } else if($close==1) {?>
               <a style="cursor:pointer;" >
            <span class="redhead" > <?php echo stripslashes(ucwords($data['restaurant_name']));?></span></a>
             <p style="margin-top: 1px;color: rgb(58, 57, 57);font-size:12px;">Distance : <?php echo round($data['restaurant_deliveryDistance'],1);?> miles</p>
             
                <?php } else {?>
                  <a href="restaurant.php?restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html">
            <span class="redhead"><font><font> <?php echo stripslashes(ucwords($data['restaurant_name']));?></font></font></span></a>
             <p style="margin-top: 1px;color: rgb(58, 57, 57); font-size:12px;">Distance : <?php echo round($data['restaurant_deliveryDistance'],1);?> miles</p>
                
                <?php } ?>
            
            <h3><?php $cuisin=explode(',',$data['restaurant_cuisine']);
			$ggphoto='';
			foreach($cuisin as $c)
			{
			//mysql_query("update tbl_cuisine set restuarantID='".$data['id']."' where RestaurantCuisineName=N'".$c."'");
			$ggphoto.=$c.', ';
			}
			echo rtrim($ggphoto,', ');
			?></h3>
             <?php /*?><?php $RestaurantOffer=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantOffer where restaurant_id='".$data['id']."'")); ?>									<?php if($RestaurantOffer['RestaurantOfferPrice']!=''){ ?>
            <img src="images/img/4.png" />
            <?php } ?><?php */?>
            </div>
         <?php /*?> <div class="rest_deals">
             <?php $RestaurantOffer=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantOffer where restaurant_id='".$data['id']."'")); ?>									<?php if($RestaurantOffer['RestaurantOfferPrice']!=''){ ?>
            <img src="images/img/4.png" />
            <?php } ?>
            
            </div><?php */?>
            </td>
			
			<td><div class="rest_grade">
            <?php if($close==1 && $data['preOrdersupport']==1) {?>
            <a class="confirm7777" id="restaurant.php?preorder=1&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <?php if($data['rating']==5){ ?>
                          <img src="images/img/Star-icon.gif" id="restaurant.php?preorder=1&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <img src="images/img/Star-icon.gif" id="restaurant.php?preorder=1&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <img src="images/img/Star-icon.gif" id="restaurant.php?preorder=1&restaurants=<?php echo stripslashes(ucwords($data['id']));?><?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <img src="images/img/Star-icon.gif" id="restaurant.php?preorder=1&restaurants=<?php echo stripslashes(ucwords($data['id']));?><?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <img src="images/img/Star-icon.gif" id="restaurant.php?preorder=1&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <?php } elseif($data['rating']==4){?>
                           <img src="images/img/Star-icon.gif" id="restaurant.php?preorder=1&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <img src="images/img/Star-icon.gif" id="restaurant.php?preorder=1&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <img src="images/img/Star-icon.gif" id="restaurant.php?preorder=1&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <img src="images/img/Star-icon.gif" id="restaurant.php?preorder=1&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">


                          <img src="images/img/Star-icon-grey.gif" id="restaurant.php?preorder=1&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          
                           <?php } elseif($data['rating']==3){?>
                           <img src="images/img/Star-icon.gif" id="restaurant.php?preorder=1&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <img src="images/img/Star-icon.gif" id="restaurant.php?preorder=1&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <img src="images/img/Star-icon.gif" id="restaurant.php?preorder=1&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <img src="images/img/Star-icon-grey.gif" id="restaurant.php?preorder=1&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <img src="images/img/Star-icon-grey.gif" id="restaurant.php?preorder=1&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                        
                            <?php } elseif($data['rating']==2){?>
                           <img src="images/img/Star-icon.gif" id="restaurant.php?preorder=1&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <img src="images/img/Star-icon.gif" id="restaurant.php?preorder=1&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                         <img src="images/img/Star-icon-grey.gif" id="restaurant.php?preorder=1&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <img src="images/img/Star-icon-grey.gif" id="restaurant.php?preorder=1&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <img src="images/img/Star-icon-grey.gif" id="restaurant.php?preorder=1&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                         
                            <?php } elseif($data['rating']==1){?>
                           <img src="images/img/Star-icon.gif" id="restaurant.php?preorder=1&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                           <img src="images/img/Star-icon-grey.gif" id="restaurant.php?preorder=1&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                         <img src="images/img/Star-icon-grey.gif" id="restaurant.php?preorder=1&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <img src="images/img/Star-icon-grey.gif" id="restaurant.php?preorder=1&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <img src="images/img/Star-icon-grey.gif" id="restaurant.php?preorder=1&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <?php } else { ?>
						    <img src="images/img/Star-icon-grey.gif" id="restaurant.php?preorder=1&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                           <img src="images/img/Star-icon-grey.gif" id="restaurant.php?preorder=1&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                         <img src="images/img/Star-icon-grey.gif" id="restaurant.php?preorder=1&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <img src="images/img/Star-icon-grey.gif" id="restaurant.php?preorder=1&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <img src="images/img/Star-icon-grey.gif" id="restaurant.php?preorder=1&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <?php } ?>
						  
                         </a>
                         <?php } else if($close==1) {?>
                         
                       <a class="close" id="restaurant.php?close&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <?php if($data['rating']==5){ ?>
                          <img src="images/img/Star-icon.gif" id="restaurant.php?close&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <img src="images/img/Star-icon.gif" id="restaurant.php?close&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <img src="images/img/Star-icon.gif" id="restaurant.php?close&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <img src="images/img/Star-icon.gif" id="restaurant.php?close&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <img src="images/img/Star-icon.gif" id="restaurant.php?close&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <?php } elseif($data['rating']==4){?>
                           <img src="images/img/Star-icon.gif" id="restaurant.php?close&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <img src="images/img/Star-icon.gif" id="restaurant.php?close&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <img src="images/img/Star-icon.gif" id="restaurant.php?close&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <img src="images/img/Star-icon.gif" id="restaurant.php?close&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">


                          <img src="images/img/Star-icon-grey.gif" id="restaurant.php?close&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          
                           <?php } elseif($data['rating']==3){?>
                           <img src="images/img/Star-icon.gif" id="restaurant.php?close&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <img src="images/img/Star-icon.gif" id="restaurant.php?close&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <img src="images/img/Star-icon.gif" id="restaurant.php?close&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <img src="images/img/Star-icon-grey.gif" id="restaurant.php?close&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <img src="images/img/Star-icon-grey.gif" id="restaurant.php?close&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                        
                            <?php } elseif($data['rating']==2){?>
                           <img src="images/img/Star-icon.gif" id="restaurant.php?close&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <img src="images/img/Star-icon.gif" id="restaurant.php?close&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                         <img src="images/img/Star-icon-grey.gif" id="restaurant.php?close&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <img src="images/img/Star-icon-grey.gif" id="restaurant.php?close&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <img src="images/img/Star-icon-grey.gif" id="restaurant.php?close&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                         
                            <?php } elseif($data['rating']==1){?>
                           <img src="images/img/Star-icon.gif" id="restaurant.php?close&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                           <img src="images/img/Star-icon-grey.gif" id="restaurant.php?close&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                         <img src="images/img/Star-icon-grey.gif" id="restaurant.php?close&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <img src="images/img/Star-icon-grey.gif" id="restaurant.php?close&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <img src="images/img/Star-icon-grey.gif" id="restaurant.php?close&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <?php } else { ?>
						    <img src="images/img/Star-icon-grey.gif" id="restaurant.php?close&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                           <img src="images/img/Star-icon-grey.gif" id="restaurant.php?close&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                         <img src="images/img/Star-icon-grey.gif" id="restaurant.php?close&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <img src="images/img/Star-icon-grey.gif" id="restaurant.php?close&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <img src="images/img/Star-icon-grey.gif" id="restaurant.php?close&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <?php } ?>
						  
                         </a>
                          <?php } else {?>
                          <a  id="restaurant.php?restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <?php if($data['rating']==5){ ?>
                          <img src="images/img/Star-icon.gif" id="restaurant.php?restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <img src="images/img/Star-icon.gif" id="restaurant.php?restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <img src="images/img/Star-icon.gif" id="restaurant.php?restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <img src="images/img/Star-icon.gif" id="restaurant.php?restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <img src="images/img/Star-icon.gif" id="restaurant.php?restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <?php } elseif($data['rating']==4){?>
                           <img src="images/img/Star-icon.gif" id="restaurant.php?restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <img src="images/img/Star-icon.gif" id="restaurant.php?restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <img src="images/img/Star-icon.gif" id="restaurant.php?restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <img src="images/img/Star-icon.gif" id="restaurant.php?restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">


                          <img src="images/img/Star-icon-grey.gif" id="restaurant.php?restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          
                           <?php } elseif($data['rating']==3){?>
                           <img src="images/img/Star-icon.gif" id="restaurant.php?restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <img src="images/img/Star-icon.gif" id="restaurant.php?restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <img src="images/img/Star-icon.gif" id="restaurant.php?restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <img src="images/img/Star-icon-grey.gif" id="restaurant.php?restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <img src="images/img/Star-icon-grey.gif" id="restaurant.php?restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                        
                            <?php } elseif($data['rating']==2){?>
                           <img src="images/img/Star-icon.gif" id="restaurant.php?restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <img src="images/img/Star-icon.gif" id="restaurant.php?restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                         <img src="images/img/Star-icon-grey.gif" id="restaurant.php?restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <img src="images/img/Star-icon-grey.gif" id="restaurant.php?restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <img src="images/img/Star-icon-grey.gif" id="restaurant.php?restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                         
                            <?php } elseif($data['rating']==1){?>
                           <img src="images/img/Star-icon.gif" id="restaurant.php?restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                           <img src="images/img/Star-icon-grey.gif" id="restaurant.php?restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                         <img src="images/img/Star-icon-grey.gif" id="restaurant.php?restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <img src="images/img/Star-icon-grey.gif" id="restaurant.php?restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <img src="images/img/Star-icon-grey.gif" id="restaurant.php?restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <?php } else { ?>
						    <img src="images/img/Star-icon-grey.gif" id="restaurant.php?restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                           <img src="images/img/Star-icon-grey.gif" id="restaurant.php?restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                         <img src="images/img/Star-icon-grey.gif" id="restaurant.php?restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <img src="images/img/Star-icon-grey.gif" id="restaurant.php?restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <img src="images/img/Star-icon-grey.gif" id="restaurant.php?restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html#tabs-3" style="cursor:pointer;">
                          <?php } ?>
						  
                         </a>
                          
                          
                          <?php } ?>
                              <a href=""><font><font style="font-size:14px;"><?php echo $rnm=mysql_num_rows(mysql_query("SELECT * FROM  `tbl_restaurantReview` where RestaurantReviewId='".$data['id']."' ")); ?> reviews</font></font></a>
                              
   <?php  
   $DeliveryTime=mysql_fetch_assoc(mysql_query("SELECT * FROM  `tbl_restDeliveryTime` where restaurant_id='".$data['id']."'"));
   $takeawayTime=mysql_fetch_assoc(mysql_query("SELECT * FROM  `tbl_restTakeawayTime` where restaurant_id='".$data['id']."'"));
   include('TimeTable.php');
   //$DeliveryTime=mysql_fetch_assoc(mysql_query("SELECT * FROM  `tbl_restDeliveryTime24` where restaurantID='".$data['id']."'"));
   //$takeawayTime=mysql_fetch_assoc(mysql_query("SELECT * FROM  `tbl_restTakeawayTime24` where restaurantID='".$data['id']."'"));
   //include('TimeTable24Hour.php');
   //include('displayTimeData.php');
    ?>
   
                             </div>
                              </td>
			<td><div class="rest_delivery"><span class="b18b"><font><font><?php echo stripslashes(ucwords($data['restaurant_avarage_deliveryTime']));?> </font></font></span>
            
            
             
                            </div>
                            
            </td>
			<td><div class="rest_min"><span class="b18b"><font><font><?php echo $data['restaurant_default_min_order'];?>  <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></font></font></span>
            
            </div></td>
            <td><div class="rest_deals">
             <?php 
			 $OfferQuery=mysql_query("select * from tbl_restaurantOffer where restaurant_id='".$data['id']."' and status='0'");
			  $RestaurantOffer=mysql_fetch_assoc($OfferQuery); 
			  if(mysql_num_rows($OfferQuery)>0){
			  mysql_query("update tbl_restaurantAdd set RestaurantDeals='1' where id='".$RestaurantOffer['restaurant_id']."'");
			 // echo "update tbl_restaurantAdd set RestaurantDeals='1' where id='".$RestaurantOffer['restaurant_id']."'";
			  }
			  else
			  {
			   mysql_query("update tbl_restaurantAdd set RestaurantDeals='0' where id='".$RestaurantOffer['restaurant_id']."'");
			  }
			  
			 ?><?php if($RestaurantOffer['RestaurantOfferPrice']!=''){ 
			
			 ?>
             <?php if($data['offerType']!=0){
			 $dataOffertype=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantOfferType where id='".$data['offerType']."'"));
			  ?>
            <img src="control/PaymentIcon/<?php echo $dataOffertype['restofferTypeIcon'];?>" alt="<?php echo $dataOffertype['restofferTypeName'];?>" title="<?php echo $dataOffertype['restofferTypeName'];?>" width="58" height="50" />
            <?php } else { ?>
             <img src="images/img/4.png" />
            <?php } ?>
            <?php } ?>
            </div></td>
            <td valign="bottom"> 
            
            <div class="rest_order">
            <?php if($close==1 && $data['preOrdersupport']==1) {?>
            <div class="btn_closed" style="background-color: rgb(255, 215, 0);" id="restaurant.php?preorder=1&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html"  ><a  id="restaurant.php?preorder=1&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html" style="cursor:pointer;"  class="confirm7777"><?php echo $OrderButton;?></a></div>
             <?php if($close==1 ){ ?>
                              
                              <div class="showtime" >
                          <a class="tooltips"  href="#"><?php echo ucwords($TableLanguage1['ViewTimingText']);?>
							<span><h3>Delivery Hours</h3>
                            <div class="delivery" >
                            <div class="dleft">
                            <div class="time_container">
                            <div class="day">Sun</div>
                            <div class="time"> <?php 
							if($DeliveryTime['restaurant_delivery_sun_selected']!='')
   							{
   							echo $DeliveryTime['restaurant_delivery_sun_open_hr'].':'.$DeliveryTime['restaurant_delivery_sun_open_min'].''.$DeliveryTime['restaurant_delivery_sun_open_am'].'&nbsp;-&nbsp;'.$DeliveryTime['restaurant_delivery_sun_close_hr'].':'.$DeliveryTime['restaurant_delivery_sun_close_min'].''.$DeliveryTime['restaurant_delivery_sun_open_pm'];
  							}
							else
							{
							echo '<strong style="color:#F00000;">Close</strong>';
							}
							?></div>
                            </div>
                            <div class="time_container">
                            <div class="day">Mon</div>
                            <div class="time">
                            <?php 
							if($DeliveryTime['restaurant_delivery_mon_selected']!='')
   							{
   							echo $DeliveryTime['restaurant_delivery_mon_open_hr'].':'.$DeliveryTime['restaurant_delivery_mon_open_min'].''.$DeliveryTime['restaurant_delivery_mon_open_am'].'&nbsp;-&nbsp;'.$DeliveryTime['restaurant_delivery_mon_close_hr'].':'.$DeliveryTime['restaurant_delivery_mon_close_min'].''.$DeliveryTime['restaurant_delivery_mon_open_pm'];
  							}
							else
							{
							echo '<strong style="color:#F00000;">Close</strong>';
							}
							?>
                            </div>
                            </div>
                            <div class="time_container">
                            <div class="day">Tue</div>
                            <div class="time"><?php 
							if($DeliveryTime['restaurant_delivery_tue_selected']!='')
   							{
   							echo $DeliveryTime['restaurant_delivery_tue_open_hr'].':'.$DeliveryTime['restaurant_delivery_tue_open_min'].''.$DeliveryTime['restaurant_delivery_tue_open_am'].'&nbsp;-&nbsp;'.$DeliveryTime['restaurant_delivery_tue_close_hr'].':'.$DeliveryTime['restaurant_delivery_tue_close_min'].''.$DeliveryTime['restaurant_delivery_tue_open_pm'];
  							}
							else
							{
							echo '<strong style="color:#F00000;">Close</strong>';
							}?></div>
                            </div>
                            <div class="time_container">
                            <div class="day">Wed</div>
                            <div class="time"><?php 
							if($DeliveryTime['restaurant_delivery_wed_selected']!='')
   							{
   							echo $DeliveryTime['restaurant_delivery_wed_open_hr'].':'.$DeliveryTime['restaurant_delivery_wed_open_min'].''.$DeliveryTime['restaurant_delivery_wed_open_am'].'&nbsp;-&nbsp;'.$DeliveryTime['restaurant_delivery_wed_close_hr'].':'.$DeliveryTime['restaurant_delivery_wed_close_min'].''.$DeliveryTime['restaurant_delivery_wed_open_pm'];
  							}
							else
							{
							echo '<strong style="color:#F00000;">Close</strong>';
							}?></div>
                            </div>
                          
                            </div>
                            <div class="dright">
                            <div class="time_container">
                            <div class="day">Thu</div>
                            <div class="time"><?php 
							if($DeliveryTime['restaurant_delivery_thu_selected']!='')
   							{
   							echo $DeliveryTime['restaurant_delivery_thu_open_hr'].':'.$DeliveryTime['restaurant_delivery_thu_open_min'].''.$DeliveryTime['restaurant_delivery_thu_open_am'].'&nbsp;-&nbsp;'.$DeliveryTime['restaurant_delivery_thu_close_hr'].':'.$DeliveryTime['restaurant_delivery_thu_close_min'].''.$DeliveryTime['restaurant_delivery_thu_open_pm'];
  							}
							else
							{
							echo '<strong style="color:#F00000;">Close</strong>';
							}?></div>
                            </div>
                             <div class="time_container">
                            <div class="day">Fri</div>
                            <div class="time"><?php 
							if($DeliveryTime['restaurant_delivery_fri_selected']!='')
   							{
   							echo $DeliveryTime['restaurant_delivery_fri_open_hr'].':'.$DeliveryTime['restaurant_delivery_fri_open_min'].''.$DeliveryTime['restaurant_delivery_fri_open_am'].'&nbsp;-&nbsp;'.$DeliveryTime['restaurant_delivery_fri_close_hr'].':'.$DeliveryTime['restaurant_delivery_fri_close_min'].''.$DeliveryTime['restaurant_delivery_fri_open_pm'];
  							}
							else
							{
							echo '<strong style="color:#F00000;">Close</strong>';
							}?></div>
                            </div>
                             <div class="time_container">
                            <div class="day">Sat</div>
                            <div class="time"><?php 
							if($DeliveryTime['restaurant_delivery_sat_selected']!='')
   							{
   							echo $DeliveryTime['restaurant_delivery_sat_open_hr'].':'.$DeliveryTime['restaurant_delivery_sat_open_min'].''.$DeliveryTime['restaurant_delivery_sat_open_am'].'&nbsp;-&nbsp;'.$DeliveryTime['restaurant_delivery_sat_close_hr'].':'.$DeliveryTime['restaurant_delivery_sat_close_min'].''.$DeliveryTime['restaurant_delivery_sat_open_pm'];
  							}
							else
							{
							echo '<strong style="color:#F00000;">Close</strong>';
							}?></div>
                            </div>
                            </div>
                            </div>
                            </span></a>
                            </div>
                            <?php } ?>
            <?php } else if($close==1) {?>
            <div class="btn_closed close" id="restaurant.php?close=1&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html" ><a style="cursor:pointer;" id="restaurant.php?close=1&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html" class="close"><?php echo $TimingStatus;?></a></div>
             <?php if($close==1){ ?>
                              
                              <div class="showtime" >
                          <a class="tooltips"  href="#"><?php echo ucwords($TableLanguage1['ViewTimingText']);?>
							<span><h3>Delivery Hours</h3>
                            <div class="delivery" >
                            <div class="dleft">
                            <div class="time_container">
                            <div class="day">Sun</div>
                            <div class="time"> <?php 
							if($DeliveryTime['restaurant_delivery_sun_selected']!='')
   							{
   							echo $DeliveryTime['restaurant_delivery_sun_open_hr'].':'.$DeliveryTime['restaurant_delivery_sun_open_min'].''.$DeliveryTime['restaurant_delivery_sun_open_am'].'&nbsp;-&nbsp;'.$DeliveryTime['restaurant_delivery_sun_close_hr'].':'.$DeliveryTime['restaurant_delivery_sun_close_min'].''.$DeliveryTime['restaurant_delivery_sun_open_pm'];
  							}
							else
							{
							echo '<strong style="color:#F00000;">Close</strong>';
							}
							?></div>
                            </div>
                            <div class="time_container">
                            <div class="day">Mon</div>
                            <div class="time">
                            <?php 
							if($DeliveryTime['restaurant_delivery_mon_selected']!='')
   							{
   							echo $DeliveryTime['restaurant_delivery_mon_open_hr'].':'.$DeliveryTime['restaurant_delivery_mon_open_min'].''.$DeliveryTime['restaurant_delivery_mon_open_am'].'&nbsp;-&nbsp;'.$DeliveryTime['restaurant_delivery_mon_close_hr'].':'.$DeliveryTime['restaurant_delivery_mon_close_min'].''.$DeliveryTime['restaurant_delivery_mon_open_pm'];
  							}
							else
							{
							echo '<strong style="color:#F00000;">Close</strong>';
							}
							?>
                            </div>
                            </div>
                            <div class="time_container">
                            <div class="day">Tue</div>
                            <div class="time"><?php 
							if($DeliveryTime['restaurant_delivery_tue_selected']!='')
   							{
   							echo $DeliveryTime['restaurant_delivery_tue_open_hr'].':'.$DeliveryTime['restaurant_delivery_tue_open_min'].''.$DeliveryTime['restaurant_delivery_tue_open_am'].'&nbsp;-&nbsp;'.$DeliveryTime['restaurant_delivery_tue_close_hr'].':'.$DeliveryTime['restaurant_delivery_tue_close_min'].''.$DeliveryTime['restaurant_delivery_tue_open_pm'];
  							}
							else
							{
							echo '<strong style="color:#F00000;">Close</strong>';
							}?></div>
                            </div>
                            <div class="time_container">
                            <div class="day">Wed</div>
                            <div class="time"><?php 
							if($DeliveryTime['restaurant_delivery_wed_selected']!='')
   							{
   							echo $DeliveryTime['restaurant_delivery_wed_open_hr'].':'.$DeliveryTime['restaurant_delivery_wed_open_min'].''.$DeliveryTime['restaurant_delivery_wed_open_am'].'&nbsp;-&nbsp;'.$DeliveryTime['restaurant_delivery_wed_close_hr'].':'.$DeliveryTime['restaurant_delivery_wed_close_min'].''.$DeliveryTime['restaurant_delivery_wed_open_pm'];
  							}
							else
							{
							echo '<strong style="color:#F00000;">Close</strong>';
							}?></div>
                            </div>
                          
                            </div>
                            <div class="dright">
                            <div class="time_container">
                            <div class="day">Thu</div>
                            <div class="time"><?php 
							if($DeliveryTime['restaurant_delivery_thu_selected']!='')
   							{
   							echo $DeliveryTime['restaurant_delivery_thu_open_hr'].':'.$DeliveryTime['restaurant_delivery_thu_open_min'].''.$DeliveryTime['restaurant_delivery_thu_open_am'].'&nbsp;-&nbsp;'.$DeliveryTime['restaurant_delivery_thu_close_hr'].':'.$DeliveryTime['restaurant_delivery_thu_close_min'].''.$DeliveryTime['restaurant_delivery_thu_open_pm'];
  							}
							else
							{
							echo '<strong style="color:#F00000;">Close</strong>';
							}?></div>
                            </div>
                             <div class="time_container">
                            <div class="day">Fri</div>
                            <div class="time"><?php 
							if($DeliveryTime['restaurant_delivery_fri_selected']!='')
   							{
   							echo $DeliveryTime['restaurant_delivery_fri_open_hr'].':'.$DeliveryTime['restaurant_delivery_fri_open_min'].''.$DeliveryTime['restaurant_delivery_fri_open_am'].'&nbsp;-&nbsp;'.$DeliveryTime['restaurant_delivery_fri_close_hr'].':'.$DeliveryTime['restaurant_delivery_fri_close_min'].''.$DeliveryTime['restaurant_delivery_fri_open_pm'];
  							}
							else
							{
							echo '<strong style="color:#F00000;">Close</strong>';
							}?></div>
                            </div>
                             <div class="time_container">
                            <div class="day">Sat</div>
                            <div class="time"><?php 
							if($DeliveryTime['restaurant_delivery_sat_selected']!='')
   							{
   							echo $DeliveryTime['restaurant_delivery_sat_open_hr'].':'.$DeliveryTime['restaurant_delivery_sat_open_min'].''.$DeliveryTime['restaurant_delivery_sat_open_am'].'&nbsp;-&nbsp;'.$DeliveryTime['restaurant_delivery_sat_close_hr'].':'.$DeliveryTime['restaurant_delivery_sat_close_min'].''.$DeliveryTime['restaurant_delivery_sat_open_pm'];
  							}
							else
							{
							echo '<strong style="color:#F00000;">Close</strong>';
							}?></div>
                            </div>
                            </div>
                            </div>
                            </span></a>
                            </div>
                            <?php } ?>
            <?php } else{?>
            <div class="btn_order"> 
             <a href="restaurant.php?restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html"><?php echo $OrderButton;?></a>
            </div>
            <?php } ?>
            </div>
           
            </td>
           
		</tr>
          <script>
var message1 = '<strong><?php echo ucwords($TableLanguage1['PreorderOrderAlert']);?></strong>';

$('.confirm7777').click(function(e) {
	e.preventDefault();
  $.modal.confirm(message1, function(val){
  var url1=e.target.id;
    if(val == true) 
	{
	window.location.href=url1;
	}
});
});

var message = '<strong><?php echo ucwords($TableLanguage1['closeOrderAlert']);?></strong>';

$('.close').click(function(e) {
	e.preventDefault();
  $.modal.alert(message, function(val){
  var url=e.target.id;
    if(val == true) 
	{
	//window.location.href=url;
	}
});
});

</script>
         <?php } } else { ?>
                                     <tr><td colspan="6">
                                    <div style="padding:20px; margin-bottom:100px; font-size:18px; color:#F40000; font-weight:bold;">Sorry ! No Restaurant has been found related this keywords . try again !!! </div>
                                   </td></tr>
                                    
                                    <?php } ?>
    
        
       
    </tbody>
    </table>
    
                </div>    
                   

 </div>
 
 </div>
 
  
  
  
  
   </div>
  <!--content container ends-->
  
</div>
<!--contentwrapper Ends-->
<a href="#" class="go-top"><?php echo ucwords($TableLanguage1['BackToTopText']);?></a>

	<script>
		$(document).ready(function() {
			// Show or hide the sticky footer button
			$(window).scroll(function() {
				if ($(this).scrollTop() > 200) {
					$('.go-top').fadeIn(200);
				} else {
					$('.go-top').fadeOut(200);
				}
			});
			
			// Animate the scroll to top
			$('.go-top').click(function(event) {
				event.preventDefault();
				
				$('html, body').animate({scrollTop: 0}, 300);
			})
		});
	</script>
  



<!--footer wrapper starts-->
<?php include('route/Footer.php'); ?>
<script type="application/javascript">
function ShowData() {



// Cuisine Filter Value
var restaurant_cuisine = document.getElementsByName('restaurant_cuisine');
var restaurant_cuisinestring = '';
for(var i=0; i<restaurant_cuisine.length; i++) {
if(restaurant_cuisine[i].checked == true) {
 restaurant_cuisinestring += ((restaurant_cuisinestring == '') ? '' : ',') + restaurant_cuisine[i].value;
 }
 }
 
// Home Delivery Restaurant Service 
var RestaurantServiceH = document.getElementsByName('RestaurantServiceH');
var RestaurantServiceHstring = '';
for(var i=0; i<RestaurantServiceH.length; i++) {
if(RestaurantServiceH[i].checked == true) {
 RestaurantServiceHstring += ((RestaurantServiceHstring == '') ? '' : ',') + RestaurantServiceH[i].value;
 }
 }
// Pickup Restaurant Service 
var RestaurantServiceP = document.getElementsByName('RestaurantServiceP');
var RestaurantServicePstring = '';
for(var i=0; i<RestaurantServiceP.length; i++) {
if(RestaurantServiceP[i].checked == true) {
RestaurantServicePstring += ((RestaurantServicePstring == '') ? '' : ',') + RestaurantServiceP[i].value;
 }
 }

// Restaurant Deals Available Service 
var RestaurantDeals = document.getElementsByName('RestaurantDeals');
var RestaurantDealsstring = '';
for(var i=0; i<RestaurantDeals.length; i++) {
if(RestaurantDeals[i].checked == true) {
RestaurantDealsstring += ((RestaurantDealsstring == '') ? '' : ',') + RestaurantDeals[i].value;
 }
 }
 
 // url value
 

 var post_data ='restaurant_cuisine='+restaurant_cuisinestring+'&RestaurantServiceH='+RestaurantServiceHstring+'&RestaurantServiceP='+RestaurantServicePstring+'&RestaurantDeals='+RestaurantDealsstring+'&restaurantState=<?php echo $_GET['restaurantState'];?>'+'&restaurantCity=<?php echo $_GET['restaurantCity'];?>'+'&rating=<?php echo $_GET['rating'];?>'+'&delivery=<?php echo $_GET['delivery'];?>'+'&RestaurantPostcode=<?php echo $_GET['RestaurantPostcode'];?>';
//alert(post_data);
        $.ajax({
            type: "POST",
            url: "restaurant_filter.php",
            data: post_data,
            success: function(data) {
                $('#ajax_contents').html(data);
			
            }

        });

    }

</script>
<!--footer wrapper ends-->

<?php /*?><script src="js/search/jquery-ui.min.js" type="text/javascript"></script>
<script src="js/search/plugins.js"></script>
<!--<script src="js/search/app.js"></script>-->
<script src="js/search/app.js" type="text/javascript"></script>
<script src="js/search/jquery.lockfixed.js"></script><?php */?>
</body>
</html>
