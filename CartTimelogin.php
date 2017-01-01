<?php 
ob_start();
session_start();
include('route/functions.php');
include('config1.php');
mysql_query ("set character_set_results='utf8'"); 
$prix=new User();
date_default_timezone_set('US/Eastern');
$curQueryStr=$_SERVER['QUERY_STRING'];
if(strlen($_GET['restaurants'])>0){
$resID=explode("-",$_GET['restaurants']);
$resdata=mysql_fetch_assoc($prix->showtabledata('tbl_restaurantAdd','id',$resID[0]));
$resSEO=mysql_fetch_assoc($prix->showtabledata('tbl_restaurantSEO','restaurant_id',$resID[0]));
}
include('route/db.php'); 
$dbObj=new db;
$AdminDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_siteSetting order by id asc"));
include('generateTimeCalculation.php');
if(isset($_POST['UserLoginsubmit']))
{
$QueryConnetc="SELECT * FROM  `tbl_user` where user_email='".$_POST['UserGustEmail']."' and user_pass='".$_POST['UserGustPassword']."' and status='0'";
$QuerySub=mysql_query($QueryConnetc);
$numData=mysql_num_rows($QuerySub);
if($numData>0)
{
$DatUser=mysql_fetch_assoc($QuerySub);
$_SESSION['justfoodsUserID']=$DatUser['id'];
$_SESSION['justfoodsUserName']=$DatUser['user_name'];
if($_POST['rememberme']=='1') //if rememberme checkbox checked 
{ 
setcookie ('UserGustEmail', $_POST['UserGustEmail'], time() + (60*60*24*10)); 
setcookie ('UserGustPassword', $_POST['UserGustPassword'], time() + (60*60*24*10)); 
setcookie ('rememberme', 1, time() + (60*60*24*10)); 
} 
else 
{ 
setcookie ('UserGustEmail',0, time()-1000); 
setcookie ('UserGustPassword', 0, time()-1000); 
setcookie ('rememberme', 0, time()-1000); 

} 
if($_GET['RestaurantService']=='Pickup' || $_GET['RestaurantService']=='Takeout'){
header("location:JustFoodgrCheckout.php?deliveryDate=".$_POST['deliveryDate']."&deliveryTime=".$_POST['deliveryTime']."&RestaurantService=".urlencode(trim($_GET['RestaurantService']))."&restaurants=".urlencode(trim($_GET['restaurants'])));
}
else
{
header("location:shippinginfo.php?deliveryDate=".$_POST['deliveryDate']."&deliveryTime=".$_POST['deliveryTime']."&restaurants=".$_GET['restaurants']."&RestaurantService=".$_GET['RestaurantService']);
}
}
else
{
$error="Sorry ! Username and Password is not correct. Try again";
}

}

