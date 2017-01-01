<?php 
ob_start();
session_start();
include('route/functions.php');
$db= new User();
include('config1.php');
include('route/db.php'); 
$dbObj=new db;
mysql_query ("set character_set_results='utf8'"); 
date_default_timezone_set('US/Eastern');
$AdminDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_siteSetting order by id asc"));
include('generateTimeCalculation.php');
if($_SESSION['justfoodsUserID']!='')
{
$UserAddressData=mysql_fetch_assoc(mysql_query("select * from tbl_user where id='".$_SESSION['justfoodsUserID']."' order by id asc"));
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>		
<link href="css/reset2.css" type="text/css" rel="stylesheet" media="all" />        
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Account</title>
 <link href="css/LoginCss.css" type="text/css" rel="stylesheet" media="all" /> 
 <link href="css/myaccount.css" type="text/css" rel="stylesheet" />
</head>
<body>
<!--wrapper starts-->
<div id="wrapper">
  <!--header starts-->
   <link type="text/css" href="translateelement.css" rel="stylesheet" />
<?php include("route/TopHeader.php"); ?>  <!--header ends-->
</div>


<!--contentwrapper starts-->
<div id="contentwrapper" style="padding-top:7px; padding-bottom:7px;">
  <!--content container starts-->
  <div class="container" style="min-height:500px;">
<div class="about00" style="border-top: 1px #C6121B solid;">
    <h3> <?php echo $TableLanguage['CustMyaccountText'];?></h3>
    <div class="contact" id="myaccount">

        <div class="account_bottom">

          <div class="account_pannel">

    <?php include('UseraccountLeftPanel.php'); ?>

</div><!-- End:account_pannel -->
            <div class="account_detail">
                <div class="account_detail_top">
                    <h4 style="padding-bottom:29px;">  <span style="float: left;">
                     <?php echo $TableLanguage['CustMyaccountText'];?>
                        </span>
                     </h4>
                    <div class="account_top">
<div class="account_top_left">

                            <div class="account_box">
                                <a href="loyality_point.php"><img width="45" height="46" alt="img" src="images/accountbalance.png"></a>
                                <a href="loyality_point.php"><?php echo $TableLanguage['CustMyloyalityText'];?></a>
                            </div>

                            <div class="account_box">
                                <a href="address_book.php"><img width="45" height="46" alt="img" src="images/book.png"></a>
                                <a href="address_book.php"><?php echo $TableLanguage['CustMyaddressText'];?></a>
                            </div>

                            <div class="account_box">
                                <a href="changePassword.php"><img width="45" height="46" alt="img" src="images/chngpass.png"></a>
                                <a href="changePassword.php"><?php echo $TableLanguage6['CustChangePassword'];?></a>
                            </div>

                            <div class="account_box">
                                <a href="edit_detail.php"><img width="45" height="46" alt="img" src="images/editdetails.png"></a>
                                <a href="edit_detail.php"><?php echo $TableLanguage6['CustChangeProfile'];?></a>
                            </div>

                            <div class="account_box">
                                <a href="order_review.php"><img width="45" height="46" alt="img" src="images/overview.png"></a>
                                <a href="order_review.php"><?php echo $TableLanguage['CustMyOrderText'];?></a>
                            </div>

                            <div class="account_box">
                                <a href="tell_a_friend.php"><img width="56" height="45" alt="img" src="images/man.png"></a>
                                <a href="tell_a_friend.php"><?php echo $TableLanguage6['CustTellYourFriend'];?></a>
                            </div>
   </div>
                        

                        <div class="account_detail_bottom">
                        <table width="100%">
  <tr>
    <td width="50px"> <?php if($UserAddressData['user_img']!=''){ ?>
                                    
                                       <img src="control/userPanelImage/<?php echo $UserAddressData['user_img'];?>" alt="<?php echo ucwords($UserAddressData['fname']);?> <?php echo ucwords($UserAddressData['lname']);?>" width="60" height="73" style="vertical-align:text-top;" />
                                  
                                    <?php } else {  ?>
                                   <img width="60" height="73" alt="<?php echo ucwords($UserAddressData['fname']);?> <?php echo ucwords($UserAddressData['lname']);?>" src="images/client01.jpg" style="vertical-align:text-top;">
                                    <?php } ?></td>
    <td> <h4 id="cust_image" style="border-bottom:none;"><?php echo $TableLanguage['CustMyaccountText'];?></h4></td>
  </tr>
  <tr>
    <td> <h5 class="actitle"><strong><?php echo ucwords($TableLanguage5['ResFormFieldNameText']);?></strong> : </h5></td>
    <td><h6 class="acdetail" id="cust_name">
	<?php if($UserAddressData['fname']!=''){ ?>
	<?php echo ucwords($UserAddressData['fname']);?> <?php echo ucwords($UserAddressData['lname']);?>
    <?php } else { ?>
    <?php echo $_SESSION['justfoodsUserName'];?>
    
    <?php } ?>
    
    </h6></td>
  </tr>
  <tr>
    <td> <h5 class="actitle"><strong><?php echo $TableLanguage5['ResFormFieldEmailText'];?></strong> : </h5></td>
    <td> <h6 class="acdetail" id="cust_email"><?php echo $UserAddressData['user_email'];?></h6></td>
  </tr>
  <tr>
    <td> <h5 class="actitle"><strong><?php echo $TableLanguage5['ResFormFieldContactText'];?></strong> : </h5></td>
    <td> <h6 class="acdetail" id="cust_phone"><?php echo $UserAddressData['user_cellphone'];?></h6></td>
  </tr>
  <tr>
    <td><h5 class="actitle"><strong><?php echo $TableLanguage6['CustAddressText'];?></strong> : </h5></td>
    <td> <h6 class="acdetail" id="cust_addr1"><?php echo $UserAddressData['address'];?></h6></td>
  </tr>
  <tr>
    <td> <h5 class="actitle"><strong><?php echo $TableLanguage2['CityFilterText'];?></strong>: </h5></td>
    <td>  <h6 class="acdetail" id="cust_city"><?php echo $UserAddressData['city_name'];?></h6></td>
  </tr>
  <tr>
    <td> <h5 class="actitle"><strong><?php echo $TableLanguage5['ResFormFieldCountryText'];?></strong> : </h5></td>
    <td><h6 class="acdetail" id="cust_county">
	<?php echo $UserAddressData['countryID'];?>
	<?php  
									//$StateQuery = mysql_fetch_assoc(mysql_query("select * from tbl_country where id='".$UserAddressData['countryID']."' order by countryName asc"));
									//echo $StateQuery['countryName'];?></h6></td>
  </tr>
  <tr>
    <td>  <h5 class="actitle"><strong><?php echo $TableLanguage5['ResFormFieldPincodeText'];?></strong> : </h5></td>
    <td><h6 class="acdetail" id="cust_postcode" style="text-transform:uppercase;"><?php echo $UserAddressData['zipcode'];?></h6></td>
  </tr>
</table>

                        
                            <!--<div class="clint01">
                                <h4 id="cust_image"> My account</h4>
                            </div>
                             User Profile view box
                            <div class="account_address" style="border:1px solid Red;">
                                <div class="account_address_Txt">
                                   
                                    
                                   
                                   
                                   
                                   
                                    
                                   
                                   
                                  
                                   
                                    
                                  
                                    
                                </div>
                            </div> -->
                         </div>
                    </div><!-- End:account_top -->
                   <div class="">
             <h4 style="padding-bottom:29px;">  <span style="float: left;"><?php echo $TableLanguage6['CustStatistics'];?></span></h4>
             <table width="100%" cellspacing="1" cellpadding="10" border="0" bgcolor="#edeae1">
                            <tbody>
                            <tr>
                                <td width="30%" valign="middle" height="34" bgcolor="#fafaf8" align="left" class="add-font1"> <?php echo $TableLanguage6['CustNoofOrder'];?>:</td>
                            <td valign="middle" height="34" bgcolor="#fafaf8" align="left" class="add-font1"><span id="order_point"><?php echo $NumberOfOrder=mysql_num_rows(mysql_query("select * from resto_order where userId='".$_SESSION['justfoodsUserID']."' order by userId asc")); ?></span> <span id="order_point_details"></span>
                                </td>
                            </tr>
                            <tr>

                                <td width="30%" valign="middle" height="34" bgcolor="#fafaf8" align="left" class="add-font1"><?php echo $TableLanguage6['CustNoofReview'];?>: </td>
                   <td valign="middle" height="34" bgcolor="#fafaf8" align="left" class="add-font1"><span id="affiliate_point"><?php echo $NumberOfReview=mysql_num_rows(mysql_query("select * from tbl_restaurantReview where userLoginID='".$_SESSION['justfoodsUserID']."' order by userLoginID asc")); ?></span> <span id="order_affiliate_details"></span>
                                </td>
                            </tr>
                            <tr>

                                <td valign="middle" height="34" bgcolor="#fafaf8" align="left" class="add-font1"><?php echo $TableLanguage6['CustNoofFavourite'];?>:</td>
                                <td valign="middle" height="34" bgcolor="#fafaf8" align="left" class="add-font1">
                                    <span id="pointshop_point"><?php echo $NumberOfFev=mysql_num_rows(mysql_query("select * from favorite where userid='".$_SESSION['justfoodsUserID']."' order by userid asc")); ?></span> <span id="order_pointshop_details"></span>


                                </td>
                            </tr>
                              <?php 
							  if($UserAddressData['assign_loyalty']==0)
							  {
					 $OrdQur="select * from resto_order where userId='".$_SESSION['justfoodsUserID']."'  ORDER BY order_identifyno DESC";
$QUrOrdPer=mysql_query($OrdQur);
$TotalOrder=0;
$earnPoint=0;
$UsePoint=0;
while($OrderData=mysql_fetch_assoc($QUrOrdPer))
{
$Total=$OrderData['ordPrice']+$OrderData['deliveryChrg'];
$TotalOrder +=$Total;
}
$GRanTotalLoy=$TotalOrder+$UserAddressData['loyalty_type'];
if($GRanTotalLoy!=0)
{
if($GRanTotalLoy<$AdminDataLoginVal['loyalityPoint'])
{
$earnPoint=0;
}
else
{
$earnPoint=floor($GRanTotalLoy/$AdminDataLoginVal['loyalityPoint']);
}
}
$TotalUsePoint=$earnPoint-$UserAddressData['usedPoint'];
					 ?>
                            <tr>
                                <td valign="middle" height="34" bgcolor="#fafaf8" align="left" class="add-font1"><?php echo $TableLanguage6['CustNoofLoyalityPoint'];?>:</td>
                                <td valign="middle" height="34" bgcolor="#fafaf8" align="left" class="add-font1"><span id="final_point"><?php echo $TotalUsePoint;?></span></td>
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
             
                           </div>
                </div><!-- End:account_detail_top -->



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
