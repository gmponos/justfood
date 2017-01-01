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
<title>Email Restaurant</title>
</head>

<body>
<style type="text/css">
.cartwrapper
{
width:100%;margin:auto;
color:#808080;
-webkit-border-radius: 8px;
-moz-border-radius: 8px;
border-radius: 8px;
border-color: rgba(0, 0, 0, 0.8);
box-shadow: 0 1px 1px rgba(0, 0, 0, 0.75) inset, 0 0 8px rgba(0, 0, 0, 0.75);
outline: 0 none;
background:#fff;
font-size:13px;
font-family: Calibri;
 padding-bottom:20px;
}
.cartcontainer{width:94%; margin:auto; padding-bottom:10px;}
.cartheader{width:100%; height:36px; border-bottom:1px solid #ccc; background:#DB1010; color:#FFFFFF;border-radius: 5px 5px 0 0; padding-top:3px; margin-bottom:7px;
}
.cartheader h2{margin: 4px 0px 0px 10px;}
.cartcontent{}
.cartcontainer h2{font-size:20px;font-weight:bold;font-family: Calibri;margin:0px;}
.cart_main{width:100%; margin-bottom:10px;}

</style>
<style type="text/css">

.wrapper{ width:98%; min-height:250px; }
.container{min-width:100%;text-align:left;width:75%;margin:auto;min-height:250px;}
.header{width:100%; height:40px;background:#C03434; color:#FFFFFF; font-weight:700;}
.map_content{width:100%; min-height:250px; margin-top:10px; padding:10px;}
.note{width:100%; height:30px;}
.form{width:90%; min-height:220px; float:left; margin-right:5%;}
p.info{line-height:13px; padding:3px 1px 3px 1px; margin:3px 1px;}
h1{font-size:23px; padding:5px 1px 1px 10px;}
.textbox{border: 1px solid #ccc; border-radius: 0;box-shadow: 1px 1px 4px #BBBBBB inset;color: #000000;font-size: 12px;height: 25px;line-height: 28px;margin: 0;width: 67.3%;	padding:5px 1px 2px 7px;}
.dpdn{border: 1px solid #ccc; font-size:15px; border-radius: 0;box-shadow: 1px 1px 4px #BBBBBB inset;color: #000000;font-size: 12px;height: 35px;line-height: 28px;margin: 0;width: 69%;	padding:5px 1px 2px 7px;}
.name{ font-size:18px; margin-bottom:5px;}
.submit_btn{width:20%; height:35px; background:#C03434; border:#C03434; border-radius:3px; color:#FFFFFF; font-size:18px; margin-top:15px;}
.submit_btn:hover{cursor:pointer;}
span{color:#C03434; font-size:18px;}
.clear{clear:both;}
</style>
<div class="cartwrapper">


<div class="cartheader">
<h2><?php echo $TableLanguage7['SendMessageText'];?> (<?php echo urldecode(trim($resdata['restaurant_name']));?>)</h2>

</div>
<div class="cartcontainer">


<div class="form">
<form action="restaurant.php?restaurants=<?php echo urldecode($_GET['restaurants']);?>" target="_parent" method="post">
<input type="hidden" name="restaurant_id" id="restaurant_id"  value="<?php echo $resID[0];?>" class="textbox"  />
<input type="hidden" name="restaurant_name" id="restaurant_name"  value="<?php echo $resdata['restaurant_name'];?>" class="textbox"  />
<table width="100%">


<tr><td><label  class="name" for="" id=""><?php echo $TableLanguage5['ResFormFieldNameText'];?></label><span>*</span></td></tr>
<tr><td><input type="text" name="RestaurantContactName" id="RestaurantContactName" placeholder="" class="textbox" required /></td></tr>
<tr>
<td><label  class="name" for="" id=""><?php echo $TableLanguage5['ResFormFieldContactText'];?></label><span>*</span></td>
</tr>
<tr><td><input type="text" name="RestaurantContactPhone" id="RestaurantContactPhone" placeholder="" class="textbox" required /></td></tr>

<tr><td><label  class="name" for="" id=""><?php echo $TableLanguage5['ResFormFieldEmailText'];?></label><span>*</span></td></tr>
<tr><td><input type="email" name="RestaurantContactEmail" id="RestaurantContactEmail" placeholder="" class="textbox" required /></td></tr>
<tr><td><label  class="name" for="" id=""><?php echo ucwords($TableLanguage5['ResFormFieldTSpecialRequestText']);?></label><span>*</span></td></tr>
<tr><td>
<textarea name="RestaurantContactMessage" id="RestaurantContactMessage" class="textbox" style="height:50px;" required></textarea></td></tr>
<tr>
<td><input type="submit" name="" style="width:40%;" value="<?php echo ucwords($TableLanguage7['SendMessageText']);?>" class="submit_btn"/> &nbsp;
<a href="restaurant.php?restaurants=<?php echo urldecode($_GET['restaurants']);?>" target="_parent" class="submit_btn" style="width: 40%;
padding: 7px; text-decoration:none;">Close</a></td>
</tr>


</table>
</form>
</div>
</div>

<div class="clear"></div>
</div>
</body>
</html>
