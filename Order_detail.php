<?php 
ob_start();
session_start();
include('route/functions.php');
include('config1.php');
mysql_query ("set character_set_results='utf8'"); 
date_default_timezone_set("US/Eastern"); 
$AdminDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_siteSetting order by id asc"));
include('generateTimeCalculation.php');
if($_SESSION['justfoodsUserID']!='')
{
$UserAddressData=mysql_fetch_assoc(mysql_query("select * from tbl_user where id='".$_SESSION['justfoodsUserID']."' order by id asc"));
}

if($_SESSION['justfoodsUserID']=='')
{
header("location:index.php");
exit;
}

?>
<?php
 $OrdQur="select * from resto_order where order_identifyno='".$_GET['orderid']."'";
$QUrOrdPer=mysql_fetch_assoc(mysql_query($OrdQur));

$dataorder=mysql_fetch_assoc(mysql_query($OrdQur));
$data=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantAdd where id='".$dataorder['restoid']."'"));


$dOrdstatusA=mysql_fetch_assoc(mysql_query("select * from order_status where id='1'"));
$dOrdstatusT=mysql_fetch_assoc(mysql_query("select * from order_status where id='2'"));
$dOrdstatusD=mysql_fetch_assoc(mysql_query("select * from order_status where id='3'"));
$dOrdstatusC=mysql_fetch_assoc(mysql_query("select * from order_status where id='4'"));
$dOrdstatusCn=mysql_fetch_assoc(mysql_query("select * from order_status where id='5'"));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Restaurant detail</title>
<style>
body {
	font-family:CANDARA;
	font-size:14px;
}
.footerContent1 {
	float: left;
	height: 104px;
	width: 100%;
}
.footersubmitbtn {
	background:#E51B24;
	color:#fff;
	background-repeat:repeat-x;
	width:100px;
	height:30px;
	font-size:18px;
	border-radius:5px;
}
.footersubmitbtn:hover {
	background:#B81A19;
	color:#fff;
}
.OptionCell {
	float:left;
	width:220px;
}
.OptionBlockArea {
	float:left;
	margin-bottom:10px
}
ul.tabs {
	margin: 0px;
	padding: 0px;
	list-style: none;
}
ul.tabs li {
	background: none;
	color: #222;
	display: inline-block;
	padding: 10px 15px;
	cursor: pointer;
}
ul.tabs li.current {
	background:#E51B24;
	color:#FFFFFF;
	font-size:16px;
}
.tab-content {
	display: none;
	background-color: #fff;
	padding: 15px;
}
.tab-content.current {
	display: inherit;
}
#content a, #content a:visited, #info a, #info a:visited {
	color:#E51B24;
}
#content a:hover, #info a:hover {
	text-decoration:underline;
}
.orase {
	width:900px;
}
#content .listing .button-orange {
	float:left;
	background-color:#e58a14;
	font-weight:bold;
	text-transform:uppercase;
	font-size:0.85em;
	padding:3px 15px;
	width:105px;
	color:#fff;
	margin-right:150px;
	margin-top:7px;
	-webkit-border-radius: 3px;
	border-radius: 3px;
	text-align:center;
}
#content .listing a.button-orange:hover {
	background-color:#751b1b;
	text-decoration:none;
}
.buttons-right {
	float:right;
	width: 125px;
	clear:right;
	margin-top:4px;
}
#content .buttons-right a {
	float:left;
	clear:both;
	width:95px;
	background-color:#751b1b;
	text-transform:uppercase;
	font-size:0.85em;
	padding:3px 15px;
	color:#fff;
	margin-right:250px;
	margin-top:6px;
	-webkit-border-radius: 3px;
	border-radius: 3px;
	text-align:center;
}
#content .buttons-right a:hover {
	background-color:#e58a14;
	text-decoration:none;
}
.details {
	float:left;
	width:100%;
	font-size:0.8em;
	margin-top:10px;
}
.details div {
	float:left;
	margin-right:45px;
}
.details div:last-child {
	margin-right:0px;
	float:right;
}
.details span {
	color:#a22524;
}
#info {
	width:240px;
	padding: 0 30px;
	background-color:#fff;
	color:#000;
}
#infolivrare {
w idth:240px;
	padding: 0 20px;
	background-color:#fff;
	color:#000;
}
#info h2, #infolivrare h2 {
	color:#e58a14;
	text-shadow: 0px 0px 0px #e2afa8;
	filter: dropshadow(color=#e2afa8, offx=0, offy=0);
	margin-bottom:10px;
}
#infolivrare td {
	font-size:0.9em;
}
#info span {
	font-weight:bold;
}
ul.servicii li {
	float:left;
	margin-right:10px;
}
.listing ul.servicii li {
	float:left;
	margin-right:10px;
	margin-top:5px;
}
.orar {
	float:left;
	width:100%;
	padding:5px 0;
	border-bottom:1px solid #ccceb7;
	clear:both;
}
.orar span {
	float:right;
	width:50%;
	text-align:right;
}
.leftcontent {
	float:left;
	width:600px;
	background: #fff;
	padding:15px;
}
.rightcontent {
	float:right;
	width:300px;
	margin-left:30px;
	position:relative;
}
.lcontent {
	float:left;
	width:630px;
}
#breadcrumb {
	float:left;
	margin:15px 0;
	font-size:0.9em;
	clear:both;
}
.full {
	float:left;
	width:100%;
	max-width:930px;
}
.full h3 {
	max-width:630px;
}
.full .ratings, .full .specific {
	width:500px;
}
.full .tip {
	margin-top:4px;
	font-size:0.80em;
	clear:both;
}
.full .specific {
	margin-top:4px;
	font-size:0.8em;
	clear:both;
}
.full .serv {
	float:left;
	margin:8px 15px 0 0;
	font-size:0.85em;
	clear:both;
}
.full .servicii {
	float:left;
	margin-top:3px;
}
.det {
	float:left;
}
#ori {
	padding:20px;
	float:left;
}
.info-right {
	float:right;
	width:255px;
	clear:right;
	margin-top:15px;
	font-size:0.9em;
}
.info-right div {
	float:left;
	clear:both;
	padding:4px 0 2px 25px;
	background-position:left 6px;
	background-repeat:no-repeat;
	min-height:12px;
}
.back {
	float:left;
	clear:both;
	background-image:url(../images/back.png);
	background-repeat:no-repeat;
	background-position: left center;
	padding-left:15px;
	margin-bottom:12px;
}
.etabs {
	margin:0px 0 0 0;
	padding: 0;
}
.tab {
	display: inline-block;
	zoom:1;
*display:inline;
	background: #eff0e4;
}
.tab a {
	font-size: 1.1em;
	display: block;
	padding: 10px 35px;
	outline: none;
}
.tab a:hover {
	color:#e58a14;
}
.tab.active {
	background: #fff;
	padding-top: 6px;
	position: relative;
	top: 1px;
}
.tab a.active {
}
.tab-container .panel-container {
	min-height:507px;
}
.panel-container {
	margin-bottom: 10px;
	width:100%;
}
.tab-container {
	margin-top:0px;
}
#content .meniu h3.trigger {
	background-color:#751b1b;
	color:#fff;
	width:570px;
	float:left;
	margin:0;
	padding: 10px 15px;
	font-size:1.2em;
	background-image:url(../images/arrow_down.png);
	background-repeat:no-repeat;
	background-position:97% center;
	border-bottom:1px solid #fff;
	cursor:pointer;
}
.prod-desc {
	float:left;
	max-width:500px;
}
#oferte .prod-desc {
	float:left;
	max-width:430px;
}
ul.toggle {
	width:100%;
	clear:both;
}
ul.toggle li {
	border-bottom:1px solid #ccceb7;
	padding:10px 0;
	float:left;
	width:100%
}
ul.toggle li:last-child {
	border-bottom: none;
}
ul.toggle li h4 {
	padding:10px 0;
	float:left;
	margin:0px;
}
ul.toggle li .price {
	float:right;
	width:60px;
	padding:5px 0px 5px 20px;
	text-align:right;
	font-size:0.9em;
	color:#000;
}
#oferte ul.toggle li .price, #info.offers .price {
	color:#b4252a;
	font-weight:bold;
}
#info.offers .price {
	padding-top:0px;
}
ul.toggle li .regularprice, .offers .regularprice {
	float:right;
	width:60px;
	padding:5px 0px 5px 20px;
	text-align:right;
	font-size:0.9em;
	color:#000;
	text-decoration:line-through;
}
.offers .price {
	clear:right;
}
ul.toggle li span {
	float:left;
	clear:left;
	font-size:0.8em;
	color:#827a6f;
}
ul.toggle li a:hover {
	color: #FF9000;
}
#filtru {
	clear:both;
	padding:5px 0 15px 0;
	float:left;
	font-size:0.9em;
}
.flt {
	float:left;
	margin-right:15px;
}
.flt input {
	float:left;
}
.flt label {
	line-height:1.5em;
	float:left;
	margin-left:3px;
}
.flt img {
	float:left;
	margin-left:5px;
}
.prod-desc h4 img {
	padding-left:5px;
}
.mfp-ajax-holder .mfp-content {
	width:700px;
	margin:0 auto;
	background-color:#fff;
}
.add-to-cart {
	background-color: #FFF;
	margin:0 auto;
	padding:10px 15px;
	color:#000;
	font-size:0.9em;
}
.add-to-cart h4 {
	border-bottom: 1px solid #eff0e4;
	color:#000;
	margin-top:10px;
	font-size:0.9em;
	padding-bottom:5px;
}
.add-to-cart h2 {
	color:#751b1b;
	font-size:1.4em;
	margin-bottom:10px;
}
.add-to-cart .desc {
	font-size:0.8em;
	color:#827a6f;
	margin-bottom:8px;
}
.add-to-cart form {
	padding:15px 0;
	font-size:0.9em;
}
.formrow {
	clear:both;
	border-bottom:1px solid #fff;
	padding:10px 15px;
	float:left;
	width:100%;
	max-width:640px;
line-heigh t:35px;
}
.addtc input[type="checkbox"] {
	margin-top:10px;
}
#content input[type="radio"], .add-to-cart input[type="radio"] {
	float:left;
}
#content input[type="checkbox"], .add-to-cart input[type="checkbox"] {
	float:left;
	clear:left;
}
.formrow label {
	float:left;
	margin-right:20px;
	padding-left:5px;
	text-wrap:none;
}
#extraitem label {
	float:left;
	margin-right:20px;
	padding-left:5px;
	text-wrap:none;
	padding-top:7px;
}
#cont .register.myaccount .formrow label {
	width:320px;
