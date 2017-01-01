<?php 
ob_start();
session_start();
include('route/functions.php');
$db= new User();
include('config1.php');
mysql_query ("set character_set_results='utf8'"); 
date_default_timezone_set('Asia/Calcutta');
$AdminDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_siteSetting order by id asc"));
include('generateTimeCalculation.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="tables/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="tables/DT_bootstrap.css">
<link href="css/reset2.css" type="text/css" rel="stylesheet" media="all" />
<script type="text/javascript" charset="utf-8" language="javascript" src="tables/jquery.js"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="tables/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="tables/DT_bootstrap.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Search Restaurants</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=yes"/>
<link href="css/responsive_tab.css" rel="stylesheet" media="all" />
<link href="css/responsive_com.css" rel="stylesheet" media="all" />
<link href="css/responsive_comlow.css" rel="stylesheet" media="all" />
<style type="text/css">
/*tooltip style*/
a.tooltip{
	outline:none;
}
a.tooltip strong {
	line-height:30px;
}
a.tooltip:hover {
	text-decoration:none;
}
a.tooltip span {
	z-index:10;
	display:none;
	padding:14px 20px;
	margin-top:-85px;
	margin-left:-130px;
	width:240px;
	line-height:16px;
	min-height:50px;
	background:url(images/callout.gif) no-repeat;
	background-position:110px 90px;
}
a.tooltip:hover span {
	display:inline;
	position:absolute;
	color:#111;
	border:1px solid #DCA;
	background-color:#fffAF0;
}
/*CSS3 extras*/
a.tooltip span {
	border-radius:4px;
	-moz-border-radius: 4px;
	-webkit-border-radius: 4px;
	-moz-box-shadow:5px 5px 8px #CCC;
	-webkit-box-shadow: 5px 5px 8px #CCC;
	box-shadow: 5px 5px 8px #CCC;
}
</style>
<style type="text/css">
::-webkit-scrollbar-track-piece {
background-color: #f45400;
border-left: 1px solid #CCC;
-webkit-box-shadow: inset 0 0 12px rgba(0, 0, 0, 0.3);
}
::-webkit-scrollbar {
width:10px;
height:10px;
);
}
::-webkit-scrollbar-thumb {
background-color:#f45400;
}
::-webkit-scrollbar-thumb:hover {
height:50px;
background-color:#f45400;
-webkit-border-radius:4px;
}
::moz-scrollbar-track-piece {
background-color: #f45400;
border-left: 1px solid #CCC;
moz-box-shadow: inset 0 0 12px rgba(0, 0, 0, 0.3);
}
::moz-scrollbar {
width:10px;
height:10px;
);
}
::moz-scrollbar-thumb {
background-color:#f45400;
}
::moz-scrollbar-thumb:hover {
height:50px;
background-color:#f45400;
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
<div id="contentwrapper" style="padding-top:30px; " >
<!--content container starts-->
<div class="container" style="min-height:1190px;">
  <!-- mid search  starts-->
  <div class="midserach">
    <div class="steps">
      <ul>
        <li style="float:left;"> <a href="#"> <span>1</span> Search </a> </li>
         <li style="float:left;"> <a href="#" class="selected"> <span class="selected">2</span> Select Restaurant </a> </li>
         <li style="float:left;"> <a href="#"> <span>3</span> Place Order </a> </li>
         <li style="float:left;"> <a href="#"> <span>4</span> Checkout </a> </li>
      </ul>
       <div style="clear:both;"></div>
    </div>
     <div style="clear:both;"></div>
  </div>
  <!-- mid search  ends-->
  <div class="midcontainer">
    <?php include('LeftPanel.php'); ?>
    <div class="right">
      <div class="table_container"  id="ajax_contents">
        <?php 

if($_GET['RestaurantPostcode']!='')
{
$tbalePostcode=",tbl_restaurantDeliveryArea";
$RestaurantPostcodeValue=" and restaurantCity='".$_GET['restaurantCity']."' and tbl_restaurantDeliveryArea.restaurant_delivery_area='".$_GET['RestaurantPostcode']."'";
}			
if($_GET['rating']!='')
{
$RatingValue=" and rating='".$_GET['rating']."'";
}
if($_GET['delivery']!='')
{
$deliveryValue=explode('-',$_GET['delivery']);
$deliveryValue=" and restaurant_avarage_deliveryCost >$deliveryValue[0] and restaurant_avarage_deliveryCost< $deliveryValue[1]";
}

if($_GET['open_status']!='')
{
$open_statusValue=" and open_status='".$_GET['open_status']."'";
}

$Wheredata=" where status='0' ";
if($_GET['restaurantState']!='' && $_GET['restaurantCity']!='' && $_GET['restaurant_cuisine']!='')
{
$Wheredata .=" and restaurantState='".$_GET['restaurantState']."' and restaurantCity='".$_GET['restaurantCity']."' and restaurant_cuisine Like '%".$_GET['restaurant_cuisine']."%' $RatingValue  $deliveryValue $open_statusValue";
}
else if($_GET['restaurantState']!='' && $_GET['restaurantCity']!='')
{
$Wheredata .=" and restaurantState='".$_GET['restaurantState']."' and restaurantCity='".$_GET['restaurantCity']."' $RatingValue $deliveryValue $open_statusValue";
}
else if($_GET['restaurantState']!='' && $_GET['restaurant_cuisine']!='')
{
$Wheredata .=" and restaurantState='".$_GET['restaurantState']."' and restaurant_cuisine Like '%".$_GET['restaurant_cuisine']."%' $RatingValue $deliveryValue $open_statusValue";
}
else if($_GET['restaurantState']!='')
{
$Wheredata .=" and restaurantState='".$_GET['restaurantState']."' $RatingValue $deliveryValue $open_statusValue";
}
else if($_GET['restaurant_cuisine']!='')
{
$Wheredata .=" and restaurant_cuisine Like '%".$_GET['restaurant_cuisine']."%' $RatingValue $deliveryValue $open_statusValue";
}
else
{
$Wheredata .=" and 1 $RatingValue $deliveryValue $open_statusValue";
}
$MAINSQL="select * from tbl_restaurantAdd $tbalePostcode $Wheredata $RestaurantPostcodeValue group by restaurant_name asc";
//echo $MAINSQL;
$result = mysql_query($MAINSQL);
$numrows=mysql_num_rows($result); ?>
        <?php 
		if($_GET['restaurantState']!='')
  {
  $mplh=mysql_fetch_assoc(mysql_query("select * from tbl_state where id='".$_GET['restaurantState']."'"));
  $StateName=$mplh['stateName'];
  }
if($_GET['restaurantState']!='' && $_GET['restaurantCity']!='' && $_GET['restaurant_cuisine']!='')
{
$Bracumb=$_GET['restaurant_cuisine'].','.$_GET['restaurantCity'].','.$StateName.'';
}
else if($_GET['restaurantState']!='' && $_GET['restaurantCity']!='')
{
$Bracumb=$StateName.','.$_GET['restaurantCity'];
}
else if($_GET['restaurantCity']!='' && $_GET['RestaurantPostcode']!='')
{
$Bracumb=$_GET['RestaurantPostcode'].','.$_GET['restaurantCity'];
}
else if($_GET['restaurantState']!='' && $_GET['restaurant_cuisine']!='')
{
$Bracumb=$_GET['restaurant_cuisine'].','.$StateName;
}
else if($_GET['restaurantState']!='')
{
$Bracumb=$StateName;
}
else if($_GET['restaurant_cuisine']!='')
{
$Bracumb=$_GET['restaurant_cuisine'];
}
else
{
 $Bracumb="Home Delivery and Pickup Restaurant";
}
?>
        <div class="list-h">
          <h2 style="padding:0 0 1px;"><span style="color:#000; font-weight:bold;">&nbsp;&nbsp;<?php echo $numrows;?> Restaurants</span> serving </h2>
          <h2 style="padding:0 0 1px;"> <span> <?php echo  $Bracumb;?></span> </h2>
          <h2><a class="verifyaddress" href="addressverification.php" style="color:#777;">change of address </a></h2>
           <div style="clear:both;"></div>
        </div>
        <table width="100%"  cellpadding="0"  cellspacing="0" border="0" class="table table-striped " <?php if($numrows>0){?>id="example" <?php } ?>>
          <thead>
            <tr class="table_head_bgimg" style="background:url(images/img/results-stripe-bg.png) repeat-x top;">
              <th>Restaurants</th>
              <th>Grade</th>
              <th>Delivery Time</th>
              <th>Min. Order</th>
              <th>Deals</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody >
            <?php if($numrows>0){$i=1;
	while($data=mysql_fetch_assoc($result)){ 
    ?>
            <tr style="border:none;">
              <td style="border-right:1px solid #ccc;"><div class="rest_img">
                  <?php if($close==1 && $data['preOrdersupport']==1) {?>
                  <a href="restaurant.php?restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurantCity']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html" onClick="return confirm('Order will be delivered when the restaurant open');">
                  <?php if($data['restaurant_Logo']!=''){ ?>
                  <img src="control/restaurantlogoimg/small/<?php echo $data['restaurant_Logo'];?>"  alt="<?php echo $data['restaurant_name'];?>" onclick="">
                  <?php } else {?>
                  <img src="images/noimage.jpg" style="width:80px; height:80px;" class="" alt="<?php echo $data['restaurant_name'];?>" />
                  <?php }?>
                  </a>
                  <?php } else if($close==1) {?>
                  <a  href="restaurant.php?close=1&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurantCity']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html" onClick="return confirm('Restaurant is closed');">
                  <?php if($data['restaurant_Logo']!=''){ ?>
                  <img src="control/restaurantlogoimg/small/<?php echo $data['restaurant_Logo'];?>"  alt="<?php echo $data['restaurant_name'];?>" onclick="">
                  <?php } else {?>
                  <img src="images/noimage.jpg" style="width:80px; height:80px;" class="" alt="<?php echo $data['restaurant_name'];?>" />
                  <?php }?>
                  </a>
                  <?php } else{?>
                  <a href="restaurant.php?restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurantCity']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html">
                  <?php if($data['restaurant_Logo']!=''){ ?>
                  <img src="control/restaurantlogoimg/small/<?php echo $data['restaurant_Logo'];?>"  alt="<?php echo $data['restaurant_name'];?>" onclick="">
                  <?php } else {?>
                  <img src="images/noimage.jpg" style="width:80px; height:80px;" class="" alt="<?php echo $data['restaurant_name'];?>" />
                  <?php }?>
                  </a>
                  <?php } ?>
                </div>
                <div class="rest_name"><a href=""> <span class="redhead"><font><font> <?php echo stripslashes(ucwords($data['restaurant_name']));?></font></font></span></a>
                  <h3><?php $cuisin=explode(',',$data['restaurant_cuisine']);
			$ggphoto='';
			foreach($cuisin as $c)
			{
			$ggphoto.=$c.' ,';
			}
			echo rtrim($ggphoto,',');
			?></h3>
                  <?php /*?>
		**************************************************************************
				  <?php $RestaurantOffer=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantOffer where restaurant_id='".$data['id']."'")); ?>									<?php if($RestaurantOffer['RestaurantOfferPrice']!=''){ ?>
            <img src="images/img/4.png" />
            <?php } ?><?php */?>
                </div>
                <?php /*?> <div class="rest_deals">
             <?php $RestaurantOffer=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantOffer where restaurant_id='".$data['id']."'")); ?>									<?php if($RestaurantOffer['RestaurantOfferPrice']!=''){ ?>
            <img src="images/img/4.png" />
            <?php } ?>
            
            </div>
			***********************************************************************************
			<?php */?>
              </td>
              <td style="border-right:1px solid #ccc;"><div class="rest_grade"> <a href="">
                  <?php if($data['rating']==5){ ?>
                  <img src="images/img/Star-icon.gif"> <img src="images/img/Star-icon.gif"> <img src="images/img/Star-icon.gif"> <img src="images/img/Star-icon.gif"> <img src="images/img/Star-icon.gif">
                  <?php } elseif($data['rating']==4){?>
                  <img src="images/img/Star-icon.gif"> <img src="images/img/Star-icon.gif"> <img src="images/img/Star-icon.gif"> <img src="images/img/Star-icon.gif"> <img src="images/img/Star-icon-grey.gif">
                  <?php } elseif($data['rating']==3){?>
                  <img src="images/img/Star-icon.gif"> <img src="images/img/Star-icon.gif"> <img src="images/img/Star-icon.gif"> <img src="images/img/Star-icon-grey.gif"> <img src="images/img/Star-icon-grey.gif">
                  <?php } elseif($data['rating']==2){?>
                  <img src="images/img/Star-icon.gif"> <img src="images/img/Star-icon.gif"> <img src="images/img/Star-icon-grey.gif"> <img src="images/img/Star-icon-grey.gif"> <img src="images/img/Star-icon-grey.gif">
                  <?php } elseif($data['rating']==1){?>
                  <img src="images/img/Star-icon.gif"> <img src="images/img/Star-icon-grey.gif"> <img src="images/img/Star-icon-grey.gif"> <img src="images/img/Star-icon-grey.gif"> <img src="images/img/Star-icon-grey.gif">
                  <?php } else { ?>
                  <img src="images/img/Star-icon-grey.gif"> <img src="images/img/Star-icon-grey.gif"> <img src="images/img/Star-icon-grey.gif"> <img src="images/img/Star-icon-grey.gif"> <img src="images/img/Star-icon-grey.gif">
                  <?php } ?>
                  </a> <a href=""><font><font style="font-size:13px;"><?php echo $rnm=mysql_num_rows(mysql_query("SELECT * FROM  `tbl_restaurantReview` where RestaurantReviewId='".$data['id']."' ")); ?> reviews</font></font></a>
                  <?php  
   $DeliveryTime=mysql_fetch_assoc(mysql_query("SELECT * FROM  `tbl_restDeliveryTime` where restaurant_id='".$data['id']."'"));
   $takeawayTime=mysql_fetch_assoc(mysql_query("SELECT * FROM  `tbl_restTakeawayTime` where restaurant_id='".$data['id']."'"));
   include('TimeTable.php');
    ?>
    <?php if($close==1) {?>
                  <div class="showtime" > <a class="tooltips"  href="#">View Time <span>
                    <h3>Delivery Hours</h3>
                    <div class="delivery" >
                      <div class="dleft">
                        <div class="time_container">
                          <div class="day">Sun</div>
                          <div class="time">
                            <?php 
							if($DeliveryTime['restaurant_delivery_sun_selected']!='')
   							{
   							echo $DeliveryTime['restaurant_delivery_sun_open_hr'].':'.$DeliveryTime['restaurant_delivery_sun_open_min'].''.$DeliveryTime['restaurant_delivery_sun_open_am'].'&nbsp;-&nbsp;'.$DeliveryTime['restaurant_delivery_sun_close_hr'].':'.$DeliveryTime['restaurant_delivery_sun_close_min'].''.$DeliveryTime['restaurant_delivery_sun_open_pm'];
  							}
							else
							{
							echo '<strong style="color:#F00000;">Close</strong>';
							}
							?>
                          </div>
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
                          <div class="time">
                            <?php 
							if($DeliveryTime['restaurant_delivery_tue_selected']!='')
   							{
   							echo $DeliveryTime['restaurant_delivery_tue_open_hr'].':'.$DeliveryTime['restaurant_delivery_tue_open_min'].''.$DeliveryTime['restaurant_delivery_tue_open_am'].'&nbsp;-&nbsp;'.$DeliveryTime['restaurant_delivery_tue_close_hr'].':'.$DeliveryTime['restaurant_delivery_tue_close_min'].''.$DeliveryTime['restaurant_delivery_tue_open_pm'];
  							}
							else
							{
							echo '<strong style="color:#F00000;">Close</strong>';
							}?>
                          </div>
                        </div>
                        <div class="time_container">
                          <div class="day">Wed</div>
                          <div class="time">
                            <?php 
							if($DeliveryTime['restaurant_delivery_wed_selected']!='')
   							{
   							echo $DeliveryTime['restaurant_delivery_wed_open_hr'].':'.$DeliveryTime['restaurant_delivery_wed_open_min'].''.$DeliveryTime['restaurant_delivery_wed_open_am'].'&nbsp;-&nbsp;'.$DeliveryTime['restaurant_delivery_wed_close_hr'].':'.$DeliveryTime['restaurant_delivery_wed_close_min'].''.$DeliveryTime['restaurant_delivery_wed_open_pm'];
  							}
							else
							{
							echo '<strong style="color:#F00000;">Close</strong>';
							}?>
                          </div>
                        </div>
                      </div>
                      <div class="dright">
                        <div class="time_container">
                          <div class="day">Thu</div>
                          <div class="time">
                            <?php 
							if($DeliveryTime['restaurant_delivery_thu_selected']!='')
   							{
   							echo $DeliveryTime['restaurant_delivery_thu_open_hr'].':'.$DeliveryTime['restaurant_delivery_thu_open_min'].''.$DeliveryTime['restaurant_delivery_thu_open_am'].'&nbsp;-&nbsp;'.$DeliveryTime['restaurant_delivery_thu_close_hr'].':'.$DeliveryTime['restaurant_delivery_thu_close_min'].''.$DeliveryTime['restaurant_delivery_thu_open_pm'];
  							}
							else
							{
							echo '<strong style="color:#F00000;">Close</strong>';
							}?>
                          </div>
                        </div>
                        <div class="time_container">
                          <div class="day">Fri</div>
                          <div class="time">
                            <?php 
							if($DeliveryTime['restaurant_delivery_fri_selected']!='')
   							{
   							echo $DeliveryTime['restaurant_delivery_fri_open_hr'].':'.$DeliveryTime['restaurant_delivery_fri_open_min'].''.$DeliveryTime['restaurant_delivery_fri_open_am'].'&nbsp;-&nbsp;'.$DeliveryTime['restaurant_delivery_fri_close_hr'].':'.$DeliveryTime['restaurant_delivery_fri_close_min'].''.$DeliveryTime['restaurant_delivery_fri_open_pm'];
  							}
							else
							{
							echo '<strong style="color:#F00000;">Close</strong>';
							}?>
                          </div>
                        </div>
                        <div class="time_container">
                          <div class="day">Sat</div>
                          <div class="time">
                            <?php 
							if($DeliveryTime['restaurant_delivery_sat_selected']!='')
   							{
   							echo $DeliveryTime['restaurant_delivery_sat_open_hr'].':'.$DeliveryTime['restaurant_delivery_sat_open_min'].''.$DeliveryTime['restaurant_delivery_sat_open_am'].'&nbsp;-&nbsp;'.$DeliveryTime['restaurant_delivery_sat_close_hr'].':'.$DeliveryTime['restaurant_delivery_sat_close_min'].''.$DeliveryTime['restaurant_delivery_sat_open_pm'];
  							}
							else
							{
							echo '<strong style="color:#F00000;">Close</strong>';
							}?>
                          </div>
                        </div>
                      </div>
                    </div>
                    </span></a> </div>
                    <?php } ?>
                </div></td>
              <td style="border-right:1px solid #ccc;"><div class="rest_delivery"><span class="b18b"><font><font><?php echo stripslashes(ucwords($data['restaurant_avarage_deliveryTime']));?> </font></font></span> </div></td>
              <td style="border-right:1px solid #ccc;"><div class="rest_min"><span class="b18b"><font><font><?php echo $data['restaurant_default_min_order'];?> €</font></font></span> </div></td>
              <td style="border-right:1px solid #ccc;"><div class="rest_deals">
                  <?php $RestaurantOffer=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantOffer where restaurant_id='".$data['id']."'")); ?>
                  <?php if($RestaurantOffer['RestaurantOfferPrice']!=''){ ?>
                  <a href="#" class="tooltip"> <img src="images/img/4.png" title="" /> <span> <strong>No description available</strong><br />
                  </span> </a>
                  <?php } ?>
                </div></td>
              <td valign="bottom"><div class="rest_order">
                  <?php if($close==1 && $data['preOrdersupport']==1) {?>
                  <div class="btn_closed" style="background-color: rgb(255, 215, 0);" ><a href="restaurant.php?restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurantCity']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html" onClick="return confirm('Order will be delivered when the restaurant open');"><?php echo $OrderButton;?></a></div>
                  <?php } else if($close==1) {?>
                  <div class="btn_closed" ><a href="restaurant.php?close=1&restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurantCity']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html" onClick="return confirm('Restaurant is closed');"><?php echo $TimingStatus;?></a></div>
                  <?php } else{?>
                  <div class="btn_order"> <a href="restaurant.php?restaurants=<?php echo stripslashes(ucwords($data['id']));?>-<?php echo urlencode(trim($data['restaurantCity']));?>-<?php echo urlencode(trim($data['restaurant_name']));?>.html"><?php echo $OrderButton;?></a> </div>
                  <?php } ?>
                </div></td>
            </tr>
            <?php } } else { ?>
            <tr>
              <td colspan="6"><div style="padding:20px; margin-bottom:100px; font-size:18px; color:#F40000; font-weight:bold;">Sorry ! No Restaurant has been found related this keywords . try again !!! </div></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
         <div style="clear:both;"></div>
      </div>
       <div style="clear:both;"></div>
    </div>
    <div style="clear:both;"></div>
  </div>
  
  <!--content container ends-->
  <div style="clear:both;"></div>
</div>
<div style="clear:both;"></div>
<!--contentwrapper Ends-->
<a href="#" class="go-top">Back to Top</a>
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
