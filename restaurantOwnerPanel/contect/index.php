<?php include('connect.php');
?>
<?php
     $msg='';
	 if(isset($_POST['submitsearch']))
	 {
		 $_SESSION['startdate']=$_GET['from'];
		 $_SESSION['enddate']=$_GET['to'];
     $qry3=mysql_query("select * from tbl_rooms where add_room_limit_date_from='".$_GET['from']."' and add_room_limit_date_to='".$_GET['to']."' and 
	 add_rooms_adults='".$_GET['adults']."' and add_rooms_children='".$_GET['children']."'");
	 $data3=mysql_fetch_array($qry3);
	 if($data3['id']=='')
	   {
		  $msg="There is no rooms available";  
	    }
	else
	   {
		   $msg="Rooms Available";
		}
	 }
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->

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
  <?php 
  include('top_menu.php');?>
</header>
<!-- end Header --> 
<!-- Slider -->
<div class="wrapper">
  <section id="homeslider" class="flexslider">
    <div class="loadingDark">
      <ul class="slides">
      
      <?php 
	      include('connect.php');
	      $qry=mysql_query("select * from tbl_gallery where addhotelgallery_status ='0' and addhotelgallery_showhome ='0'");
		  while($data=mysql_fetch_array($qry))
		  {
	  ?>
        <li> <img src="cp/imagegallery/<?php echo $data['backgroundimg']; ?>" style="height:400px;  width:1000px;" alt=""/>
          <div class="container"> 
            <!-- Slider Caption -->
            <div class="caption">
              <div class="six columns captionContainer">
                <div class="captionWrap"> 
                  <!-- Caption Content -->
                  <h2>Comfort</h2>
                  <h5><?php echo $data['addhotelgallery_title'];?></h5>
                  <br>
                  <p><?php echo $data['addhotelgallery_desc'];?></p>
                  <a href="#" class="button button-light">Book Now</a>                  
                <!-- end Caption Content --> 
              </div>
            </div>
            <!-- end Slider Caption --> 
          </div>
        </li>
        <?php }?>
      </ul>
    </div>
  </section>
</div>
<!-- end Slider --> 
<!-- Booking -->
<div class="wrapper">
  <div id="booking">
    <div class="container">
      <div class="sixteen columns">
        <div class="four columns alpha">
          <div class="bookingHeader half-top">
            <h3>Search Rooms</h3>
            <p>For rates and availability</p>
            <?php 
   if($msg!='')
      {
		 echo $msg;  
	  }
?>
          </div>
        </div>
        <form action="search_room.php" id="bookingForm" name="bookingform" method="get">
          <div class="two columns half-top">
            <label for="datepicker-start">From</label>
            <input type="text" id="datepicker-start" name="from" class="required" />
          </div>
          <div class="two columns half-top">
            <label for="datepicker-end">To</label>
            <input type="text" id="datepicker-end" name="to" class="" />
          </div>
          <div class="two columns half-top">
            <label for="adults">Adults</label>
            <input id="adults" name="adults" type="text" class="" />
          </div>
          <div class="two columns half-top">
            <label for="children">Children</label>
            <input id="children" name="children" type="text" />
          </div>
          <div class="two columns omega half-top line-padding">
            <input type="submit" value="Check" id="checkAvailability" name="submitsearch" class="full-width button-dark">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- end Booking --> 
<!-- Top -->
<?php $qry4=mysql_query("select * from tbl_hotel");?>

<div class="wrapper">
  <div id="top" class="white">
    <div class="container">
      <div class="one-third column">
        <div class="picFrame imgCircle">
        <?php $data4=mysql_fetch_array($qry4);?>
          <div class="loading"> <img src="cp/htlimg/<?php echo $data4['hotel_image']; ?> "  style="height:300px;  width:300px;"/></div>

         
        </div>
      </div>
      <div class="two-thirds column centered">
        <h2 class="uppercase"><?php echo $data4['hotel_name']; ?></h2> <br>
         
        <hr class="ornament">
        <p class="remove-bottom"><?php echo $data4['hotel_desc']; ?> </p>
      </div>
    </div>
  </div>
  <!-- end Top --> 
  <!-- Feature -->
  <?php
     $qry1=mysql_query("select * from tbl_rooms");
  ?>
  <div id="feature" class="lightGray">
    <div class="container">
      <div class="sixteen columns">
        <h4 class="headerShell small centered"><span>Guestroom Choices</span></h4>
      </div>
       <?php while($data1=mysql_fetch_array($qry1)) {?>
      <div class="four columns">     
        <div class="picFrame imgCircle"> 
          <!--Circle-->
          <div class="mosaicBlockFourC circle"> 
            <div class="mosaic-backdrop"><img src="cp/backgroundimg/<?php echo $data1['backgroundimg']; ?>" style="height:200px;  width:200px;" alt=""/></div> 
                      
          </div>
        </div>
        <div class="add-top centered">
          <h4 class="uppercase add-bottom"><?php echo $data1['add_rooms_room_type']; ?><br>
             <div class="box"> <a href="search_room.php?from=<?php echo $data1['add_room_limit_date_from']; ?>&to=<?php echo $data1['add_room_limit_date_to']; ?>&adults=<?php echo $data1['add_rooms_adults']; ?>&children=<?php echo $data1['add_rooms_children']; ?>&submitsearch=Check" class="button more-bottom">Book Now</a></div>
          </div>
          
      </div>
        <?php }?>
      
      
      
      
    </div>
  </div>
  <!-- end Feature --> 
  <!-- InnerBottom -->
  <?php $qry2=mysql_query("select * from tbl_addevent");?>
  <div id="innerbottom" class="white">
    <div class="container">
      <?php while($data2=mysql_fetch_array($qry2)){?>

      <div class="one-third column">
        <div class="picFrame"> <img src="cp/hotelevent/<?php echo $data2['backgroundimg'];?>" style="height:200px;width:300px;" /> </div>
        <div class="add-top centered">
          <h3 class="uppercase"><?php echo $data2['event_title']; ?></h3>
          <p><?php echo $data2['event_service']; ?></p>
          
      </div>
      </div>
     <?php }?>
      
    </div>
  </div>
  
  <!-- end InnerBottom --> 
  <!-- Bottom -->
  <?php include('footer.php');?>
  <!-- end Bottom --> 
  <!-- Footer -->
  
  <!-- end Footer --> 
</div>
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