marg in-top:7px;
}
#cont .register.myaccount .formrow input[type="checkbox"] {
marg in-top:10px;
}
.formrow span {
	float:left;
	width:100px;
	padding:0 10px;
}
.add-to-cart textarea {
	width:500px;
	clear:right;
	height:70px;
}
.add-to-cart .instructions {
	color:#827a6f;
	float:left;
	margin-left:120px;
}
.formcontent {
	float:left;
	width:520px;
}
#content input[type="submit"], .add-to-cart input[type="submit"] {
	float:left;
	clear:both;
	background-color:#E51B24;
	text-transform:uppercase;
	cursor:pointer;
	padding:15px 20px;
	color:#fff;
	margin-top:6px;
	-webkit-border-radius: 3px;
	border-radius: 3px;
	text-align:center;
	border:none;
	font-family:CANDARA;
}
#content input[type="submit"]:hover {
	background-color:#B81A19;
	text-decoration:none;
}
.add-to-cart input[type="submit"] {
	margin-left:135px;
	margin-top:15px;
}
.add-to-cart select {
	padding:7px;
}
.options {
	float:right;
	width: 13px;
	height:13px;
	margin-top:8px;
displ ay:none;
}
.pp {
	width:600px;
}
.cart {
	background-color:#fff;
	padding:15px;
	font-size:0.85em;
	width:270px;
}
#cartfollow {
	position: fixed;
}
#cartout {
	background-color:#fff;
	padding:15px 0;
	font-size:1em;
	width:auto;
}
#cartout h2 {
c olor:#e58a14;
fon t-size:1.2em;
	margin:0;
	padding: 0 0 10px 0px;
}
.cart h2 {
	color:#e58a14;
	font-size:1.2em;
	margin:0;
	padding: 0 0 15px 10px;
}
th {
	background-color:#eff0e4;
	padding:13px 2px;
	font-weight:normal;
}
td h4 {
	margin-bottom:3px;
	font-size:1.2em;
	margin-top:5px;
}
.desc-small {
	float:left;
	clear:left;
	font-size:0.8em;
	color:#827a6f;
}
.remove {
	float:right;
	margin-left:5px;
	padding-top:3px;
}
.col1 {
	padding-left:10px;
	padding-right:10px;
	text-align:left;
}
.prodrow td {
	border-bottom:1px solid #ccceb7;
	padding-top:10px;
	padding-bottom:10px;
}
.subt td {
	text-align:right;
	padding-top:10px;
	padding-bottom:10px;
}
.total td {
	background-color:#eff0e4;
	padding:13px 2px;
	font-weight:bold;
	text-align:right;
	color:#b4252a;
	margin-top:5px;
}
.minimum td {
	background-color:#b4252a;
	color:#fff;
	padding:15px 15px;
	text-align:right;
	background-image:url(../images/warning.png);
	background-position:15px center;
	background-repeat:no-repeat;
}
.delpick td {
	padding:15px 0px;
}
#content .minimum a {
	color:#fff;
	text-decoration:underline;
}
.delpick input {
	float:left;
	height:25px;
	margin-right:8px;
}
.delpick label {
	float:left;
	background-repeat:no-repeat;
	background-position: right center;
	width:60px;
	line-height:1.1em;
	margin-right:15px;
	font-size:0.95em;
	padding-right:30px;
}
#cartout .delpick input {
	float:none;
	height:10px;
	margin-right:8px;
}
#cartout .delpick label {
	float:none;
	background-repeat:no-repeat;
	background-position: right center;
	width:60px;
	line-height:1.3em;
	margin-right:35px;
	font-size:0.95em;
	padding:4px 40px 4px 0;
}
#deliverylabel {
	background-image:url(../images/cart-delivery.jpg);
}
#pickuplabel {
	background-image:url(../images/cart-pickup.jpg);
	line-height:28px;
}
#taxilabel {
	background-image:url(../images/cart-taxi.png);
}
.cart #submit {
	background-color:#e58a14;
	width:100%;
	margin-left:0;
}
#cartout #submit {
	background-color:#e58a14;
