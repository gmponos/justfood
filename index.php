<?php 
ob_start();
session_start();
include('route/functions.php');
$db= new User();
include('config1.php');
mysql_query ("set character_set_results='utf8'"); 
date_default_timezone_set('Asia/Kolkata');
$AdminDataLoginVal=mysql_fetch_assoc(mysql_query("select * from tbl_siteSetting order by id asc"));
include('expired_restaurantOffer.php');
include('expired_restaurantfoodDeals.php');
include('open_restaurant_count.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=yes"/>
<meta name="google-translate-customization" content="b28974cdcc6b4a8f-5a159113ee8e2bea-g050415fe433f51fd-1e"></meta>
<meta content='width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;' name='viewport' />
<title><?php echo ucwords($AdminDataLoginVal['website_MetaTitle']); ?></title>
<link href="css/reset2.css" rel="stylesheet" media="all" />
<link href="menu/component.css" rel="stylesheet" media="all" />
<script type="text/javascript" language="javascript" src="menu/modernizr.custom.js"></script>
<link href="css/responsive_tab.css" rel="stylesheet" media="all" />
<link href="css/responsive_com.css" rel="stylesheet" media="all" />
<link href="css/responsive_comlow.css" rel="stylesheet" media="all" />
<script type="text/javascript" language="javascript" src="js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" language="javascript" src="js/jquery.carouFredSel-6.2.1-packed.js"></script>
<script type="text/javascript" language="javascript">
			$(function() {

				//	Responsive layout, resizing the items
				$('#foo4').carouFredSel({
				
				prev: '#prev2',
				next: '#next2',
					responsive: true,
					width: '100%',
					scroll: 2,
					items: {
						width: 400,
					//	height: '30%',	//	optionally resize item-height
						visible: {
							min: 5,
							max: 6
						}
					},
					orientation: "horizontal",
							circular: "yes",
							autoscroll: "yes",
							interval: 1
				});
				$('#foo5').carouFredSel({
				
				prev: '#prev3',
				next: '#next3',
					responsive: true,
					width: '100%',
					scroll: 1,
					items: {
						width: 400,
					//	height: '30%',	//	optionally resize item-height
						visible: {
							min: 3,
							max: 6
						}
					},
					orientation: "horizontal",
							circular: "yes",
							autoscroll: "yes",
							interval: 1
				});
	

			});
		</script>
<script type="text/javascript" src="js/cycle-plugin.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
	
	$('#fade').cycle();
	});

</script>
<script type="text/javascript">
        $(document).ready(function () {
            $('.combobox').combobox();
        });
                    </script>
<script src="chosen/chosen.jquery.js" type="text/javascript"></script>
<script type="text/javascript"> $(".chzn-select").chosen(); $(".chzn-select-deselect").chosen({ allow_single_deselect: true }); </script>
 <link rel="stylesheet" href="jqmodal/simplemodal.css" />
<script src="jqmodal/jquery.simplemodal.js"></script>
</head>
<body style="top:0px;" onload="initialize()">
<!--wrapper starts-->
<div id="wrapper">
  <!--header starts-->
  <?php include("route/TopHeader.php"); ?>
  <!--header ends-->
</div>
<!--wrapper Ends-->
<!--contentwrapper starts-->
<div id="contentwrapper">
  <!--content container starts-->
  <div class="container">
    <div id="fade">
      <?php include("SliderImg.php"); ?>
    </div>
    <!--search and order starts-->
    <div class="search_order">
      <div class="fullserach">
        <div class="fullserach_left">
          <div class="space"></div>
          <div class="leftsearch">
            <h1><?php echo ucwords($TableLanguage['SSearchPanelText']);?>!!!</h1>
            <?php include("AddressSearchPanel.php"); ?>
          </div>
        </div>
        <!--right search starts-->
        <?php include("browseSearch.php"); ?>
        <!--right search ends-->
      </div>
    </div>
    <!--search and order ends-->
    <!--how to work form starts-->
    <?php include('HowitWorks.php'); ?>
    <!--how to work form ends-->
    <!--mid main starts-->
    <div class="midmain">
      <div class="deals_brands">
        <div class="deals_left">...................</div>
        <div class="deals_middle">
          <h1><?php echo ucwords($TableLanguage['BestDealText']);?></h1>
        </div>
        <div class="deals_right">...................</div>
      </div>
      <?php include('DealsContainer.php'); ?>
      <!-- Top Brands  container starts-->
      <div class="deals_brands">
        <div class="deals_left">...................</div>
        <div class="deals_middle">
          <h1><?php echo ucwords($TableLanguage['TopBrandsText']);?></h1>
        </div>
        <div class="deals_right">...................</div>
      </div>
      <?php include("CuisneSliderBar.php"); ?>
      <!--Top Brands  container Ends-->
      <div class="apps">
        <div class="appsleft">
        <img src="images/mapp1.png" style="margin-left:1px;"/> </div>
        <div class="appsright">
          <h1><?php echo ucwords($TableLanguage['appHeadlineText']);?></h1>
          <h1>pocket Available in</h1>
          <h3><?php echo ucwords($TableLanguage['smallappHeadlineText']);?></h3>
          <img src="images/appbutton.png" /> <img src="images/gooplay.png" style="margin-left:25px;" /></div>
      </div>
      <div style="clear:both;"></div>
    </div>
    <!--mid main ends-->
  </div>
  
  <!--content container ends-->
  <div style="clear:both;"></div>
</div>
<!--contentwrapper Ends-->
<a href="#" class="go-top"><?php echo ucwords($TableLanguage1['BackToTopText']);?></a>
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
<?php include('route/IndexFooter.php'); ?>
<script>window.jQuery || document.write('<script src="/assets/js/jquery.min.js"><\/script>')</script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js" type="text/javascript"></script>
<script src="chosen/plugins.js"></script>
<script src="chosen/gmap3.js"></script>
<script type="text/javascript" src="chosen/bootstrap.min.js"></script>
<script type="text/javascript" src="chosen/app.js"></script>
<?php /*?><script src="js/search/jquery-ui.min.js" type="text/javascript"></script>
<script src="js/search/plugins.js"></script>
<!--<script src="js/search/app.js"></script>-->
<script src="js/search/app.js" type="text/javascript"></script>
<script src="js/search/jquery.lockfixed.js"></script>
<?php */?>
</body>
</html>
<?php /*?><link rel="stylesheet" type="text/css" href="autocomplete/jquery.autocomplete.css" />
<script type="text/javascript" src="autocomplete/jquery.autocomplete.js"></script>
<script>
 $(document).ready(function(){
  $("#AddressSearch").autocomplete("autocomplete.php", {
        selectFirst: true
  });
  
 });
</script><?php */?>
