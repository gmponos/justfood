<?php
session_start();
include('config1.php');
$TableLanguage44=mysql_fetch_assoc(mysql_query("select * from tbl_languageTranslate4 where id='1'"));
$InserTFav="delete from favorite where id='".$_GET['q']."'";
if(mysql_query($InserTFav)){
?>
<a style="cursor:pointer;"  onclick="getOrgTypeListAdFavourite('<?php echo $_SESSION['justfoodsUserID'];?>')">
<img src="images/add to favorite.png" title="<?php echo $TableLanguage44['ResAddtoFavouriteText'];?>" height="30" width="30" />
<p ><?php echo $TableLanguage44['ResAddtoFavouriteText'];?></p></a>
<?php } ?>