wid th:100%;
	margin-left:0;
}
#descriere, #calificative {
	font-size:0.85em;
	line-height:2em;
}
.photo {
	float:right;
	margin-left:20px;
	margin-bottom:10px;
}
#map {
	float:right;
	width:300px;
	height:342px;
	margin-bottom:30px;
	display:block;
	visibility:visible;
}
.rightbox {
	background-color:#fff;
	margin-bottom:30px;
	padding:15px 15px 30px 15px;
	width:270px;
	float:right
}
#content .rightcontent h3 {
	color:#ff9000;
}
.rating-c {
	padding:30px 0 30px 0;
	line-height:2em;
	border-top:1px solid #eff0e4;
	clear:both;
	margin-bottom:30px;
}
.rating-c .ratings {
	float:left;
	width:auto;
	margin-left:0;
	margin-bottom:15px;
}
.rating-c .meta {
	float:left;
	color:#000;
	clear:left;
	line-height:1.2em;
	padding-top:20px;
	padding-bottom:20px;
}
.meta .date {
	font-size:0.85em;
	color:#751b1b;
}
.rating .transparent {
	margin-bottom:15px;
	display:block;
}
.rating-c .ratingcomment {
	float:right;
	width:450px;
	padding-bottom:30px;
}
#calificative .flt {
	float:right;
	padding-bottom:10px;
	padding-top:5px;
	font-size:0.9em;
}
#ratings .transparent, #ratings .rating {
	width:120px;
	clear:both;
	margin:10px 0;
	float:left;
}
#ratings .ratingsdesc {
	float:left;
	margin:6px 0 10px 110px;
}
.rating-c .votes {
	float:left;
	width:auto;
	clear:both;
	display:none;
}
#content a.button-large {
	float:left;
	clear:both;
	font-size:1.2em;
	cursor:pointer;
	padding:15px 20px;
	color:#fff;
	margin-top:6px;
	-webkit-border-radius: 3px;
	border-radius: 3px;
	text-align:center;
	border:none;
	font-family:CANDARA;
	background:#E51B24;
	color:#fff;
}
#content a.button-large:hover {
	background-color:#B81A19;
	text-decoration:none;
}
#content #calificative a.button-large {
	margin-left:150px;
	padding-left:60px;
	float:left;
	padding-right:60px;
	margin-bottom:20px;
	margin-top:20px;
}
.formrow .ratings {
	width: auto;
	margin:0px 0;
}
.pop {
	font-size:1.2em;
}
.pop h2 {
	font-size:1.4em;
}
.pop .prod-desc {
	max-width:160px;
}
#info.pop .prod-desc span {
	font-weight:normal;
}
.pop .price {
	margin-top:5px;
}
.offers .price {
	margin-top:0px;
}
#content .cms {
	line-height:2em;
	font-size:0.85em;
	padding:30px;
	background:#fff;
	margin:30px auto;
}
.leftcol {
	width:434px;
	padding:10px 15px;
	float:left;
	border-right:1px solid #ccceb7;
}
.rightcol {
	width:434px;
	padding:10px 15px;
	float:left;
}
.leftcol h3, .rightcol h3 {
	max-width:auto;
}
form.register .formtitle {
	clear:both;
	float:left;
	padding:0 0 5px 0;
}
.register input {
	border:1px solid #CCCEB7;
	background:#fff;
	font-size:1.3em;
	padding:8px 10px;
	float:left;
	clear:left;
	width:350px;
}
form.register td {
	line-height:1.2em!important;
}
#fbk {
	float:right;
	padding-top:30px;
	padding-right:30px;
}
#content input[type="submit"] {
	margin-left:30px;
	text-transform:none;
	width:auto;
