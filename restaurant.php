<?php 
ob_start();
session_start();
include('route/functions.php');
include('config1.php');
mysql_query ("set character_set_results='utf8'"); 
date_default_timezone_set("Asia/Kolkata"); 
$prix=new User();
$curQueryStr=$_SERVER['QUERY_STRING'];
if(strlen($_GET['restaurants'])>0){
$resID=explode("-",$_GET['restaurants']);
$resdata=mysql_fetch_assoc($prix->showtabledata('tbl_restaurantAdd','id',$resID[0]));
$resSEO=mysql_fetch_assoc($prix->showtabledata('tbl_restaurantSEO','restaurant_id',$resID[0]));
}
$AdminDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_siteSetting order by id asc"));
include('generateTimeCalculation.php');
if($_SESSION['preorder']=='')
{
$_SESSION['preorder']=$_GET['preorder'];
}
?>
<?php
$DeliveryTime=mysql_fetch_assoc(mysql_query("SELECT * FROM  `tbl_restDeliveryTime` where restaurant_id='".$resID[0]."'"));
$takeawayTime=mysql_fetch_assoc(mysql_query("SELECT * FROM  `tbl_restTakeawayTime` where restaurant_id='".$resID[0]."'"));
  
//$DeliveryTime=mysql_fetch_assoc(mysql_query("SELECT * FROM  `tbl_restDeliveryTime24` where restaurantID='".$resID[0]."'"));
//$takeawayTime=mysql_fetch_assoc(mysql_query("SELECT * FROM  `tbl_restTakeawayTime24` where restaurantID='".$resID[0]."'"));
//Number of Rating Only without Comment
$RatingReviewQueryAvargewithRatingOnly=mysql_num_rows(mysql_query("select * from tbl_restaurantReview where RestaurantReviewId='".$resID[0]."' and RestaurantReviewContent='' and RestaurantReviewRating!=''"));
$RatingReviewQueryAvargewithRatingWith=mysql_num_rows(mysql_query("select * from tbl_restaurantReview where RestaurantReviewId='".$resID[0]."'  and RestaurantReviewRating!=''"));
//
//Number of Rating 
$RatingReviewTotal=mysql_num_rows(mysql_query("select * from tbl_restaurantReview where RestaurantReviewId='".$resID[0]."' "));
//
if($RatingReviewQueryAvargewithRatingWith!=0)
{
$AverageRatingCode=floor($RatingReviewQueryAvargewithRatingWith/$RatingReviewTotal);
}
else
{
$AverageRatingCode=0;
}   
?>
<?php
 ############Cart Start################

