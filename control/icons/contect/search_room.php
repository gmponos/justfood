<?php
include("connect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<!-- Basic Page Needs -->
<meta charset="utf-8">
<title>Peppers Rundells Alpine Lodge - Accommodation Dinner Plain, Mount Hotham</title>
<meta name="description" content="Come and enjoy the rustic elegance and alpine charm at Rundells. Set amongst the Alpine National Park, in the picturesque village of Dinner Plain" />
		<meta name="keywords" content="Dinner Plain accommodation, Accommodation Dinner Plain, Dinner Plains Accommodation, Hotham accommodation, Accommodation Hotham, Hotels Dinner Plain, Dinner Plain, Diner Planes, Diner Plain, Hotham, Mount Hotham, high country lodge, best accommodation in Dinner Plain, Victorian High Country, High Country, alpine lodge, adventure holiday, snow holidays, snow holidays Victoria, high country holidays, ski holidays, alpine getaway, high country getaway, best accommodation in Dinner Plain, best accommodation at Hotham, best alpine lodge, nice places to stay, snow accommodation, beautiful accommodation, alpine accommodation, wotif, snow accommodation, Great Alpine Road, accommodation Great Alpine Road, winter getaways, touring The Great Alpine Road, Melbourne Sydney Touring, Harrietville accommodation, Bright accommodation, Omeo accommodation" />
<!-- Mobile Specific Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS -->
<link rel="stylesheet" href="stylesheets/base.css">
<link rel="stylesheet" href="stylesheets/skeleton.css">
<link rel="stylesheet" href="stylesheets/layout.css">
<link rel="stylesheet" href="stylesheets/fonts.css">
<link rel="stylesheet" href="stylesheets/flexslider.css">
<link rel="stylesheet" href="stylesheets/zebra_datepicker_metallic.css">
<link rel="stylesheet" href="stylesheets/mosaic.css">
<link rel="stylesheet" href="stylesheets/prettyPhoto.css">

<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

<!-- Favicons -->
<link rel="shortcut icon" href="images/favicon.ico">
<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
</head>
<body>

<!-- Primary Page Layout --> 
<!-- Header -->
<header> 
  <!-- topBar -->
   <?php include('top_menu.php')?>
</header>
<!--Room Searching Code-->


<!-- end Header -->
<div class="wrapper"> 
  <!-- Header Image -->
  <div id="headerImage" class="remove-lineheight white">
    <div class="loading"><img src="images/photos/pageheader01.jpg" alt=""></div>
  </div>
  <!-- end Header Image --> 
</div>
<div class="wrapper"> 
  <!-- Breadcrumb -->
  <div id="breadcrumb" class="lightGray">
    <div class="container">
      <div class="sixteen columns">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="#">Search Result</a></li>
        </ul>
      </div>
    </div>
  </div>
  <!-- end Breadcrumb --> 
</div>
<!-- Top -->
<div class="wrapper">
    <style  type="text/css">
		  #mytable {
	width: 700px;
	padding: 0;
	margin: 0;
}

caption {
	padding: 0 0 5px 0;
	width: 700px;	 
	font: italic 11px "Trebuchet MS", Verdana, Arial, Helvetica, sans-serif;
	text-align: right;
}

th {
	font: bold 11px "Trebuchet MS", Verdana, Arial, Helvetica, sans-serif;
	color: #4f6b72;
	border-right: 1px solid #C1DAD7;
	border-bottom: 1px solid #C1DAD7;
	border-top: 1px solid #C1DAD7;
	letter-spacing: 2px;

	text-align: left;
	padding: 6px 6px 6px 12px;
	background: #CAE8EA url(images/bg_header.jpg) no-repeat;
}

th.nobg {
	border-top: 0;
	border-left: 0;
	border-right: 1px solid #C1DAD7;
	background: none;
}

td {
	border-right: 1px solid #C1DAD7;
	border-bottom: 1px solid #C1DAD7;
	background: #fff;
	padding: 6px 6px 6px 12px;
	color: #4f6b72;
	
}

tr.odd {
	border-right: 1px solid #C1DAD7;
	border-bottom: 1px solid #C1DAD7;
	background:#E9E9E9;
	padding: 6px 6px 6px 12px;
	color: #4f6b72;
	
}




td.alt {
	background: #F5FAFA;
	color: #797268;
}

th.spec {
	border-left: 1px solid #C1DAD7;
	border-top: 0;
	background: #fff url(images/bullet1.gif) no-repeat;
	font: bold 10px "Trebuchet MS", Verdana, Arial, Helvetica, sans-serif;
}

th.specalt {
	border-left: 1px solid #C1DAD7;
	border-top: 0;
	background: #f5fafa url(images/bullet2.gif) no-repeat;
	font: bold 10px "Trebuchet MS", Verdana, Arial, Helvetica, sans-serif;
	color: #797268;
}
		  </style>
          
           <style type="text/css">