if(isset($_POST['UserRegistrationsubmit']))
{
$QueryConnetc="SELECT * FROM  `tbl_user` where user_email='".$_POST['user_email']."' ";
$QuerySub=mysql_query($QueryConnetc);
$numData=mysql_num_rows($QuerySub);
if($numData>0)
{
$error=$TableLanguage['SignupErrormsg'];
}
else
{
$joinDate=date("Y-m-d");
if($_POST['address']!='')
{
$address5=$_POST['address'].','.$_POST['address1'];
}
 @$UserRegistrationData=array("user_name"=>mysql_real_escape_string($_POST['user_name']),"user_phone"=>$_POST['user_phone'],"user_cellphone"=>$_POST['user_cellphone'],"fname"=>mysql_real_escape_string($_POST['user_name']),"address"=>mysql_real_escape_string($address5),"zipcode"=>mysql_real_escape_string($_POST['zipcode']),"city_name"=>mysql_real_escape_string($_POST['city_name']),"user_email"=>$_POST['user_email'],"user_pass"=>$_POST['user_pass'],"offerWant"=>$_POST['offerWant'],"how_to_find"=>$_POST['how_to_find'],"input_date"=>date('jS F Y'),"ip"=>$_SERVER['REMOTE_ADDR'],"joinDate"=>$joinDate);
$CuisineInsert=$dbObj->dataInsert($UserRegistrationData,"tbl_user");

 $useriD=mysql_insert_id();
 

$DummyUserQuery=mysql_query("INSERT INTO `user_newaddress` (`id`, `GustUserName`, `GustUserEmail`, `GustUserPassword`, `GustUserPincode`, `GustUserAddress`, `GustUserBellName`, `GustUserFloor`, `GustUserLandlineAdress`, `countryID`,`stateID`,`GustUserCityName`, `GustUserMobileNo`, `GustUserStreetAddress`, `ip`, `RestaurantService`, `ContactAddressTitle`,`loginID`, `UserGustType`) VALUES (NULL, N'".$_POST['user_name']."', '".$_POST['user_email']."', '".$_POST['user_pass']."', '".$_POST['zipcode']."', N'".mysql_real_escape_string($address5)."', N'$GustUserBellName', N'$GustUserFloor', N'$GustUserLandlineAdress','$countryID','$stateID', N'".mysql_real_escape_string($_POST['city_name'])."', '".$_POST['user_phone']."', N'$GustUserStreetAddress', '".$_SERVER['REMOTE_ADDR']."', N'".$_GET['RestaurantService']."',N'Default Address','".$useriD."','$UserGustType')");
 $delivreryID=mysql_insert_id();
 
 if($_POST['offerWant']=='Yes')
{
 @$UserRegistrationDataNews=array("subscribe_email"=>$_POST['user_email'],"subscribe_date"=>date('jS F Y'),"subscribe_ip"=>$_SERVER['REMOTE_ADDR']);
 $CuisineInsert2=$dbObj->dataInsert($UserRegistrationDataNews,"tbl_newselleterSubscribe");
}

if($CuisineInsert)
{
$_SESSION['justfoodsUserID']=$useriD;
$_SESSION['justfoodsUserName']=$_POST['user_name'];
header("location:JustFoodgrCheckout.php?deliveryTime=".$_POST['deliveryTime']."&RestaurantService=".urlencode(trim($_GET['RestaurantService']))."&ServiceAddress=".$delivreryID."&restaurants=".urlencode(trim($_GET['restaurants'])));
}
}
}