include('route/db.php'); 
$dbObj=new db;
extract($_POST);
if(isset($_POST['item_id'])){
$extraItemID=$_POST['ExtraitemID'];
$ExtraitemGroupID=$_POST['ExtraitemGroupID'];
$GroupextraItemID2=$_POST['GroupSelectionOneID'];
$GroupextraItemIDValue=$_POST['GroupSelectionOneID2'];
if($extraItemID!='')
{
$checkExtra=" AND extraItemID='".$extraItemID."'";
}
mysql_query("update tbl_restaurantMainMenuItemPizzaExtraitemGroup set menuExtraCheckedSelection='0' where menuitemID='".$_POST['item_id']."'");
mysql_query("update tbl_restaurantMainMenuItemPizzaExtraitem set menuExtraCheckedSelection='0' where menuitemID='".$_POST['item_id']."'");
//mysql_query("update tbl_restaurantMainMenuItemPizzaExtraitem set selection='0',selection1='0' where menuitemID='".$_POST['item_id']."'");
if($_POST['offer']==1){
$rec=$dbObj->getData(array("sysIP","sessoionId","hotel_id","quqntity"),"cartNewOffer","sysIP='".$_SERVER['REMOTE_ADDR']."' AND sessoionId='".session_id()."' AND hotel_id='".$resID[0]."' AND itemId='".$_POST['item_id']."'");
//print_r($rec);
		if($rec[0]>0 && $_POST['ChangeProdcut']==1){
		$nqtity=$rec[1]["quqntity"]+1;
			@$crtUP="update cartNewOffer set price='".$price."',extraItemID='".$extraItemID."',ExtraitemGroupID='".$ExtraitemGroupID."',extraItemID2='".$extraItemID1."',GroupextraItemID='".$GroupextraItemID2."',GroupextraItemValue='".$GroupextraItemIDValue."',MenuSize='".$_POST['MenuSize']."',doughValue='".$_POST['doughValue']."',quqntity='".$_POST['quantity']."', baseValue='".$_POST['baseValue']."',cheesValue='".$_POST['cheesValue']."',instructions=N'".$_POST['SpecialInstruction']."' where sysIP='".$_SERVER['REMOTE_ADDR']."' AND sessoionId='".session_id()."' AND hotel_id='".$resID[0]."' AND itemId='".$_POST['item_id']."'";			
			mysql_query($crtUP) or die(mysql_error());			
			}else{
	@$crt="insert into cartNewOffer(sysIP,sessoionId,itemId,price,extraItemID,ExtraitemGroupID,extraItemID2,GroupextraItemID,GroupextraItemValue,MenuSize,quqntity,instructions,hotel_id,doughValue,baseValue,cheesValue)values('".$_SERVER['REMOTE_ADDR']."','".session_id()."','".$_POST['item_id']."','".$price."','".$extraItemID."','".$ExtraitemGroupID."','".$extraItemID1."','".$GroupextraItemID2."','".$GroupextraItemIDValue."','".$_POST['MenuSize']."','".$_POST['quantity']."',N'".$_POST['SpecialInstruction']."','".$resID[0]."','".$doughValue."','".$baseValue."','".$cheesValue."')";
		mysql_query($crt);	
		}		
		}
		else
		{		
		$rec=$dbObj->getData(array("sysIP","sessoionId","hotel_id","quqntity"),"cartNew","sysIP='".$_SERVER['REMOTE_ADDR']."' AND sessoionId='".session_id()."' AND hotel_id='".$resID[0]."' AND itemId='".$_POST['item_id']."' $checkExtra");
//print_r($rec);
		if($rec[0]>0 && $_POST['ChangeProdcut']==1){
		$nqtity=$rec[1]["quqntity"]+1;
			@$crtUP="update cartNew set price='".$price."',extraItemID='".$extraItemID."',ExtraitemGroupID='".$ExtraitemGroupID."',extraItemID2='".$extraItemID1."',GroupextraItemID='".$GroupextraItemID2."',GroupextraItemValue='".$GroupextraItemIDValue."',MenuSize='".$_POST['MenuSize']."',doughValue='".$_POST['doughValue']."',quqntity='".$_POST['quantity']."', baseValue='".$_POST['baseValue']."',cheesValue='".$_POST['cheesValue']."',instructions=N'".$_POST['SpecialInstruction']."' where sysIP='".$_SERVER['REMOTE_ADDR']."' AND sessoionId='".session_id()."' AND hotel_id='".$resID[0]."' AND itemId='".$_POST['item_id']."'";			
			mysql_query($crtUP) or die(mysql_error());			
			}else{
	@$crt="insert into cartNew(sysIP,sessoionId,itemId,price,extraItemID,ExtraitemGroupID,extraItemID2,GroupextraItemID,GroupextraItemValue,MenuSize,quqntity,instructions,hotel_id,doughValue,baseValue,cheesValue)values('".$_SERVER['REMOTE_ADDR']."','".session_id()."','".$_POST['item_id']."','".$price."','".$extraItemID."','".$ExtraitemGroupID."','".$extraItemID1."','".$GroupextraItemID2."','".$GroupextraItemIDValue."','".$_POST['MenuSize']."','".$_POST['quantity']."',N'".$_POST['SpecialInstruction']."','".$resID[0]."','".$doughValue."','".$baseValue."','".$cheesValue."')";
		mysql_query($crt);	
		}
		}		
		unset($_SESSION['offer']);
		unset($_POST['item_id']);		
		}
		if(isset($_POST['dealedit']))
{
$slot_idId=implode(',',$_POST['slot_id']);
$slot_itemNameId=implode(',',$_POST['slot_itemName']);
$dealedit11=implode(',',$_POST['dealedit']);
$slotIDexp=explode(',',$slot_idId);
$slot_itemNameIdexp=explode(',',$slot_itemNameId);
$slot_iteIdexp=explode(',',$dealedit11);
foreach($slotIDexp as  $yy1=>$vvv1)
{
$upDateQuery="update cartfoodDeals set slot_id='".$vvv1."',slotItem_id='".$slot_itemNameIdexp[$yy1]."',slotItemID='$slot_itemNameId' where cartId='".$slot_iteIdexp[$yy1]."'";
mysql_query($upDateQuery);
}
}
else
{
if(isset($_POST['slot_id']))
{
$slot_idId=implode(',',$_POST['slot_id']);
$slot_itemNameId=implode(',',$_POST['slot_itemName']);
$slotIDexp=explode(',',$slot_idId);
$slot_itemNameIdexp=explode(',',$slot_itemNameId);
foreach($slotIDexp as  $yy1=>$vvv1)
{
$CheckData=mysql_query("select * from cartfoodDeals where sysIP='".$_SERVER['REMOTE_ADDR']."' and sessoionId='".session_id()."' and deal_id='".$_POST['deal_id']."'");
if(mysql_num_rows($CheckData)>0)
{
mysql_query("update cartfoodDeals set slot_id='".$vvv1."',slotItem_id='".$slot_itemNameIdexp[$yy1]."',slotItemID='".$slot_itemNameId."',quqntity='1' where sysIP='".$_SERVER['REMOTE_ADDR']."' and sessoionId='".session_id()."' and deal_id='".$_POST['deal_id']."'");
}
else
{
$Dealscrt="insert into cartfoodDeals(sysIP,sessoionId,hotel_id,deal_price,deal_name,deal_id,slot_id,slotItem_id,quqntity,slotItemID)values('".$_SERVER['REMOTE_ADDR']."','".session_id()."','".$resID[0]."','".$_POST['deal_price']."',N'".$_POST['deal_name']."','".$_POST['deal_id']."','".$vvv1."','".$slot_itemNameIdexp[$yy1]."','1','$slot_itemNameId')";
mysql_query($Dealscrt);
}
}
}	
}


