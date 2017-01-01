<?php 
ob_start();
session_start();
include('route/functions.php');
include('config1.php');
mysql_query ("set character_set_results='utf8'"); 
date_default_timezone_set("Asia/Kolkata"); 
$prix=new User();
$curQueryStr=$_SERVER['QUERY_STRING'];
if(strlen($_GET['restaurants'])>0){
$resID=explode("-",$_GET['restaurants']);
$resdata=mysql_fetch_assoc($prix->showtabledata('tbl_restaurantAdd','id',$resID[0]));
$resSEO=mysql_fetch_assoc($prix->showtabledata('tbl_restaurantSEO','restaurant_id',$resID[0]));
}
$AdminDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_siteSetting order by id asc"));
?>
<?php
$TableLanguage=mysql_fetch_assoc(mysql_query("select * from tbl_languageTranslate where id='1'"));
$TableLanguage1=mysql_fetch_assoc(mysql_query("select * from tbl_languageTranslate1 where id='1'"));
$TableLanguage2=mysql_fetch_assoc(mysql_query("select * from tbl_languageTranslate2 where id='1'"));
$TableLanguage3=mysql_fetch_assoc(mysql_query("select * from tbl_languageTranslate3 where id='1'"));
$TableLanguage4=mysql_fetch_assoc(mysql_query("select * from tbl_languageTranslate4 where id='1'"));
$TableLanguage5=mysql_fetch_assoc(mysql_query("select * from tbl_languageTranslate5 where id='1'"));
$TableLanguage6=mysql_fetch_assoc(mysql_query("select * from tbl_languageTranslate6 where id='1'"));
$TableLanguage7=mysql_fetch_assoc(mysql_query("select * from tbl_languageTranslate7 where id='1'")); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Group Order With Restaurant</title>
<link href="css/group_order.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="cartwrapper">
  <div class="cartheader">
    <h2>Start Group Order</h2>
  </div>
  <div class="cartcontainer">
    <div class="form">
      <form action="restaurant.php?restaurants=<?php echo trim(urldecode($_GET['restaurants']));?>" target="_parent" method="post">
        <input type="hidden" name="restaurant_id" id="restaurant_id"  value="<?php echo $resID[0];?>" class="textbox"  />
        <input type="hidden" name="restaurant_name" id="restaurant_name"  value="<?php echo $resdata['restaurant_name'];?>" class="textbox"  />
        <table width="100%">
          <tr>
            <td><label  class="name" for="" id=""><?php echo $TableLanguage5['ResFormFieldNameText'];?></label></td>
          </tr>
          <tr>
            <td><input type="text" name="RestaurantGroupOrderName" id="RestaurantGroupOrderName" placeholder="" class="textbox" required /></td>
          </tr>
          <tr>
          <tr>
            <td><label  class="name" for="" id=""><?php echo $TableLanguage5['ResFormFieldEmailText'];?></label></td>
          </tr>
          <tr>
            <td><input type="email" name="RestaurantGroupOrderEmail" id="RestaurantGroupOrderEmail" placeholder="" class="textbox" required /></td>
          </tr>
          <tr>
            <td><label  class="name" for="" id="">Tell your friends something about this group order</label></td>
          </tr>
          <tr>
            <td><textarea name="RestaurantGroupOrderMessage" id="RestaurantGroupOrderMessage" cols="55" rows="5"  required></textarea>
            </td>
          </tr>
          <tr>
            <td><input type="submit" name="" value="Create" class="submit_btn" />
              <a href="restaurant.php?restaurants=<?php echo trim(urldecode($_GET['restaurants']));?>" target="_parent" style="cursor:pointer; display:inline; text-decoration:none;">
              <div class="submit_btn">Cancel</div>
              </a></td>
          </tr>
        </table>
      </form>
    </div>
  </div>
  <div class="clear"></div>
</div>
</body>
</html>
