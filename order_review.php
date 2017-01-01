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
<title>Order Review</title>
 <link href="css/LoginCss.css" type="text/css" rel="stylesheet" media="all" /> 
 <link href="css/myaccount.css" type="text/css" rel="stylesheet" />
 
      <!--DROP DOWN CSS AND JQUERY START HERE-->
      <script type="text/javascript" src="js/jquery.selectize.js"></script>
      <link href="css/style.css" type="text/css" rel="stylesheet" />
      <link href="css/selectize.css" type="text/css" rel="stylesheet" />
      <script type="text/javascript">
				$('#select-person').selectize({
				    create: true,
				    sortField: 'text'
				});
				</script>
               
       <!--DROP DOWN CSS AND JQUERY START HERE-->
       
       
     <!--DATE PICKER JS START HERE --> 
       <link rel="stylesheet" href="css/jquery-ui.css" type="text/css">
<script src="js/jquery-ui.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>
  $(function() {
    $("#datepicker").datepicker();
  });
  </script>
  
<link rel="stylesheet" href="colorbox/colorbox.css" />
<script src="colorbox/popup.js"></script>
		<script>
			$(document).ready(function(){
			
				$(".iframe").colorbox({iframe:true, width:"60%", height:"85%"});
				$(".groupOrder").colorbox({iframe:true, width:"65%", height:"75%"});
				
			});
			
		
		</script>    
      
    <!--DATE PICKER JS END HERE -->  
  <link rel="stylesheet" href="jqmodal/simplemodal.css" />
<script src="jqmodal/jquery.simplemodal.js"></script>
  <script>
var message = '<strong>You have already given review & rating</strong>';

$('.close').click(function(e) {
	e.preventDefault();
  $.modal.confirm(message, function(val){
    if(val == true) 
	{
	
	}
});
});

</script>
 
</head>
<body>
<!--wrapper starts-->
<div id="wrapper">
  <!--header starts-->
   <link type="text/css" href="translateelement.css" rel="stylesheet" />
<?php include("route/TopHeader.php"); ?>   <!--header ends-->
</div>


<!--contentwrapper starts-->
<div id="contentwrapper" style="padding-top:7px; padding-bottom:7px;">
  <!--content container starts-->
  <div class="container" style="min-height:500px;">
<div class="about00" style="border-top: 1px #C6121B solid;">
    <h3><?php echo $TableLanguage['CustMyOrderText'];?></h3>
    <div class="contact" id="myaccount">

        <div class="account_bottom">

          <div class="account_pannel">

    <?php include('UseraccountLeftPanel.php'); ?>

</div><!-- End:account_pannel -->
            <div class="account_detail">
                <div class="account_detail_top">
                    <h4 style="padding-bottom:29px;">  <span style="float: left;">
                    <?php echo $TableLanguage['CustMyOrderText'];?>
                        </span>
                     </h4>
                    
                    
                    
                    <div class="common_box" id="orderoverview">
                    <div style="width:100%; min-height:50px;">
                   <form action="" method="get" name="form1" id="form1">
                        <label for="select-to" style="float:left; font-size: 16px;font-weight: normal; color: #3d3d3d;"><?php echo $TableLanguage6['CustNoofFilterBy'];?></label>
                        <div class="control-group">
				
				<select id="restoid" name="restoid" onchange="document.form1.submit()"   placeholder="Select a person..">
					<option value=""> <?php echo ucwords($TableLanguage6['CustSelectRestaurant']);?></option>
					<?php $d=mysql_query("SELECT * FROM  `tbl_restaurantAdd` order by restaurant_name asc "); 
while($re=mysql_fetch_assoc($d)){?>
<option value="<?php echo ucwords($re['id']); ?>" <?php if($_GET['restoid']==$re['id']){ ?> selected="selected" <?php } ?> ><?php echo ucwords($re['restaurant_name']); ?></option><?php } ?>
				</select>
			</div>
            <div class="date_picker" style="width:360px;">
                       <label style="color: #3d3d3d;font-size: 16px;font-weight: normal;"><?php echo $TableLanguage5['ResFormFieldDateText'];?></label>
                        <input type="date" name="odr_date" value="<?php echo $_GET['odr_date'];?>"  id="datepicker" required class="textbox_date hasDatepicker">
                        <input type="submit" name="Submit" value="<?php echo $TableLanguage6['CustNoofFilterButton'];?>" class="button red01" />
                        </div>
                        </form>
                        </div>
                        <table border="0" style="width: 100%" class="order-table" cellpadding="0" cellspacing="0">
                            <tbody>
                            <tr align="center" class="tr_font">
                               
                                <th style="width:auto;"><h5><?php echo $TableLanguage6['CustOrderNoText'];?></h5></th>
                                <th style="width:auto;"><h5><?php echo $TableLanguage6['CustOrderDateText'];?></h5></th>
                                <th style="width:auto;"><h5><?php echo $TableLanguage6['CustOrderAMountText'];?></h5></th>
                                <th style="width:auto;"><h5><?php echo $TableLanguage6['CustOrderStatusText'];?></h5></th>
                                 <th style="width:auto;"><h5><?php echo $TableLanguage6['CustOrderRestaurantNameText'];?></h5></th>
                                <th style="width:auto;"><h5><?php echo $TableLanguage6['CustOrderDetailNameText'];?></h5></th>
                                <th style="width:auto; border-right:1px solid #9a9a9a;"><h5><?php echo $TableLanguage7['actionText'];?></h5></th>
                            </tr>
                            <?php 
