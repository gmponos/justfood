<?php
       include('connect.php');
	   $qry1=mysql_query("select * from tbl_rooms");
  ?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Mirrored from alialamshahi.com/themes/cottage/stay.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 26 Sep 2013 10:23:59 GMT -->
<head>

<!-- Basic Page Needs -->
<meta charset="utf-8">
<title>Stay : Cottage Hotel & Spa HTML Template</title>
<meta name="description" content="">
<meta name="author" content="">

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
<!-- end Header -->

<div class="wrapper"> 
  <!-- Breadcrumb -->
  <div id="breadcrumb" class="lightGray">
    <div class="container">
      <div class="sixteen columns">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="#">Hotel Rooms</a></li>
          
        </ul>
       
      </div>
      
    </div>
  </div>
  <!-- end Breadcrumb --> 
</div>

<!-- Top -->
<div class="wrapper">

 
  
  <div id="feature" class="lightGray">
    <div class="container">
      <div class="sixteen columns">
      
        <h4 class="headerShell small centered"><span>Booking Choices</span></h4>
      </div>
    
      <div class="two-thirds column">
       
       <table class="table">
					<thead>
						<tr>
							<th class="sub">Image</th>
							<th class="sub">Room Type</th>
							<th class="sub">Vacant Room</th>
                            <th class="sub">Room Facilities</th>
							<th class="sub" style="width: 10%"></th>
							<th class="sub" style="width: 10%"></th>
							<th class="sub" style="width: 10%"></th>
						</tr>
					</thead>
					
						<?php 
	
	while($row=mysql_fetch_array($qry1))
    { 
	?>
					<tbody>
									<tr class="even">
						<td class="align_top align_center type_img"><img src="cp/backgroundimg/<?php echo $row['backgroundimg']; ?>" width="90" height="70" /></td>
						<td class="align_top"><?php echo ($row['add_rooms_room_type']); ?></td>						
						<td class="align_top"><?php echo ($row['add_rooms_no_of_room']); ?></td>
                        <td class="align_top"><?php echo ($row['room_facilities']); ?></td>
						<td class="align_top"><a class="icon icon-edit" href="all_rooms_edit.php?id=<?php echo $row['id']; ?>">BOOK</a></td>
							
					</tr>
										
				</tbody>
	<?php }?>
				</table>
      </div>
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
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-3510333-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>

<!-- Mirrored from alialamshahi.com/themes/cottage/stay.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 26 Sep 2013 10:24:08 GMT -->
</html>