if($_GET['tipamount']!='')
{
$_SESSION['tipamountVale']=$_GET['tipamount'];
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<link href="css/reset2.css" type="text/css" rel="stylesheet" media="all" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta itemprop="name" content="<?php echo stripslashes(ucwords($resdata['restaurant_name'])); ?>">
<title itemprop="description"><?php echo stripslashes(ucwords($resdata['restaurant_name'])); ?>-<?php echo stripslashes(ucwords($resdata['restaurant_streetaddress'])); ?>,<?php echo stripslashes(ucwords($resdata['restaurantCity'])); ?>|<?php echo stripslashes(ucwords($resSEO['restaurant_MetaTitle'])); ?>| Justfood Food Delivery and Reservations - Greek!</title>
<meta property="og:title" content="<?php echo stripslashes(ucwords($resdata['restaurant_name'])); ?> - <?php echo stripslashes(ucwords($resdata['restaurant_address'])); ?>, <?php echo stripslashes(ucwords($resdata['restaurantCity'])); ?>" />
<meta name="description" content="<?php echo stripslashes(ucwords($resSEO['restaurant_MetaDescription'])); ?>" />
<meta name="keywords" content="<?php echo stripslashes(ucwords($resSEO['restaurant_MetaKeyword'])); ?>"
/>
<meta property="og:type" content="website" />
<meta property="og:url" content="<?php echo $url; ?>restaurant.php?<?php echo $_GET['restaurants']; ?>" />
<meta property="og:image" content="<?php echo $url; ?>control/restaurantlogoimg/small/<?php echo $resdata['restaurant_Logo'];?>" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<link href="tables/tab.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
$(document).ready(function(){
 $("#password").hide();
        $('input[type="radio"]').click(function(){
            if($(this).attr("value")=="1"){
                $("#password").hide();               
            }
            if($(this).attr("value")=="2"){               
                $("#password").show();
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
  <div class="container" style="min-height:650px;">
    <!-- mid search  starts-->
    <div class="midserach">
      <div class="steps">
        <ul>
          <li> <a href="./"> <span>1</span> <?php echo ucwords($TableLanguage['SetpSearchText']);?> </a> </li>
          <li> <a href="restaurantSearchText.php?<?php echo $_SESSION['URlCookies'];?>"> <span >2</span> <?php echo ucwords($TableLanguage['SetpSelectRestaurantText']);?> </a> </li>
          <li> <a href="restaurant.php?restaurants=<?php echo urlencode(trim($_GET['restaurants']));?>"> <span>3</span> <?php echo ucwords($TableLanguage['SetpPlaceOrderText']);?> </a> </li>
          <li> <a href="#" style="color:#FF091E" > <span>4</span class="selected"> <?php echo ucwords($TableLanguage['SetpCheckoutText']);?> </a> </li>
        </ul>
      </div>
    </div>
    <div class="tab_menu_container" style="min-height:1180px;">
      <div class="login" style="background:none; box-shadow: 0px 0px 0px 0px #999999;">
        <?php if($msg!=''){ ?>
        <div style="padding:10px; color:#0000FF; font-size:14px;"><?php echo $msg;?></div>
        <?php } ?>
        <?php if($error!=''){ ?>
        <div style="padding:10px; color:#E10000; font-size:14px;"><?php echo $error;?></div>
        <?php } ?>
        <style type="text/css">
.leftcont {
width: 95%;
min-height: 500px;
float: left;
background:#fff;
box-shadow: 1px 1px 1px 2px #999999;
padding:10px;
}
		.chkcont{
		width:100%; min-height:100px; border-bottom:1px solid #ccc; margin-bottom:10px; padding-bottom:10px; padding-top:10px;
		}
		.chkcont.nbdr{
		border:none;
		}
		.chkcont h2{
		color:#710000;
		font-size:25px;
		font-weight:normal;
		margin-bottom:10px;
		}
		.chkcont h3{
		color:#710000;
		font-size:20px;
		font-weight:normal;
		margin-bottom:10px;
		}
		.chkcont a.forgot{
		color:#ff0000;
		font-size:15px;
		font-weight:normal;
		margin-bottom:10px;
		}
	.chkcont select {
	border: 1px solid #979797;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.25) inset;    
    padding-left: 8px;	
	-webkit-appearance: none;
	-moz-appearance: none;
	background: #ffffff url(images/select-arrow.png) no-repeat 95% center;
	width:270px;
	text-indent: 0.01px;
	text-overflow: "";
	color: #000;
	border-radius:0px;
	background-size:9px;
	padding-top:7px;
	padding-bottom:7px;
	margin-bottom:10px;
	
}
        </style>
         <form action="" method="post">
        <div class="login_left">
       
          <div class="leftcont">
            <div class="chkcont">
              <h2>Order Details</h2>
              <table width="100%">
              <?php if($_SESSION['preorder']!=''){ ?>
                <tr>
                  <td width="30%" align="left">Delivery/Pickup Time</td>
                  <td align="left"><select id="deliveryTime" required name="deliveryTime">
                      <option value="" selected="selected">Select</option>
                       <option value="<?php echo date('h:i a', time());?>" selected="selected"><?php echo date('h:i a', time());?></option>
                       <option value="12:00 am">12:00 am</option>
  <option value="1:00 am">1:00 am</option>
  <option value="2:00 am">2:00 am</option>
  <option value="3:00 am">3:00 am</option>
  <option value="4:00 am">4:00 am</option>
  <option value="5:00 am">5:00 am</option>
  <option value="6:00 am">6:00 am</option>
  <option value="7:00 am">7:00 am</option>
  <option value="8:00 am">8:00 am</option>
  <option value="9:00 am">9:00 am</option>
  <option value="10:00 am">10:00 am</option>
  <option value="11:00 am">11:00 am</option>
  <option value="12:00 am">12:00 pm</option>
  <option value="1:00 pm">1:00 pm</option>
  <option value="2:00 pm">2:00 pm</option>
  <option value="3:00 pm">3:00 pm</option>
  <option value="4:00 pm">4:00 pm</option>
  <option value="5:00 pm">5:00 pm</option>
  <option value="6:00 pm">6:00 pm</option>
  <option value="7:00 pm">7:00 pm</option>
  <option value="8:00 pm">8:00 pm</option>
  <option value="9:00 pm">9:00 pm</option>
  <option value="10:00 pm">10:00 pm</option>
  <option value="11:00 pm">11:00 pm</option>
                    </select></td>
                </tr>
                <tr>
                  <td></td>
                  <td align="left">Ordered for Delivery/Pickup Time today at <?php echo date('h:i a', time());?></td>
                </tr>
                <tr>
                  <td width="30%" align="left">Delivery/Pickup Date</td>
                  <td align="left"><select style="border: 1px rgb(198, 195, 195) solid;" required name="deliveryDate" id="deliveryDate">
    <?php 

 $cTm=mktime(0,0,0,date('m'),date('d'),date('Y'));
 $lTm=mktime(0,0,0,06,date('d'),2020);
for($iD=$cTm;$iD<=$lTm;$iD=$iD+(24*3600)){
?>	
<option value="<?php echo date('Y-m-d',$iD);?>"><?php echo date('D M d S Y',$iD);?></option>
<?php
	}
?>
    </select></td>
                </tr>
               
                <?php } else {  ?>
              <input  name="deliveryDate"  type="hidden" value="<?php echo date('Y-m-d');?>" />
             <?php /*?> <input  name="deliveryDateDisplay"  type="hidden" value="<?php echo date('m/d/Y');?>" /><?php */?>
                 <input  name="deliveryTime"  type="hidden" value="<?php echo date('h:i a', time());?>" />
                 <?php } ?>
              </table>
            </div>
            <div class="chkcont">
              <h3>Existing member login</h3>
              <table width="100%">
                <tr>
                  <td  width="30%"align="left">Email Address</td>
                  <td align="left"><input type="email" name="UserGustEmail" id="UserGustEmail" value="<?php if(isset($_COOKIE['UserGustEmail'])) echo $_COOKIE['UserGustEmail'];?>" class="textbox"  placeholder="<?php echo ucwords($TableLanguage5['ResFormFieldEmailText']);?>" /></td>
                </tr>
                <tr>
                  <td align="left">Password</td>
                  <td align="left"><div class="rightcontainer">
                      <input type="password" name="UserGustPassword" value="<?php if(isset($_COOKIE['UserGustPassword'])) echo $_COOKIE['UserGustPassword'];?>" id="UserGustPassword" class="textbox"  placeholder="<?php echo ucwords($TableLanguage5['ResFormFieldPasswordText']);?>"  />
                    </div></td>
                </tr>
                <tr>
                  <td align="left"></td>
                  <td align="left"><input type="checkbox" name="rememberme" <?php if(isset($_COOKIE['rememberme'])) { ?> checked="checked" <?php } ?> value="1"  style="margin-right:10px;"/>
                    Keep me logged in</td>
                </tr>
                <tr>
                  <td align="left"></td>
                  <td align="left">Leave unticked if you are on a shared computer</td>
                </tr>
                <?php /*?><tr>
                  <td align="left"></td>
                  <td align="left"><a class="forgot" href="">Forgotten your Password</a></td>
                </tr><?php */?>
                <tr>
                  <td align="left"></td>
                  <td align="left"><input type="submit" value="Login" name="UserLoginsubmit"  class="submit" style="margin-top:20px;"/></td>
                </tr>
              </table>
            </div>
            <?php if($_SESSION['justfoodsUserID']==''){ ?>
            <div class="chkcont nbdr">
              <h3>Create Account</h3>
              <table width="100%">
                <tr>
                  <td  width="30%"align="left">Phone</td>
                  <td align="left"><input type="text" name="user_phone" id="user_phone" value="" class="textbox"  placeholder="Enter Your Phone" /></td>
                </tr>
                <tr>
                  <td align="left">Name</td>
                  <td align="left"><input type="text" name="user_name" id="user_name" value="" class="textbox"  placeholder="Enter Your Name" />
                  </td>
                </tr>
                <tr>
                  <td align="left">Address</td>
                  <td align="left"><input type="text" name="address" id="address" value="" class="textbox"  placeholder="Enter Your address line 1" /></td>
                </tr>
                <tr>
                  <td align="left"></td>
                  <td align="left"><input type="text" name="address1" id="address1" value="" class="textbox"  placeholder="Enter Your address line 2" /></td>
                </tr>
               
                <tr>
                  <td align="left">Postcode</td>
                  <td align="left"><!--<input type="text" name="" id="" value="" class="textbox"  placeholder=""  style="width:20%; float:left; margin-right:15px;"/>-->
                    <input type="text" name="zipcode" id="zipcode" value="" class="textbox"  placeholder=""  />
                  </td>
                </tr>
                <tr>
                  <td align="left">City</td>
                  <td align="left"><input type="text" name="city_name" id="city_name" value="" class="textbox"  placeholder="Enter Your City" /></td>
                </tr>
                <tr>
                  <td align="left">Email Address</td>
                  <td align="left"><input type="email" name="user_email" id="user_email" value="" class="textbox"  placeholder="Enter Your Email" /></td>
                </tr>
                <tr>
                  <td align="left">Password</td>
                  <td align="left"><input type="password" name="user_pass" id="user_pass" value="" class="textbox"  placeholder="Enter Your password" /></td>
                </tr>
                <tr>
                  <td align="left">Confirm Password</td>
                  <td align="left"><input type="password" name="user_cpass" id="user_cpass" value="" class="textbox"  placeholder="Confirm Your password" /></td>
                </tr>
                <tr>
                  <td align="left">How did you find us</td>
                  <td align="left"><select id="how_to_find" name="how_to_find">
                      <option value="" selected="selected">Select</option>
                     <option value="A friend">A friend</option>
	<option value="Google">Google</option>
	<option value="Menucard">Menucard</option>
	<option value="Newspaper">Newspaper</option>
	<option value="Other">Other</option>
	<option value="Pizzabox">Pizzabox</option>
	<option value="Posters">Posters</option>
	<option value="Restaurant">Restaurant</option>
	<option value="Street promotion">Street promotion</option>
	<option value="Website">Website</option>
                    </select></td>
                </tr>
                <tr>
                  <td align="left" colspan="2"><input type="checkbox" checked="checked" name="offerWant" id="offerWant" value="Yes"  style="margin-right:10px;"/>
                    Keep me up-to-date with local money-saving offers by email or SMS</td>
                </tr>
                <tr>
                  <td align="left" colspan="2"><input type="checkbox" name="" value=""  style="margin-right:10px;"/>
                    I accepct Megamenus's <a class="forgot" href="online_food_terms_condition.php" target="_blank">terms & conditions</a>,  including <a class="forgot" href="online_food_privacy_policy.php" target="_blank">privacy policy</a> & <a href="online_food_use_cookies.php" target="_blank" class="forgot">cookies policy</a></td>
                </tr>
                <tr>
                  <td align="left" colspan="2"><input type="checkbox" name="" value=""  style="margin-right:10px;"/>
                    Keep me logged in</td>
                </tr>
                <tr>
                  <td align="left" colspan="2">Leave unticked if you are on a shared computer</td>
                </tr>
                <tr>
                  <td align="left"></td>
                  <td align="left"><input type="submit" value="Next" name="UserRegistrationsubmit"  class="submit" style="margin-top:20px;"/></td>
                </tr>
              </table>
            </div>
            <?php } ?>
          </div>
          
        </div>
 <div id="UserCatX"></div>
        </form>
        <div style="clear:both"></div>
      </div>
      <!-- <div id="UserCatX"></div>-->
    </div>
  </div>
</div>
<!--content container ends-->
</div>
<!--contentwrapper Ends-->
<?php 
//if($_GET['RestaurantService']=="Home Delivery"){
//$_GET['RestaurantService']='HomeDelivery';
//}
 ?>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script language="javascript" type="application/javascript">
$(document).ready(function() {
$("#UserCatX").load("UserCatX.php?act=n&Id=0&hotel_id=<?php echo $resID[0];?>&RestaurantService=<?php echo $_GET['RestaurantService'];?>&tipamountAmount=<?php echo $_SESSION['tipamountVale'];?>");
$(".addCrt").click(function(){
var itId=$(this).siblings("input:hidden").val();
$("#UserCatX").load("UserCatX.php?act=adN&Id="+itId+"&hotel_id=<?php echo $resID[0];?>&RestaurantService=<?php echo $_GET['RestaurantService'];?>&tipamountAmount=<?php echo $_SESSION['tipamountVale'];?>");
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
<!--footer wrapper ends-->
<script src="js/search/jquery-ui.min.js" type="text/javascript"></script>
<script src="js/search/plugins.js"></script>
<!--<script src="js/search/app.js"></script>-->
<script src="js/search/app.js" type="text/javascript"></script>
<script src="js/search/jquery.lockfixed.js"></script>
</body>
</html>
