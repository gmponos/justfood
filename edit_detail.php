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
function getExtension($str) {
$i = strrpos($str,".");
if (!$i) { return ""; } 
$l = strlen($str) - $i;
$ext = substr($str,$i+1,$l);
return $ext;
}
if(isset($_POST['ChangeProfileData']))
{
$fullName=$_POST['fname'].''.$_POST['lname'];
$image =$_FILES["imgwebsite_logo"]["name"];
$uploadedfile = $_FILES['imgwebsite_logo']['tmp_name'];
if ($image) 
{
$filename = stripslashes($_FILES['imgwebsite_logo']['name']);
$extension = getExtension($filename);
$extension = strtolower($extension);
if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
{
//echo ' Unknown Image extension ';
$errors=1;
}
else
{
$size=filesize($_FILES['imgwebsite_logo']['tmp_name']);
if ($size > MAX_SIZE*1024)
{
//echo "You have exceeded the size limit";
$errors=1;
}
if($extension=="jpg" || $extension=="jpeg" )
{
$uploadedfile = $_FILES['imgwebsite_logo']['tmp_name'];
$src = imagecreatefromjpeg($uploadedfile);
}
else if($extension=="png")
{
$uploadedfile = $_FILES['imgwebsite_logo']['tmp_name'];
$src = imagecreatefrompng($uploadedfile);
}
else 
{
$src = imagecreatefromgif($uploadedfile);
}
list($width,$height)=getimagesize($uploadedfile);
$newwidth=100;
$newheight=($height/$width)*$newwidth;
$tmp=imagecreatetruecolor($newwidth,$newheight);
$newwidth1=100;
$newheight1=($height/$width)*$newwidth1;
$tmp1=imagecreatetruecolor($newwidth1,$newheight1);
imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,
$width,$height);
imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1, 
$width,$height);
$website_logo=uniqid().$_FILES['imgwebsite_logo']['name'];
$filename = "control/userPanelImage/".$website_logo;
$filename1 = "control/userPanelImage/".$website_logo;
imagejpeg($tmp,$filename,100);
imagejpeg($tmp1,$filename1,100);
imagedestroy($src);
imagedestroy($tmp);
imagedestroy($tmp1);
}
}
else
{
$website_logo=$_POST['website_logoold'];
}	

