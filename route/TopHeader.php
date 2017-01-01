<?php
$TableLanguage=mysql_fetch_assoc(mysql_query("select * from tbl_languageTranslate where id='1'"));
$TableLanguage1=mysql_fetch_assoc(mysql_query("select * from tbl_languageTranslate1 where id='1'"));
$TableLanguage2=mysql_fetch_assoc(mysql_query("select * from tbl_languageTranslate2 where id='1'"));
$TableLanguage3=mysql_fetch_assoc(mysql_query("select * from tbl_languageTranslate3 where id='1'"));
$TableLanguage4=mysql_fetch_assoc(mysql_query("select * from tbl_languageTranslate4 where id='1'"));
$TableLanguage5=mysql_fetch_assoc(mysql_query("select * from tbl_languageTranslate5 where id='1'"));
$TableLanguage6=mysql_fetch_assoc(mysql_query("select * from tbl_languageTranslate6 where id='1'"));
$TableLanguage7=mysql_fetch_assoc(mysql_query("select * from tbl_languageTranslate7 where id='1'"));
$AdminDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_siteSetting order by id asc"));
$RegistrationDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_EmailSetting order by id asc"));
include('control/domainName.php'); 
?>
<link type="text/css" href="translateelement.css" rel="stylesheet" />
<!--<link href="../menu/component.css" rel="stylesheet" media="all" />
<script type="text/javascript" language="javascript" src="../menu/modernizr.custom.js"></script>-->
<div id="header">
  <div class="header_top"></div>
  <div class="header_bottom">
    <!--container strats-->
    <div class="container">
      <!--logo starts-->
      <div class="logo"><a href="index.php">
      <img class="logo_image" src="images/opt2.png" /></a></div>
      <!--logo ends-->
      <!--header right portion starts-->
      <div class="slogan">
        <div class="up_top">
          <div id="click">
            <p class="click_content"> <?php echo $TableLanguage['haveRestaurant'];?> <a href="online_food_restaurant_join.php" class="C-3" style="color:#ff0000; font-weight:500;"><?php echo $TableLanguage['HeaderClick'];?></a></p>
          </div>
          <div class="login_signup" >
          <a href="#"><img src="images/android.png"  style="height:24px;" /></a> 
          <a href=""><img  src="images/mac.png"  style="height:24px;" /></a> 
          <a  href="#"><img src="images/facebooklike.png"  /></a>
          <?php if($_SESSION['justfoodsUserID']!=''){ ?> 
          <a href="myaccount.php" class="" style="color:#FFFFFF;">Hi <?php echo $_SESSION['justfoodsUserName'];?></a> 
          <a  href="logout.php" class="" style="color:#FFFFFF;"><?php echo $TableLanguage['CustlogoutText'];?></a>
          <?php } else { ?>
          <a href="userLogin.php" class="" style="color:#FFFFFF;"><?php echo $TableLanguage['LoginText'];?></a> 
          <a  href="UserRegistration.php" class="" style="color:#FFFFFF;"><?php echo $TableLanguage['SignupText'];?></a>
          
          <?php } ?>
           
           <div id="google_translate_element"></div>
          <div id="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        
           <!-- <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>-->
          </div>
        </div>
        <div id="home_middle">
          <h1 style="float:left;"><?php echo ucwords($TableLanguage['HeaderText']);?></h1>
        </div>
        <div id="home_down">
       <?php /*?> <nav id="menu" class="nav" >
      <ul >
        <li > <a href="./" class="active">HOME</a></li>
        <li><a href="#">HOW IT WORKS</a></li>
            <li><a href="#">BLOG</a></li>
            <li><a  href="#">CONTACT</a></li>
      </ul>
    </nav><?php */?>
          <ul id="header_login">
            <li><a href="index.php" class="selected"><?php echo strtoupper($TableLanguage['HomeButtonText']);?></a></li>
            <li><a href="online_food_how_it_work.php"><?php echo strtoupper($TableLanguage['HowitWorksButtonText']);?></a></li>
            <li><a href="#"><?php echo strtoupper($TableLanguage['BlogButtonText']);?></a></li>
            <li><a  href="online_food_contactus.php"><?php echo strtoupper($TableLanguage['ContactUsButtonText']);?></a></li>
          </ul>
          <div class="social1"> 
          <a  href="<?php echo $AdminDataLoginVal['twitersociallink'];?>"><img src="images/twit.png" /></a> 
          <a  href="<?php echo $AdminDataLoginVal['flickrsociallink'];?>" ><img src="images/oo.png" /></a> 
          <a  href="<?php echo $AdminDataLoginVal['facebooksociallink'];?>" ><img src="images/fa.png" /></a>
          <a  href="<?php echo $AdminDataLoginVal['linksociallink'];?>" ><img src="images/link.png" /></a>
           </div>
        </div>
      </div>
    </div>
  </div>
</div>
