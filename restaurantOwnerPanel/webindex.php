<?php include('route/header.php'); 
include('route/DB_Functions.php');
   $dbb = new DB_Functions();
 include('route/pagination.php');
 date_default_timezone_set('US/Eastern');
mysql_query ("set character_set_results='utf8'"); 

?>	
 <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="bootstrap.min.css" rel="stylesheet">
	
	<!-- template css -->
	<link href="app/css/styles.css" rel="stylesheet">
	<link href="app/css/demo.css" rel="stylesheet">
	<link href="style.css" rel="stylesheet">
	<link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet">
    
<div id="page-wrap">
		<!-- left sidebar -->
		<?php include('route/side_bar.php'); ?>
		

		<div id="main-content">
			<div id="inner">	
						
				<div class="container-fluid">
					<div class="tabbable main-tabs">
						<!-- main content title -->
						<ul class="nav nav-tabs">
							<li class="active2" style="background-color:#f2f2f2;"><a href="#mainTabReports" style="background-color:#f2f2f2;" data-toggle="tab"><i class="icon-dashboard"></i> Restaurant Owner Panel</a></li>
						</ul><!-- ./ main content title -->

						<div class="tab-content">
							<div class="tab-pane active" id="mainTabReports">
								<div class="row-fluid">
									<div class="span12">
									
										<div class="well">
											<div class="navbar">
												<div class="navbar-inner" style="width:160px;">
													<a class="brand" href="#">Our Income State</a>
												</div>
											</div>
											
											<div class="info-widget">
												<div class="row-fluid">
													<div class="row">
                                                    <form action="restaurantvieworderdetail.php" method="get">     
<table width="100%" border="0" align="center">

  <tr>
  <td><strong>Search Customer Order</strong> </td>
    <td><input type="text" name="orderid"  style="width:600px; height:40px; background-color: rgb(255, 255, 255); background-position: initial initial; background-repeat: initial initial;" placeholder="Enter Here Customer Order ID" id="orderid" value="" required /></td>
    <td><button  type="submit" class="btn btn-primary " name="RestaurantOfferSubmit" id="RestaurantOfferSubmit">Search Order Detail</button></td>
  </tr>
