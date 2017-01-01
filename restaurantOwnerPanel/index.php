<?php 
ob_start();
session_start();
include('route/config1.php'); ?>
<?php
include('../control/domainName.php');
$AdminDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_siteSetting order by id asc"));
$RegistrationDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_EmailSetting order by id asc"));
extract($_POST);
if(isset($_POST["SubmitLogin"]))
{
$q ="SELECT * FROM  `tbl_restaurantOwner` where restaurant_OwnerLoginId='".$username."' and restaurant_OwnerLoginPassword='".$password."' and status='0'";
$query = mysql_query($q)or die(mysql_error());
$num_rows=mysql_num_rows($query);
$result=mysql_fetch_array($query);
if($num_rows>0){
$_SESSION['Ownerusername']=$result['restaurant_OwnerFirstName'].''.$result['restaurant_OwnerLastName'];
$_SESSION['OwnerloginId']=$result['id'];
$_SESSION['restaurant_id']=$result['restaurant_id'];
$_SESSION['logindate']=date('F j, Y');
$_SESSION['logintime']=date('h:i:s a');
header("location:webindex.php");
exit;
}
else
{
$error=1;
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $AdminDataLoginVal['website_name'];?>| Restaurant Owner Panel</title>
<link href="oneColElsCtrHdr.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.tst{
background:url(images.jpg);
   width:500px;
   margin-top:110px;
    margin-left:50px;
    margin-bottom:110px;
   /* background:#fff;*/
	border-radius:8px;
	height:350px; 
	-moz-border-radius:8px;
	-webkit-border-radius:8px;
	box-shadow:0 20px 10px -10px rgba(0,0,0,0.2);
}
.photo{
background: url(image/secrecy-32.png) no-repeat;
background-position:1px  1px;
background-size:20px 20px;
padding-left:30px;
z-index:1000px;
}
#content {
	/*background: #bd0a22;*/
	border: 0px solid #BD0A22;
	position: relative;
	text-align: center;
	width: 400px;
	margin-top: 0px;
	margin-right: auto;
	margin-bottom: 0;
	margin-left: auto;
	padding-top: 25px;
	padding-right: 0;
	padding-bottom: 0;
	padding-left: 0;
	background-position: top;
}
.btn-purple4.btn-gradient {

    background-color: red;
}
.btn-gradient:hover {
    background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0.45) 1%, rgba(255, 255, 255, 0.15) 100%);
}
.btn:hover {
    color: rgb(255, 255, 255);
    background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0.13) 1%, rgba(255, 255, 255, 0.13) 100%);
}
.btn:focus {
    color: rgb(255, 255, 255);
}
.btn:hover, .btn:focus {
    color: rgb(255,255, 255);
    text-decoration: none;
}
.btn:focus {
    outline: thin dotted;
    outline-offset: -2px;
}
.btn-purple4 {
	background-color: #FFFFFF;
}
.btn-gradient {
    background-repeat: repeat-x;
    text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.4);
    border-color: rgba(0, 0, 0, 0.07) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.18);
    box-shadow: 0px 1px 0px rgba(255, 255, 255, 0.2) inset;
    background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0.3) 1%, rgba(255, 255, 255, 0.15) 100%);
}
.btn {
    color: rgb(255, 255, 255);
    outline: medium none;
    line-height: 1.47;
}
.btn {
    display: inline-block;
    padding: 6px 12px;
    margin-bottom: 0px;
    font-size: 14px;
    font-weight: normal;
    line-height: 1.42857;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    cursor: pointer;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
    -moz-user-select: none;
}
h1{
color:red;}
.txt{
background: url(image/secrecy-32.png) no-repeat;}
p{
font-family:"Times New Roman", Times, serif;
font-size:14px;
style="color:#FFF;"}

#content form input[type="text"],
#content form input[type="password"]
 {	
 background: url("http://cssdeck.com/uploads/media/items/8/8bcLQqF.png") no-repeat scroll 0 0 #EAE7E7;
	color: #777;
	font: 13px Helvetica, Arial, sans-serif;
	margin: 0 0 50px;
	padding: 15px 10px 15px 40px;
	width: 80%;
}
</style>
</head>

<body class="oneColElsCtrHdr">

<div id="container">
  <div id="header">
  <div style="width:600px; float:left; margin-left:300px;  font-family: sans-serif; id="home_middle"">
    <h1 style="color:#FFF;">Restaurant Owner Control Panel</h1>
    </div>
    <div style="width:200px; height:50px; float:right; padding:30px; padding-right:0px;"><a href="http://megamenus.net/" class="btn btn-purple4 btn-gradient" style="text-decoration:none; width:130px; height:21px; background:red; color:#fff; float:right; margin-right::10px;">Visit Site</a></div>
  <!-- end #header --></div>
  <div id="mainContent">
    <h1>  </h1>
    <div class="tst" >
    <div >
    <div style=" margin-top:110px; margin-left:">
    <section id="content">
    		<form action="" method="post">
			<h1 style="color:#FFF;">Restaurant Owner Login</h1>
          <?php if($error!=''){ ?>
          <div style="padding:2px; color:#B90000; margin-bottom:5px; font-size:14px;">Sorry ! Login ID and Password is incorrect try again</div>
          <?php } ?>
			<div>
				<input type="text" placeholder="Username" value="" required name="username" id="username" />
			</div>
			<div>
				<input type="password" placeholder="Password" value="" required name="password" id="password" />
			</div>
			<div>
				<input class="btn btn-purple4 btn-gradient" type="submit" name="SubmitLogin">


</button>
				<a href="forgotPassword.php" style="color:#FFFFFF;">Lost your password?</a>			</div>
		</form>
    		<!-- form -->
		<div class="button">
		
		</div><!-- button -->
	</section></div></div></div>
   
  

	<!-- end #mainContent --></div>
  <div id="footer">
 <div style="color:#FFFFFF; margin-left:15px; float:left; padding-top:15px; font-size:14px;"><a  href="<?php  echo $DomainName;?>" style="color: white; float:left; text-decoration:none;">Powered by <?php echo $AdminDataLoginVal['website_name'];?> </a></div>
<div style="color:#FFFFFF; margin-right:29px; float:right;padding-top:15px;font-size:14px; "><a href="http://megamenus.net" target="_blank" style="color:#FFFFFF; text-decoration:none;">MegaMenus - 2015 All right Reserved </a> </div>
    <!-- end #footer --></div>
     
<!-- end #container --></div>
</body>
</html>
