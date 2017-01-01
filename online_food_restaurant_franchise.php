<?php 
ob_start();
session_start();
include('route/functions.php');
$db= new User();
include('route/db.php'); 
$dbObj=new db;
include('config1.php');
mysql_query ("set character_set_results='utf8'"); 
date_default_timezone_set('US/Eastern');
$AboutData=mysql_fetch_assoc(mysql_query("select * from tbl_franchisearestuarantcms"));
$AdminDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_siteSetting order by id asc"));
$RegistrationDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_EmailSetting order by id asc"));
extract($_POST);
$today=date('m/d/Y');
$ip=$_SERVER['REMOTE_ADDR'];
if(isset($_POST['GetAFranchiseSubmit']))
{
$ListQuery="INSERT INTO `tbl_restaurantFranchise` (`id`, `franchise_firstName`, `franchise_lastName`, `franchise_Email`, `franchise_mobile`, `franchise_city`, `franchise_town`, `franchise_country`, `franchise_invest`, `franchise_Selectedcountry`, `ip`, `created_date`) VALUES (NULL, N'$franchise_firstName', N'$franchise_lastName', '$franchise_Email', '$franchise_mobile', N'$franchise_city', N'$franchise_town', N'$franchise_country', N'$franchise_invest', '$franchise_Selectedcountry', '$ip', '$today')";
if(mysql_query($ListQuery))
{
$to=$_POST['franchise_Email'].','.$RegistrationDataLoginVal['contactusemail'].',info@phpexpertgroup.com';
 $subject ="Get A Franchise From ".$AdminDataLoginVal['website_name'];
 $from=$RegistrationDataLoginVal['contactusemail'];
$message .=  "<style type='text/css'>
body
{
margin:0;
padding:0;
font-family: CANDARA;
font-size: 14px;
}
.wrapper
{
width:100%; height:768px; margin:auto;
}
.container
{
width:70%; min-height:500px; margin:auto; margin-top:50px;
}
.header
{
width:100%; height:100px;
}
.logo
{
width:30%; height:100%; float:left;
}
.menu
{
width:54%; height:50px; margin-top:30px; float:right;
}
.middle
{
width:100%; min-height:500px; margin:auto;
}
.left
{
width:45%; height:500px; float:left;
}
.right
{
width:54%; height:500px; float:right; box-shadow: 1px 1px 1px 2px #999999;
}
ul
{
list-style:none;
}
ul li
{
float:left;
background: none repeat scroll 0 0 #E51B24;
    border-radius: 5px;
    color: #FFFFFF;
   
    font-family: CANDARA BOLD;
    margin-right: 5px;
    padding: 6px 22px;
   
    right: 0;
   
}
ul li:hover
{
border-color: #E51B24;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset, 0 0 8px #E51B24;
    outline: 0 none;
}
span
{
color:#E51B24;
}
.name
{

    font-size: 14px;
    height: 20px;   
    margin-bottom: 5px;
    /*padding: 4px 6px; */
	width:75%;
}
h1
{
color:#E51B24; font-size:20px;

}
h2
{
color:#E51B24; font-size:18px;
}

</style>
<table bgcolor='#dfdfdf' width='100%' style='float:left;background-color:rgb(223,223,223);font-family:Arial,'sans serif''> 
  <tbody> 
    <tr> 
      <td align='center'> 
        <table border='0' cellpadding='0' cellspacing='0'> 
          <tbody> 
            <tr> 
              <td colspan='2' height='359' valign='top'><img alt='' src='https://ci3.googleusercontent.com/proxy/oqgjYIFndtWMaU6BmYk2yKMjRDsaL5wbQPL_Hh3ARVE6_TOpMJ3q3n54Brllrzr41gpnnPVV1-ixogBC2CVmfylAf8HaGw6pVrhVSBrJjk4GxAWHW0RDquP7RxO2yyLpF1qllCb0WtkQ7H_eA24CQmS3tYM=s0-d-e1-ft#https://www.etakeout.co.uk/system/application/libraries/spaw2/empty/images/shadow-top-left.png'></td> 
              <td rowspan='2'> 
                <table border='0' cellpadding='0' cellspacing='0' width='760'> 
                  <tbody> 
                    <tr> 
                      <td bgcolor='' style='background-image:url(https://ci3.googleusercontent.com/proxy/ULCRAiwWL9iHiPYUTWZkzsldvOF8xAcaH1NnHMCo4fOBSZmZlQafsxfMJWRIX-xpEnU_qjE4LNN2JsFKONWeijp-EeZCQ9GVERwqf44jtGjXUBQV2T_qgggzVHwuePTJY20ViGwa5EePhpstWNE=s0-d-e1-ft#https://www.etakeout.co.uk/system/application/libraries/spaw2/empty/images/header_bg.jpg);background-repeat:repeat no-repeat'> 
                        <table valign='middle' cellpadding='0' cellspacing='0' width='100%'> 
                          <tbody> 
                            <tr> 
                              <td width='12'></td> 
                              <td width='253' style='padding:10px'><a href='' target='_blank'><img src='".$DomainName."control/sitelogo/sitelogosmall/".$AdminDataLoginVal['website_logo']."' width='130' height='100'></a></td> 
                              <td align='right' width='453' style='color:rgb(102,102,102);font-size:12px;font-family:Arial,'sans serif';padding-right:15px'>&nbsp;</td> 
                            </tr> 
                          </tbody> 
                        </table></td> 
                    </tr> 
                    <tr> 
                      <td bgcolor='#c32c2c' height='6'></td> 
                    </tr> 
                  </tbody> 
                </table> 
                <table bgcolor='#ffffff' cellpadding='0' cellspacing='0' width='760'> 
                  <tbody> 
                    <tr> 
                      <td style='font-family:'Trebuchet MS',Arial,Helvetica,sans-serif;font-size:13px;color:rgb(102,102,102);padding-top:18px;padding-left:30px'>     
                <table cellpadding='0' cellspacing='0' width='730'>
                  <tbody>

                   <tr>
                          <td > 
<div class='middle'>
<div style='color:#000000; font-size:16px;font-weight:bold; padding:10px;'>Thankyou for submitting your Get A Franchise Detail please check your submitted Get A Franchise Detail  detail</div>
<div class='left'>
<p>".$AboutData['franchise_a_restaurant_heading_description1']."</p>
<h1 style='color:#E51B24; text-decoration:underline; font-size:30px;'>".$AboutData['franchise_a_restaurant_heading2'].":.</h1>
<p>
".$AboutData['franchise_a_restaurant_heading_description2']."
</p></div>
<div class='right'>
<form method='post' name='' action=''>
<h2 style='margin: 2%;
border-bottom: 1px solid rgb(204, 204, 204);
padding-bottom: 7px;
font-size: 25px;
color: rgb(229, 27, 36);'>".$TableLanguage7['showyourInterestText']."</h2>
<table width='95%' style='margin:2%;'>
<tbody><tr>
<td width='25%'>".$TableLanguage7['firstNameText']."<span></span></td>
<td width='75%'><p class='name'>".$_POST['franchise_firstName']."</p></td>
</tr>
<tr>
<td width='25%'>".$TableLanguage7['LastNameText']."<span></span></td>
<td width='75%'><p class='name'>".$_POST['franchise_lastName']."</p></td>
</tr>
<tr>
<td width='25%'>".$TableLanguage5['ResFormFieldEmailText']."<span></span></td>
<td width='75%'><p class='name'>".$_POST['franchise_Email']."</p></td>
</tr>
<tr>
<td width='25%'>".$TableLanguage7['MobileText']."<span></span></td>
<td width='75%'><p class='name'>".$_POST['franchise_mobile']."</p></td>
</tr>
<tr>
<td width='25%'>".$TableLanguage2['CityFilterText']."<span></span></td>
<td width='75%'><p class='name'>".$_POST['franchise_city']."</p></td>
</tr>
<tr>
<td width='25%'>".$TableLanguage2['CityFilterText']."<span></span></td>
<td width='75%'><p class='name'>".$_POST['franchise_town']."</p></td>
</tr>
<tr>
<td width='25%'>".$TableLanguage4['ResFormFieldCountryText']."<span></span></td>
<td width='75%'><p class='txt_box'>".$_POST['franchise_country']."</p></td>
</tr>
<tr>
<td width='25%'>".$TableLanguage7['howmuchyouinvestText']."?<span></span></td>
<td width='75%'><p class='name'>".$_POST['franchise_invest']."</p>
</td>
</tr>
<tr>
<td width='25%'>".$TableLanguage7['countryInterestedText']."<span></span></td>
<td width='75%'><p class='name'>".$_POST['franchise_Selectedcountry']."</p></td>
</tr>


</tbody></table>
</form>
</div>
</div>
</div>
<br>

</td>
                    </tr>
                    
                   
                                
             </table>       
  

                       </td> 
                    </tr> 
                    <tr> 
                      <td height='18'></td> 
                    </tr> 
                    <tr> 
                      <td colspan='4'>&nbsp;</td> 
                    </tr> 
                    <tr> 
                      <td height='18'></td> 
                    </tr> 
                    <tr> 
                      <td colspan='4' style='font-size:13px;color:rgb(102,102,102);padding-top:0px;padding-left:30px'>Thank you for your preference.</td> 
                    </tr>
					 <tr> 
                      <td colspan='4' style='font-size:13px;color:rgb(102,102,102);padding-top:0px;padding-left:30px'>".$AdminDataLoginVal['website_name']." Team</td> 
                    </tr> 
                    <tr> 
                      <td colspan='4' style='font-size:13px;color:rgb(102,102,102);padding-top:18px;padding-left:30px'><a style='color:#ed6c2b' href='' target='_blank'>".$AdminDataLoginVal['website_name']." Online Food Ordering</a></td> 
                    </tr> 
                    <tr> 
                      <td height='18'></td> 
                    </tr> 
                    <tr> 
                      <td bgcolor='#C1272D' height='10'></td> 
                    </tr> 
                  </tbody> 
                </table></td> 
              <td colspan='2' valign='top'><img alt='' style='margin-top:1px' src='https://ci6.googleusercontent.com/proxy/8o1ccbZ7ctJxK1VN4zNIxlWON_rkJswBHm6DzxefVm-_VSzj9QPFhRMbpnLl2K53YvrCXyuvok0vrS6cV3RfcihRmWQlG3YSbM63MuIfpr7r4nTsSrN68-uEEw1yRlju_Ov5ZghGFjY9C2mGLuNV36XI-Oh4=s0-d-e1-ft#https://www.etakeout.co.uk/system/application/libraries/spaw2/empty/images/shadow-top-right.png'></td> 
            </tr> 
            <tr> 
              <td>&nbsp;</td> 
              <td background='https://ci4.googleusercontent.com/proxy/EZYYeK4w2asNVCcbD8wkliiy7Ulzcci_sqRnKSnJ7gNSYlE4AqAvpw_mM4gjxuC_6i4c6DwJukWOpT_yWblEwr6f6OpbRr2aqz_MffQ_j4T0revCtSl9IbBYXmi8e8IvqC74uJ0IeL141s4DRBajug=s0-d-e1-ft#https://www.etakeout.co.uk/system/application/libraries/spaw2/empty/images/shadow-left.png' width='4'></td> 
              <td background='https://ci4.googleusercontent.com/proxy/fMGLYGaSXBcqpb_4i_0NpDT6OwB1EmhPO0VBXxU4tifv6KxhPAc1Tu_vDL5zztDKjkM6iFsXefxLWpLfXP-RvBEB1YBmRtIfT2bj9iIQRyA8g4GBUYk8qH905Gt51p4TIoNbOO7CyfKJqiXoU6dgKmE=s0-d-e1-ft#https://www.etakeout.co.uk/system/application/libraries/spaw2/empty/images/shadow-right.png' width='4'></td> 
              <td>&nbsp;</td> 
            </tr> 
            <tr> 
              <td colspan='2'></td> 
              <td><img alt='' src='https://ci6.googleusercontent.com/proxy/E3iNizj4AUWYxz8t1e9PUopNYgAoddNQraaIHCPJ56eP0Cq56k8daz74Y6Gv7xWplalG0fIJwtVc0csoezk3Cgi89cQJofg6Se7I1Hg7zLd0_V5lG91FUKa23Sg5CMsqKTFCpOeYONBs0QtglyAtjMFC=s0-d-e1-ft#https://www.etakeout.co.uk/system/application/libraries/spaw2/empty/images/shadow-bottom.png'></td> 
              <td colspan='2'></td> 
            </tr> 
          </tbody> 
        </table></td> 
    </tr> 
    <tr> 
      <td height='40'></td> 
    </tr> 
  </tbody> 
</table><div class='yj6qo'></div><div class='adL'>
</div></div>";
$headers = "MIME-Version: 1.0\n";
$headers .= "Content-type: text/html; charset=windows-874\n";
$headers .= "From: $from  \r\n" .
$headers .= "X-Priority: 1\r\n"; 
$headers .= "X-MSMail-Priority: High\r\n"; 
$headers .= "X-Mailer: Just My Server"; 
if(mail($to, $subject, $message, $headers)){
$msg="Thankyou for submitting your restaurant detail ! We will contact soon !";
}
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta itemprop="name" content="<?php echo stripslashes(ucwords($AboutData['content_TitleMeta'])); ?>">
<title itemprop="description"><?php echo stripslashes(ucwords($AboutData['content_TitleMeta'])); ?>  | Justfood Online Food Ordering | Developed by Php Expert Group at Ghaziabad | Uttar Pradesh | India | Greek !</title>
<meta property="og:title" content="<?php echo stripslashes(ucwords($AboutData['content_TitleMeta'])); ?>" />
<meta name="description" content="<?php echo stripslashes(ucwords($AboutData['content_KeywordMeta'])); ?>" />
<meta name="keywords" content="<?php echo stripslashes(ucwords($AboutData['content_DescriptionMeta'])); ?>"
/>
	<link href="css/reset2.css" type="text/css" rel="stylesheet" media="all" />        
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<link href="css/myaccount.css" type="text/css" rel="stylesheet" />
 <link href="css/LoginCss.css" type="text/css" rel="stylesheet" media="all" /> 
 <style type="text/css">
.enquiry
{
width:100%; min-height:500px; margin:auto;
}
.enquiry .left
{
width:45%; min-height:500px; float:left;
}
.enquiry .right
{
width:54%; min-height:500px; float:right; 
}
.enquiry .right span
{
color:#E51B24;
}
.enquiry .right h2
{
margin:2%; border-bottom:1px solid #ccc; padding-bottom:7px; font-size:25px; color:#E51B24;
}
.enquiry .right .txt_box
{
width:75%;
}
.enquiry .right .txt_area
{
width:75%;
}
.enquiry .right .select
{
width:79%;
}
.enquiry .right .sub_btn
{
background-color: #E51B24;
    border: medium none;
    border-radius: 3px;
    clear: both;
    color: #FFFFFF;
    cursor: pointer;
    float:right;
    font-family: 'sourcebold';
    margin-top: 6px;
    padding: 7px 10px;
	width:35%;
    text-align: center;
    text-transform: uppercase;
	margin-right:20%;
}
.enquiry .right .sub_btn:hover
{
background-color:#B81A19;
 text-decoration:none;
}
.enquiry .left h1
{
color: #E51B24;
    font-size: 22px;
}
.enquiry .left h2
{
color: #E51B24;
    font-size: 20px;
}
.enquiry ul{
list-style:none;
}
.enquiry ul li
{
list-style:none;
}
</style>
 <!--jscript for back to top-->
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
    
</head>
<body>
<!--wrapper starts-->
<div id="wrapper">
  <!--header starts-->
   <?php include("route/TopHeader.php"); ?>
  <!--header ends-->
</div>


<!--contentwrapper starts-->
<div id="contentwrapper" style="padding-top:7px; padding-bottom:1px;">
  <!--content container starts-->
  <div class="container" style="min-height:500px;">

<div class="about00" style="border-top:none; background:none; border:none; box-shadow: 0px 0px 0px 0px #C3BFBF;">
                     <h3 style="line-height:0; margin-top:20px;padding: 20px 0; margin-bottom:20px;"><?php echo $AboutData['franchise_a_restaurant_heading']; ?></h3>
                <div class="enquiry">
<?php if($msg!=''){ ?>
<div style="color:#DF0000; font-size:16px; padding:15px;"><?php echo $msg;?></div>
<?php } ?>
<div class="left" style="border:none;">
<br />
<p style="font-size: 15px;color: #333333;margin: 0 0 10px;"><?php echo $AboutData['franchise_a_restaurant_heading_description1']; ?> </p>

<h2><?php echo $AboutData['franchise_a_restaurant_heading2']; ?>  </h2>
<ul style="font-size: 14px;color: #333333; line-height:20px;">
<li><?php echo $AboutData['franchise_a_restaurant_heading_description2']; ?></li>
</ul>
</div>
<div class="right">
<h2><?php echo $TableLanguage7['showyourInterestText'];?></h2>
<form action="" name="" method="post">
<table width="95%" style="margin:2%;">
<tbody><tr>
<td width="25%" height="37"><?php echo $TableLanguage7['firstNameText'];?><span>*</span></td>
<td width="75%"><input type="text" name="franchise_firstName" id="franchise_firstName" maxlength="" class="contact_input" required></td>
</tr>
<tr>
<td width="25%" height="38"><?php echo $TableLanguage7['LastNameText'];?><span>*</span></td>
<td width="75%"><input type="text" name="franchise_firstName" id="franchise_firstName" maxlength="" class="contact_input" required></td>
</tr>
<tr>
<td width="25%" height="38"><?php echo $TableLanguage5['ResFormFieldEmailText'];?><span>*</span></td>
<td width="75%"><input type="email" name="franchise_Email" id="franchise_Email" maxlength="" class="contact_input" required></td>
</tr>
<tr>
<td width="25%" height="39"><?php echo $TableLanguage7['MobileText'];?><span>*</span></td>
<td width="75%"><input type="text" name="franchise_mobile" id="franchise_mobile" maxlength="" class="contact_input" required></td>
</tr>
<!--<tr>
<td width="25%">Address<span>*</span></td>
<td width="75%"><textarea name="" id="" rows="" cols="" class="txt_area"></textarea></td>
</tr>-->
<tr>
<td width="25%"><?php echo $TableLanguage2['CityFilterText']; ?><span>*</span></td>
<td width="75%"><input type="text" name="franchise_city" id="franchise_city" maxlength="" class="contact_input" required></td>
</tr>
<tr>
<td width="25%" height="39"><?php echo $TableLanguage2['StateFilterText']; ?><span>*</span></td>
<td width="75%"><input type="text" name="franchise_town" id="franchise_town" maxlength="" class="contact_input" required></td>
</tr>
<tr>
<td width="25%" height="32"><?php echo $TableLanguage5['ResFormFieldCountryText'];?><span>*</span></td>
<td width="75%"><select name="franchise_country" id="franchise_country" class="contact_input" >
<<option value=""><?php echo $TableLanguage7['SelectText'];?></option>
<?php $qCountry=mysql_query("select * from tbl_country where status='0' order by countryName ");
while($CountryData=mysql_fetch_assoc($qCountry)){
 ?>
<option value="<?php echo $CountryData['countryName'];?>"><?php echo $CountryData['countryName'];?></option>
<?php } ?>
</select>
</td>
</tr>
<tr>
<td width="25%"><?php echo $TableLanguage7['howmuchyouinvestText'];?><span>*</span></td>
<td width="75%"><select name="franchise_invest" id="franchise_invest" required class="contact_input" >
<option value="0"><?php echo $TableLanguage7['SelectText'];?></option>
<?php for($i=1;$i<=50;$i++){ ?>
<option value="<?php echo $i;?>00">&euro; <?php echo $i;?>00</option>
<?php } ?>
</select>
</td>
</tr>
<tr>
<td width="25%"><?php echo $TableLanguage7['countryInterestedText'];?><span>*</span></td>
<td width="75%"><select name="franchise_Selectedcountry" id="franchise_Selectedcountry" required class="contact_input" >
<option value=""><?php echo $TableLanguage7['SelectText'];?></option>
<?php $qCountry=mysql_query("select * from tbl_country where status='0' order by countryName ");
while($CountryData=mysql_fetch_assoc($qCountry)){
 ?>
<option value="<?php echo $CountryData['countryName'];?>"><?php echo $CountryData['countryName'];?></option>
<?php } ?>
</select>
</td>
</tr>
<tr>
<td width="25%"></td>
<td width="75%"><input type="submit" value="<?php echo $TableLanguage7['franchiseButtonText'];?>" name="GetAFranchiseSubmit" align="right" class="sub_btn"></td>
</tr>
</tbody></table>
</form>
</div>
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