font-siz e:1.2em;
	text-transform:none;
}
#content .cart input[type="submit"] {
	margin-left:0px;
}
.register .formrow {
	padding:10px 30px;
	width:auto;
	border-color:#eff0e4;
}
form.register {
	width:48%;
	float:left;
}
.register span {
	width:auto;
}
.adv {
	float:right;
	width:48%;
	padding-bottom:45px;
}
.adv h2 {
	font-size:1.6em;
	margin-top:0;
	color:#000;
}
.adv h3 {
	color:rgb(255, 0, 0);
}
.register input[type="checkbox"] {
	margin-left:0px;
	width:auto;
}
.cms form {
	font-size:1em; /*background-color:#EFF0E4;*/
	padding:15px 11px 30px 11px;
	box-shadow: 1px 1px 1px 2px #999999;
}
.check li {
	padding-left:25px;
	padding-bottom:10px;
	background-image:url(../images/check.png);
	background-repeat:no-repeat;
	background-position:left 3px;
}
.check {
	margin-bottom:25px;
}
div#content .cms a.button-large {
	background-color:#E51B24;
	float:left;
	clear:none;
}
div#content .cms a.button-large:hover {
	background-color:#B81A19;
}
div#content .cms a.fb {
	background-color:#20417c;
	background-image:url(../images/fb-login.png);
	background-position:15px center;
	background-repeat:no-repeat;
	padding-left:40px;
}
div#content .cms a.fb:hover {
	background-color:#2e5fb6;
}
#sau {
	float:left;
	padding:22px 12px;
}
.titleright {
	float:right;
	width:430px;
}
.titleleft {
	float:left;
	width:46%;
}
.login h2 {
	clear:none;
}
.fullform form {
	width:auto;
}
.account .panel-container {
	width:900px;
	padding:30px;
	background-color:#fff;
}
.account tr {
	text-align:center;
}
.account td {
	padding:10px
}
.address {
	border: 1px solid #EFF0E4;
	padding:15px;
	float:left;
	width:400px;
	margin-right:15px;
	height:220px;
	margin-bottom:15px;
}
#content .address h3 {
	color:#000;
}
.addractions {
	float:right;
	font-size:0.80em;
}
#content .addractions a {
	margin-left:10px;
