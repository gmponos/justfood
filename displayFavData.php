<?php
include('config1.php');
$TableLanguage77=mysql_fetch_assoc(mysql_query("select * from tbl_languageTranslate7 where id='1'"));
/*$FavQD=mysql_num_rows(mysql_query("select * from favorite where userid='".$_GET['q']."' and hotel_id='".$_GET['rID']."'"));							
if($FavQD>0){
$Favmsg=0;
}
else
{*/
$InserTFav="insert into favorite(userid,hotel_id) values('".$_GET['q']."','".$_GET['rID']."')";
$Favmsg=0;
$ID=mysql_insert_id();
//}
if(mysql_query($InserTFav)){
?>
<a style="cursor:pointer;"  onClick="getOrgTypeListAdFavouriteDelete('<?php echo $ID;?>')">
<img src="images/fav.png" title="<?php echo $TableLanguage77['FavouriteDoneText'];?>" height="30" width="30" />
<p><?php echo $TableLanguage77['FavouriteDoneText'];?> !</p></a>
<?php } ?>