@$DataUserUpdate=array("user_name"=>mysql_real_escape_string($fullName),"fname"=>mysql_real_escape_string($_POST['fname']),"lname"=>$_POST['lname'],"user_email"=>$_POST['user_email'],"user_img"=>$website_logo,"user_cellphone"=>mysql_real_escape_string($_POST['user_cellphone']),"user_phone"=>mysql_real_escape_string($_POST['user_phone']),"city_name"=>mysql_real_escape_string($_POST['cityName']),"state_name"=>mysql_real_escape_string($_POST['stateID']),"zipcode"=>$_POST['zipcode'],"countryID"=>mysql_real_escape_string($_POST['countryID']),"address"=>mysql_real_escape_string($_POST['address']));
$CuisineInsert=$dbObj->dataupdate($DataUserUpdate,"tbl_user",'id',$_SESSION['justfoodsUserID']);
if($CuisineInsert)
{
$msg="you account detail has been sucessfully saved !";
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>		
<link href="css/reset2.css" type="text/css" rel="stylesheet" media="all" />        
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Account | Developed by Php Expert Group</title>
 <link href="css/LoginCss.css" type="text/css" rel="stylesheet" media="all" /> 
 <link href="css/myaccount.css" type="text/css" rel="stylesheet" />
</head>
<body>
<!--wrapper starts-->
<div id="wrapper">
  <!--header starts-->
   <link type="text/css" href="translateelement.css" rel="stylesheet" />
<?php include("route/TopHeader.php"); ?>  <!--header ends-->
</div>

<script  type="text/javascript"  language="javascript">

function getOrgTypeListRest(str){

if (str=="")

{

document.getElementById("stateID").innerHTML="";

return;} 

if (window.XMLHttpRequest)

{// code for IE7+, Firefox, Chrome, Opera, Safari

xmlhttp=new XMLHttpRequest();

}

else

{// code for IE6, IE5

xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

}

xmlhttp.onreadystatechange=function()

{

if (xmlhttp.readyState==4 && xmlhttp.status==200)

{

document.getElementById("stateID").innerHTML=xmlhttp.responseText;

}

}

xmlhttp.open("post","stateFatch.php?q="+str,true);

xmlhttp.send();

}





function getOrgTypeListRestCity(str){

if (str=="")

{

document.getElementById("cityName").innerHTML="";

return;} 

if (window.XMLHttpRequest)

{// code for IE7+, Firefox, Chrome, Opera, Safari

xmlhttp=new XMLHttpRequest();

}

else

{// code for IE6, IE5

xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

}

xmlhttp.onreadystatechange=function()

{

if (xmlhttp.readyState==4 && xmlhttp.status==200)

{

document.getElementById("cityName").innerHTML=xmlhttp.responseText;

}

}

xmlhttp.open("post","cityFatech.php?q="+str,true);

xmlhttp.send();

}



</script>

<!--contentwrapper starts-->
<div id="contentwrapper" style="padding-top:7px; padding-bottom:7px;">
  <!--content container starts-->
  <div class="container" style="min-height:500px;">
<div class="about00" style="border-top: 1px #C6121B solid;">
    <h3><?php echo $TableLanguage6['CustChangeProfile'];?></h3>
    <div class="contact" id="myaccount">

        <div class="account_bottom">

          <div class="account_pannel">

     <?php include('UseraccountLeftPanel.php'); ?>

</div><!-- End:account_pannel -->
            <div class="account_detail">
                <div class="account_detail_top">
                    <h4 style="padding-bottom:29px;">  <span style="float: left;">
                    <?php echo $TableLanguage6['CustChangeProfile'];?>
                        </span>
                     </h4>
                    <div class="common_box" id="address_list">
                       <form action="" method="post" enctype="multipart/form-data">
                        
                        <div class="create_address">
                            <div class="create_adbox">
                                <h4> <?php echo $TableLanguage6['CustChangeProfile'];?></h4>

                                <div class="create_innerform">
                                    <div class="contact_txt"><?php if($msg!=''){ ?>
    <div style="padding:10px; color:#0000FF; font-size:14px;"><?php echo $msg;?></div>
    <?php } ?>
    <?php if($error!=''){ ?>
    <div style="padding:10px; color:#E10000; font-size:14px;"><?php echo $error;?></div>
    <?php } ?></div>

                                    <div class="contact_row">
                                        <label class="register_label"><?php echo $TableLanguage7['firstNameText'];?>: <span style="color:#ff0000;">*</span></label>
                                        <input name="fname" id="fname" value="<?php echo $UserAddressData['fname'];?>" required type="text" class="register_input">
                                    </div>
                                    
                                      <div class="contact_row">
                                        <label class="register_label"><?php echo $TableLanguage7['LastNameText'];?>: <span style="color:#ff0000;">*</span></label>
                                        <input name="lname" id="lname" value="<?php echo $UserAddressData['lname'];?>" type="text" class="register_input">
                                    </div>
                                    <div class="contact_row">
                                        <label class="register_label"><?php echo $TableLanguage5['ResFormFieldEmailText'];?>:</label> 
                                        <input name="user_email" id="user_email" value="<?php echo $UserAddressData['user_email'];?>"  required type="email" class="register_input">
                                    </div>
                                    <div class="contact_row">
                                        <label class="register_label"><?php echo $TableLanguage7['ImageText'];?>:</label>
                                        <input name="imgwebsite_logo" id="imgwebsite_logo" type="file" class="register_input">
                                        <input type="hidden" value="<?php echo $UserAddressData['user_img'];?>" name="website_logoold" />
                                    </div>
                                    <?php if($UserAddressData['user_img']!=''){ ?>
                                     <div class="contact_row">
                                        <label class="register_label"><?php echo $TableLanguage7['ImageText'];?>:</label>
                                       <img src="control/userPanelImage/<?php echo $UserAddressData['user_img'];?>" width="60" height="73" />
                                    </div>
                                    <?php } else {  ?>
                                     <div class="contact_row">
                                        <label class="register_label"><?php echo $TableLanguage7['ImageText'];?>:</label>
                                       <img src="control/userPanelImage/client01.jpg" width="60" height="73" />
                                    </div>
                                    <?php } ?>
                                       <div class="contact_row">
                                        <label class="register_label"><?php echo $TableLanguage7['PhoneText'];?>:</label>
                                        <input name="user_phone" id="user_phone" value="<?php echo $UserAddressData['user_phone'];?>"  required type="text" class="register_input">
                                    </div>
                                    
                                       <div class="contact_row">
                                        <label class="register_label"><?php echo $TableLanguage7['MobileText'];?>:</label>
                                        <input name="user_cellphone" id="user_cellphone" value="<?php echo $UserAddressData['user_cellphone'];?>"  required type="text" class="register_input">
                                    </div>
                                     <div class="contact_row">
                                        <label class="register_label"><?php echo $TableLanguage5['ResFormFieldCountryText'];?>:</label>
                                        <input type="text" class="register_input" value="<?php echo $UserAddressData['countryID'];?>" required name="countryID" id="countryID">
                                      <?php /*?>  <select class="register_input" data-placeholder="Select Country..." id="countryID" name="countryID"  onChange="getOrgTypeListRest(this.value)"> <option value=""><?php echo $TableLanguage7['SelectText'];?></option>

											  <?php 

											  $StateQuery = mysql_query("select * from tbl_country order by countryName asc");

                                              while($StateData=mysql_fetch_assoc($StateQuery)){

											  ?>

                                              <option value="<?php echo $StateData['id']; ?>" <?php if($UserAddressData['countryID']==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['countryName']); ?></option>

                                              <?php } ?>

											

											</select><?php */?>
                                        
                                    </div>
                                    <div class="contact_row">
                                        <label class="register_label"><?php echo $TableLanguage2['StateFilterText']; ?>:</label>
                                        <input type="text" class="register_input" value="<?php echo $UserAddressData['state_name'];?>" required name="stateID" id="stateID">
                                        
                                        <?php /*?><select class="register_input" data-placeholder="Select State..." id="stateID"  name="stateID"   onChange="getOrgTypeListRestCity(this.value)" >

    <option value=""><?php echo $TableLanguage7['SelectText'];?></option>
                                         <?php 

											 

											  $StateQuery = mysql_query("select * from tbl_state where countryID='".$UserAddressData['countryID']."'");

                                              while($StateData=mysql_fetch_assoc($StateQuery)){

											  ?>

                                              <option value="<?php echo $StateData['id']; ?>" <?php if($UserAddressData['state_name']==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['stateName']); ?></option>

                                              <?php } ?>

                                             
                                              </select><?php */?>
                                       
                                    </div>
                                     <div class="contact_row">
                                        <label class="register_label"><?php echo $TableLanguage2['CityFilterText']; ?>:</label>
                                       <input type="text" class="register_input" value="<?php echo $UserAddressData['city_name'];?>" required name="cityName" id="cityName">
                                        
                                      <?php /*?>  <select class="register_input" data-placeholder="Select State..." id="cityName" name="cityName"   >

     <option value=""><?php echo $TableLanguage7['SelectText'];?></option>

											  <?php 

											  

											  $StateQuery =mysql_query("select * from tbl_city where stateID='".$UserAddressData['state_name']."'"); 

                                              while($StateData=mysql_fetch_assoc($StateQuery)){

											  ?>

                                              <option value="<?php echo $StateData['cityName']; ?>" <?php if($UserAddressData['city_name']==$StateData['cityName']){ ?> selected <?php } ?>><?php echo ucwords($StateData['cityName']); ?></option>

                                              <?php } ?>

											

											</select>
                                       <?php */?>
                                       
                                    </div>
                                    
                                     
                                    
                                     <div class="contact_row">
                                        <label class="register_label"><?php echo $TableLanguage7['PostcodeText']; ?>:</label>
                                        <input name="zipcode" id="zipcode" value="<?php echo $UserAddressData['zipcode'];?>"  required type="text" class="register_input">
                                    </div>
                                    
                                    
                                    
                                     <div class="contact_row">
                                        <label class="register_label"><?php echo $TableLanguage4['ResAddressText']; ?>:</label>
                                        <textarea name="address" id="address" required  class="register_input" style="height:60px;"><?php echo $UserAddressData['address'];?></textarea>
                                    </div>

                           
                                 
                                 
                                    <div class="contact_row">
                                      
                                        <input name="ChangeProfileData" type="submit"  class="button red01" value="<?php echo $TableLanguage6['CustChangeProfile'];?>" style="margin-top:10px; float: right;">
                                    </div>

                                </div>
                            </div>
                        </div>
                        </form>
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
