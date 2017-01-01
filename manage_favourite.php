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
if($_GET['did']!='')
{
$UserAddressData=mysql_query("delete from favorite where id='".$_GET['did']."' order by id asc");
header('location:manage_favourite.php');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>		
<link href="css/reset2.css" type="text/css" rel="stylesheet" media="all" />        
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Your Favorites</title>
 <link href="css/LoginCss.css" type="text/css" rel="stylesheet" media="all" /> 
 <link href="css/myaccount.css" type="text/css" rel="stylesheet" />
 <link rel="stylesheet" href="jqmodal/simplemodal.css" />
<script src="jqmodal/jquery.js"></script>
<script src="jqmodal/jquery.simplemodal.js"></script>
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
    <h3> <?php echo $TableLanguage['CustMyfavoriteText'];?></h3>
    <div class="contact" id="myaccount">

        <div class="account_bottom">

          <div class="account_pannel">

    <?php include('UseraccountLeftPanel.php'); ?>

</div><!-- End:account_pannel -->
            <div class="account_detail">
                <div class="account_detail_top">
                    <h4 style="padding-bottom:29px;">  <span style="float: left;">
                   <?php echo $TableLanguage['CustMyfavoriteText'];?>
                        </span>
                     </h4>
                    
                    <script>
var message = '<strong>Are You sure to delete this record</strong>';

$('.close').click(function(e) {
	e.preventDefault();
  $.modal.confirm(message, function(val){
    if(val == true) 
	{
	
	}
});
});

</script>
                    
                    <div class="common_box" id="orderoverview">
                     <div style="width:100%; min-height:50px;">
<form action="" method="get" name="form1" id="form1">
                        <label for="select-to" style="float:left; font-size: 16px;font-weight: normal; color: #3d3d3d;"><?php echo $TableLanguage6['CustNoofFilterBy'];?></label>
                        <div class="control-group">
				
				<select id="hotel_id" name="hotel_id" onchange="document.form1.submit()" required  placeholder="Select a person..">
					<option value=""> <?php echo ucwords($TableLanguage6['CustSelectRestaurant']);?></option>
					<?php $d=mysql_query("SELECT * FROM  `tbl_restaurantAdd` order by restaurant_name asc "); 
while($re=mysql_fetch_assoc($d)){?>
<option value="<?php echo ucwords($re['id']); ?>" <?php if($_GET['hotel_id']==$re['id']){ ?> selected="selected" <?php } ?> ><?php echo ucwords($re['restaurant_name']); ?></option><?php } ?>
				</select>
			</div>
            
                        </form>
                        </div>
                        <table border="0" style="width: 100%" class="order-table" cellpadding="0" cellspacing="0">
                            <tbody>
                            <tr align="center" class="tr_font">
                                <th style="width:auto;"><h5><?php echo $TableLanguage7['SrNOText'];?></h5></th>
                                <th style="width:auto;"><h5><?php echo $TableLanguage6['CustOrderRestaurantNameText'];?></h5></th>
                                
                                <th style="width:auto; border-right:1px solid #9a9a9a;"><h5><?php echo $TableLanguage7['actionText'];?></h5></th>
                            </tr>
                              <?php 
							  if($_GET['hotel_id']!=''){
							$QuerySub=mysql_query("SELECT * FROM  favorite where userid='".$_SESSION['justfoodsUserID']."' and  hotel_id='".$_GET['hotel_id']."' order by id desc");
							}
							else
							{
							$QuerySub=mysql_query("SELECT * FROM  favorite where userid='".$_SESSION['justfoodsUserID']."' order by id desc");
							}
							
							$numData=mysql_num_rows($QuerySub);
							if($numData>0){
							$i=1;
  							while($data=mysql_fetch_assoc($QuerySub)){
							$RestaurantData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantAdd where id='".$data['hotel_id']."'"))
							?>
                            <tr>
                           <td><?php echo $i;?></td>
                           <td><?php echo ucwords($RestaurantData['restaurant_name'])?></td>
                          
                           <td><a href="manage_favourite.php?did=<?php echo ucwords($data['id'])?>" class="close"><?php echo ucwords($TableLanguage['CustDeleteText']);?></a></td>
                           </tr>
                            <?php
							$i++;
							 } } else {?>
                           <tr><td colspan="3" style="border-right: 1px solid #9A9A9A;">
                           <div style="color:#FF0000; font-size:14px;"><?php echo $TableLanguage6['CustFaviouruteNoMsgText'];?></div></td></tr>
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