</table></form>
                                                    </div>
													<div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

               <div class="dashboard-stat blue" style="background-color:#4127E3;border-radius:10px;">

                  <div class="visual" >

                  <img src="img/order.png" style="display:none">

                    <!-- <i class="icon-comments"></i>-->

                  </div>

                  <div class="details">

                     <div class="number">

                       <?php 

							include('route/config1.php');

							$curdate=date("Y-m-d");

							$query = "SELECT SUM(ordPrice) FROM resto_order where restoid='".$_SESSION['restaurant_id']."' "; 

                            $result = mysql_query($query) or die(mysql_error());

                           while($row = mysql_fetch_array($result)){
							if($row['SUM(ordPrice)']!=''){
	                      echo number_format($row['SUM(ordPrice)'],2);
						  }
						  else
						  {
						  echo '0.00';
						  }

                          }

                        ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?>

                     </div>

                     <div class="desc">                           

                       Total Orders

                     </div>

                  </div>

                  <a class="more" href="all_restaurant_order_print.php" style="display:none">

                  View more <i class="m-icon-swapright m-icon-white"></i>

                  </a>                 

               </div>

            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

               <div class="dashboard-stat green" style="background-color:#FF071C;border-radius:10px;">

                  <div class="visual">

                     <i class="icon-shopping-cart" style="display:none"></i>

                  </div>

                  <div class="details">

                     <div class="number"><?php 

							include('route/config1.php');

							$curdate=date("Y-m-d");

							$query = "SELECT SUM(ordPrice) FROM resto_order where status='4' and restoid='".$_SESSION['restaurant_id']."'"; 

                            $result = mysql_query($query) or die(mysql_error());

                           while($row = mysql_fetch_array($result)){
							if($row['SUM(ordPrice)']!=''){
	                      echo number_format($row['SUM(ordPrice)'],2);
						  }
						  else
						  {
						  echo '0.00';
						  }

                          }

                        ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></div>

                     <div class="desc">Total Sales</div>

                  </div>

                  <a class="more" href="all_restaurant_order_print.php?status=4" style="display:none">

                  View more <i class="m-icon-swapright m-icon-white"></i>

                  </a>                 

               </div>

            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

               <div class="dashboard-stat purple" style="background-color:#790DA3;border-radius:10px;">

                  <div class="visual">

                    <img src="img/comission.png" style="display:none">

                  </div>

                  <div class="details">

                     <div class="number"><?php 

							include('route/config1.php');

							

							$dSmOdr='';

		                    $totalSum='';

							$query = "SELECT * from resto_order where status='4'  and restoid='".$_SESSION['restaurant_id']."' "; 

                            $result = mysql_query($query) or die(mysql_error());

                           while($data = mysql_fetch_array($result)){

	                      $totalSum+=$data['ordPrice'];

$CuisineQuery = $dbb->showtabledata("tbl_restaurantAdd","id",$data['restoid']);

 $CuisineData=mysql_fetch_assoc($CuisineQuery);

 $dSmOdr+=($data['ordPrice']*$CuisineData['restaurant_commission'])/100;

                          }

                        ?> <?php
						if($dSmOdr!='')
						{
						 echo number_format($dSmOdr,2);
						 }
						 else
						 {
						 echo '0.00';
						 }
						 
						  ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></div>

                     <div class="desc">Total Commission</div>

                  </div>

                  <a class="more" href="RestaurantCommession.php" style="display:none">

                  View more <i class="m-icon-swapright m-icon-white"></i>

                  </a>                 

               </div>

            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

               <div class="dashboard-stat yellow" style="background-color:#FF9E04;border-radius:10px;">

                  <div class="visual">

                     <i class="icon-bar-chart" style="display:none"></i>

                  </div>

                  <div class="details">

                     <div class="number"><?php 

							include('route/config1.php');

							$curdate=date("Y-m-d");

							$query = "SELECT SUM(ordPrice) FROM resto_order where restoid='".$_SESSION['restaurant_id']."'  "; 

                            $result = mysql_query($query) or die(mysql_error());

                           while($row = mysql_fetch_array($result)){
						   
if($row['SUM(ordPrice)']!=''){
	                      echo number_format($row['SUM(ordPrice)'],2);
						  }
						  else
						  {
						  echo '0.00';
						  }

                          }

                        ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></div>

                     <div class="desc">Total Turnover</div>

                  </div>

                  <a class="more" href="all_restaurant_order_print.php" style="display:none">

                  View more <i class="m-icon-swapright m-icon-white"></i>

                  </a>                 

               </div>

            </div>
         </div>
													
													
												</div>
												
												
											</div>
										</div>
                                        
                                        
                                        
                                        <div class="row-fluid">
											<div class="span6">
												<div class="well">
													<div class="navbar">
														<div class="navbar-inner" style="background:#5A0D16; ">
															<a class="brand" href="#" style="color:#FFFFFF;">Restaurant Orders Stat</a>
														</div>
                                                        <?php
    //+++++++++++++++++++++++++++++++++++++++++++++++++++++++ Today Accpected Order ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  
  	
						$TodaySales =mysql_num_rows(mysql_query("SELECT * FROM resto_order where odr_date='$curdate' and restoid='".$_SESSION['restaurant_id']."'  order by order_id desc"));
						$TodayTotalSalesSales='';
						$query = "SELECT SUM(ordPrice) FROM resto_order where  odr_date='$curdate' and restoid='".$_SESSION['restaurant_id']."' order by order_id desc "; 
                            $result = mysql_query($query) or die(mysql_error());
                           while($row = mysql_fetch_array($result)){
	                      $TodayTotalSalesSales=$row['SUM(ordPrice)'];
                          }
  
  
						$curdate=date("Y-m-d");
						$TodayAccpeted =mysql_num_rows(mysql_query("SELECT * FROM resto_order where status='1' AND odr_date='$curdate' and restoid='".$_SESSION['restaurant_id']."'   order by order_id desc"));
						$TodayTotalSalesAccpeted='';
						$query = "SELECT SUM(ordPrice) FROM resto_order where status='1' AND odr_date='$curdate' and restoid='".$_SESSION['restaurant_id']."'   order by order_id desc "; 
                            $result = mysql_query($query) or die(mysql_error());
                           while($row = mysql_fetch_array($result)){
	                      $TodayTotalSalesAccpeted=$row['SUM(ordPrice)'];
                          }
	//++++++++++++++++++++++++++++++++++++++++++++++++++++++++ Accepted End Here+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	
	
	 //+++++++++++++++++++++++++++++++++++++++++++++++++++++++ Today Transit Order ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
						
						$TodayTransit =mysql_num_rows(mysql_query("SELECT * FROM resto_order where status='2' AND odr_date='$curdate' and restoid='".$_SESSION['restaurant_id']."'   order by order_id desc"));
						$TodayTotalSalesTransit='';
						$query = "SELECT SUM(ordPrice) FROM resto_order where status='2' AND odr_date='$curdate' and restoid='".$_SESSION['restaurant_id']."'   order by order_id desc "; 
                            $result = mysql_query($query) or die(mysql_error());
                           while($row = mysql_fetch_array($result)){
	                      $TodayTotalSalesTransit=$row['SUM(ordPrice)'];
                          }
	//++++++++++++++++++++++++++++++++++++++++++++++++++++++++ Transit End Here++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	
	
	//+++++++++++++++++++++++++++++++++++++++++++++++++++++++ Today Delivered Order ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
						
						$TodayDelivered =mysql_num_rows(mysql_query("SELECT * FROM resto_order where status='3' AND odr_date='$curdate' and restoid='".$_SESSION['restaurant_id']."'   order by order_id desc"));
						$TodayTotalSalesTodayDelivered='';
						$query = "SELECT SUM(ordPrice) FROM resto_order where status='3' AND odr_date='$curdate' and restoid='".$_SESSION['restaurant_id']."'   order by order_id desc "; 
                            $result = mysql_query($query) or die(mysql_error());
                           while($row = mysql_fetch_array($result)){
	                      $TodayTotalSalesTodayDelivered=$row['SUM(ordPrice)'];
                          }
	//++++++++++++++++++++++++++++++++++++++++++++++++++++++++ Delivered End Here++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	
	
	//+++++++++++++++++++++++++++++++++++++++++++++++++++++++ Today Completed Order ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
						
						$TodayCompleted =mysql_num_rows(mysql_query("SELECT * FROM resto_order where status='4' AND odr_date='$curdate' and restoid='".$_SESSION['restaurant_id']."'   order by order_id desc"));
						$TodayTotalSalesTodayCompleted='';
						$query = "SELECT SUM(ordPrice) FROM resto_order where status='5' AND odr_date='$curdate' and restoid='".$_SESSION['restaurant_id']."'   order by order_id desc "; 
                            $result = mysql_query($query) or die(mysql_error());
                           while($row = mysql_fetch_array($result)){
	                      $TodayTotalSalesTodayCompleted=$row['SUM(ordPrice)'];
                          }
	//++++++++++++++++++++++++++++++++++++++++++++++++++++++++ Completed End Here++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	
	
	//+++++++++++++++++++++++++++++++++++++++++++++++++++++++ Today Falied Order ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
						
						$TodayFalied =mysql_num_rows(mysql_query("SELECT * FROM resto_order where status='5' AND odr_date='$curdate' and restoid='".$_SESSION['restaurant_id']."'   order by order_id desc"));
						$TodayTotalSalesTodayFalied='';
						$query = "SELECT SUM(ordPrice) FROM resto_order where status='5' AND odr_date='$curdate' and restoid='".$_SESSION['restaurant_id']."'   order by order_id desc "; 
                            $result = mysql_query($query) or die(mysql_error());
                           while($row = mysql_fetch_array($result)){
	                      $TodayTotalSalesTodayFalied=$row['SUM(ordPrice)'];
                          }
	//++++++++++++++++++++++++++++++++++++++++++++++++++++++++ Falied End Here++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	
	
	
	/////////////////////////////////////////////////////////// Weekly Order Detail ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	
	
	
	
	//+++++++++++++++++++++++++++++++++++++++++++++++++++++++ Today Accpected Order ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
						 $wdn=date("N");
			$dt2=mktime(0,0,0,date("m"),date('d'),date("Y"))-$wdn*24*3600;
			 $wKdat=date("Y-m-d",$dt2);
			$curdate =date("Y-m-d");
			$dateWek=mktime(0,0,0,date('m'),date('d'),date('Y'))-(24*3600*7);
            $dateWek=date('Y-m-d',$dateWek);
						
							$WeeklySales =mysql_num_rows(mysql_query("SELECT * FROM resto_order where odr_date<=CURDATE() AND odr_date>=$wKdat and restoid='".$_SESSION['restaurant_id']."'  order by order_id desc"));
						$WeeklyTotalSalesSales='';
						$query = "SELECT SUM(ordPrice) FROM resto_order where  odr_date<=CURDATE() AND odr_date>=$wKdat and restoid='".$_SESSION['restaurant_id']."' order by order_id desc "; 
                            $result = mysql_query($query) or die(mysql_error());
                           while($row = mysql_fetch_array($result)){
	                      $WeeklyTotalSalesSales=$row['SUM(ordPrice)'];
                          }
						
						
						$WeelkyAccpeted =mysql_num_rows(mysql_query("SELECT * FROM resto_order where status='1' and  odr_date<=CURDATE() AND odr_date>=$wKdat  and restoid='".$_SESSION['restaurant_id']."'order by order_id desc"));
						$WeelkyTotalSalesAccpeted='';
						$query = "SELECT SUM(ordPrice) FROM resto_order where status='1' and odr_date<=CURDATE() AND odr_date>=$wKdat and restoid='".$_SESSION['restaurant_id']."' order by order_id desc "; 
                            $result = mysql_query($query) or die(mysql_error());
                           while($row = mysql_fetch_array($result)){
	                      $WeelkyTotalSalesAccpeted=$row['SUM(ordPrice)'];
                          }
	//++++++++++++++++++++++++++++++++++++++++++++++++++++++++ Accepted End Here+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	
	
	 //+++++++++++++++++++++++++++++++++++++++++++++++++++++++ Today Transit Order ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
						
						$WeelkyTransit =mysql_num_rows(mysql_query("SELECT * FROM resto_order where status='2' AND odr_date<=CURDATE() AND odr_date>=$wKdat and restoid='".$_SESSION['restaurant_id']."'   order by order_id desc"));
						$WeelkyTotalSalesTransit='';
						$query = "SELECT SUM(ordPrice) FROM resto_order where status='2' AND odr_date<=CURDATE() AND odr_date>=$wKdat and restoid='".$_SESSION['restaurant_id']."'  order by order_id desc "; 
                            $result = mysql_query($query) or die(mysql_error());
                           while($row = mysql_fetch_array($result)){
	                      $WeelkyTotalSalesTransit=$row['SUM(ordPrice)'];
                          }
	//++++++++++++++++++++++++++++++++++++++++++++++++++++++++ Transit End Here++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	
	
	//+++++++++++++++++++++++++++++++++++++++++++++++++++++++ Today Delivered Order ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
						
						$WeelkyDelivered =mysql_num_rows(mysql_query("SELECT * FROM resto_order where status='3' AND odr_date<=CURDATE() AND odr_date>=$wKdat and restoid='".$_SESSION['restaurant_id']."'   order by order_id desc"));
						$WeelkyTotalSalesTodayDelivered='';
						$query = "SELECT SUM(ordPrice) FROM resto_order where status='3' AND odr_date<=CURDATE() AND odr_date>=$wKdat  and restoid='".$_SESSION['restaurant_id']."'  order by order_id desc "; 
                            $result = mysql_query($query) or die(mysql_error());
                           while($row = mysql_fetch_array($result)){
	                      $WeelkyTotalSalesTodayDelivered=$row['SUM(ordPrice)'];
                          }
	//++++++++++++++++++++++++++++++++++++++++++++++++++++++++ Delivered End Here++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	
	
	//+++++++++++++++++++++++++++++++++++++++++++++++++++++++ Today Completed Order ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
						
						$WeelkyCompleted =mysql_num_rows(mysql_query("SELECT * FROM resto_order where status='4' AND odr_date<=CURDATE() AND odr_date>=$wKdat  and restoid='".$_SESSION['restaurant_id']."'  order by order_id desc"));
						$WeelkyTotalSalesTodayCompleted='';
						$query = "SELECT SUM(ordPrice) FROM resto_order where status='4' AND odr_date<=CURDATE() AND odr_date>=$wKdat  and restoid='".$_SESSION['restaurant_id']."'  order by order_id desc "; 
                            $result = mysql_query($query) or die(mysql_error());
                           while($row = mysql_fetch_array($result)){
	                      $WeelkyTotalSalesTodayCompleted=$row['SUM(ordPrice)'];
                          }
	//++++++++++++++++++++++++++++++++++++++++++++++++++++++++ Completed End Here++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	
	
	//+++++++++++++++++++++++++++++++++++++++++++++++++++++++ Today Falied Order ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
						
						$WeelkyFailed =mysql_num_rows(mysql_query("SELECT * FROM resto_order where status='5' AND odr_date<=CURDATE() AND odr_date>=$wKdat and restoid='".$_SESSION['restaurant_id']."'   order by order_id desc"));
						$WeelkyFailedTodayCompleted='';
						$query = "SELECT SUM(ordPrice) FROM resto_order where status='5' AND odr_date<=CURDATE() AND odr_date>=$wKdat and restoid='".$_SESSION['restaurant_id']."'  order by order_id desc "; 

                            $result = mysql_query($query) or die(mysql_error());
                           while($row = mysql_fetch_array($result)){
	                      $WeelkyFailedTodayCompleted=$row['SUM(ordPrice)'];
                          }
	//++++++++++++++++++++++++++++++++++++++++++++++++++++++++ Falied End Here++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	
	
	
	
	
	
	
	
	
	
	
	
	////////////////////////////////////////////////////// End Here /////////////////////////////////////////////////////////////////////////////////////////////
	
	
	
	
	/////////////////////////////////////////////////////////// Monthly Order Detail ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	
	
	
	
	//+++++++++++++++++++++++++++++++++++++++++++++++++++++++ Today Accpected Order ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
						
			 $dt2=mktime(0,0,0,date("m"),01,date("Y"));
			 $wKdat= date("Y-m-d",$dt2);
			$curdate =date("Y-m-d");
			
			$MonthlySales =mysql_num_rows(mysql_query("SELECT * FROM resto_order where odr_date<=CURDATE() AND odr_date>=$wKdat and restoid='".$_SESSION['restaurant_id']."'  order by order_id desc"));
						$MonthlyTotalSalesSales='';
						$query = "SELECT SUM(ordPrice) FROM resto_order where odr_date<=CURDATE() AND odr_date>=$wKdat and restoid='".$_SESSION['restaurant_id']."' order by order_id desc "; 
                            $result = mysql_query($query) or die(mysql_error());
                           while($row = mysql_fetch_array($result)){
	                      $MonthlyTotalSalesSales=$row['SUM(ordPrice)'];
                          }
						  
						  
						$MonthlyAccpeted =mysql_num_rows(mysql_query("SELECT * FROM resto_order where status='1' and odr_date<=CURDATE() AND odr_date>=$wKdat and restoid='".$_SESSION['restaurant_id']."' order by order_id desc"));
						$MonthlyTotalSalesAccpeted='';
						$query = "SELECT SUM(ordPrice) FROM resto_order where status='1' and  odr_date<=CURDATE() AND odr_date>=$wKdat and restoid='".$_SESSION['restaurant_id']."' order by order_id desc "; 
                            $result = mysql_query($query) or die(mysql_error());
                           while($row = mysql_fetch_array($result)){
	                      $MonthlyTotalSalesAccpeted=$row['SUM(ordPrice)'];
                          }
	//++++++++++++++++++++++++++++++++++++++++++++++++++++++++ Accepted End Here+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	
	
	 //+++++++++++++++++++++++++++++++++++++++++++++++++++++++ Today Transit Order ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
						
						$MonthlyTransit =mysql_num_rows(mysql_query("SELECT * FROM resto_order where status='2' AND odr_date<=CURDATE() AND odr_date>=$wKdat   and restoid='".$_SESSION['restaurant_id']."' order by order_id desc"));
						$MonthlyTotalSalesTransit='';
						$query = "SELECT SUM(ordPrice) FROM resto_order where status='2' AND odr_date<=CURDATE() AND odr_date>=$wKdat  and restoid='".$_SESSION['restaurant_id']."'  order by order_id desc "; 
                            $result = mysql_query($query) or die(mysql_error());
                           while($row = mysql_fetch_array($result)){
	                      $MonthlyTotalSalesTransit=$row['SUM(ordPrice)'];
                          }
	//++++++++++++++++++++++++++++++++++++++++++++++++++++++++ Transit End Here++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	
	
	//+++++++++++++++++++++++++++++++++++++++++++++++++++++++ Today Delivered Order ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
						
						$MonthlyDelivered =mysql_num_rows(mysql_query("SELECT * FROM resto_order where status='3' AND odr_date<=CURDATE() AND odr_date>=$wKdat   and restoid='".$_SESSION['restaurant_id']."' order by order_id desc"));
						$MonthlyTotalSalesTodayDelivered='';
						$query = "SELECT SUM(ordPrice) FROM resto_order where status='3' AND odr_date<=CURDATE() AND odr_date>=$wKdat and restoid='".$_SESSION['restaurant_id']."'   order by order_id desc "; 
                            $result = mysql_query($query) or die(mysql_error());
                           while($row = mysql_fetch_array($result)){
	                      $MonthlyTotalSalesTodayDelivered=$row['SUM(ordPrice)'];
                          }
	//++++++++++++++++++++++++++++++++++++++++++++++++++++++++ Delivered End Here++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	
	
	//+++++++++++++++++++++++++++++++++++++++++++++++++++++++ Today Completed Order ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
						
						$MonthlyCompleted =mysql_num_rows(mysql_query("SELECT * FROM resto_order where status='4' AND odr_date<=CURDATE() AND odr_date>=$wKdat  and restoid='".$_SESSION['restaurant_id']."' order by order_id desc"));
						$MonthlyTotalSalesTodayCompleted='';
						$query = "SELECT SUM(ordPrice) FROM resto_order where status='4' AND odr_date<=CURDATE() AND odr_date>=$wKdat  and restoid='".$_SESSION['restaurant_id']."'  order by order_id desc "; 
                            $result = mysql_query($query) or die(mysql_error());
                           while($row = mysql_fetch_array($result)){
	                      $MonthlyTotalSalesTodayCompleted=$row['SUM(ordPrice)'];
                          }
	//++++++++++++++++++++++++++++++++++++++++++++++++++++++++ Completed End Here++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	
	
	//+++++++++++++++++++++++++++++++++++++++++++++++++++++++ Today Falied Order ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
						
						$MonthlyFailed =mysql_num_rows(mysql_query("SELECT * FROM resto_order where status='5' AND odr_date<=CURDATE() AND odr_date>=$wKdat   and restoid='".$_SESSION['restaurant_id']."' order by order_id desc"));
						$MonthlyFailedTodayCompleted='';
						$query = "SELECT SUM(ordPrice) FROM resto_order where status='5' AND odr_date<=CURDATE() AND odr_date>=$wKdat and restoid='".$_SESSION['restaurant_id']."'   order by order_id desc "; 

                            $result = mysql_query($query) or die(mysql_error());
                           while($row = mysql_fetch_array($result)){
	                      $MonthlyFailedTodayCompleted=$row['SUM(ordPrice)'];
                          }
	//++++++++++++++++++++++++++++++++++++++++++++++++++++++++ Falied End Here++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	
	
	
	

	/////////////////////////////////////////////////////////// Yearly Order Detail ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	
	
	
	
	//+++++++++++++++++++++++++++++++++++++++++++++++++++++++ Today Accpected Order ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
						
			$dt2=mktime(0,0,0,01,01,date("Y"));
              $wKdat= date("Y-m-d",$dt2);
			 $hcurdate=date("Y-m-d");

						$YearlySales =mysql_num_rows(mysql_query("SELECT * FROM resto_order where odr_date<=CURDATE()  AND odr_date>=$wKdat and restoid='".$_SESSION['restaurant_id']."'  order by order_id desc"));
						$YearlyTotalSalesSales='';
						$query = "SELECT SUM(ordPrice) FROM resto_order where odr_date<=CURDATE()  AND odr_date>=$wKdat and restoid='".$_SESSION['restaurant_id']."' order by order_id desc "; 
                            $result = mysql_query($query) or die(mysql_error());
                           while($row = mysql_fetch_array($result)){
	                      $YearlyTotalSalesSales=$row['SUM(ordPrice)'];
                          }
						
						
						$YearlyAccpeted =mysql_num_rows(mysql_query("SELECT * FROM resto_order where status='1' and odr_date<=CURDATE()  AND odr_date>=$wKdat and restoid='".$_SESSION['restaurant_id']."' order by order_id desc"));
						$YearlyTotalSalesAccpeted='';
						$query = "SELECT SUM(ordPrice) FROM resto_order where status='1' and odr_date<=CURDATE()  AND odr_date>=$wKdat and restoid='".$_SESSION['restaurant_id']."' order by order_id desc "; 
                            $result = mysql_query($query) or die(mysql_error());
                           while($row = mysql_fetch_array($result)){
	                      $YearlyTotalSalesAccpeted=$row['SUM(ordPrice)'];
                          }
	//++++++++++++++++++++++++++++++++++++++++++++++++++++++++ Accepted End Here+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	
	
	 //+++++++++++++++++++++++++++++++++++++++++++++++++++++++ Today Transit Order ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
						
						$YealyTransit =mysql_num_rows(mysql_query("SELECT * FROM resto_order where status='2' AND odr_date<=CURDATE()  AND odr_date>=$wKdat  and restoid='".$_SESSION['restaurant_id']."'  order by order_id desc"));
						$YearlyTotalSalesTransit='';
						$query = "SELECT SUM(ordPrice) FROM resto_order where status='2' AND odr_date<=CURDATE()  AND odr_date>=$wKdat  and restoid='".$_SESSION['restaurant_id']."'  order by order_id desc "; 
                            $result = mysql_query($query) or die(mysql_error());
                           while($row = mysql_fetch_array($result)){
	                      $YearlyTotalSalesTransit=$row['SUM(ordPrice)'];
                          }
	//++++++++++++++++++++++++++++++++++++++++++++++++++++++++ Transit End Here++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	
	
	//+++++++++++++++++++++++++++++++++++++++++++++++++++++++ Today Delivered Order ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
						
						$YearlyDelivered =mysql_num_rows(mysql_query("SELECT * FROM resto_order where status='3' AND odr_date<=CURDATE()  AND odr_date>=$wKdat and restoid='".$_SESSION['restaurant_id']."'   order by order_id desc"));
						$YearlyTotalSalesTodayDelivered='';
						$query = "SELECT SUM(ordPrice) FROM resto_order where status='3' AND odr_date<=CURDATE()  AND odr_date>=$wKdat and restoid='".$_SESSION['restaurant_id']."'  order by order_id desc "; 
                            $result = mysql_query($query) or die(mysql_error());
                           while($row = mysql_fetch_array($result)){
	                      $YearlyTotalSalesTodayDelivered=$row['SUM(ordPrice)'];
                          }
	//++++++++++++++++++++++++++++++++++++++++++++++++++++++++ Delivered End Here++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	
	
	//+++++++++++++++++++++++++++++++++++++++++++++++++++++++ Today Completed Order ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
						
						$YearlyCompleted =mysql_num_rows(mysql_query("SELECT * FROM resto_order where status='4' AND odr_date<=CURDATE()  AND odr_date>=$wKdat and restoid='".$_SESSION['restaurant_id']."'   order by order_id desc"));
						$YearlyTotalSalesTodayCompleted='';
						$query = "SELECT SUM(ordPrice) FROM resto_order where status='4' AND odr_date<=CURDATE()  AND odr_date>=$wKdat  and restoid='".$_SESSION['restaurant_id']."'  order by order_id desc "; 
                            $result = mysql_query($query) or die(mysql_error());
                           while($row = mysql_fetch_array($result)){
	                      $YearlyTotalSalesTodayCompleted=$row['SUM(ordPrice)'];
                          }
	//++++++++++++++++++++++++++++++++++++++++++++++++++++++++ Completed End Here++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	
	
	//+++++++++++++++++++++++++++++++++++++++++++++++++++++++ Today Falied Order ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
						
						$YearlyFailed =mysql_num_rows(mysql_query("SELECT * FROM resto_order where status='5' AND odr_date<=CURDATE() AND odr_date>=$wKdat and restoid='".$_SESSION['restaurant_id']."'   order by order_id desc"));
						$YearlyFailedTodayCompleted='';
						$query = "SELECT SUM(ordPrice) FROM resto_order where status='5' AND odr_date<=CURDATE() AND odr_date>=$wKdat  and restoid='".$_SESSION['restaurant_id']."'  order by order_id desc "; 

                            $result = mysql_query($query) or die(mysql_error());
                           while($row = mysql_fetch_array($result)){
	                      $YearlyFailedTodayCompleted=$row['SUM(ordPrice)'];
                          }
	//++++++++++++++++++++++++++++++++++++++++++++++++++++++++ Falied End Here++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++	
	
	?>
	
													</div>
													<div class="tabbable default sub-tabs ">
													<ul class="nav nav-tabs">
														<li style="background:#5A0D16; " ><a href="#tab1" data-toggle="tab" style="color:#FFFFFF;" >Today Orders</a></li>
														<li class="" style="background:#5A0D16; "><a href="#tab2" data-toggle="tab" style="color:#FFFFFF; font-size:16px;">Weekly Orders</a></li>
														<li class="" style="background:#5A0D16; "><a href="#tab3" data-toggle="tab" style="color:#FFFFFF;font-size:16px;">Monthly Orders</a></li>
                                                        <li class="" style="background:#5A0D16; "><a href="#tab4" data-toggle="tab" style="color:#FFFFFF;font-size:16px;">Yearly Orders</a></li>
                                                        
													</ul>
													<div class="tab-content">
														<div class="tab-pane active" id="tab1">
															<div class="info-widget stats">
														 <span class="text"><?php $TodaySales; ?> <span class="desc">&nbsp;Orders Today</span><span style="float:right; color:#A60000;"><?php echo number_format($TodayTotalSalesSales,2); ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></span></span>
														<span class="text"><?php $TodayAccpeted; ?> <span class="desc" style="color:#008800;">&nbsp;Accepted Orders</span><span style="float:right; color:#008800;"><?php echo number_format($TodayTotalSalesAccpeted,2); ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></span></span>
														<span class="text"><?php $TodayTransit; ?> <span class="desc" style="color:#9f0076;">&nbsp;Transit Orders</span><span style="float:right; color:#9f0076;"><?php echo number_format($TodayTotalSalesTransit,2); ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></span></span>
                                                        <span class="text"><?php $TodayDelivered; ?> <span class="desc" style="color:#0057ce;">&nbsp;Delivered Orders</span><span style="float:right; color:#0057ce;"><?php echo number_format($TodayTotalSalesDelivered,2); ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></span></span>
														
														<span class="text"><?php $TodayCompleted; ?> <span class="desc" style="color:#000064;">&nbsp;Completed Orders</span><span style="float:right; color:#000064;"><?php echo number_format($TodayTotalSalesCompleted,2); ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></span></span>
                                                        <span class="text"><?php $TodayFailed; ?> <span class="desc" style="color:#FF0000;">&nbsp;Failed Orders</span><span style="float:right; color:#FF0000;"><?php echo number_format($TodayTotalSalesFailed,2); ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></span></span>
                                                        	<span class="text"><?php $TodaySales; ?> <span class="desc" style="color:#808000;">&nbsp;Sales Today</span><span style="float:right; color:#808000;"><?php echo number_format($TodayTotalSalesSales,2); ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></span></span>
														<!--<i class="icon-sitemap large-icon"></i>-->
													</div>
														</div>
														<div class="tab-pane" id="tab2">
															<div class="info-widget stats">
													 <span class="text"><?php $WeeklySales; ?> <span class="desc">&nbsp;Orders Weekly</span><span style="float:right; color:#A60000;"><?php echo number_format($WeeklyTotalSalesSales,2); ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></span></span>
														<span class="text"><?php $WeeklyAccpeted; ?> <span class="desc" style="color:#008800;">&nbsp;Accepted Orders</span><span style="float:right; color:#008800;"><?php echo number_format($WeeklyTotalSalesAccpeted,2); ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></span></span>
														<span class="text"><?php $WeeklyTransit; ?> <span class="desc" style="color:#9f0076;">&nbsp;Transit Orders</span><span style="float:right; color:#9f0076;"><?php echo number_format($WeeklyTotalSalesTransit,2); ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></span></span>
                                                        <span class="text"><?php $WeeklyDelivered; ?> <span class="desc" style="color:#0057ce;">&nbsp;Delivered Orders</span><span style="float:right; color:#0057ce;"><?php echo number_format($WeeklyTotalSalesDelivered,2); ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></span></span>
														
														<span class="text"><?php $WeeklyCompleted; ?> <span class="desc" style="color:#000064;">&nbsp;Completed Orders</span><span style="float:right; color:#000064;"><?php echo number_format($WeeklyTotalSalesCompleted,2); ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></span></span>
                                                        <span class="text"><?php $WeeklyFailed; ?> <span class="desc" style="color:#FF0000;">&nbsp;Failed Orders</span><span style="float:right; color:#FF0000;"><?php echo number_format($WeeklyTotalSalesFailed,2); ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></span></span>
                                                        	<span class="text"><?php $WeeklySales; ?> <span class="desc" style="color:#808000;">&nbsp;Sales Today</span><span style="float:right; color:#808000;"><?php echo number_format($WeeklyTotalSalesSales,2); ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></span></span>
														<!--<i class="icon-sitemap large-icon"></i>-->
													</div>
														</div>
														<div class="tab-pane" id="tab3">
															<div class="info-widget stats">
												 <span class="text"><?php $MonthlySales; ?> <span class="desc">&nbsp;Orders Monthly</span><span style="float:right; color:#A60000;"><?php echo number_format($MonthlyTotalSalesSales,2); ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></span></span>
														<span class="text"><?php $MonthlyAccpeted; ?> <span class="desc" style="color:#008800;">&nbsp;Accepted Orders</span><span style="float:right; color:#008800;"><?php echo number_format($MonthlyTotalSalesAccpeted,2); ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></span></span>
														<span class="text"><?php $MonthlyTransit; ?> <span class="desc" style="color:#9f0076;">&nbsp;Transit Orders</span><span style="float:right; color:#9f0076;"><?php echo number_format($MonthlyTotalSalesTransit,2); ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></span></span>
                                                        <span class="text"><?php $MonthlyDelivered; ?> <span class="desc" style="color:#0057ce;">&nbsp;Delivered Orders</span><span style="float:right; color:#0057ce;"><?php echo number_format($MonthlyTotalSalesDelivered,2); ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></span></span>
														
														<span class="text"><?php $MonthlyCompleted; ?> <span class="desc" style="color:#000064;">&nbsp;Completed Orders</span><span style="float:right; color:#000064;"><?php echo number_format($MonthlyTotalSalesCompleted,2); ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></span></span>
                                                        <span class="text"><?php $MonthlyFailed; ?> <span class="desc" style="color:#FF0000;">&nbsp;Failed Orders</span><span style="float:right; color:#FF0000;"><?php echo number_format($MonthlyTotalSalesFailed,2); ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></span></span>
                                                        	<span class="text"><?php $MonthlySales; ?> <span class="desc" style="color:#808000;">&nbsp;Sales Today</span><span style="float:right; color:#808000;"><?php echo number_format($MonthlyTotalSalesSales,2); ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></span></span
														><!--<i class="icon-sitemap large-icon"></i>-->
													</div>
														</div>
                                                        
                                                        <div class="tab-pane" id="tab4">
															<div class="info-widget stats">
														 <span class="text"><?php $YearlySales; ?> <span class="desc">&nbsp;Orders Yearly</span><span style="float:right; color:#A60000;"><?php echo number_format($YearlyTotalSalesSales,2); ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></span></span>
														<span class="text"><?php $YearlyAccpeted; ?> <span class="desc" style="color:#008800;">&nbsp;Accepted Orders</span><span style="float:right; color:#008800;"><?php echo number_format($YearlyTotalSalesAccpeted,2); ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></span></span>
														<span class="text"><?php $YearlyTransit; ?> <span class="desc" style="color:#9f0076;">&nbsp;Transit Orders</span><span style="float:right; color:#9f0076;"><?php echo number_format($YearlyTotalSalesTransit,2); ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></span></span>
                                                        <span class="text"><?php $YearlyDelivered; ?> <span class="desc" style="color:#0057ce;">&nbsp;Delivered Orders</span><span style="float:right; color:#0057ce;"><?php echo number_format($YearlyTotalSalesDelivered,2); ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></span></span>
														
														<span class="text"><?php $YearlyCompleted; ?> <span class="desc" style="color:#000064;">&nbsp;Completed Orders</span><span style="float:right; color:#000064;"><?php echo number_format($YearlyTotalSalesCompleted,2); ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></span></span>
                                                        <span class="text"><?php $YearlyFailed; ?> <span class="desc" style="color:#FF0000;">&nbsp;Failed Orders</span><span style="float:right; color:#FF0000;"><?php echo number_format($YearlyTotalSalesFailed,2); ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></span></span>
                                                        	<span class="text"><?php $YearlySales; ?> <span class="desc" style="color:#808000;">&nbsp;Sales Today</span><span style="float:right; color:#808000;"><?php echo number_format($YearlyTotalSalesSales,2); ?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></span></span>
														<!--<i class="icon-sitemap large-icon"></i>-->
													</div>
														</div>
													</div>
												</div>
												</div>
											</div>
                                            <div class="span6">
												<div class="well">
													<div class="navbar">
														<div class="navbar-inner " style="background:#5A0D16; ">
															<a class="brand" href="#" style="color:#FFFFFF;">Restaurant/User Stat</a>
														</div>
													</div>
													<div class="tabbable default sub-tabs ">
													<ul class="nav nav-tabs">
														<li style="background:#5A0D16; " ><a href="#tab5" data-toggle="tab" style="color:#FFFFFF;font-size:16px;" >Restaurants</a></li>
														<li class="" style="background:#5A0D16; "><a href="#tab6" data-toggle="tab" style="color:#FFFFFF; font-size:16px;"> Users </a></li>
														
                                                        <li class="" style="background:#5A0D16; "><a href="#tab8" data-toggle="tab" style="color:#FFFFFF;font-size:16px;">Review Stat</a></li>
                                                        
													</ul>
													<div class="tab-content">
														<div class="tab-pane active" id="tab5">
															<div class="info-widget stats">
                                                            <span class="text"> <span class="desc">&nbsp;Toatl Restaurant</span><span style="float:right; color:#A60000;"><?php echo $NumOfResta=mysql_num_rows(mysql_query("select * from tbl_restaurantAdd where id='".$_SESSION['restaurant_id']."'")); ?></span></span>
														<span class="text"> <span class="desc" style="color:#008800;">&nbsp;Actiavted Restaurants</span><span style="float:right; color:#008800;"><?php echo $NumOfRestaActivate=mysql_num_rows(mysql_query("select * from tbl_restaurantAdd where status='0' and id='".$_SESSION['restaurant_id']."'")); ?></span></span>
														<span class="text"> <span class="desc" style="color:#9f0076;">&nbsp;Dectiavted Restaurants</span><span style="float:right; color:#9f0076;"><?php echo $NumOfRestaDeActivate=mysql_num_rows(mysql_query("select * from tbl_restaurantAdd where status='1' and id='".$_SESSION['restaurant_id']."'")); ?></span></span>
                                                        <span class="text"> <span class="desc" style="color:#0057ce;">&nbsp;Featured Restaurants</span><span style="float:right; color:#0057ce;"><?php echo $NumOfRestaFeature=mysql_num_rows(mysql_query("select * from tbl_restaurantAdd where feature='1' and id='".$_SESSION['restaurant_id']."'")); ?></span></span>
														<span class="text"> <span class="desc" style="color:#F0B705;">&nbsp;Discount Restaurant</span><span style="float:right; color:#F0B705;">0</span></span>
														<span class="text"> <span class="desc" style="color:#000064;">&nbsp;Mostview Restaurant</span><span style="float:right; color:#000064;"><?php echo $NumOfRestamostView=mysql_num_rows(mysql_query("select * from tbl_restaurantAdd where mostView !='0' and id='".$_SESSION['restaurant_id']."' order by mostView desc")); ?></span></span>
                                                        <span class="text"> <span class="desc" style="color:#FF0000;">&nbsp;Most Booked Restaurant</span><span style="float:right; color:#FF0000;"><?php echo $NumOfRestaMostBooked=mysql_num_rows(mysql_query("select * from tbl_restaurantAdd where mostBooked='0' and id='".$_SESSION['restaurant_id']."' order by mostBooked desc")); ?></span></span>
                                                        	
														
														<!--<i class="icon-sitemap large-icon"></i>-->
													</div>
														</div>
														<div class="tab-pane" id="tab6">
															<div class="info-widget stats">
													<?php 
 $wdn=date("N");
			$dt2=mktime(0,0,0,date("m"),date('d'),date("Y"))-$wdn*24*3600;
			 $wKdat=date("Y-m-d",$dt2);
			$curdate =date("Y-m-d");
			$dateWek=mktime(0,0,0,date('m'),date('d'),date('Y'))-(24*3600*7);
            $dateWek=date('Y-m-d',$dateWek);
			$UserRegisterNoWeekly=mysql_num_rows(mysql_query("select * from tbl_user where joinDate<=CURDATE() AND joinDate>=$wKdat order by id desc")); 
			
			
			 $dt2=mktime(0,0,0,date("m"),01,date("Y"));
			 $wKdat= date("Y-m-d",$dt2);
			$curdate =date("Y-m-d");
			
			$UserRegisterNoMonthly=mysql_num_rows(mysql_query("select * from tbl_user where joinDate<=CURDATE() AND joinDate>=$wKdat order by id desc"));
			
			
			
			$dt2=mktime(0,0,0,01,01,date("Y"));
              $wKdat= date("Y-m-d",$dt2);
			 $hcurdate=date("Y-m-d");

			$UserRegisterNoYearly=mysql_num_rows(mysql_query("select * from tbl_user where joinDate<=CURDATE()  AND joinDate>=$wKdat order by id desc"));
			
			?>