font-wei ght:bold;
	background-color:#E51B24;
	color:#fff;
	padding:3px 7px;
	-webkit-border-radius: 3px;
	border-radius: 3px;
}
.rowt {
	float:left;
	text-align:right;
	padding-right:5%;
	width:25%;
	color:#666;
	font-size:0.9em;
	clear:left;
}
.rowd {
	float:left;
	text-align:left;
	padding-right:5%;
	width:65%
}
/* End: Recommended Isotope styles */
ul, li {
	margin: 0;
	padding: 0;
	list-style-type: none;
}
.check li {
	padding-left: 25px;
	padding-bottom: 10px;
	background-image: url(../images/check.png);
	background-repeat: no-repeat;
	background-position: left 3px;
}
.footerContent1_1 a {
	color:#FFF;
	padding:2px;
	font-size:14px;
	font-family:CANDARA;
	text-decoration:none;
}
.footerContent1_1 a:hover {
	color:#FFFFFF;
	text-decoration:none;
}
.footer_txt a {
	color:#E51B24;
	padding:2px;
	font-size:14px;
	font-family:CANDARA;
	text-decoration:none;
}
.footer_txt a:hover {
	color:#E51B24;
	text-decoration:underline;
}
.add-to-cart h2{float:left; margin:3px;}
.add-to-cart img{float:right; margin:5px; width:25px; height:25px;}
.add-to-cart img:hover{
cursor:pointer;
}
</style>
<link type="text/css" rel="stylesheet" href="control/css/print-bill.css"  />

