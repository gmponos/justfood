<?php $FlashBannerQuery=mysql_query("select * from tbl_Homeslider where status='0' order by created_date desc");
while($flashData=mysql_fetch_assoc($FlashBannerQuery)){
 ?>
<p class="bgsliderimage" style="background-image:url(control/backgroundImg/<?php echo $flashData['sliderImg'];?>);">&nbsp;</p>
<?php } ?>