<span class="text"> <span class="desc">&nbsp;Toatl Users</span><span style="float:right; color:#A60000;"><?php echo $UserRegisterNo=mysql_num_rows(mysql_query("select * from tbl_user order by id desc")); ?></span></span>
														<span class="text"> <span class="desc" style="color:#008800;">&nbsp;Activated Users</span><span style="float:right; color:#008800;"><?php echo $UserRegisterNoActivate=mysql_num_rows(mysql_query("select * from tbl_user where status='0' order by id desc")); ?></span></span>
														<span class="text"> <span class="desc" style="color:#9f0076;">&nbsp;Deactivated Users</span><span style="float:right; color:#9f0076;"><?php echo $UserRegisterNoDeactivate=mysql_num_rows(mysql_query("select * from tbl_user where status='1' order by id desc")); ?></span></span>
                                                        <span class="text"> <span class="desc" style="color:#0057ce;">&nbsp;IP Block Users</span><span style="float:right; color:#0057ce;"><?php echo $UserRegisterNoIPblock=mysql_num_rows(mysql_query("select * from tbl_user where ipblock='0' order by id desc")); ?></span></span>
														<span class="text"> <span class="desc" style="color:#F0B705;">&nbsp;IP UnBlock Users</span><span style="float:right; color:#F0B705;"><?php echo $UserRegisterNoUnIPblock=mysql_num_rows(mysql_query("select * from tbl_user where ipblock='1' order by id desc")); ?></span></span>
														<span class="text"> <span class="desc" style="color:#000064;">&nbsp;Today Joined Users</span><span style="float:right; color:#000064;"><?php echo $UserRegisterNoToday=mysql_num_rows(mysql_query("select * from tbl_user where joinDate='".date('Y-m-d')."' order by id desc")); ?></span></span>
                                                        <span class="text"> <span class="desc" style="color:#FF0000;">&nbsp;Weekly Joined Users</span><span style="float:right; color:#FF0000;"><?php echo $UserRegisterNoWeekly; ?></span></span>
                                                        	<span class="text"> <span class="desc" style="color:#808000;">&nbsp;Monthly Joined Users</span><span style="float:right; color:#808000;"><?php echo $UserRegisterNoMonthly; ?></span></span>
                                                            <span class="text"> <span class="desc" style="color:#990066;">&nbsp;Yearly Joined Users</span><span style="float:right; color:#990066;"><?php echo $UserRegisterNoYearly; ?></span></span>
													
														<!--<i class="icon-sitemap large-icon"></i>-->
													</div>
														</div>
														
                                                        
                                                        <div class="tab-pane" id="tab8">
															<div class="info-widget stats">
														      
                                                            <span class="text"> <span class="desc">&nbsp;Toatl Restaurant Review</span><span style="float:right; color:#A60000;"><?php echo $NoReview=mysql_num_rows(mysql_query("select * from tbl_restaurantReview where RestaurantReviewId='".$_SESSION['restaurant_id']."' order by id desc")); ?></span></span>
														<span class="text"> <span class="desc" style="color:#008800;">&nbsp;Activated Restaurant Review</span><span style="float:right; color:#008800;"><?php echo $ActNoReview=mysql_num_rows(mysql_query("select * from tbl_restaurantReview where status='0' and RestaurantReviewId='".$_SESSION['restaurant_id']."' order by id desc")); ?></span></span>
														<span class="text"> <span class="desc" style="color:#9f0076;">&nbsp;Deactivated Restaurant Review</span><span style="float:right; color:#9f0076;"><?php echo $DeacNoReview=mysql_num_rows(mysql_query("select * from tbl_restaurantReview where status='1' and RestaurantReviewId='".$_SESSION['restaurant_id']."' order by id desc")); ?></span></span>
                                                        <span class="text"> <span class="desc" style="color:#0057ce;">&nbsp;Restaurant Favourite</span><span style="float:right; color:#0057ce;"><?php echo $NoFavorite=mysql_num_rows(mysql_query("select * from favorite where hotel_id='".$_SESSION['restaurant_id']."' order by id desc")); ?></span></span>
														<!--<span class="text"> <span class="desc" style="color:#F0B705;">&nbsp;Most Restaurant Search</span><span style="float:right; color:#F0B705;">8</span></span>
														<span class="text"> <span class="desc" style="color:#000064;">&nbsp;Most Keyword Search</span><span style="float:right; color:#000064;">12</span></span>-->
                                                      
														<!--<i class="icon-sitemap large-icon"></i>-->
													</div>
														</div>
													</div>
												</div>
												</div>
											</div>
											
                                            
										</div>
                                        
                                        
                                        
                                        
										
										
										
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
									</div>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<?php include('route/footer.php'); ?>

	<!-- required js files -->
	<script src="assets/js/jquery.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>	

	<!-- charts plugin -->
	<script src="app/plugins/jquery.peity.min.js"></script>
	<script src="app/plugins/jquery.knob.js"></script>
	<script src="app/plugins/jqplot/jquery.jqplot.min.js"></script>
	<script src="app/plugins/jqplot/jqplot.highlighter.min.js"></script>
	<script src="app/plugins/jqplot/jqplot.cursor.min.js"></script>
	<script src="app/plugins/jqplot/jqplot.dateAxisRenderer.min.js"></script>
	<script src="app/plugins/jqplot/jqplot.pieRenderer.min.js"></script>
	<script src="app/plugins/jqplot/jqplot.donutRenderer.min.js"></script>
	<script src="app/plugins/jqplot/jqplot.barRenderer.min.js"></script>
	<script src="app/plugins/jqplot/jqplot.categoryAxisRenderer.min.js"></script>
	<script src="app/plugins/jqplot/jqplot.pointLabels.min.js"></script>
	
	<!-- form plugins -->
	<script src="app/plugins/jquery.elastic.js"></script>
	<script src="app/plugins/jquery.uniform.js"></script>
	<script src="app/plugins/bootstrap-datepicker.js"></script>
	<script src="app/plugins/jquery.timePicker.min.js"></script>
	<script src="app/plugins/jquery.simple-color-picker.js"></script>
	<script src="app/plugins/chosen.jquery.min.js"></script>
	<script src="app/plugins/wysihtml5/wysihtml5-0.3.0.min.js"></script>
	<script src="app/plugins/wysihtml5/bootstrap-wysihtml5.js"></script>
	<script src="app/plugins/jquery.limit-1.2.js"></script>
	<script src="app/plugins/formToWizard.js"></script>
	
	<!-- other plugins -->
	<script src="app/plugins/jquery-ui-custom/jquery-ui-1.8.22.custom.min.js"></script>
	<script src="app/plugins/DataTables/media/js/jquery.dataTables.js"></script>	
	<script src="app/plugins/jscrollpane/jquery.mousewheel.js"></script>
	<script src="app/plugins/jscrollpane/jquery.jscrollpane.min.js"></script>	
	<script src="app/plugins/fullcalendar.min.js"></script>

	<script src="assets/js/google-code-prettify/prettify.js"></script>
	
	<script src="app/plugins/jPages.min.js"></script>
	<script src="app/plugins/jquery.masonry.min.js"></script>

	<!-- js for templates -->
	<script src="app/js/custom.js"></script>
</body>

</html>
