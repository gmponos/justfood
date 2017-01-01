<?php 
ob_start();
session_start();
include('route/functions.php');
$db= new User();
include('config1.php');
include('route/db.php'); 
$dbObj=new db;
mysql_query ("set character_set_results='utf8'"); 
date_default_timezone_set('Asia/Calcutta');
$AdminDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_siteSetting order by id asc"));
include('generateTimeCalculation.php');
if($_SESSION['justfoodsUserID']!='')
{
//$UserAddressData=mysql_fetch_assoc(mysql_query("select * from tbl_user where id='".$_SESSION['justfoodsUserID']."' order by id asc"));
}
if($_GET['eid']!='')
{
$UserAddressData=mysql_fetch_assoc(mysql_query("select * from user_newaddress where id='".$_GET['eid']."' order by id asc"));
}
if($_GET['did']!='')
{
$UserAddressData=mysql_query("delete from user_newaddress where id='".$_GET['did']."' order by id asc");
header('location:address_book.php');
}
extract($_POST);
$ip=$_SERVER['REMOTE_ADDR'];
if(isset($_POST['EditAddressSubmit']))
{
@$DataUserUpdate="UPDATE `user_newaddress` SET `GustUserPincode` = '$GustUserPincode', `GustUserAddress` = N'$GustUserAddress', `GustUserBellName` = N'$GustUserBellName', `GustUserFloor` = N'$GustUserFloor', `GustUserLandlineAdress` = N'$GustUserLandlineAdress', `countryID` = '$countryID', `stateID` = '$stateID', `GustUserCityName` = N'$cityName', `GustUserMobileNo` = '$GustUserMobileNo', `GustUserStreetAddress` = N'$GustUserStreetAddress', `ip` = '$ip', `ContactAddressTitle` = N'$ContactAddressTitle', `loginID` = '".$_SESSION['justfoodsUserID']."' WHERE `id` = '".$_GET['eid']."'";
$CuisineInsert=mysql_query($DataUserUpdate);
header("location:address_book.php");
//$msg="Your Account has been successfully updated !";
}

if(isset($_POST['AddAddressSubmit']))
{
@$UserRegistrationData="INSERT INTO `user_newaddress` (`id`, `GustUserName`, `GustUserEmail`, `GustUserPassword`, `GustUserPincode`, `GustUserAddress`, `GustUserBellName`, `GustUserFloor`, `GustUserLandlineAdress`, `countryID`, `stateID`, `GustUserCityName`, `GustUserMobileNo`, `GustUserStreetAddress`, `ip`, `RestaurantService`, `UserGustType`, `ContactAddressTitle`, `loginID`) VALUES (NULL, '$GustUserName', '$GustUserEmail', '$GustUserPassword', '$GustUserPincode', N'$GustUserAddress', N'$GustUserBellName', N'$GustUserFloor', N'$GustUserLandlineAdress', '$countryID', '$stateID', N'$cityName', '$GustUserMobileNo', N'$GustUserStreetAddress', '$ip', '', '', N'$ContactAddressTitle', '".$_SESSION['justfoodsUserID']."');";
$CuisineInsert=mysql_query($UserRegistrationData);
$msg="Your Account has been successfully saved !";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>		
<link href="css/reset2.css" type="text/css" rel="stylesheet" media="all" />        
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Account Address Book | Developed by Php Expert Group</title>
 <link href="css/LoginCss.css" type="text/css" rel="stylesheet" media="all" /> 
 <link href="css/myaccount.css" type="text/css" rel="stylesheet" />
 <link href="css/fontIcon.css" rel="stylesheet" type="text/css" />

</head>
<body>
<!--wrapper starts-->
<div id="wrapper">
  <!--header starts-->
   <link type="text/css" href="translateelement.css" rel="stylesheet" />
<?php include("route/TopHeader.php"); ?>   <!--header ends-->
</div>

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

document.getElementById("cityName").innerHTML="";

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

document.getElementById("cityName").innerHTML=xmlhttp.responseText;

}

}

xmlhttp.open("post","cityFatech.php?q="+str,true);

xmlhttp.send();

}



</script>
<!--contentwrapper starts-->
<div id="contentwrapper" style="padding-top:7px; padding-bottom:7px;">
  <!--content container starts-->
  <div class="container" style="min-height:500px;">
<div class="about00" style="border-top: 1px #C6121B solid;">
    <h3><?php echo $TableLanguage6['CustAddressText'];?></h3>
    <div class="contact" id="myaccount">

        <div class="account_bottom">

          <div class="account_pannel">

    <?php include('UseraccountLeftPanel.php'); ?>

