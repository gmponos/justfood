<?php 
extract($_POST);
$subscribe_ip=$_SERVER['REMOTE_ADDR'];
$subscribe_date=date('d l Y');
if(isset($_POST['NewslessteSubmit']))
{
$klop=mysql_query("select * from tbl_newselleterSubscribe where subscribe_email='".$_POST['NewselleterText']."'");
if(mysql_num_rows($klop)>0)
{?>
<script type="text/javascript">
alert("Sorry !! you are already subscribed");
</script>
<?php }
else
{
$QueryNews="INSERT INTO `tbl_newselleterSubscribe` (`ip`, `subscribe_email`, `subscribe_ip`, `subscribe_date`, `ipblock`) VALUES (NULL, '".$_POST['NewselleterText']."', '$subscribe_ip', '$subscribe_date', '0')";
if(mysql_query($QueryNews))
{?>
<script type="text/javascript">
alert("Thankyou for subscribe newselleter !!");
</script>
<?php }
}
}
?>
<div class="footerwrapper">
  <div class="container">
    <div class="subcribe" >
      <div class="onethird" id="onethird_first" >
        <h3><?php echo $TableLanguage3['FooterSubscription'];?></h3>
        <form id="subscribe" action="#" method="post" >
          <input type="text" required placeholder=" <?php echo $TableLanguage3['FooterSubscriptionPlaceholder'];?> " style="font-weight:bold; float:left;"/ >
          <input type="submit" value="Sign up " name="NewslessteSubmit" id="subscribebtn"/>
        </form>
      </div>
      <div class="onethird" id="onethird_second">
        <ul>
        <li><span><?php echo $TableLanguage3['FooterSubscriptionMessage1'];?></span></li>
          <li><span><?php echo $TableLanguage3['FooterSubscriptionMessage2'];?></span></li>
        </ul>
      </div>
      <div class="onethird" id="onethird_third">
        <h3><?php echo $TableLanguage['GetTouchText'];?></h3>
        <div class="social_imges"> 
       	  <a  href="<?php echo $AdminDataLoginVal['twitersociallink'];?>"><img src="images/twit.png" /></a> 
          <a  href="<?php echo $AdminDataLoginVal['flickrsociallink'];?>" ><img src="images/oo.png" /></a> 
         <?php /*?> <a  href="#" ><img src="images/t2.png" /></a><?php */?>
          <a  href="<?php echo $AdminDataLoginVal['facebooksociallink'];?>" ><img src="images/fa.png" /></a>
          <a  href="<?php echo $AdminDataLoginVal['linksociallink'];?>" ><img src="images/link.png" /></a>
        </div>
      </div>
      <div style="clear:both;"></div>
    </div>
    <div class="footer_second_row">
      <div class="footer_navigation">
        <div class="navigation_third">
           <h3><?php echo $TableLanguage3['FooterJustfood'];?></h3>
          <ul>
            <li><a href="online_food_who_are.php"><?php echo $TableLanguage3['FooterWorkareYou'];?></a></li>
           <!-- <li><a href="online_food_how_it_works.php">How it works</a></li>-->
            <li><a href="online_food_FAQ.php"><?php echo $TableLanguage3['FooterFAQ'];?></a></li>
            <li><a href="online_food_terms_condition.php"><?php echo $TableLanguage3['FooterTerms'];?></a></li>
            <li><a href="online_food_privacy_policy.php"><?php echo $TableLanguage3['FooterPrivacyPolicy'];?></a></li>
            <li><a href="online_food_contactus.php"><?php echo $TableLanguage3['FooterContactUs'];?></a></li>
            <li><a href="online_food_use_cookies.php"><?php echo $TableLanguage3['FooterHowtoCookies'];?></a></li>
             <li><a href="restaurantOwnerPanel/index.php" target="_blank"><?php echo $TableLanguage3['FooterRestaurantOwner'];?></a></li>
          </ul>
        </div>
        <div class="navigation_third">
          <h3><?php echo $TableLanguage3['FooterWorkWithUs'];?></h3>
          <ul>
            <?php
		  $footerQuery=mysql_query("select * from tbl_restaurantAdd  where fstatus='1' and status='0' order by rand() limit 7");
		  while($Footerdata=mysql_fetch_assoc($footerQuery)){ 
		   ?>
            <li><a href="restaurant.php?restaurants=<?php echo stripslashes($Footerdata['id']);?>-<?php echo urlencode(trim($Footerdata['restaurantCity']));?>-<?php echo urlencode(trim($Footerdata['restaurant_name']));?>.html"><?php echo $Footerdata['restaurant_name']; ?></a></li>
            <?php } ?>
          </ul>
        </div>
        <div class="navigation_third">
          <h3><?php echo $TableLanguage3['FooterConnectwithUs'];?></h3>
          <ul>
            <li><a href="online_food_press.php"><?php echo $TableLanguage3['FooterPress'];?></a></li>
            <li><a href="online_food_service_guarantee.php"><?php echo $TableLanguage3['FooterGurantee'];?></a></li>
            <li><a href="online_food_refund_guarantee.php"><?php echo $TableLanguage3['FooterRefund'];?></a></li>
            <li><a href="online_food_career.php"><?php echo $TableLanguage3['FooterCareerwithUs'];?></a></li>
            <li><a href="online_food_declaimer.php"><?php echo $TableLanguage3['FooterDisclaimer'];?></a></li>
            <li><a href="online_food_restaurant_join.php"><?php echo $TableLanguage3['FooterRestaurantJoin'];?></a></li>
            <li><a href="online_food_restaurant_franchise.php"><?php echo $TableLanguage3['FooterFranchise'];?></a></li>
            
          </ul>
        </div>
      </div>
      <div class="facebook"> <img src="images/facebookap.png" style="margin: 15px 0px 0px 23px;"/> </div>
      <div style="clear:both;"></div>
    </div>
    <div class="copyright">
      <h4><?php echo $TableLanguage3['FooterAllrightreserved'];?>.  |  Copyright 2014-15   | <a href="http://phpexpertgroup.com/" target="_blank">Php Expert Group</a></h4>
    </div>
  </div>
</div>
