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
<title>Loyalty Points</title>
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
    <h3> <?php echo ucwords($TableLanguage['CustMyloyalityText']);?></h3>
    <div class="contact" id="myaccount">

        <div class="account_bottom">

          <div class="account_pannel">

    <?php include('UseraccountLeftPanel.php'); 
	
	?>

</div><!-- End:account_pannel -->
<?php  $OrdQur="select * from resto_order where userId='".$_SESSION['justfoodsUserID']."'  ORDER BY order_identifyno DESC"; ?>
            <div class="account_detail">
                <div class="account_detail_top">
                    <h4 style="padding-bottom:29px;">  <span style="float: left;">
                     <?php echo ucwords($TableLanguage['CustMyloyalityText']);?> <?php /*?>( <?php echo $TableLanguage7['OnePointText']; ?> = <?php echo $TableLanguage7['OrderText']; ?> <?php echo $AdminDataLoginVal['loyalityPoint'];?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?>)<?php */?>
                     
                     <?php 
					 
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
                        </span>
                     </h4>
                    <div class="common_box">
                        <table width="100%" cellspacing="1" cellpadding="10" border="0" bgcolor="#edeae1">
                            <tbody>
                            <tr>
                                <td width="30%" valign="middle" height="34" bgcolor="#fafaf8" align="left" class="add-font1"><?php echo ucwords($TableLanguage6['CustEarnPointLoyalityText']);?>:</td>
                                <td valign="middle" height="34" bgcolor="#fafaf8" align="left" class="add-font1"><span id="order_point"><?php echo $earnPoint; ?></span> <span id="order_point_details"></span>
                                </td>
                            </tr>
                           <?php /*?> <tr>

                                <td width="30%" valign="middle" height="34" bgcolor="#fafaf8" align="left" class="add-font1">Earned Points By Affiliate: </td>
                                <td valign="middle" height="34" bgcolor="#fafaf8" align="left" class="add-font1"><span id="affiliate_point"><?php echo $earnPoint; ?></span> <span id="order_affiliate_details"></span>
                                </td>
                            </tr><?php */?>
                            <tr>

                                <td valign="middle" height="34" bgcolor="#fafaf8" align="left" class="add-font1"><?php echo ucwords($TableLanguage6['CustUsedPointLoyalityText']);?>:</td>
                                <td valign="middle" height="34" bgcolor="#fafaf8" align="left" class="add-font1">
                                    <span id="pointshop_point"><?php 
									if($UserAddressData['usedPoint']!=''){
									echo $UserAddressData['usedPoint'];
									}
									else
									{
									echo '0';
									}
									?></span> <span id="order_pointshop_details"></span>


                                </td>
                            </tr>
                            <tr>
                                <td valign="middle" height="34" bgcolor="#fafaf8" align="left" class="add-font1"><?php echo ucwords($TableLanguage6['CustTotalPointLoyalityText']);?>:</td>
                                <td valign="middle" height="34" bgcolor="#fafaf8" align="left" class="add-font1"><span id="final_point"><?php if($TotalUsePoint>0){
								echo $TotalUsePoint;
								}
								else
								{
								echo '0.00';
								}?></span></td>
                            </tr>
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