</div><!-- End:account_pannel -->
            <div class="account_detail">
                <div class="account_detail_top">
                    <h4 style="padding-bottom:29px;">  <span style="float: left;">
                   <?php echo $TableLanguage6['CustAddressText'];?>
                        </span>
                     </h4>
                    <div class="common_box" id="address_list">
                        <p><?php echo $TableLanguage6['CustAddressBookDescription'];?></p>
                        <table border="0" class="product-table" cellpadding="0" cellspacing="0">
                            <tbody>
                            <tr align="center" class="tr_font">
                                <th ><h5><?php echo $TableLanguage6['CustAddressLabelText'];?> </h5></th>
                                <th ><h5><?php echo $TableLanguage6['CustAddressText'];?> </h5></th>
                                 <th ><h5><?php echo $TableLanguage7['PhoneText'];?> </h5></th>
                                <th colspan="2" style="border-right:1px solid #9a9a9a;"><h5><?php echo $TableLanguage7['actionText'];?></h5></th>
                            </tr>
                            <?php 
							$UserAddress=mysql_query("select * from  user_newaddress where loginID='".$_SESSION['justfoodsUserID']."' order by id desc");
							$numData=mysql_num_rows($UserAddress);
							if($numData>0){
  							while($data=mysql_fetch_assoc($UserAddress)){
							?>

                            <tr align="center">
                            <td><h5><?php echo ucwords($data['ContactAddressTitle'])?></h5></td>
                            <td><?php echo ucwords($data['GustUserAddress'])?>,<?php echo ucwords($data['GustUserCityName'])?> - <?php echo ucwords($data['GustUserPincode'])?></td>
                             <td><h5><?php echo ucwords($data['GustUserMobileNo'])?></h5></td>
                            <td style="border-right:1px solid #9a9a9a;"><a href="address_book.php?eid=<?php echo ucwords($data['id'])?>"><?php echo ucwords($TableLanguage['CustEditText']);?></a>
                             <a href="address_book.php?did=<?php echo ucwords($data['id'])?>" onclick="return confirm('are you sure to delete this record');"><?php echo ucwords($TableLanguage['CustDeleteText']);?></a>
                            
                            </td></tr>
                            <?php } } else {?>
                            <tr align="center"><td colspan="4" style="border-right:1px solid #9a9a9a;text-align: center"> Any other address information not found</td></tr>
                            <?php } ?>
                            </tbody>
                        </table>
                        <div class="create_address">
                            <div class="create_adbox">
                             <?php if($_GET['eid']!=''){ ?>
                                <h4>Saved Existing Address </h4>
                                <?php } else { ?>
                                 <h4><?php echo ucwords($TableLanguage6['CustCreateNewAddressText']);?>  </h4>
                                <?php } ?>

                                <form action="" method="post">
                            <div class="contact_txt"><?php if($msg!=''){ ?>
    <div style="padding:10px; color:#0000FF; font-size:14px;"><?php echo $msg;?></div>
    <?php } ?>
    <?php if($error!=''){ ?>
    <div style="padding:10px; color:#E10000; font-size:14px;"><?php echo $error;?></div>
    <?php } ?></div>
                            
                          	<div class="check_order_left">
                            	
                                <div class="contact_row">
                                    <label class="register_label"><?php echo $TableLanguage6['CustAddressText'];?>: <span style="color:#ff0000;">*</span></label>
                                    <input type="text" class="register_input" name="GustUserAddress" id="GustUserAddress" required value="<?php echo $UserAddressData['GustUserAddress'];?>">
                                </div>
                                
                                <?php /*?><div class="contact_row">
                                    <label class="register_label"><?php echo $TableLanguage5['ResFormFieldFloorText'];?>: <span style="color:#ff0000;">*</span></label>
                                    <input type="text" class="register_input" name="GustUserFloor" id="GustUserFloor"  value="<?php echo $UserAddressData['GustUserFloor'];?>">
                                </div>
								
								 <div class="contact_row">
                                    <label class="register_label"><?php echo $TableLanguage5['ResFormFieldLandLineText'];?>:</label>
                                    <input type="text" class="register_input" name="GustUserLandlineAdress" id="GustUserLandlineAdress" value="<?php echo $UserAddressData['GustUserLandlineAdress'];?>">
                                </div>
								<?php */?>
								<div class="contact_row">
                                    <label class="register_label"><?php echo $TableLanguage5['ResFormFieldPincodeText'];?>: <span style="color:#ff0000;">*</span></label>
                                    <input type="text" class="register_input" value="<?php echo $UserAddressData['GustUserPincode'];?>" required name="GustUserPincode" id="GustUserPincode">
									
                                </div>
								
							<?php /*?></div>
                            <div class="check_order_right"> 
							
							<?php */?>	
								
                                	<?php /*?> <div class="contact_row">
                                    <label class="register_label"><?php echo $TableLanguage5['ResFormFieldStreetAddressText'];?>: </label>
                                    <input type="text" class="register_input" name="GustUserStreetAddress" id="GustUserStreetAddress" value="<?php echo $UserAddressData['GustUserStreetAddress'];?>">
                                </div><?php */?>
                            	
								
								 <div class="contact_row">
                                    <label class="register_label"><?php echo $TableLanguage5['ResFormFieldCountryText'];?>: </label>
                                 
                                 <input type="text" class="register_input" value="<?php echo $UserAddressData['countryID'];?>" required name="countryID" id="countryID">
                                  <?php /*?><select class="register_input" data-placeholder="Select Country..." id="countryID" name="countryID"  onChange="getOrgTypeListRest(this.value)">
 <option value=""><?php echo $TableLanguage7['SelectText'];?></option>
											  <?php 

											  $StateQuery = mysql_query("select * from tbl_country order by countryName asc");

                                              while($StateData=mysql_fetch_assoc($StateQuery)){

											  ?>

                                              <option value="<?php echo $StateData['id']; ?>" <?php if($UserAddressData['countryID']==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['countryName']); ?></option>

                                              <?php } ?>

											

											</select><?php */?>
                                </div>
                            	
								 <div class="contact_row">
                                        <label class="register_label"><?php echo $TableLanguage2['StateFilterText']; ?>:</label>
                                        
                                        <input type="text" class="register_input" value="<?php echo $UserAddressData['stateID'];?>" required name="stateID" id="stateID">
                                      <?php /*?>  <select class="register_input" data-placeholder="Select State..." id="stateID"  name="stateID"   onChange="getOrgTypeListRestCity(this.value)" >

    <option value=""><?php echo $TableLanguage7['SelectText'];?></option>
                                         <?php 

											 

											  $StateQuery = mysql_query("select * from tbl_state where countryID='".$UserAddressData['countryID']."'");

                                              while($StateData=mysql_fetch_assoc($StateQuery)){

											  ?>

                                              <option value="<?php echo $StateData['id']; ?>" <?php if($UserAddressData['stateID']==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['stateName']); ?></option>

                                              <?php } ?>

                                             
                                              </select><?php */?>
                                       
                                    </div>
                                     <div class="contact_row">
                                        <label class="register_label"><?php echo $TableLanguage2['CityFilterText']; ?>:</label>
                                        <input type="text" class="register_input" value="<?php echo $UserAddressData['GustUserCityName'];?>" required name="cityName" id="cityName">
                                        <?php /*?><select class="register_input" data-placeholder="Select State..." id="cityName" name="cityName"   >

     <option value=""><?php echo $TableLanguage7['SelectText'];?></option>

											  <?php 

											  

											  $StateQuery =mysql_query("select * from tbl_city where stateID='".$UserAddressData['stateID']."'"); 

                                              while($StateData=mysql_fetch_assoc($StateQuery)){

											  ?>

                                              <option value="<?php echo $StateData['cityName']; ?>" <?php if($UserAddressData['GustUserCityName']==$StateData['cityName']){ ?> selected <?php } ?>><?php echo ucwords($StateData['cityName']); ?></option>

                                              <?php } ?>

											

											</select>
                                       <?php */?>
                                       
                                    </div>
                                    
								
								 <div class="contact_row">
                                    <label class="register_label"><?php echo $TableLanguage5['ResFormFieldContactText'];?>: <span style="color:#ff0000;">*</span></label>
                                    <input type="text" class="register_input" name="GustUserMobileNo" id="GustUserMobileNo" value="<?php echo $UserAddressData['GustUserMobileNo'];?>" required>
                                </div>
								<div class="contact_row">
                                    <label class="register_label"><?php echo $TableLanguage6['CustAddressLabelText'];?>: <span style="color:#ff0000;">*</span></label>
                                    <input type="text" class="register_input" name="ContactAddressTitle" value="<?php echo $UserAddressData['ContactAddressTitle'];?>" required id="ContactAddressTitle" >
									<br><span style="color:#666; font-size:10px;"><?php echo ucwords($TableLanguage6['CustAddressBookDescription']);?></span>
                                </div>
								
								<div class="contact_row" id="create_address_button" >
                                <?php if($_GET['eid']!=''){ ?>
                                  <input class="button red01" type="submit" style="margin-top:10px;" value="<?php echo $TableLanguage7['submitButtonText'];?>"  name="EditAddressSubmit">
                                  <?php } else {?>
                                  <input class="button red01" type="submit" style="margin-top:10px;" value="<?php echo $TableLanguage7['submitButtonText'];?>"  name="AddAddressSubmit">
                                  <?php } ?>
                                </div>
                                  
                             </div> 
                        </div> 						
						
						</form>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>

        </div><!-- End:account_bottom -->

    </div>


</div>
   
 </div>
  <!--content container ends-->
  
</div>
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
