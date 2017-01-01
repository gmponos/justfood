<?php 
ob_start();
session_start();
include('route/config1.php'); ?>
<?php
include('domainName.php');
$AdminDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_siteSetting order by id asc"));
$RegistrationDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_EmailSetting order by id asc"));
extract($_POST);
if(isset($_POST["SubmitLogin"]))
{
 $q ="SELECT * FROM  `tbl_login` where AdminName=N'".$username."' and AdminPassword='".$password."' and status='0'";
	$query = mysql_query($q)or die(mysql_error());
	$num_rows=mysql_num_rows($query);
	$result=mysql_fetch_array($query);
	if($num_rows>0){
	mysql_query("UPDATE  `tbl_login` SET  `login_time` ='".date('h:i:s a')."', `login_date` ='".date('F j, Y')."' where AdminName='".$username."'");
	$_SESSION['username']=$result['AdminName'];
	$_SESSION['AdminloginId']=$result['id'];
	$_SESSION['logintype']=$result['login_type'];
	//$_SESSION['img']="masterpic/small/".$result['mas_photo'];
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
<title><?php echo $AdminDataLoginVal['website_name'];?> | Administrator Panel</title>
<link href="oneColElsCtrHdr.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.tst{
   width:500px;
   margin:auto;
	margin-top:140px;
  background-color: #710000;
background-image: -ms-linear-gradient(left, #710000 0%, #710000 50%, #710000 100%);
background-image: -moz-linear-gradient(left, #710000 0%, #710000 50%, #710000 100%);
background-image: -o-linear-gradient(left, #710000 0%, #710000 50%, #710000 100%);
background-image: -webkit-gradient(linear, left top, right top, color-stop(0, #710000), color-stop(0.5, #710000), color-stop(1, #710000));
background-image: -webkit-linear-gradient(left, #710000 0%, #710000 50%, #710000 100%);
background-image: linear-gradient(to right, #710000 0%, #710000 50%, #710000 100%);
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
	background-color: #710000;
background-image: -ms-linear-gradient(left, #710000 0%, #710000 50%, #710000 100%);
background-image: -moz-linear-gradient(left, #710000 0%, #710000 50%, #710000 100%);
background-image: -o-linear-gradient(left, #710000 0%, #710000 50%, #710000 100%);
background-image: -webkit-gradient(linear, left top, right top, color-stop(0, #710000), color-stop(0.5, #710000), color-stop(1, #710000));
background-image: -webkit-linear-gradient(left, #710000 0%, #710000 50%, #710000 100%);
background-image: linear-gradient(to right, #710000 0%, #710000 50%, #710000 100%);
	border: 0px solid #EC3636;
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

    background-color: #fba400;
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
color:#FFFFFF;}
.txt{
background: url(image/secrecy-32.png) no-repeat;}
p{
font-family:"Times New Roman", Times, serif;
font-size:14px;
color:#FFFFFF;}

#content form input[type="text"],
#content form input[type="password"]
 {	
 background: #fff;
	color: #00A400;
	 border-radius: 10px;
	font: 13px Helvetica, Arial, sans-serif;
	margin: 0 0 50px;
	box-shadow: 0px 2px 6px #5C5C67;
	padding: 15px 10px 15px 40px;
	width: 80%;
}

.logo {
width: 15%;
height: 148px;
margin-left: 113px;
float: left;
color: #FFFFFF;
background: url(http://phpexpertgroup.com/justfoodgr/images/wpb6393251_06.png) no-repeat;
background-size: 175px 133px;
z-index: 10;
position: absolute;
top: -1px;

}
#home_middle {
height: 70px;
padding: 1px;
margin-top: 20px;
margin-left: 140px;
max-height: 70px;
}
#home_middle h1 {
font-family: 'Segoe Print';
float: left;
color: #FFF;
text-transform: capitalize;
margin: 12px 0 0 2%;
font-size: 20px;
line-height: 22px;
}

</style>
</head>

<body class="oneColElsCtrHdr">

<div id="container">
  <div id="header">
  <div style="width:1000px; float:left;">
  <div style="width:200px; height:50px; float:left;">
  <h1>Just<span style="color:#fba400;">Food</span><span style="color:#fba400; font-size:9px; margin-top:3px; margin-left:0px;">.gr</span></h1>
  </div> 
<div id="home_middle">
      
       <h1 style="float:left; margin-left:80px;">Administrator Control Panel</h1>
      </div>
 </div>
 <div style="width:150px; height:50px; float:right; padding-top:30px;"><a href="<?php echo $DomainName;?>" style="text-decoration:none; background:#fba400;" class="btn btn-purple4 btn-gradient" target="_blank">Visit Site</a></div>
  <!-- end #header --></div>
  <div id="mainContent">
    <div class="tst" >
    <div >
    <div style=" margin-top:-55px;">
    <section id="content">
    		<form action="" method="post">
			<h1>Administrator Login</h1>
          
			<div>
				<input type="text" placeholder="Username" value="" required="" name="username" id="username" />
			</div>
			<div>
				<input type="password" placeholder="Password" value="" required="" name="password" id="password" />
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
 
  <div id="footer" style="margin-top:100px;">
     <p style="float:right">Powered by <a href="http://phpexpertgroup.com/justfoodgr/" title="<?php echo $AdminDataLoginVal['website_name'];?>" target="_blank" style="color:#FFFFFF; font-size:14px;" ><?php echo $AdminDataLoginVal['website_name'];?></a> - 2015 All right Reserved</p>
    <!-- end #footer --></div>
   
<!-- end #container --></div>
</body>
</html>