.byFoodImg1{ float:left; position:relative;}
.foodName1{ float: left;
font: bold 13px Arial;
color: #ffffff;
background: #2E0204;
line-height:27px;
position: absolute;
left: 0px;
top: 111px;
width: 280px;}
</style>
  <!-- end Top --> 
  <!-- Feature -->


  <div id="feature" class="lightGray">
    <div class="container">
   <!-- <p><strong>11 result in your search resul</strong>t</p>-->
      <table class="zebra more-bottom"  style="width:950px;">
            <thead>
              <tr>
                <th>Hotels</th>
                <th>Full Rate</th>
                
               <?php $date = $_GET['from'];
	// End date
	$end_date = $_GET['to'];
 
	while (strtotime($date) <= strtotime($end_date)) {
		 ?>
                <th><?php echo "$date\n";
		$date = date ("M-d", strtotime("+1 day", strtotime($date)));
				?> </th>
                <?php }?>
                
                
              </tr>
            </thead>
            <tbody>
            <?php 
			
			$qur='';
	if($_GET['children']!='')
	{
	$qur .="  add_rooms_children='".$_GET['children']."'";
	}
	else if($_GET['from']!='')
	{
	$qur .="  add_room_limit_date_from >= '".$_GET['from']."' AND add_room_limit_date_from <= '".$_GET['to']."'  ";
	}
	
	else if( $_GET['children']!='' && $_GET['from']!='')
	{
	$qur .=" between add_rooms_children='".$_GET['children']."' and   add_room_limit_date_from='".$_GET['from']."'and add_room_limit_date_from='".$_GET['to']."'";
	}
	else
	{
	$qur .=" 1";
	}	
	 $fg="select * from tbl_rooms where $qur";
$qry3=mysql_query($fg);   
   /* $qry3=mysql_query("select * from tbl_rooms where add_room_limit_date_from='".$_GET['from']."' and add_room_limit_date_to='".$_GET['to']."' and 
	 add_rooms_adults='".$_GET['adults']."' and add_rooms_children='".$_GET['children']."'");*/
	 
	 /*if($data3[0]=='')
	   {
		  echo "There is no rooms available";  
	    }
	else
	   {
		   echo "Rooms Available";
		}*/

?>

                <?php while($data3=mysql_fetch_array($qry3)){?>
               <tr class="" >
              
                <td class="bold"><a href="" title="Queen Room"><?php echo $data3['add_rooms_room_type'];?></a> <span style="display:inline; margin-left:10px;"><a href="reservation.php?from=<?php echo $_GET['from']; ?>&to=<?php echo $_GET['to']; ?>&ad=<?php echo $_GET['adults']; ?>&child=<?php echo $_GET['children']; ?>&room_id=<?php echo $data3['id'];?>&id=<?php echo $data3['id']; ?>&ip=<?php echo $_SERVER['REMOTE_ADDR']; ?>&sid=<?php echo session_id(); ?>" class="button" style="padding: 4px 12px; margin-bottom:0px;" title="Queen Room">Book Now &raquo;</a></span></td>
               
                <td>N <?php echo number_format($data3['default_price'],2);?></td>
                 <td>Available</td>
                <!-- <td align="center" style="background-color:#A40000; color:#FFFFFF;" title="already Book">Sold</td>-->
                <td>Available</td>
                
                <td>Available</td>
               
                 <td>Available</td>
                  <td>Available</td>
                 <!--<td align="center" style="background-color:#A40000; color:#FFFFFF;" title="already Book">Sold</td>-->
                
              </tr>
               <?php }?>
              
               <tr><td colspan="9" align="center" style="border:none;">&nbsp;</td></tr>
             
            </tbody>
          </table>
      
    <?php 
           //$qry1=mysql_query("select * from tbl_rooms");
		   $qry1=mysql_query($fg);
	 
		  while($data=mysql_fetch_array($qry1)){?>
      <div class="one-third column">
        <div class="picFrame">
      
          <div class="loading"> <a href="" class="byFoodImg1">
           <img src="cp/backgroundimg/<?php echo $data['backgroundimg']?>" style="height:200px; width:400px;" alt="">
            <span class="homeCuisineRed"></span>
				<span class="foodName1" style="text-align:center; margin-top:15px;"><?php echo $data['add_rooms_room_type']?><?php /*?><span style="display:inline; "><?php echo number_format($data['default_price'],0)?></span><?php */?></span>
           </a></div>
        </div>
      </div> 
     
      <div class="two-thirds column">
        <h4 class="uppercase"><?php echo $data['add_rooms_room_type']?><span style="display:inline; color:#A80000;"> N <?php echo number_format($data['default_price'],2);?></span></h4>
        <span style="color:#3DA0BF; padding:5px;"><?php $data['room_facilities']?></span>
        <p><?php echo $data['add_rooms_room_description']?></p>	
        <div class="box"> <a href="search_room.php?from=<?php echo $data['add_room_limit_date_from']; ?>&to=<?php echo $data['add_room_limit_date_to']; ?>&adults=<?php echo $data['add_rooms_adults']; ?>&children=<?php echo $data['add_rooms_children']; ?>&submitsearch=Check" class="button more-bottom">Book Now</a></div>
      </div>
      <?php }?>
    </div>
  </div>
  <!-- end Feature --> 
  <!-- InnerBottom -->
  
</div>
<!-- end InnerBottom --> 
<!-- Bottom -->
<?php include('footer.php');?>
<!-- End Document --> 

<!-- Java Scripts --> 
<script src="javascripts/jquery-1.8.3.min.js"></script> 
<script src="javascripts/jquery.zweatherfeed.js"></script> 
<script src="javascripts/jquery.flexslider-min.js"></script> 
<script src="javascripts/zebra_datepicker.js"></script> 
<script src="javascripts/jquery.validate.min.js"></script> 
<script src="javascripts/jquery.prettyPhoto.js"></script> 
<script src="javascripts/mosaic.1.0.1.min.js"></script> 
<script src="javascripts/jquery.fittext.js"></script> 
<script src="javascripts/common.js"></script> 

</body>

</html>