if($_GET['restoid']!='')
{
$resID=" and restoid='".$_GET['restoid']."'";
}

if($_GET['odr_date']!='')
{
$resData=" and odr_date='".$_GET['odr_date']."'";
}							
$OrdQur="select * from resto_order where userId='".$_SESSION['justfoodsUserID']."' $resID $resData  ORDER BY order_identifyno DESC";
$QUrOrdPer=mysql_query($OrdQur);
$dOrdstatusA=mysql_fetch_assoc(mysql_query("select * from order_status where id='1'"));
$dOrdstatusT=mysql_fetch_assoc(mysql_query("select * from order_status where id='2'"));
$dOrdstatusD=mysql_fetch_assoc(mysql_query("select * from order_status where id='3'"));
$dOrdstatusC=mysql_fetch_assoc(mysql_query("select * from order_status where id='4'"));
$dOrdstatusCn=mysql_fetch_assoc(mysql_query("select * from order_status where id='5'"));
if(mysql_num_rows($QUrOrdPer)>0)
{
while($OrdData=mysql_fetch_assoc($QUrOrdPer))
{

?>  


                            <tr align="center">
                            
                            <td><?php echo $OrdData['order_identifyno']; ?></td>
                            <td><?php echo $OrdData['deliverydate']; ?></td>
                            <td><?php echo $AdminDataLoginVal['website_CurrencySymbole'];?> <?php if($OrdData['disCupnPrice']<=$OrdData['ordPrice']){
								 echo number_format($OrdData['ordPrice'],2); 
								$pres=$OrdData['ordPrice'];}else{$pres='0.00';echo '0.00';}
														 // $sum+=$pres;
														  ?></td>
                            <td><?php if($OrdData['status']==1){
	echo ucwords($dOrdstatusA['status']);
	}
	 ?>
	 <?php if($OrdData['status']==2){
	 echo ucwords($dOrdstatusT['status']);
	}
	 ?>
	 <?php if($OrdData['status']==3){
	 echo ucwords($dOrdstatusD['status']);
	}
	 ?>
	 <?php if($OrdData['status']==4){
	 echo ucwords($dOrdstatusC['status']);
	}
	 ?>
	 <?php if($OrdData['status']==5){
	 echo ucwords($dOrdstatusCn['status']);
	}
	 ?></td>
      <td>
    <?php  

$ordrest=mysql_fetch_assoc(mysql_query("select * from  tbl_restaurantAdd  where id='".$OrdData['restoid']."' "));

echo $ordrest['restaurant_name'];
?>
</td>
     
                            <td> <a style="color:#43B7C6;text-decoration:underline;" href="Order_detail.php?orderid=<?php echo $OrdData['order_identifyno']; ?>" class="groupOrder"><?php echo ucwords($TableLanguage6['CustOrderOrderDeatilText']);?></a></td>
                            <td style="border-right:1px solid #9a9a9a;">
                            <?php $mreview=mysql_num_rows(mysql_query("select * from  tbl_restaurantReview where RestaurantReviewId='".$OrdData["restoid"]."' and Restaurant_orderID='".$OrdData['order_identifyno']."'")); 
							if($mreview>0){
							?>
                             <a style="color:#43B7C6;text-decoration:underline;" class="close" href=""><?php echo ucwords($TableLanguage6['CustOrderLeaveAReviewText']);?></a>
                           <?php } else { ?>
                             <a style="color:#43B7C6;text-decoration:underline;" href="writeReview.php?restaurants=<?php echo $OrdData["restaurant"];?>&hotel_id=<?php echo $OrdData['restoid'];?>&orderid=<?php echo $OrdData['order_identifyno'];?>"class="iframe"><?php echo ucwords($TableLanguage6['CustOrderLeaveAReviewText']);?></a>
                           <?php } ?>
                           
                           </td>
                            
                            </tr>
                            <?php } } else { ?>
<tr>
<td colspan="7" style="border-right: 1px solid #9A9A9A;">
<strong style="color:#9F0000; font-size:14px;"><?php echo $TableLanguage7['sorryYouhavenoOrderText'];?></strong>
</td></tr>
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
