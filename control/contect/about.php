<?php
//ob_start();
//session_start();
include('connect.php');

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
   <?php include('top_menu.php')?>
</header>
<?php
  $qry=mysql_query("select *from tbl_dinnerplain");
  $data=mysql_fetch_array($qry);
?>
<!-- end Header -->
<div class="wrapper"> 
  <!-- Header Image -->
  <div id="headerImage" class="remove-lineheight white">
  <div class="loading"><img src="cp/dinnerplain/<?php echo $data['backgroundimg']; ?>" style="height:200px;  width:1000px;" alt=""/></div>

  </div>
  <!-- end Header Image --> 
</div>


<div class="wrapper"> 
  <!-- Breadcrumb -->
  <div id="breadcrumb" class="lightGray">
    <div class="container">
      <div class="sixteen columns">
        <ul>
          <li><a href="index-2.html">Home</a></li>
          <li><a href="#">Dinner Plain</a></li>
        </ul>
      </div>
    </div>
  </div>
  <!-- end Breadcrumb --> 
</div>
<!-- Top -->
<div class="wrapper">
  <div id="top" class="white">
    <div class="container">
      <div class="sixteen columns">
        <h2 class="uppercase fittext"><?php echo $data['dinnerplain_title']; ?></h2>
        <p><?php echo $data['dinnerplain_desc']; ?></p>
      </div>
    </div>
  </div>
  <!-- end Top --> 
  <!-- Feature -->
  <div id="feature" class="lightGray">
    <div class="container">
      <div class="two-thirds column">
        <p><strong></strong></p>
        <p><strong><a href="walktrails.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Walks & Trails</a></strong></p>
        <p><strong><a href="mountainbiking.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mountain Biking</a></strong></p>
        <p><strong><a href="roadcycling.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Road Cycling</a></strong></p>
        <p><strong><a href="horseriding.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Horseriding</a></strong></p>
        <p><strong><a href="fishing.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fishing</a></strong></p>
        <p><strong><a href="pialates.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pilates</a></strong></p>
        
        
        
        <hr> 
        
        <p><h2>Location</h2></p>
        <p><?php echo $data['dinnerplain_location']; ?><br>
             
      <hr>      
      
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