unset($_POST['slot_id']);
unset($_POST['dealedit']);
unset($_SESSION['menuofferID']);
include('insertRestaurantDataContact.php');
include('insertRestaurantgroup_order.php');
include('eventInsert.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=yes"/>
<link href="css/reset2.css" type="text/css" rel="stylesheet" media="all" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo stripslashes(ucwords($resdata['restaurant_name'])); ?>-<?php echo stripslashes(ucwords($resdata['restaurant_address'])); ?>,<?php echo stripslashes(ucwords($resdata['restaurantCity'])); ?>|<?php echo stripslashes(ucwords($resSEO['restaurant_MetaTitle'])); ?>| Food Delivery and Reservations!</title>
<link href="tab menu/bootstrap-select.css"  type="text/css" rel="stylesheet" />
<link href="tab menu/bootstrap-select.min.css" type="text/css" rel="stylesheet" />
<link href="tables/table.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<link rel="stylesheet" href="tables/jquery-ui.css">
<link href="tables/tab.css" rel="stylesheet" type="text/css" />
<script>
  $(function() {
    $( "#tabs" ).tabs();
  });
  </script>
<?php /*?><script src="js/jquery.min.js"></script>
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js'></script><?php */?>
<script type="text/javascript">
$(window).scroll(function() {
  var scrollYpos = $(document).scrollTop();
    if (scrollYpos > 500 ) {
      $('.place_order111').animate({'margin-top': scrollYpos - 490 }, {duration: 200, queue: false});
    } else {
     $('.place_order111').animate({'margin-top': 38 },{'margin-bottom':100 }, {duration: 200, queue: false});
    }
}); // Scroll Element with Window

$(window).scroll(function() {
  var scrollYpos = $(document).scrollTop();
    if (scrollYpos > 500 ) {
      $('#leftMenuPanel').animate({'margin-top': scrollYpos - 490 }, {duration: 200, queue: false});
    } else {
     $('#leftMenuPanel').animate({'margin-top':25 },{'margin-bottom':100 }, {duration: 200, queue: false});
    }
}); // Scroll Element with Window
</script>
<link rel="stylesheet" href="colorbox/colorbox.css" />
<script src="colorbox/popup.js"></script>
<script>
			$(document).ready(function(){				
				$(".iframe").colorbox({iframe:true, width:"750px", height:"1000px"});
				$(".iframe1").colorbox({iframe:true, width:"900px", height:"1000px"});
				$(".grouporder").colorbox({iframe:true, width:"550px", height:"500px"});
				$(".email").colorbox({iframe:true, width:"550px", height:"600px"});
				$(".eventpopup").colorbox({iframe:true, width:"600px", height:"700px"});
				$(".iframe3").colorbox({innerWidth:730, innerHeight:1000, iframe:true, escKey:false, overlayClose:false,onLoad: function() {
    $('#cboxClose').remove();
}});
				/*$(".iframe3").colorbox({iframe:true, width:"650px",escKey: false,
overlayClose: false, height:"650px"});*/			
			});		
</script>
<script type="text/javascript">
        $(document).ready(function() {
            $(".dropdown img.flag").addClass("flagvisibility");
            $(".dropdown dt a").click(function() {
                $(".dropdown dd ul").toggle();
            });                        
            $(".dropdown dd ul li a").click(function() {
                var text = $(this).html();
                $(".dropdown dt a span").html(text);
                $(".dropdown dd ul").hide();
                $("#result").html("Selected value is: " + getSelectedValue("sample"));
            });                        
            function getSelectedValue(id) {
                return $("#" + id).find("dt a span.value").html();
            }
            $(document).bind('click', function(e) {
                var $clicked = $(e.target);
                if (! $clicked.parents().hasClass("dropdown"))
                    $(".dropdown dd ul").hide();
            });
            $("#flagSwitcher").click(function() {
                $(".dropdown img.flag").toggleClass("flagvisibility");
            });
        });	
    </script>

</head>
<body>
<!--wrapper starts-->
<div id="wrapper">
  <!--header starts-->
  <?php include("route/TopHeader.php"); ?>
  <!--header ends-->
</div>
<!--wrapper Ends-->
<!--contentwrapper starts-->
<div id="contentwrapper" style="padding-top:30px;">
  <!--content container starts-->
  <div class="container" style="min-height:950px; padding-bottom:37px;">
    <!-- mid search  starts-->
    <div class="midserach">
      <div class="steps">
        <ul>
          <li> <a href="./"> <span>1</span> <?php echo $TableLanguage['SetpSearchText'];?> </a> </li>
          <li> <a href="restaurantSearchText.php?<?php echo $_SESSION['URlCookies'];?>"> <span>2</span> <?php echo $TableLanguage['SetpSelectRestaurantText'];?> </a> </li>
          <li> <a  style="color:#FF091E;cursor:pointer;" href="" > <span class="selected">3</span> <?php echo $TableLanguage['SetpPlaceOrderText'];?> </a> </li>
          <li> <a  style="cursor:pointer;"> <span>4</span> <?php echo $TableLanguage['SetpCheckoutText'];?> </a> </li>
        </ul>
         
      </div>
    </div>
    <!-- mid search  ends-->
    <div class="midcontainer">
      <div class="list-h">
        <h2 style="padding:0 0 1px;"><span><a href="index.php"><?php echo strtoupper($TableLanguage['HomeButtonText']);?></a></span>&raquo;</h2>
        <h2 class="displaynone" style="font-size:14px; float:left;"><a href="restaurantSearchText.php?<?php echo $_SESSION['URlCookies'];?>" style="color:#777;"><?php echo $_SESSION['URlBracumbCookies']; ?></a> &raquo;<span><?php echo stripslashes(ucwords($resdata['restaurant_name'])); ?></span></h2>
      </div>
    </div>
    <?php 
 include('TimeTableRestaurant.php');
 include('TimeTableDisplay.php');
 include('MiddleRestaurant1.php'); ?>
    <div class="tab_menu_container" style="width:72%; float:left; margin-top:35px;">
      <div class="tab_menu" style="width:100%">
        <div id="tabs0" class="htabs"></div>
        <a href="#tabs-1" class="tabberro"><?php echo $TableLanguage['ResMenuText'];?></a>
        <div id="tabs-1" class="tab-content">
          <div id="content" style="padding:1%;">
            <div class="serch_option">
              <div class="select_option">
                <dl id="" class="dropdown">
                  <dt><a ><span><?php echo $TableLanguage4['ResSelectCategoryText'];?></span></a></dt>
                  <dd>
                    <ul>
                      <?php $MenuCategoryQuery=mysql_query("select * from tbl_restMenuCategory where restaurantMenuID='".$resdata['id']."' order by restaurantMenuName asc");while($MenuCategoryData=mysql_fetch_assoc($MenuCategoryQuery)){?>
                      <li><a href="#<?php echo $MenuCategoryData['id'];?>"><?php echo $MenuCategoryData['restaurantMenuName'];?></a></li>
                      <?php } ?>
                    </ul>
                  </dd>
                </dl>
              </div>
              
             
            </div>
            <div class="food_products">
              <div class="food_row">

              <?php 
$offerQuery=mysql_query("select * from tbl_restaurantOffer where status='0' and restaurant_id='".$resID[0]."'");

						  if(mysql_num_rows($offerQuery)>0){
						  ?>
              <div id="discountsinmenu">
                <h3  style="color:#000; margin-bottom:20px;"><?php echo $TableLanguage4['ResOnlineOfferText'];?></h3>
                <table class="dim_table" width="100%">
                  <tr>
                    <?php 
					$i=1;
					while($RestaurantOfferQuery=mysql_fetch_assoc($offerQuery)){ ?>
                    <td align="center"><div style="overflow:hidden; padding:13px;" >
                        <table width="100%">
                          <tr>
                            <td valign="top"></td>
                            <td align="left"><?php echo $RestaurantOfferQuery['RestaurantOfferDescription'];?> </td>
                          </tr>
                        </table>
                      </div></td>
                    <?php if($i==2) { 
  
   echo "</td></tr><tr><td></td></tr>"; 
 $i= 0; } ?>
                    <?php 
 $i++;
 
 } ?>
                  </tr>
                </table>
              </div>
              <?php } ?>
             
              <?php include('restaurantOfferData.php'); ?>
              <div style="clear:both;"></div>
              <div class="food_row_left" style="width:100%;">
              <ul>
                <div id="restaurantMenuData">
                <?php 
												 $MenuCategoryQuery1=mysql_query("select * from tbl_restMenuCategory where restaurantMenuID='".$resdata['id']."' order by menuPosition asc");                       while($MenuCategoryData1=mysql_fetch_assoc($MenuCategoryQuery1)){
													$MenuItemQuery=mysql_query("select * from tbl_restaurantMainMenuItem where RestaurantCategoryID='".$MenuCategoryData1['id']."' and RestaurantPizzaID='".$resdata['id']."' and offeravailableinsert='0' order by itemPosition asc");             
													
													?>
                <table width="100%">
                  <tbody>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td style="height:30px;"><h3 id="<?php echo ucwords($MenuCategoryData1['id']);?>"><?php echo ucwords($MenuCategoryData1['restaurantMenuName']);?></h3></td>
                    </tr>
                    <?php if($MenuCategoryData1['restaurantMenuNameDescription']!=''){ ?>
                    <tr>
                      <td><span style="color:#777777; font-size:12px; font-style:italic; text-align:left;"><font><font><?php echo ucwords($MenuCategoryData1['restaurantMenuNameDescription']);?></font></font></span> </td>
                    </tr>
                    <?php } ?>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                  </tbody>
                </table>
                <ul>
 <?php 
  $i=1;
  $p=1;
  // $cla='class="odd"';
  while($MenuItemData=mysql_fetch_assoc($MenuItemQuery)){ 
 if($p==1 || $p==2)
 {
 $cla='class="odd"';
 }
 else
 {
  $cla='class="even"';
 }
 
  
   $ExtraploDough=mysql_num_rows(mysql_query("select * from tbl_restaurantMainMenuItemPizzaExtraitem where menuitemID='".$MenuItemData['id']."'"));

  ?>
                    <script>
var message = '<strong><?php echo ucwords($TableLanguage1['closeOrderAlert']);?></strong>';

$('.close').click(function(e) {
	e.preventDefault();
  $.modal.confirm(message, function(val){
    if(val == true) 
	{	
	}
});
});
</script>
                    
					<?php if($_GET['close']==1){ ?>
                      <li <?php echo $cla;?>> <a class="close tooltips" >
                        <div class="food_row_name"> <?php echo ucwords($MenuItemData['RestaurantPizzaItemName']);?></div>
                        <span>
                        <div class="fullspan">
                          <div class="span_header">
                            <div class="span_header_left"><?php echo ucwords($MenuItemData['RestaurantPizzaItemName']);?></div>
                            <div class="span_headr_right">
                              <?php 
								if($MenuItemData['RestaurantPizzaItemPrice']!=''){
								echo number_format($MenuItemData['RestaurantPizzaItemPrice'],2);
								}
								else
								{
								echo '0.00';
								}
								?>
                              <?php if($ExtraploDough>0){?>
                               <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?>&nbsp;+
                              <?php } else { ?>
                               <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?>
                              <?php } ?>
                            </div>
                          </div>
                          <?php if($MenuItemData['ResPizzaDescription']!=''){ ?>
                          <div class="span_content">
                            <table width="100%" border="0">
                              <tr>
                                <?php if($MenuItemData['ResPizzaImg']!=''){ ?>
                                <td><div style="width:20%; float:left;"> <img src="control/MenuItemImg/MenuItemImgSmall/<?php echo $MenuItemData['ResPizzaImg'];?>" width="50" height="40" /></div>
                                  <div style="width:80%; float:left;"><?php echo ucwords($MenuItemData['ResPizzaDescription']);?></div></td>
                                <?php } else {?>
                                <td align="left"><?php echo ucwords($MenuItemData['ResPizzaDescription']);?></td>
                                <?php } ?>
                              </tr>
                            </table>
                          </div>
                          <?php } else { ?>
                          <div class="span_content">
                            <table width="100%" border="0">
                              <tr>
                                <?php if($MenuItemData['ResPizzaImg']!=''){ ?>
                                <td><img src="control/MenuItemImg/MenuItemImgSmall/<?php echo $MenuItemData['ResPizzaImg'];?>" width="50" height="40" /></td>
                                <?php } ?>
                                <td><?php /*?>No Description<?php */?></td>
                              </tr>
                            </table>
                          </div>
                          <?php } ?>
                          <div style="clear:both;"></div>
                        </div>
                        </span>
                        <div class="food_row_price" >
                          <div style="width:80%; float:left">
                            <?php 
								if($MenuItemData['RestaurantPizzaItemPrice']!=''){
								echo number_format($MenuItemData['RestaurantPizzaItemPrice'],2);
								}
								else
								{
								echo '0.00';
								}
								?>
                            <?php if($ExtraploDough>0){?>
                             <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></div>
                          <div style="width:20%; float:left">&nbsp;+</div>
                          <?php } else { ?>
                          <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></div>
                        <div style="width:20%; float:left"></div>
                        <?php } ?>
                       
                         </a>
                        <div style="clear:both;"></div>
                      </li>
                      <?php } else { ?>
                      <li <?php echo $cla;?>> <a class="tooltips iframe" href="popup.php?restaurantID=<?php echo $resID[0]; ?>&menuID=<?php echo $MenuItemData['id']; ?>&restaurants=<?php echo $_GET['restaurants']; ?>">
                        <div class="food_row_name"><?php echo ucwords($MenuItemData['RestaurantPizzaItemName']);?></div>
                        <span>
                        <div class="fullspan">
                          <div class="span_header">
                            <div class="span_header_left"><?php echo ucwords($MenuItemData['RestaurantPizzaItemName']);?></div>
                            <div class="span_headr_right">
                              <?php 
								if($MenuItemData['RestaurantPizzaItemPrice']!=''){
								echo number_format($MenuItemData['RestaurantPizzaItemPrice'],2);
								}
								else
								{
								echo '0.00';
								}
								?>
                              <?php if($ExtraploDough>0){?>
                               <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?>&nbsp;+
                              <?php } else { ?>
                               <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?>
                              <?php } ?>
                            </div>
                            <div style="clear:both;"></div>
                          </div>
                          <?php if($MenuItemData['ResPizzaDescription']!=''){ ?>
                          <div class="span_content">
                            <table width="100%" border="0">
                              <tr>
                                <?php if($MenuItemData['ResPizzaImg']!=''){ ?>
                                <td><div style="width:20%; float:left;"> <img src="control/MenuItemImg/MenuItemImgSmall/<?php echo $MenuItemData['ResPizzaImg'];?>" width="50" height="40" /></div>
                                  <div style="width:80%; float:left;"><?php echo ucwords($MenuItemData['ResPizzaDescription']);?></div>
                                  <?php } else { ?>
                                <td><?php echo ucwords($MenuItemData['ResPizzaDescription']);?></td>
                                <?php }?>
                              </tr>
                            </table>
                          </div>
                          <?php } else { ?>
                          <div class="span_content">
                            <table width="100%" border="0">
                              <tr>
                                <?php if($MenuItemData['ResPizzaImg']!=''){ ?>
                                <td><img src="control/MenuItemImg/MenuItemImgSmall/<?php echo $MenuItemData['ResPizzaImg'];?>" width="50" height="40" /></td>
                                <?php } ?>
                                <td><?php /*?>No Description<?php */?></td>
                              </tr>
                            </table>
                          </div>
                          <?php } ?>
                        </div>
                        </span>
                        <div class="food_row_price" >
                          <div style="width:80%; float:left">
                            <?php 
								if($MenuItemData['RestaurantPizzaItemPrice']!=''){
								echo number_format($MenuItemData['RestaurantPizzaItemPrice'],2);
								}
								else
								{
								echo '0.00';
								}
								?>
                            <?php if($ExtraploDough>0){?>
                             <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></div>
                          <div style="width:20%; float:left">&nbsp;+</div>
                          <?php } else { ?>
                           <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></div>
                        <div style="width:20%; float:left"></div>
                        <?php } ?>
                        
                         </a>
                        <div style="clear:both;"></div>
                      </li>
                      <?php } ?>
                   
                    <?php /*?><?php if($i==2) { 
   //$cla='class="even"';
   echo "</td></tr><tr><td></td></tr>"; 
   
 $i= 0; } ?><?php */?>
                    <?php 
 $i++;
 
 if($p==4)
 { 
  $p=0; 
 }
 $p++; 
 } ?>
                  </ul>
                
                <?php } ?>
                </div>
              </ul>
              </div>
              </div>
            </div>
          </div>
       
      
      <div class="clear">&nbsp;</div>
    </div>
    <a href="#tabs-2" class="tabberro"><?php echo $TableLanguage['ResinfoText'];?></a>
    <div id="tabs-2" class="tab-content">
      <div class="tab_content">
      <style type="text/css">
	  ul.facilitylist{
	  list-style:none;
	  margin-top:5px;
	  }
	  ul.facilitylist li{
	  line-height:20px;
	  }
      </style>
        <?php include('RestaurantAbout.php'); ?>
         <div class="gallery_contents">
        <h1 style="font-size:20px;">Facilities</h1>
        <ul class="facilitylist">
        <li>Wifi</li>
        <li>Bar</li>
        </ul>
        <div class="clear"></div>
        </div>
        
        <div class="gallery_contents">
          <?php $QueryGallery=mysql_query("select * from tbl_restaurantGallery where restaurant_id='".$resdata['id']."'");
	while($galleryData=mysql_fetch_assoc($QueryGallery)){
	$imh=explode(',',$galleryData['restaurant_gallery_image']);
													foreach($imh as $v)
													{
													if($v!='')
													{
	 ?>
          <a class="fancybox-buttons" data-fancybox-group="button" href="control/ResGalleryImg/<?php echo $v; ?>"><img src="control/ResGalleryImg/<?php echo $v; ?>" alt="" /></a>
          <?php } 
		}
		}
		?>
        <div class="clear"></div>
        </div>
       
      </div>
      <div class="clear">&nbsp;</div>
    </div>
     <a href="#tabs-7" class="tabberro">Events</a>
    <div id="tabs-7" class="tab-content">
    <div class="tab_content">      
        <?php include('restaurantEvent.php'); ?>
      </div>
      <div class="clear">&nbsp;</div>
    </div>
    <a href="#tabs-3" class="tabberro"><?php echo $TableLanguage['ResRatingText'];?></a>
    <div id="tabs-3" class="tab-content">
      <?php include('Rating_ReviewContent.php'); ?>
      <div class="clear">&nbsp;</div>
    </div>
    <a href="#tabs-4" class="tabberro"><?php echo $TableLanguage['ResPreviouseTabText'];?></a>
    <div id="tabs-4" class="tab-content">
      <div class="tab_content" style=" padding-left:5px;">
        <?php include('PreorderData.php'); ?>
      </div>
      <div class="clear">&nbsp;</div>
    </div>
    
    <?php if($resdata['BookaTableOrdersupport']==1){ ?>
    <a href="#tabs-6" class="tabberro"><?php echo $TableLanguage1['ResGalleryText1'];?></a>
    <div id="tabs-6" class="tab-content">
   
      <div class="tab_content" style="height:535px;">
        <div class="ribbon_container">
        <div class="headwork">
  <h1><?php echo $TableLanguage4['ResBookatableatText'];?></h1>
  </div>
          <?php /*?><div class="ribbon" style="margin-left:7%; width:510px;">
            <div class="ribbon-stitches-top"></div>
            <strong class="ribbon-content">
            <h1><?php echo $TableLanguage4['ResBookatableatText'];?></h1>
            </strong>
            <div class="ribbon-stitches-bottom"></div>
          </div><?php */?>
        </div>
        <?php include('BookingForm.php'); ?>
      </div>
      <div class="clear"></div>
    </div>
    <?php } ?>
    <script type="text/javascript">
$(document).ready(function(){	
	$('.tabberro').prependTo('#tabs0');
	$('#tabs0 a').tabs();
})
</script>
    <script type="text/javascript">
		$(document).ready(function() {
			
			$('.fancybox').fancybox();
			$('.fancybox-buttons').fancybox({
				openEffect  : 'none',
				closeEffect : 'none',
				prevEffect : 'none',
				nextEffect : 'none',
				closeBtn  : false,
				helpers : {
					title : {
						type : 'inside'
					},
					buttons	: {}
				},
				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
			});
			});
	</script>
  </div>
 
  <div style="clear:both;"></div>
</div>
<div id="cartx" style="width:27%; float:right;"> </div>
<script language="javascript" type="application/javascript">
$(document).ready(function() {
$("#cartx").load("cartX.php?act=n&Id=0&hotel_id=<?php echo $resID[0];?>");
$(".addCrt").click(function(){
var itId=$(this).siblings("input:hidden").val();
$("#cartx").load("cartX.php?act=adN&Id="+itId+"&hotel_id=<?php echo $resID[0];?>");
});
var tOdr= parseInt($("#ttOdr").text());
var minOdr= parseInt($("#orderNw").siblings("input:hidden").val());	
if(tOdr<minOdr){
$("#orderNw").click(function(){
$(this).attr("href","javascript:void(0);");
alert("Your Order Is Below Than Minimum Order");
});
}
});
</script>
</div>
<!--mid container ends-->
<div style="clear:both;"></div>
<div id="list"></div>
</div>
<!--content container ends-->
<!--contentwrapper Ends-->
<a href="#" class="go-top" style="color:#ffffff;"><?php echo ucwords($TableLanguage1['BackToTopText']);?></a>
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
<script src="js/search/jquery-ui.min.js" type="text/javascript"></script>
<script src="js/search/plugins.js"></script>
<link rel="stylesheet" href="jqmodal/simplemodal.css" />
<script src="jqmodal/jquery.js"></script>
<script src="jqmodal/jquery.simplemodal.js"></script>
<!--js for gallery-->
<script type="text/javascript" src="js/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css?v=2.1.5" media="screen" />
<link rel="stylesheet" type="text/css" href="css/jquery.fancybox-buttons.css?v=1.0.5" />
<script type="text/javascript" src="js/jquery.fancybox-buttons.js?v=1.0.5"></script>
<!--js and css for serach-->
	<link type="text/css" href="css/jquery.mcdropdown.min.css" rel="stylesheet" media="all" />
	<script type="text/javascript" src="lib/jquery.mcdropdown.min.js"></script>
	<script type="text/javascript" src="lib/jquery.bgiframe.js"></script>
    <script type="text/javascript">
	<!--//
	// on DOM ready
	$(document).ready(function (){
	$(".iframeMenuPopup").colorbox({iframe:true, width:"38%", height:"95%"});
		$("#current_rev").html("v"+$.mcDropdown.version);
		$("#category").mcDropdown("#categorymenu");
	});
	//-->
	</script>
<script type="text/javascript" src="js/tabs.js"></script>
</body>
</html>
