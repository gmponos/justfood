<?php 
ob_start();
session_start();
include('route/functions.php');
include('config1.php');
mysql_query ("set character_set_results='utf8'"); 
date_default_timezone_set('US/Eastern');
$prix=new User();
$curQueryStr=$_SERVER['QUERY_STRING'];
if(strlen($_GET['restaurants'])>0){
$resID=explode("-",$_GET['restaurants']);
$resdata=mysql_fetch_assoc($prix->showtabledata('tbl_restaurantAdd','id',$resID[0]));
$resSEO=mysql_fetch_assoc($prix->showtabledata('tbl_restaurantSEO','restaurant_id',$resID[0]));
}
if($_GET['RestaurantService']=='Pickup' || $_GET['RestaurantService']=='Takeout'){
$DataTime=date('h:i a', time());
header("location:JustFoodgrCheckout.php?deliveryTime=".date('h:i a',time())."&deliveryDate=".date('Y-m-d')."&RestaurantService=".urlencode(trim($_GET['RestaurantService']))."&restaurants=".urlencode(trim($_GET['restaurants'])));
}
if($_SESSION['justfoodsUserID']!='')
{
$UserAddressData=mysql_fetch_assoc(mysql_query("select * from tbl_user where id='".$_SESSION['justfoodsUserID']."' order by id asc"));
}
$AdminDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_siteSetting order by id asc"));
include('generateTimeCalculation.php');
extract($_POST);
if($_GET['eid']!='')
{
if($_SESSION['justfoodsUserID']!='')
{
$UserData=mysql_fetch_assoc(mysql_query("select * from user_newaddress where id='".$_GET['eid']."'"));
}
}
if(isset($_POST['GustUserSubmitData']))
{
$fullName=$UserAddressData['fname'].''.$UserAddressData['lname'];
$DummyUserQuery="INSERT INTO `user_newaddress` (`id`, `GustUserName`, `GustUserEmail`, `GustUserPassword`, `GustUserPincode`, `GustUserAddress`, `GustUserBellName`, `GustUserFloor`, `GustUserLandlineAdress`, `countryID`,`stateID`,`GustUserCityName`, `GustUserMobileNo`, `GustUserStreetAddress`, `ip`, `RestaurantService`, `ContactAddressTitle`,`loginID`, `UserGustType`) VALUES (NULL, N'".$fullName."', '".$UserAddressData['user_email']."', '$GustUserPassword', '$GustUserPincode', N'$GustUserAddress', N'$GustUserBellName', N'$GustUserFloor', N'$GustUserLandlineAdress','$countryID','$stateID', N'$GustUserCityName', '$GustUserMobileNo', N'$GustUserStreetAddress', '$ip', N'".$_GET['RestaurantService']."',N'$ContactAddressTitle','".$_SESSION['justfoodsUserID']."','$UserGustType')";
if(mysql_query($DummyUserQuery))
{
$lastId=mysql_insert_id();
header("location:JustFoodgrCheckout.php?deliveryTime=".$_POST['deliveryTime']."&deliveryDate=".$_POST['deliveryDate']."&RestaurantService=".urlencode(trim($_GET['RestaurantService']))."&ServiceAddress=".$lastId."&restaurants=".urlencode(trim($_GET['restaurants'])));
exit;
}
}


if(isset($_POST['EditGustUserSubmitData']))
{
$DummyUserQuery="Update user_newaddress set GustUserName=N'$GustUserName',GustUserEmail='$GustUserEmail',GustUserPassword='$GustUserPassword',GustUserPincode='$GustUserPincode',GustUserAddress=N'$GustUserAddress',GustUserBellName=N'$GustUserBellName',GustUserFloor=N'$GustUserFloor',GustUserLandlineAdress=N'$GustUserLandlineAdress',countryID='$countryID',stateID='$stateID',GustUserCityName=N'$GustUserCityName',GustUserMobileNo='$GustUserMobileNo',GustUserStreetAddress=N'$GustUserStreetAddress',ContactAddressTitle=N'$ContactAddressTitle' where id='".$_GET['eid']."'";
if(mysql_query($DummyUserQuery))
{
header("location:JustFoodgrCheckout.php?deliveryTime=".$_GET['deliveryTime']."&deliveryDate=".$_POST['deliveryDate']."&RestaurantService=".urlencode(trim($_GET['RestaurantService']))."&ServiceAddress=".$_GET['eid']."&restaurants=".urlencode(trim($_GET['restaurants'])));
exit;
}
}

