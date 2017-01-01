<?php 
ob_start();
session_start();
include('route/functions.php');
include('config1.php');
mysql_query ("set character_set_results='utf8'"); 
$prix=new User();
$curQueryStr=$_SERVER['QUERY_STRING'];
if(strlen($_GET['restaurants'])>0){
$resID=explode("-",$_GET['restaurants']);
$resdata=mysql_fetch_assoc($prix->showtabledata('tbl_restaurantAdd','id',$resID[0]));
$resSEO=mysql_fetch_assoc($prix->showtabledata('tbl_restaurantSEO','restaurant_id',$resID[0]));
}
$AdminDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_siteSetting order by id asc"));
include('generateTimeCalculation.php');
?>
 <?php  
$DeliveryTime=mysql_fetch_assoc(mysql_query("SELECT * FROM  `tbl_restDeliveryTime` where restaurant_id='".$resID[0]."'"));
$takeawayTime=mysql_fetch_assoc(mysql_query("SELECT * FROM  `tbl_restTakeawayTime` where restaurant_id='".$resID[0]."'"));

//Number of Rating Only without Comment
$RatingReviewQueryAvargewithRatingOnly=mysql_num_rows(mysql_query("select * from tbl_restaurantReview where RestaurantReviewId='".$resID[0]."' and RestaurantReviewContent='' and RestaurantReviewRating!=''"));
//