<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
</head>
<body style="background-color:#fff;">
<div class="add-to-cart">
<div style="width:100%; min-height:35px;">
  <h2>Order Details</h2><a href="order_review.php" target="_parent" ><img src="images/popupclose.png" /></a>
  </div>
  <div class="desc">Order Reference ID: <?php echo $QUrOrdPer['order_identifyno']; ?><br />
    Order Type: <?php echo $QUrOrdPer['order_type']; ?><br />
    Order Status:
    <?php if($QUrOrdPer['status']==1){
	echo ucwords($dOrdstatusA['status']);
	}
	 ?>
    <?php if($QUrOrdPer['status']==2){
	 echo ucwords($dOrdstatusT['status']);
	}
	 ?>
    <?php if($QUrOrdPer['status']==3){
	 echo ucwords($dOrdstatusD['status']);
	}
	 ?>
    <?php if($QUrOrdPer['status']==4){
	 echo ucwords($dOrdstatusC['status']);
	}
	 ?>
    <?php if($QUrOrdPer['status']==5){
	 echo ucwords($dOrdstatusCn['status']);
	}
	 ?>
  </div>
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>

    <td class="tbheader" style="background:#F00000;"><center>DESCRIPTION</center></td>
    <td class="tbheader" style="background:#F00000;"><center>QTY</center>	</td>

    <td class="tbheader" style="background:#F00000;"><center>PRICE</center></td>

    <td class="tbheader" style="background:#F00000;"><center>SUB TOTAL</center></td>

  </tr>