if($_GET['eid']=='')
{
if($_GET['tipamount']!='')
{
$_SESSION['tipamountVale']=$_GET['tipamount'];
}
}
if(isset($_POST['CheckDeliveryAddressSubmit']))
{
$CckData=mysql_fetch_assoc(mysql_query("select * from user_newaddress where id='".$_POST['ServiceAddress']."'"));
if($CckData['GustUserPincode']==$_POST['RestaurantDeliveryArea'])
{
header("location:JustFoodgrCheckout.php?deliveryTime=".$_POST['deliveryTime']."&deliveryDate=".$_POST['deliveryDate']."&RestaurantService=".urlencode(trim($_GET['RestaurantService']))."&ServiceAddress=".$_POST['ServiceAddress']."&RestaurantDeliveryArea=".$_POST['RestaurantDeliveryArea']."&restaurants=".urlencode(trim($_GET['restaurants'])));
}
else
{
$Deliveryerror="We are not delivered this address kindly add new address";
}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<link href="css/reset2.css" type="text/css" rel="stylesheet" media="all" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta itemprop="name" content="<?php echo stripslashes(ucwords($resdata['restaurant_name'])); ?>">
<title itemprop="description"><?php echo stripslashes(ucwords($resdata['restaurant_name'])); ?>-<?php echo stripslashes(ucwords($resdata['restaurant_address'])); ?>,<?php echo stripslashes(ucwords($resdata['restaurantCity'])); ?>|<?php echo stripslashes(ucwords($resSEO['restaurant_MetaTitle'])); ?></title>
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
<script  type="text/javascript"  language="javascript">

function getOrgTypeListRest(str){

if (str=="")

{

document.getElementById("stateID").innerHTML="";

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

if (xmlhttp.readyState==4 && xmlhttp.status==200)

{

document.getElementById("stateID").innerHTML=xmlhttp.responseText;

}

}

xmlhttp.open("post","stateFatch.php?q="+str,true);

xmlhttp.send();

}





function getOrgTypeListRestCity(str){

if (str=="")

{

document.getElementById("GustUserCityName").innerHTML="";

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

if (xmlhttp.readyState==4 && xmlhttp.status==200)

{

document.getElementById("GustUserCityName").innerHTML=xmlhttp.responseText;

}

}

xmlhttp.open("post","cityFatech.php?q="+str,true);

xmlhttp.send();

}



</script>
<?php include('check_delivery_time.php'); ?>
<!--contentwrapper starts-->
<div id="contentwrapper" style="padding-top:30px;">
  <!--content container starts-->
  <div class="container" style="min-height:650px; padding-bottom:30px;">
    <!-- mid search  starts-->
    <div class="midserach">
      <div class="steps">
        <ul>
          <li> <a href="./"> <span>1</span> <?php echo ucwords($TableLanguage['SetpSearchText']);?> </a> </li>
          <li> <a href="restaurantSearchText.php?<?php echo $_SESSION['URlCookies'];?>"> <span >2</span> <?php echo ucwords($TableLanguage['SetpSelectRestaurantText']);?> </a> </li>
          <li> <a href="restaurant.php?restaurants=<?php echo urlencode(trim($_GET['restaurants']));?>" > <span>3</span> <?php echo ucwords($TableLanguage['SetpPlaceOrderText']);?> </a> </li>
          <li> <a href="#" style="color:#FF091E" > <span>4</span class="selected"> <?php echo ucwords($TableLanguage['SetpCheckoutText']);?> </a> </li>
        </ul>
      </div>
    </div>
    <!-- mid search  ends-->
    <div class="tab_menu_container" style="min-height:750px;">
      <div class="login_left">
        <div class="leftcont chk">
          <div class="chkcont nbdr">
           <?php if($Deliveryerror!=''){ ?>
              <div style="padding:10px; color:#E10000; font-size:16px;font-weight:bold;"><?php echo $Deliveryerror;?></div>
              <?php } ?>
            <?php if($_GET['UserGustEmail']=='' && $_GET['eid']=='' ){ ?>
            <div class="cnf_address">
              <h2><?php echo $TableLanguage7['ChooseDeliveryAddressText'];?></h2>
              <form method="post" action="">
                
					<?php if($_GET['RestaurantService']!='Pickup' || $_GET['RestaurantService']!='Takeout'){ ?>
                <div class="address">
                <?php $hjArea=mysql_query("select * from tbl_restaurantDeliveryArea where restaurant_id='".$resID[0]."'"); ?>
                  <select name="RestaurantDeliveryArea" <?php if(mysql_num_rows($hjArea)>0){ ?>required <?php } ?> id="RestaurantDeliveryArea" class="textbox" >
                    <option value="">Restaurant Delivery Area</option>
                    <?php 
                     while($usdataAddress=mysql_fetch_assoc($hjArea)){ ?>
                    <option value="<?php echo $usdataAddress['restaurant_postcode']; ?>"><?php echo $usdataAddress['restaurant_delivery_area']; ?>-<?php echo $usdataAddress['restaurant_postcode']; ?></option>
                    <?php }?>
                  </select>
                </div>
                <?php } ?>
                <?php if($_SESSION['preorder']!=''){ ?>
                <div class="address">
                <select id="deliveryTime" required name="deliveryTime">
                      <option value="" selected="selected">Select</option>
                       <option value="<?php echo $_GET['deliveryTime'];?>" selected="selected"><?php echo $_GET['deliveryTime'];?></option>
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
                    </select></div>
                <div class="address"><select style="border: 1px rgb(198, 195, 195) solid;" required name="deliveryDate" id="deliveryDate">
    <?php 

 $cTm=mktime(0,0,0,date('m'),date('d'),date('Y'));
 $lTm=mktime(0,0,0,06,date('d'),2020);
for($iD=$cTm;$iD<=$lTm;$iD=$iD+(24*3600)){
?>	
<option value="<?php echo date('Y-m-d',$iD);?>" <?php if($_GET['deliveryDate']==date('Y-m-d',$iD)){ ?> selected="selected" <?php } ?>><?php echo date('D M d S Y',$iD);?></option>
<?php
	}
?>
    </select></div>
               
                <?php } else {  ?>
              <input  name="deliveryDate"  type="hidden" value="<?php echo date('Y-m-d');?>" />
             <?php /*?> <input  name="deliveryDateDisplay"  type="hidden" value="<?php echo date('m/d/Y');?>" /><?php */?>
                 <input  name="deliveryTime"  type="hidden" value="<?php echo date('h:i a', time());?>" />
                 <?php } ?>
                   
                <div class="address">
                  <select name="ServiceAddress" id="ServiceAddress" class="textbox"  required>
                    <option value="">Select Delivery Address</option>
                    <?php $hj=mysql_query("select * from user_newaddress where loginID='".$_SESSION['justfoodsUserID']."'");
  if(mysql_num_rows($hj)>0)
  {
  while($usdata=mysql_fetch_assoc($hj)){
  ?>
                    <option value="<?php echo $usdata['id']; ?>" ><?php echo $usdata['ContactAddressTitle']; ?></option>
                    <?php } } else { ?>
                    <option value=""><?php echo $TableLanguage7['NoDeliveryAddressMsgText'];?></option>
                    <?php } ?>
                  </select>
                  <input type="submit" value="<?php echo $TableLanguage7['ContinueButtonText'];?>" name="CheckDeliveryAddressSubmit" class="continue" style="cursor:pointer;" />
                </div>
              </form>
            </div>
            <?php } ?>
            <div class="ship_info">
              <?php if($_GET['eid']==''){ ?>
              <h2><?php echo $TableLanguage5['ResFormFieldAddDeliveryAddressText'];?></h2>
              <?php } else { ?>
              <h2> <?php echo $TableLanguage7['ChooseDeliveryAddressText'];?></h2>
              <?php } ?>
              <form name="" method="post" action="">
                <table width="100%" style="margin-top:15px;">
                  <?php if($_SESSION['justfoodsUserID']=='' && $_GET['eid']=='' ){ ?>
                  <tr>
                    <td width="15%"><?php echo $TableLanguage5['ResFormFieldNameText'];?><span>*</span></td>
                    <td width="40%"><input type="text" name="GustUserName" id="GustUserName" value="<?php echo $UserData['GustUserName'];?>" class="textbox"  required/></td>
                  </tr>
                  <?php } ?>
                  <?php if($_GET['eid']=='' && $_SESSION['justfoodsUserID']==''){ ?>
                  <tr>
                    <td width="15%"><?php echo $TableLanguage5['ResFormFieldEmailText'];?><span>*</span></td>
                    <td width="40%"><input type="email" name="GustUserEmail" id="GustUserEmail" value="<?php echo $_GET['UserGustEmail']?>" class="textbox"  required/></td>
                  </tr>
                  <tr>
                    <td width="15%"><?php echo $TableLanguage5['ResFormFieldPasswordText'];?><span>*</span></td>
                    <td width="40%"><input type="text" name="GustUserPassword" id="GustUserPassword" value="<?php echo $_GET['UserGustPassword']?>" class="textbox"  required/></td>
                  </tr>
                  <?php } ?>
                  
                  <?php if($_GET['RestaurantService']!='Pickup' || $_GET['RestaurantService']!='Takeout'){ ?>
                    <tr><td width="15%">Restaurant Delivery Area</td><td width="40%"><select name="RestaurantDeliveryArea" id="RestaurantDeliveryArea" class="textbox"  required>
                    <option value="">Restaurant Delivery Area</option>
                    <?php $hjArea=mysql_query("select * from tbl_restaurantDeliveryArea where restaurant_id='".$resID[0]."'");
                     while($usdataAddress=mysql_fetch_assoc($hjArea)){ ?>
                    <option value="<?php echo $usdataAddress['restaurant_delivery_area']; ?>-<?php echo $usdataAddress['restaurant_postcode']; ?>" ><?php echo $usdataAddress['restaurant_delivery_area']; ?>-<?php echo $usdataAddress['restaurant_postcode']; ?></option>
                    <?php }?>
                  </select></td></tr>
                  <?php } ?>
                  
                   <?php if($_SESSION['preorder']!=''){ ?>
               <tr><td width="15%">Delivery/Pickup Time</td><td width="40%">
                <select id="deliveryTime" class="textbox" required name="deliveryTime">
                      <option value="" selected="selected">Select</option>
                       <option value="<?php echo $_GET['deliveryTime'];?>" selected="selected"><?php echo $_GET['deliveryTime'];?></option>
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
                    </select></td></tr>
               <tr><td width="15%">Delivery/Pickup Date</td><td width="40%"><select class="textbox" required name="deliveryDate" id="deliveryDate">
    <?php 

 $cTm=mktime(0,0,0,date('m'),date('d'),date('Y'));
 $lTm=mktime(0,0,0,06,date('d'),2020);
for($iD=$cTm;$iD<=$lTm;$iD=$iD+(24*3600)){
?>	
<option value="<?php echo date('Y-m-d',$iD);?>" <?php if($_GET['deliveryDate']==date('Y-m-d',$iD)){ ?> selected="selected" <?php } ?>><?php echo date('D M d S Y',$iD);?></option>
<?php
	}
?>
    </select></td></tr>
               
                <?php } else {  ?>
              <input  name="deliveryDate"  type="hidden" value="<?php echo date('Y-m-d');?>" />
             <?php /*?> <input  name="deliveryDateDisplay"  type="hidden" value="<?php echo date('m/d/Y');?>" /><?php */?>
                 <input  name="deliveryTime"  type="hidden" value="<?php echo date('h:i a', time());?>" />
                 <?php } ?>
                
                  <tr>
                    <td width="15%"><?php echo $TableLanguage5['ResFormFieldAddressText'];?><span>*</span></td>
                    <td width="40%" colspan="5"><textarea name="GustUserAddress" id="GustUserAddress" class="txtarea" required><?php echo $UserData['GustUserAddress'];?></textarea></td>
                  </tr>
                  <tr>
                    <td width="15%"><?php echo $TableLanguage5['ResFormFieldCountryText'];?><span>*</span></td>
                    <td width="40%"><select class="textbox" data-placeholder="Select Country..." id="countryID" name="countryID"  onChange="getOrgTypeListRest(this.value)">
                        <option value=""><?php echo $TableLanguage7['SelectText'];?></option>
                        <?php 

											  $StateQuery = mysql_query("select * from tbl_country order by countryName asc");

                                              while($StateData=mysql_fetch_assoc($StateQuery)){

											  ?>
                        <option value="<?php echo $StateData['id']; ?>" <?php if($UserData['countryID']==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['countryName']); ?></option>
                        <?php } ?>
                      </select></td>
                  </tr>
                  <tr>
                    <td width="15%"><?php echo $TableLanguage2['StateFilterText'];?><span>*</span></td>
                    <td width="40%"><select class="textbox" data-placeholder="Select State..." id="stateID"  name="stateID"   onChange="getOrgTypeListRestCity(this.value)" >
                        <option value=""><?php echo $TableLanguage7['SelectText'];?></option>
                        <?php 

											 

											  $StateQuery = mysql_query("select * from tbl_state where countryID='".$UserData['countryID']."'");

                                              while($StateData=mysql_fetch_assoc($StateQuery)){

											  ?>
                        <option value="<?php echo $StateData['id']; ?>" <?php if($UserData['stateID']==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['stateName']); ?></option>
                        <?php } ?>
                      </select></td>
                  </tr>
                  <tr>
                    <td width="15%"><?php echo $TableLanguage2['CityFilterText'];?><span>*</span></td>
                    <td width="40%"><select class="textbox" data-placeholder="Select State..." id="GustUserCityName" name="GustUserCityName"   >
                        <option value=""><?php echo $TableLanguage7['SelectText'];?></option>
                        <?php 

											  

											  $StateQuery =mysql_query("select * from tbl_city where stateID='".$UserData['stateID']."'"); 

                                              while($StateData=mysql_fetch_assoc($StateQuery)){

											  ?>
                        <option value="<?php echo $StateData['cityName']; ?>" <?php if($UserData['GustUserCityName']==$StateData['cityName']){ ?> selected <?php } ?>><?php echo ucwords($StateData['cityName']); ?></option>
                        <?php } ?>
                      </select>
                    </td>
                  </tr>
                  <?php /*?><tr>
<td width="15%"><?php echo $TableLanguage5['ResFormFieldStreetAddressText'];?></td>
<td width="40%" colspan="5"><textarea name="GustUserStreetAddress" id="GustUserStreetAddress" class="txtarea" ><?php echo $UserData['GustUserStreetAddress'];?></textarea></td>
</tr>
<?php */?>
                  <tr>
                    <td width="15%"><?php echo $TableLanguage5['ResFormFieldPincodeText'];?><span>*</span></td>
                    <td width="40%"><input type="text" name="GustUserPincode" id="GustUserPincode" value="<?php echo $UserData['GustUserPincode'];?>" class="textbox"  required/></td>
                  </tr>
                  <tr>
                    <td width="15%"><?php echo $TableLanguage5['ResFormFieldContactText'];?><span>*</span></td>
                    <td width="40%"><input type="text" name="GustUserMobileNo" id="GustUserMobileNo" value="<?php echo $UserData['GustUserMobileNo'];?>" class="textbox"  required/></td>
                  </tr>
                  <?php if($_SESSION['justfoodsUserID']!=''){ ?>
                  <tr>
                    <td width="15%"><?php echo $TableLanguage6['CustAddressLabelText'];?> (<?php echo $TableLanguage7['OfficeHomeText'];?>)<span>*</span></td>
                    <td width="40%"><input type="text" name="ContactAddressTitle" id="ContactAddressTitle" value="<?php echo $UserData['ContactAddressTitle'];?>" class="textbox"  required/></td>
                  </tr>
                  <?php } ?>
                  <tr>
                    <td width="15%"></td>
                    <td width="40%"><?php if($_GET['eid']!=''){ ?>
                      <input type="submit" name="EditGustUserSubmitData" value="<?php echo $TableLanguage7['SaveContinueButtonText'];?>" class="continue" style="cursor:pointer;" />
                      <?php } else { ?>
                      <input type="submit" name="GustUserSubmitData" value="<?php echo $TableLanguage7['SaveContinueButtonText'];?>" class="continue"  style="cursor:pointer;"/>
                      <?php } ?>
                    </td>
                  </tr>
                </table>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div id="UserCatX"></div>
      <div style="clear:both;"></div>
    </div>
    <div style="clear:both;"></div>
  </div>
  <!--mid container ends-->
  <div style="clear:both;"></div>
</div>
<!--content container ends-->
<!--</div>-->
<!--contentwrapper Ends-->
<a href="#" class="go-top" style="color:#ffffff;"><?php echo $TableLanguage1['BackToTopText'];?></a>
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
<?php 
//if($_GET['RestaurantService']=="Home Delivery"){
//$_GET['RestaurantService']='HomeDelivery';
//}
 ?>
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