//Number of Rating 
$RatingReviewTotal=mysql_num_rows(mysql_query("select * from tbl_restaurantReview where RestaurantReviewId='".$resID[0]."' "));
//
if($RatingReviewQueryAvargewithRatingOnly!=0)
{
$AverageRatingCode=floor($RatingReviewQueryAvargewithRatingOnly/$RatingReviewTotal);
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
if(isset($_POST['item_id'])){
$dftPrice=$_POST['choiceofmeat'];
if(count($_POST['ExtraAddons'])){
		$extPrc=0;
		$extName='';
	foreach($_POST['ExtraAddons'] as $extVal){
			$extDtl=explode('-',$extVal);
			$extPrc+=$extDtl[1];
			$extName.=$extDtl[0];
			}
		$dftPrice+=$extPrc;
	}
if($_POST['ExtraAddons']!=''){	
 $chkExtNm=implode(",",$_POST['ExtraAddons']);	
}

if(count($_POST['pizzaExtarItem'])){
		$extPizzPrc=0;
		$extPizzName='';
	foreach($_POST['pizzaExtarItem'] as $extPizzVal){
			$extPizzDtl=explode('-',$extPizzVal);
			$extPizzPrc+=$extPizzDtl[1];
			$extPizzName.=$extPizzDtl[0];
			}
		$dftPrice+=$extPizzPrc;
	}
if($_POST['pizzaExtarItem']!=''){	
 $PizzchkExtNm=implode(",",$_POST['pizzaExtarItem']);	
}
$rec=$dbObj->getData(array("sysIP","sessoionId","hotel_id","quqntity"),"cart","sysIP='".$_SERVER['REMOTE_ADDR']."' AND sessoionId='".session_id()."' AND hotel_id='".$resID[0]."' AND itemId='".$_POST['item_id']."' AND sizePrice=".$dftPrice." AND extra=N'".$chkExtNm."' AND pizzaExtarItem=N'".$PizzchkExtNm."'");
//print_r($rec);
		if($rec[0]>0){
			//$nqtity=$rec[1]["quqntity"]+1;
			@$crtUP="update cart set price='".$dftPrice."',extra=N'".$chkExtNm."',pizzaExtarItem=N'".$PizzchkExtNm."',quqntity='".$_POST['qty']."', sizePrice='".$dftPrice."',size='".$dftPri[1]."',instructions=N'".$_POST['SpecialInstruction']."' where sysIP='".$_SERVER['REMOTE_ADDR']."' AND sessoionId='".session_id()."' AND hotel_id='".$resID[0]."' AND itemId='".$_POST['item_id']."' AND sizePrice='".$dftPrice."'";
			
			mysql_query($crtUP) or die(mysql_error());
			}else{
	@$crt="insert into cart(sysIP,sessoionId,itemId,price,extra,pizzaExtarItem,quqntity,instructions,hotel_id,sizePrice,size)values('".$_SERVER['REMOTE_ADDR']."','".session_id()."','".$_POST['item_id']."','".$dftPrice."',N'".$chkExtNm."',N'".$PizzchkExtNm."','".$_POST['qty']."',N'".$_POST['SpecialInstruction']."','".$resID[0]."','".$dftPrice."','".$dftPri[1]."')";
		mysql_query($crt);
	
	//array("sysIP"=>$_SERVER['REMOTE_ADDR'],"sessoionId"=>session_id(),"itemId"=>$_POST['item_id'],"price"=>$dftPrice,"extra"=>$chkExtNm,"pizzaExtarItem"=>$PizzchkExtNm,"quqntity"=>$_POST['qty'],"instructions"=>$_POST['SpecialInstruction'],"hotel_id"=>$resID[0],"sizePrice"=>$dftPrice,"size"=>$dftPri[1]);
	//$dbObj->dataInsert($crt,"cart");
		}
		unset($_POST['item_id']);
		
		//}  //for loop ends
}

?>   
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<link href="css/reset2.css" type="text/css" rel="stylesheet" media="all" />		
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta itemprop="name" content="<?php echo stripslashes(ucwords($resdata['restaurant_name'])); ?>">
<title itemprop="description"><?php echo stripslashes(ucwords($resdata['restaurant_name'])); ?> - <?php echo stripslashes(ucwords($resdata['restaurant_address'])); ?>, <?php echo stripslashes(ucwords($resdata['restaurantCity'])); ?> | <?php echo stripslashes(ucwords($resSEO['restaurant_MetaTitle'])); ?> | Munch Food Delivery and Reservations - Munch!</title>
<meta property="og:title" content="<?php echo stripslashes(ucwords($resdata['restaurant_name'])); ?> - <?php echo stripslashes(ucwords($resdata['restaurant_address'])); ?>, <?php echo stripslashes(ucwords($resdata['restaurantCity'])); ?>" />
<meta name="description" content="<?php echo stripslashes(ucwords($resSEO['restaurant_MetaDescription'])); ?>" />
<meta name="keywords" content="<?php echo stripslashes(ucwords($resSEO['restaurant_MetaKeyword'])); ?>"
/>
<meta property="og:type" content="website" />
<meta property="og:url" content="<?php echo $url; ?>restaurant.php?<?php echo $_GET['restaurants']; ?>" />
<meta property="og:image" content="<?php echo $url; ?>control/restaurantlogoimg/small/<?php echo $resdata['restaurant_Logo'];?>" />
<link href="tab menu/bootstrap-select.css"  type="text/css" rel="stylesheet" />
<link href="tab menu/bootstrap-select.min.css" type="text/css" rel="stylesheet" />
<link href="tables/table.css" rel="stylesheet" type="text/css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>  
  <link rel="stylesheet" href="tables/jquery-ui.css">
  <link href="tables/tab.css" rel="stylesheet" type="text/css" />
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <script>
  $(function() {
    $( "#tabs" ).tabs();
  });
  </script>
  
  <link rel="stylesheet" href="colorbox/colorbox.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		
		<script src="colorbox/jquery.colorbox.js"></script>
		<script>
			$(document).ready(function(){
				
				$(".iframe").colorbox({iframe:true, width:"600px", height:"600px"});
				
				 
			});
			
			$(window).scroll(function(){
    $.each($('#place_order'),function(){
        var eloffset = $(this).offset();
        var windowpos = $(window).scrollTop();
        if(windowpos<eloffset.top) {
            var finaldestination =470;
        } else {
            var finaldestination = windowpos;
        }
		if(finaldestination==1300)
		{
        $(this).stop().animate({'top':"1000px"},200);
		}
		else
		{
		 $(this).stop().animate({'top':finaldestination},200);
		}
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
                <li> <a href="#"> <span>1</span> Search </a> </li>
                <li> <a href="#"> <span >2</span> Select Restaurant </a> </li>
                <li> <a href="#" style="color:#FF091E" > <span class="selected">3</span> Place Order </a> </li>
                <li> <a href="#"> <span>4</span> Checkout </a> </li>
              </ul>
  </div>
  </div>
  <!-- mid search  ends-->
 <div class="midcontainer">
 <div class="list-h">
                
                  <h2 style="padding:0 0 1px;"> <span><a href="index.php">Home</a> &raquo;</span> </h2><h2><a href="restaurantSearchText.php?AddressSearch=<?php echo urlencode(trim($resdata['restaurant_address'])); ?>" style="color:#777;"><?php echo stripslashes(ucwords($resdata['restaurant_address'])); ?></a></h2>
                 <!-- <div class="location">
                  <label>
                  <select>
        			<option selected value="0"> Modify Your Location <span class="downarrow-s"></span>  </option>
        			<option value="1">Mumbai</option>
        			<option value="2">Chennai</option>
         			<option value="3">Kolkata</option>
        			<option value="4">Delhi</option>
   				 </select>
			</label>​ -->                
     </div>
 </div>
 <?php 
 include('TimeTable.php');
 include('MiddleRestaurant.php'); ?>
 <div class="tab_menu_container">
<div class="tab_menu">
<div id="tabs">
  <ul>
    <li><a href="#tabs-1">Menu</a></li>
    <li><a href="#tabs-2">About Us</a></li>
    <li><a href="#tabs-3">Ratings</a></li>
    <li><a href="#tabs-4">Previous Order</a></li>
    <li><a href="#tabs-5">Offers</a></li>
     <li><a href="#tabs-6">Book a Table</a></li>
  </ul>
  <script type="text/javascript">
function getOrgTypeListRestMenuCategory(str){
//alert(str);
if (str==""){
document.getElementById("restaurantMenuData").innerHTML="";
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
document.getElementById("restaurantMenuData").innerHTML=xmlhttp.responseText;
}
}
xmlhttp.open("post","RestaurantMenuAjax.php?q="+str+"&restaurantID="+<?php echo $resdata['id'];?>,true);
xmlhttp.send();
}

function getOrgTypeListRestMenuItemKeypress(str){
//alert(str);
if (str==""){
document.getElementById("restaurantMenuData").innerHTML="";
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
document.getElementById("restaurantMenuData").innerHTML=xmlhttp.responseText;
}
}
xmlhttp.open("post","RestaurantMenuAjax2.php?q="+str+"&restaurantID="+<?php echo $resdata['id'];?>,true);
xmlhttp.send();
}

</script>
        
     

  <div id="tabs-1">
  <div id="content" style="padding:1%; ">
  <div class="serch_option">
  <div class="select_option">
  <form method="get">
   <select class="select_box" style="width:42%; padding:0;" name="RestaurantMenuCategory" id="RestaurantMenuCategory" onchange="getOrgTypeListRestMenuCategory(this.value)">
        			<option selected value="0">  Select Menu Category <span class="downarrow-s"></span>  </option>
        			 <?php $MenuCategoryQuery=mysql_query("select * from tbl_restMenuCategory where restaurantMenuID='".$resdata['id']."' order by restaurantMenuName asc");while($MenuCategoryData=mysql_fetch_assoc($MenuCategoryQuery)){?>
                    <option value="<?php echo $MenuCategoryData['id'];?>"><?php echo $MenuCategoryData['restaurantMenuName'];?></option>
                    <?php } ?>
        			
   				 </select>
                 </div>
                 <div class="search_ajax" style="width:30%; height:45px; float:left;">
                         <div class="area">
         <input type="text" placeholder=" search  " id="searchFilter" name="searchFilter" value="" onblur="getOrgTypeListRestMenuItemKeypress(this.value)" / >
         
        </div>
 
                 </div></form>
  </div>
  <div class="food_products">
  <div class="food_row" >
  <h3>Restaurant Menu</h3>
  <div class="food_row_left" style="width:100%;">
  <ul>
  
  <div id="restaurantMenuData">
  <?php 
												 $MenuCategoryQuery1=mysql_query("select * from tbl_restMenuCategory where restaurantMenuID='".$resdata['id']."' order by restaurantMenuName asc");                       while($MenuCategoryData1=mysql_fetch_assoc($MenuCategoryQuery1)){
													$MenuItemQuery=mysql_query("select * from tbl_restaurantMenuItem where RestaurantCategoryID='".$MenuCategoryData1['id']."' and RestaurantPizzaID='".$resdata['id']."' order by RestaurantPizzaItemName asc");             
													
													?>
  <table width="100%">
<tbody><tr><td style="height:30px;"><h3><?php echo ucwords($MenuCategoryData1['restaurantMenuName']);?></h3></td>
</tr>
<?php if($MenuCategoryData1['restaurantMenuNameDescription']!=''){ ?>
<tr><td><span style="color:#777777; font-size:12px; font-style:italic; text-align:left;"><font><font><?php echo ucwords($MenuCategoryData1['restaurantMenuNameDescription']);?></font></font></span> </td></tr>
<?php } ?>
</tbody></table>
  
 <table width="100%">
 <tr>
 <?php 
  $i=1;
  while($MenuItemData=mysql_fetch_assoc($MenuItemQuery)){ 
 if($i%4==0){
 $cla='class="even"';
 }
 else
 {
 $cla='class="odd"';
 }
  ?>
 <td width="50%"> <li <?php echo $cla;?>><a class="tooltips iframe" href="ProductPopup.php?hotel_id=<?php echo $resID[0]; ?>&itemid=<?php echo $MenuItemData['id']; ?>&restaurants=<?php echo $_GET['restaurants']; ?>">
  <div class="food_row_name"><?php echo ucwords($MenuItemData['RestaurantPizzaItemName']);?></div>
  <div class="food_row_price" ><?php echo number_format($MenuItemData['RestaurantPizzaItemPrice'],2);?> &euro; </div>
<span>
<div class="fullspan">
<div class="span_header">
<div class="span_header_left"><?php echo ucwords($MenuItemData['RestaurantPizzaItemName']);?></div>
<div class="span_headr_right"><?php echo number_format($MenuItemData['RestaurantPizzaItemPrice'],2);?> &euro;</div>
<div style="clear:both;"></div>
</div>
<?php if($MenuCategoryData1['restaurantMenuNameDescription']!=''){ ?>
<div class="span_content"><?php echo ucwords($MenuCategoryData1['restaurantMenuNameDescription']);?></div>
<?php } else { ?>
<div class="span_content">No Description available</div>
<?php } ?>

</div></span>
</a>
<div style="clear:both;"></div>
 </li>
 </td>
   <?php if($i==2) { echo "</td></tr><tr><td></td></tr>"; $i= 0; } ?>  
 <?php 
 $i++;
 } ?>
  
 
  </tr>
  </table>
  
  
  
  
  
 
  
  <?php } ?>
  
  </div>
  </ul>
 
  </div>
  </div>
  
  
  
  
  
  </div>
    	
    </div>
  </div>
  <div id="tabs-2">
  <div class="tab_content">
  
  <?php include('RestaurantAbout.php'); ?>

  </div>
 
  </div>
  <div id="tabs-3">
   <?php include('Rating_ReviewContent.php'); ?>  
  </div>
  <div id="tabs-4">
  <div class="tab_content" style=" padding-left:5px;">
  <?php include('PreorderData.php'); ?> 
  </div>
  </div>
 
  <div id="tabs-5">
  <div class="tab_content">
   
   <?php include('restaurantOfferData.php'); ?>
    
  </div>    
  </div> 
   <div id="tabs-6">
   <style type="text/css">
  
   </style>
  <div class="tab_content" style="height:535px;">
  <div class="ribbon_container">
  <div class="ribbon" style="margin-left:9%;">
   <div class="ribbon-stitches-top"></div>
   <strong class="ribbon-content"><h1>Book a table at Justfood</h1></strong>
   <div class="ribbon-stitches-bottom"></div>
   </div>
   </div>
 <?php include('BookingForm.php'); ?>
     
  </div>    
  </div> 
</div>

</div>
<div id="cartx"> </div> 
<div style="clear:both;"></div>
</div>
 

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
<!--
				<script>
$(function () {
    var top = $('#place_order').offset().top - parseFloat($('#place_order').css('margin-top').replace(/auto/, 0));
    $(window).scroll(function (event) {
      // what the y position of the scroll is
      var y = $(this).scrollTop();
      
      // whether that's below the form
      if (y >= top) {
        // if so, ad the fixed class
		$('#place_order').addClass('fixed');
      } 
	  else {
        // otherwise remove it
        $('#place_order').removeClass('fixed');
      }
    });
  }  
);

</script>-->
 
 </div>
 <!--mid container ends-->
  
  
  <div style="clear:both;"></div>
  
   </div>
  <!--content container ends-->

<!--contentwrapper Ends-->
<a href="#" class="go-top" style="color:#ffffff;">Back to Top</a>

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


<!--footer wrapper ends-->

<script src="js/search/jquery-ui.min.js" type="text/javascript"></script>
<script src="js/search/plugins.js"></script>
<!--<script src="js/search/app.js"></script>-->
<script src="js/search/app.js" type="text/javascript"></script>
<script src="js/search/jquery.lockfixed.js"></script>
</body>
</html>
