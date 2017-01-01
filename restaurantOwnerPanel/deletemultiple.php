<?php
include('route/config1.php'); 
$dd=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantGallery where id='".$_GET['eid']."'"));
$ddddd=$_GET['q'];
$bodytag = str_replace($ddddd, "", $dd['restaurant_gallery_image']);
$rrr=explode(",",$_GET['q']);
$rrr=mysql_query("UPDATE `tbl_restaurantGallery` SET `restaurant_gallery_image`='".$bodytag."' where id='".$_GET['eid']."'");
if($rrr)
{
unlink("../control/ResGalleryImg/".$_GET['q']);
}
?>