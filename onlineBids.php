<?php
ob_start();
session_start();
include('route/functions.php');
$db= new User();
include('config1.php');
mysql_query ("set character_set_results='utf8'"); 
$AdminDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_siteSetting order by id asc"));

$OnlineOfferData1=mysql_fetch_assoc(mysql_query("select * from table_menuofferTitle where id='".$_GET['menuofferID']."' and RestaurantPizzaID='".$_GET['RestaurantPizzaID']."' "));
?>
<?php
 ############Cart Start################

include('route/db.php'); 

$dbObj=new db;
extract($_POST);
if(isset($_POST['item_id'])){
$extraItemID=$_POST['ExtraitemID'];
$ExtraitemGroupID=$_POST['ExtraitemGroupID'];

$GroupextraItemID2=$_POST['GroupSelectionOneID'];
$GroupextraItemIDValue=$_POST['GroupSelectionOneID2'];
mysql_query("update tbl_restaurantMainMenuItemPizzaExtraitemGroup set menuExtraCheckedSelection='0' where menuitemID='".$_POST['item_id']."'");
mysql_query("update tbl_restaurantMainMenuItemPizzaExtraitem set menuExtraCheckedSelection='0' where menuitemID='".$_POST['item_id']."'");
$rec=$dbObj->getData(array("sysIP","sessoionId","hotel_id","quqntity"),"cartNewOffer","sysIP='".$_SERVER['REMOTE_ADDR']."' AND sessoionId='".session_id()."' AND hotel_id='".$_GET['RestaurantPizzaID']."' AND itemId='".$_POST['item_id']."'");
		if($rec[0]>0 && $_POST['ChangeProdcut']==1){
			$nqtity=$rec[1]["quqntity"]+1;
			@$crtUP="update cartNewOffer set price='".$price."',extraItemID='".$extraItemID."',ExtraitemGroupID='".$ExtraitemGroupID."',extraItemID2='".$extraItemID1."',GroupextraItemID='".$GroupextraItemID2."',GroupextraItemValue='".$GroupextraItemIDValue."',MenuSize='".$_POST['MenuSize']."',doughValue='".$_POST['doughValue']."',quqntity='".$_POST['quantity']."', baseValue='".$_POST['baseValue']."',cheesValue='".$_POST['cheesValue']."',item_offerInsertID='".$OnlineOfferData1['id']."',instructions=N'".$_POST['SpecialInstruction']."' where sysIP='".$_SERVER['REMOTE_ADDR']."' AND sessoionId='".session_id()."' AND hotel_id='".$_GET['RestaurantPizzaID']."' AND itemId='".$_POST['item_id']."'";
			
			mysql_query($crtUP) or die(mysql_error());
			
			}else{
	@$crt="insert into cartNewOffer(sysIP,sessoionId,itemId,price,extraItemID,ExtraitemGroupID,extraItemID2,GroupextraItemID,GroupextraItemValue,MenuSize,quqntity,instructions,hotel_id,doughValue,baseValue,cheesValue,item_offerInsertID)values('".$_SERVER['REMOTE_ADDR']."','".session_id()."','".$_POST['item_id']."','".$price."','".$extraItemID."','".$ExtraitemGroupID."','".$extraItemID1."','".$GroupextraItemID2."','".$GroupextraItemIDValue."','".$_POST['MenuSize']."','".$_POST['quantity']."',N'".$_POST['SpecialInstruction']."','".$_GET['RestaurantPizzaID']."','".$doughValue."','".$baseValue."','".$cheesValue."','".$OnlineOfferData1['id']."')";
		mysql_query($crt);
	
		}
		unset($_POST['item_id']);
		
		
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta charset="utf-8">
<head>
<style type="text/css">
.cartwrapper {
	width:100%;
	margin:auto;
	color:#808080;
	-webkit-border-radius: 8px;
	-moz-border-radius: 8px;
	border-radius: 8px;
	border-color: rgba(0, 0, 0, 0.8);
	box-shadow: 0 1px 1px rgba(0, 0, 0, 0.75) inset, 0 0 8px rgba(0, 0, 0, 0.75);
	outline: 0 none;
	background:#fff;
	font-family: Calibri;
}
.cartcontainer {
	width:98%;
	margin:auto;
	padding-bottom:10px;
}
.cartheader {
	width:100%;
	height:36px;
	margin-top:19px;
	border-bottom:1px solid #ccc;
	background:#f25804;
	color:#FFFFFF;
	border-radius: 5px 5px 0 0;
}
.cartcontent {
}
.cartcontainer h2 {
	font-size:20px;
	font-weight:bold;
	font-family: Calibri;
	margin:10px 0px 10px 0px;
}
.cart_main {
	width:100%;
	margin-bottom:10px;
}
.checkboxcontent {
	width:100%;
	box-shadow:1px 1px 1px 2px #999;
	margin-top:5px;
	padding-top:10px;
	padding-left:10px;
}
.cartcontainer p {
	font-weight:bold;
}
.cartcontainer span {
	color:#f25804;
}
.cartcontainer .rowcontent {
	width:100%;
	min-height:25px;
	background:#f7f9f9;
	padding:3px 0px 3px 0px;
}
.cartcontainer .third {
	width:33%;
	min-height:25px;
	float:left;
}
.cartcontainer .left {
	width:70%;
	float:left;
}
.cartcontainer .radiobox {
	width:13%;
	height:20px;
	text-align:center;
	float:left;
}
.cartcontainer .recipe {
	width:85%;
	min-height:20px;
	float:left;
}
.cartcontainer .right {
	width:30%;
	float:right;
}
.third_devide {
	width:100%;
	min-height:20px;
	padding-top:2%;
}
.cartcontainer .clear {
	clear:both;
}
.cartcontainer .txt_box {
	width:70%;
	border:1px solid #CCC;
}
.cartcontainer .txt_box:focus {
	border-color:#f8a71e;
	outline:0;
	-webkit-box-shadow:inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgba(249, 81, 8, .6);
	box-shadow:inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgba(249, 81, 8, .6)
}
.cartcontainer .submit {
	padding:2% 5%;
	background:#f25804;
	color:#fff;
	text-decoration:none;
	border:1px solid #f25804;
	border-radius:5px;
	margin-top:15px;
}
.cartcontainer .submit:hover {
	background:#FA3800;
	cursor:pointer;
}
</style>
<div class="cartwrapper">
  <div class="cartheader">
    <h2 style="padding: 2px 1px 1px 10px; float:left;">Bids</h2> <a href="restaurant.php?restaurants=<?php echo urlencode(trim($_GET['restaurants'])); ?>" target="_parent"><img src="images/popupclose.png" style="float:right; width:25px; margin:5px;" /></a>
  </div>
  <div class="cartcontainer">
    <div class="cartcontent" id="myDiv">
      <div>
        <h2><?php echo ucwords($OnlineOfferData1['MenuofferTitle']); ?> <span id="PriceChange" style="float:right;">  <?php echo $OnlineOfferData1['MenuofferPrice']; ?><?php echo $AdminDataLoginVal['website_CurrencySymbole']; ?>  </span></h2>
        <p style="font-size:15px; margin-bottom:10px;"><?php echo ucwords($OnlineOfferData1['ResPizzaDescription']); ?></p>
        <div class="cart_main">
<form class="addtc" id="myform" action="restaurant.php?restaurants=<?php echo urlencode(trim($_GET['restaurants'])); ?>" target="_parent" method="post">
<input type="hidden" name="item_offerInsert" value="1"  />
<input type="hidden" name="item_offerInsertID" value="<?php echo $OnlineOfferData1['id'];?>"  />

          
            <table width="100%" border="0">
              <?php
$TestDelas=mysql_query("select * from table_menuoffer where menuofferID='".$_GET['menuofferID']."' and RestaurantPizzaID='".$_GET['RestaurantPizzaID']."' group by offerSlotTitle ");
$i=1;
while($dealsData=mysql_fetch_assoc($TestDelas)){
$MenuitemData= mysql_query("select * from tbl_restaurantMainMenuItem where slotName=N'".$dealsData['offerSlotTitle']."' and menuofferID='".$_GET['menuofferID']."' ");
?>
              <tr>
                <td><?php echo $dealsData['offerSlotTitle'];?></td>
                <td><div id="dd<?php echo $i;?>" class="wrapper-dropdown-3" tabindex="1"> <span><?php echo $dealsData['offerSlotTitle'];?></span>
                    <ul class="dropdown">
                      <?php while($menuItem=mysql_fetch_assoc($MenuitemData)){ ?>
                      <?php if($menuItem['RestaurantPizzaItemName']!=''){ ?>
                      <li><a class="preview-button" href="#" data-src="popup2.php?restaurantID=<?php echo $_GET['RestaurantPizzaID']; ?>&menuID=<?php echo $menuItem['id'];?>&restaurants=<?php echo $_GET['restaurants']; ?>&menuofferID=<?php echo $_GET['menuofferID'];?>&RestaurantPizzaID=<?php echo $_GET['RestaurantPizzaID'];?>" data-width="700" data-height="1000" ><?php echo ucwords($menuItem['RestaurantPizzaItemName']);?></a></li>
                      <?php } ?>
                      <?php } ?>
                    </ul>
                  </div></td>
              </tr>
              <?php
  $i++;
   } ?>
              <tr>
                <td colspan="2" align="center"><input type="submit" name="" value="Add to Bids" class="submit" />
                  <br />
                 
            </table>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.1/jquery.min.js"></script>
<script type="text/javascript" src="js/speedo.popup.min.js"></script>
<link media="screen" type="text/css" href="css/default.css" rel="stylesheet" />
<script type="text/javascript">
	$(function(){
		$('.preview-button').click(function(){
			var skinName = $(this).data('skin');
			var css3Effects = $(this).data('css3effect');
			var effect = $(this).data('effect') || "fade";
			var href = $(this).data('src') || theme_url+"assets/images/homeSlide.png";
			var width = $(this).data('width') || null;
			var height = $(this).data('height') || null;
								
			$("body").speedoPopup(
			{
				href: href,
				height: height,
				width: width,
				theme: skinName,
				unload: true,
				draggable: true,
				effectIn: effect,
				effectOut: effect,
				css3Effects: css3Effects
			});
			
			return false;
		});
		
		
	});
</script>
<style type="text/css">
.register_selection {
border: 1px solid rgba(0, 0, 0, 0.15);
box-shadow: 0 1px 1px rgba(50, 50, 50, 0.1);
font-size: 13px;
color: #535252;
padding: 5px;
background: none;
height: 30px;
width: 250px;
float: left;
border-radius:4px;
color: #f25804; font-weight:bold;
}
*, *:after, *:before {
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
	padding: 0;
	margin: 0;
}

::selection {
 background: transparent;
}

::-moz-selection {
 background: transparent;
}
.wrapper-demo {
	margin: 60px 0 0 0;
 *zoom: 1;
	font-weight: 400;
}
.wrapper-demo:after {
	clear: both;
	content: "";
	display: table;
}
.wrapper-dropdown-3 {	
    position: relative;
	width: 250px;
	margin: 0 auto;
	padding: 4px;	
    background: #fff;
	border-radius: 4px;
	border: 1px solid rgba(0, 0, 0, 0.15);
	box-shadow: 0 1px 1px rgba(50, 50, 50, 0.1);
	cursor: pointer;
	outline: none;	
    font-weight: bold;
	color: #8AA8BD;
	float:left;
	margin-bottom:10px;
}
.wrapper-dropdown-3:after {
	content: "";
	width: 0;
	height: 0;
	position: absolute;
	right: 15px;
	top: 50%;
	margin-top: -3px;
	border-width: 6px 6px 0 6px;
	border-style: solid;
	border-color: #8aa8bd transparent;
}
.wrapper-dropdown-3 .dropdown {	
    position: absolute;
	top: 101%;
	left: 0;
	right: 0;	
    background: white;
	border-radius: inherit;
	border: 1px solid rgba(0, 0, 0, 0.17);
	box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
	font-weight: normal;
	-webkit-transition: all 0.5s ease-in;
	-moz-transition: all 0.5s ease-in;
	-ms-transition: all 0.5s ease-in;
	-o-transition: all 0.5s ease-in;
	transition: all 0.5s ease-in;
	list-style: none;	
    opacity: 0;
	pointer-events: none;
	z-index:99;
}

.wrapper-dropdown-3 .dropdown li a {
	display: block;
	padding:4px;
	text-decoration: none;
	color: #8aa8bd;
	border-bottom: 1px solid #e6e8ea;
	box-shadow: inset 0 1px 0 rgba(255, 255, 255, 1);
	-webkit-transition: all 0.3s ease-out;
	-moz-transition: all 0.3s ease-out;
	-ms-transition: all 0.3s ease-out;
	-o-transition: all 0.3s ease-out;
	transition: all 0.3s ease-out;
}
.wrapper-dropdown-3 .dropdown li i {
	float: right;
	color: inherit;
}
.wrapper-dropdown-3 .dropdown li:first-of-type a {
	border-radius: 4px 4px 0 0;
}
.wrapper-dropdown-3 .dropdown li:last-of-type a {
	border: none;
	border-radius: 0 0 4px 4px;
}
/* Hover state */

.wrapper-dropdown-3 .dropdown li:hover a {
	background: #f3f8f8;
}
/* Active state */

.wrapper-dropdown-3.active .dropdown {
	opacity: 1;
	pointer-events: auto;
}
/* No CSS3 support */

.no-opacity .wrapper-dropdown-3 .dropdown, .no-pointerevents .wrapper-dropdown-3 .dropdown {
	display: none;
	opacity: 1; /* If opacity support but no pointer-events support */
	pointer-events: auto; /* If pointer-events support but no pointer-events support */
}
.no-opacity .wrapper-dropdown-3.active .dropdown, .no-pointerevents .wrapper-dropdown-3.active .dropdown {
	display: block;
}

</style>
<script type="text/javascript">
			<?php  $i=1; while($i<=10){?>
			function DropDown(el) {
				this.dd<?php echo $i;?> = el;
				this.placeholder = this.dd<?php echo $i;?>.children('span');
				this.opts = this.dd<?php echo $i;?>.find('ul.dropdown > li');
				this.val = '';
				this.index = -1;
				this.initEvents();
			}
			DropDown.prototype = {
				initEvents : function() {
					var obj = this;

					obj.dd<?php echo $i;?>.on('click', function(event){
						$(this).toggleClass('active');
						return false;
					});

					obj.opts.on('click',function(){
						var opt = $(this);
						obj.val = opt.text();
						obj.index = opt.index();
						obj.placeholder.text(obj.val);
					});
				},
				getValue : function() {
					return this.val;
				},
				getIndex : function() {
					return this.index;
				}
			}

			$(function() {

				var dd<?php echo $i;?> = new DropDown( $('#dd<?php echo $i;?>') );

				$(document).click(function() {
					// all dropdowns
					$('.wrapper-dropdown-3').removeClass('active');
				});

			});
<?php $i++;} ?>
		</script>
</head>
</html>