<?php
$DealsQuery=mysql_query("select * from cartfoodDealsInsert where orderId='".$_GET['orderid']."' group by deal_id");
	if(mysql_num_rows($DealsQuery)>0)
	{
	while($dealFood=mysql_fetch_assoc($DealsQuery)){
   $subTotalOffer+=$dealFood['deal_price']*$dealFood['quqntity'];
 ?>
 <tr>
 <td class="tbheader1"><?php echo $dealFood['deal_name'];?>
 <br />
              <span class="desc-small" style="font-size:14px;">
   <strong> Deal Items: </strong>
    <br />
    <?php 
	
	$SlotItem=explode(',',$dealFood['slotItemID']);
	foreach($SlotItem as $v)
	{
	if($v!=''){
	$slotDNam=mysql_fetch_assoc(mysql_query("select * from tbl_fooddealslotitem where id='".$v."'"));
	echo $slotDNam['slot_itemName'];?><br />
    <?php } } ?>
     </span>
 </td>
    <td class="tbheader1" align=""><?php echo $dealFood['quqntity'];?></td>
    <td class="tbheader1" align=""><?php echo $dealFood['deal_price']?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></td>
    <td class="tbheader1" align=""><?php echo $dealFood['deal_price']*$dealFood['quqntity'];?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></td>
    </tr>
    <?php } }?>
    
   <?php

									  $g=mysql_query("SELECT * FROM  `resto_order_details` where orderId='".$_GET['orderid']."'");
                                      while($orda=mysql_fetch_assoc($g))
										{
										$ut=$orda['menuprice']*$orda['quantity'];
 									  $mg=mysql_fetch_assoc(mysql_query("SELECT * FROM  `tbl_restaurantMainMenuItem` where id='".$orda['menuId']."'"));
									  
									   ?>

	  <tr>

    <td class="tbheader1">
    <?php echo $mg['RestaurantPizzaItemName'];?>
    <?php
	$MenuSizeData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemSize where id='".$orda['size']."'"));
	if($MenuSizeData['SizeMenuName']!=''){
	echo '<br />('.$MenuSizeData['SizeMenuName'].')';
	}
	 ?>
    <?php
	$MenuDoughData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemdough where id='".$orda['doughValue']."'"));
	if($MenuDoughData['menuDoughName']!=''){
	echo '<br>'.$MenuDoughData['menuDoughName'];
	}
	 ?>
      <?php
	$MenuBaseData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemPizzaBase where id='".$orda['baseValue']."'"));
	if($MenuBaseData['menuBaseName']!=''){
	echo '<br>'.$MenuBaseData['menuBaseName'];
	}
	 ?>
      <?php
	$MenuCheesData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemPizzaChees where id='".$orda['cheesValue']."'"));
	if($MenuCheesData['menuCheesName']!=''){
	echo '<br>'.$MenuCheesData['menuCheesName'];
	}
	 ?>
   
      <?php
	 $plk=explode(',',$orda['extraItemID']);
	 foreach($plk as $c){
	$MenuExtraData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemPizzaExtraitem where id='".$c."'"));
	if($MenuExtraData['menuExtraName']!=''){
	echo $MenuExtraData['menuExtraName'].'<br />';
	}
	}
	?>
        <?php
	 $plk=explode(',',$orda['ExtraitemGroupID']);
	 foreach($plk as $c){
	$MenuExtraData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemPizzaExtraitemGroup where id='".$c."'"));
	if($MenuExtraData['menuExtraName']!=''){
	echo $MenuExtraData['menuExtraName'].'<br />';
	}
	}?>
    
     
    </td>

   

    <td class="tbheader1" align="right"><?php echo $orda['quantity']; ?>  

    </td>

	

    <td class="tbheader1" align="right"> <?php echo number_format($mg['RestaurantPizzaItemPrice'],2).$AdminDataLoginVal['website_CurrencySymbole'];?>
 <?php if($MenuSizeData['SizeMenuPrice']!=''){
	echo '<br />'.$MenuSizeData['SizeMenuPrice'].$AdminDataLoginVal['website_CurrencySymbole'];
	}
	?>
 <?php 
 if($MenuDoughData['menuDoughPrice']!=''){
	echo '<br>'.number_format($MenuDoughData['menuDoughPrice'],2).$AdminDataLoginVal['website_CurrencySymbole'];
	}
 ?> 
  <?php 
 if($MenuBaseData['menuBasePrice']!=''){
	echo '<br> '.number_format($MenuBaseData['menuBasePrice'],2).$AdminDataLoginVal['website_CurrencySymbole'];
	}
 ?>
 
  <?php 
 if($MenuCheesData['menuCheesPrice']!=''){
	echo '<br>'.number_format($MenuCheesData['menuCheesPrice'],2).$AdminDataLoginVal['website_CurrencySymbole'];
	}
 ?>
 
  <?php
	 $plk=explode(',',$orda['extraItemID']);
	 foreach($plk as $c){
	$MenuExtraData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemPizzaExtraitem where id='".$c."'"));
	if($MenuExtraData['menuExtraPrice']!=''){
	echo '<br />'.$MenuExtraData['menuExtraPrice'].$AdminDataLoginVal['website_CurrencySymbole'];
	}
	}
	?>
        <?php
	 $plk=explode(',',$orda['ExtraitemGroupID']);
	 foreach($plk as $c){
	$MenuExtraData=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantMainMenuItemPizzaExtraitemGroup where id='".$c."'"));
	if($MenuExtraData['menuExtraPrice']!=''){
	echo '<br />'.$MenuExtraData['menuExtraPrice'].$AdminDataLoginVal['website_CurrencySymbole'];
	}
	}
 
  
 //if($MenuExtraData1['menuExtraPrice']!=''){
	//echo '<br>&euro; '.number_format($MenuExtraData1['menuExtraPrice'],2);
	//}
 ?>

    </td>

	

    <td class="tbheader1" align="right"><?php 

					//echo $val['price']*$val['quqntity']+$extPrc;

						$ItemTota=$orda['menuprice']*$orda['quantity'];
						$ItemTota=$ItemTota+$extPrc;
						echo number_format($ItemTota,2);
						//$subTotal+=($val['price']*$val['quqntity']+$extPrc);

						$subTotal+=($ItemTota);
?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?>

    </td>

  </tr>

   <?php } 
   $subTotal=$subTotalOffer+$subTotal;
   ?>

      <tr class="bill-header">
		

    <td colspan="3"><span class="totalpc">SubTotal:</span></td>

    <td align="right"><span class="totalpc"   style="color:#FF0000; font-size:14px;">  <?php echo number_format($subTotal,2); ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></span></td>

  </tr>                                 

  <tr class="bill-header">



    <td colspan="5">&nbsp;</td>

  </tr>

  

  <?php 
  if($dataorder['type']=='Pickup' || $dataorder['type']=='Takeout'){
  if($dataorder['deliveryChrg']!=''){?>

   <tr class="bill-header">
		

    <td colspan="3"><span class="totalpc">Delivery Charge:</span></td>

    <td align="right"><span class="totalpc"   style="color:#FF0000; font-size:14px;"> +  <?php echo $dataorder['deliveryChrg']; ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></span></td>

  </tr>

  <?php } ?>
  

  <?php } ?>



   <tr class="bill-header">
		

    <td colspan="3"><span class="totalpc">Tip:</span></td>

    <td align="right"><span class="totalpc"   style="color:#FF0000; font-size:14px;"> +  <?php 
	if($dataorder['ability_to_pay_tips']!='')
	{
	echo $dataorder['ability_to_pay_tips'];
	}
	else
	{
	echo '0.00';
	}
	 ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></span></td>

  </tr>
  
   <tr class="bill-header">
		

    <td colspan="3"><span class="totalpc">Convenience Fee:</span></td>

    <td align="right"><span class="totalpc"   style="color:#FF0000; font-size:14px;"> +  <?php 
	if($dataorder['convenience_fee']!='')
	{
	echo $dataorder['convenience_fee'];
	}
	else
	{
	echo '0.00';
	}
	 ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></span></td>

  </tr>
  <?php if($dataorder['disCupnPrice']!=''){?>

   <tr class="bill-header">

    <td colspan="3"><span class="totalpc">Coupon Discount Charge <?php echo $dataorder['disCupn']; ?>:</span></td>

    <td align="right"><span class="totalpc"   style="color:#FF0000; font-size:14px;"> -  <?php 
	if($dataorder['disCupnPrice']!=''){
	echo number_format($dataorder['disCupnPrice'],2);
	}
	else
	{
	echo '0.00';
	}
	?>
     <?php  if($dataorder['couponCodeType']=='pr'){  ?>
%
 <?php } else { ?>
  <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?>
 <?php } ?>
     </span></td>

  </tr>

  <?php } ?>
  
  <?php if($dataorder['discountValue']!=''){?>

   <tr class="bill-header">

    <td colspan="2"><span class="totalpc">Discount Offer :</span></td>

  <td align="right" colspan="2"><span class="totalpc"   style="color:#FF0000; font-size:14px;"><?php 
 
  echo $dataorder['discountDiscription']; 
  
  ?> -  <?php 
   if($dataorder['discountValue']!=''){
  echo number_format($dataorder['discountValue'],2);
  }
  else
  {
  echo '0.00';
  }
   ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?>
    </span></td>

  </tr>

  <?php } ?>
<?php if($dataorder['loyptamount']!=''){?>

   <tr class="bill-header">

    <td colspan="2"><span class="totalpc">Pay by Loyality :</span></td>

  <td align="right" colspan="2"><span class="totalpc"   style="color:#FF0000; font-size:14px;"> - <?php 
   if($dataorder['loyptamount']!=''){
  echo number_format($dataorder['loyptamount'],2);
  }
  else
  {
  echo '0.00';
  }
   ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?>
    </span></td>

  </tr>

  <?php } ?>
  <tr class="bill-header">
	

    <td colspan="3"><span class="totalpc">Total Amount:</span></td>

    <td align="right"><span class="totalpc"   style="color:#FF0000; font-size:14px;"> <?php 
	if($dataorder['deliveryChrg']!='')
	{
	 if($dataorder['type']!='Pickup'){
	$TotalPrice=$dataorder['ordPrice'];
	}
	else
	{
	$TotalPrice=$dataorder['ordPrice'];
	}
	}
	echo number_format($TotalPrice,2); ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></span></td>

  </tr>

  <tr><td colspan="4">&nbsp;</td></tr>
  </table>
</div>
</body>
</html>
