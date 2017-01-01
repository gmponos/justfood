<?php include('route/header.php'); 
include('route/DB_Functions.php');
$dbb = new DB_Functions();
include('route/pagination.php');
mysql_query ("set character_set_results='utf8'"); 
if($_GET['eid']!='')
{
 $CuisineQuery = $dbb->showtabledata("tbl_comercialBanner","id",$_GET['eid']);
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
}
if(isset($_POST['deleteall'])) {
	$id_array = $_POST['data']; // return array
	$id_count = count($_POST['data']); // count array
	for($i=0; $i <$id_count; $i++) {
		$id = $id_array[$i];
		$query = mysql_query("DELETE FROM `tbl_comercialBanner` WHERE `id` = '$id'");
		if(!$query) { 
		header("location:manage_commercialBannerCategory.php");
		}
	}
	
	 // redirent after deleting
}
if(isset($_POST['activateall'])) {
	$id_array = $_POST['data']; // return array
	$id_count = count($_POST['data']); // count array
	for($i=0; $i <$id_count; $i++) {
		$id = $id_array[$i];
		$query = mysql_query("update `tbl_comercialBanner` set status='0' WHERE `id` = '$id'");
		if(!$query) { 
		header("location:manage_commercialBannerCategory.php");
		}
	}
	
	 // redirent after deleting
}


if(isset($_POST['dactivateall'])) 
{
	$id_array = $_POST['data']; // return array
	$id_count = count($_POST['data']); // count array
	for($i=0; $i <$id_count; $i++) {
		$id = $id_array[$i];
		$query = mysql_query("update `tbl_comercialBanner` set status='1' WHERE `id` = '$id'");
		if(!$query) 
		{ 
		header("location:manage_commercialBannerCategory.php");
		}
	}
	
	 // redirent after deleting
}

 ?>	
 <link href="css/pagination.css" rel="stylesheet" type="text/css" />
<link href="css/B_red.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"> </script> <!--- include the live jquery library -->
<script type="text/javascript" src="js/script.js"></script> 	
<div id="page-wrap">
		<!-- left sidebar -->
		<?php include('route/side_bar.php'); ?>

		<div id="main-content">
			<div id="inner">
				
				<div class="container-fluid">
					<div class="tabbable main-tabs">
						<ul class="nav nav-tabs">
							<li class="active" style="background-color:#f2f2f2;"><a href="#mainFormElements" style="background-color:#f2f2f2;" data-toggle="tab"><i class="icon-file"></i>Restaurant Commercial Banner</a></li>
						</ul>

						<div class="tab-content"  style="height:1750px;">
							<div class="tab-pane active" id="mainFormElements"  >
								<div id="itemContainer">
								
									<div class="well">
										<div class="navbar">
											<div class="navbar-inner">
												<a class="brand" href="#">Restaurant Commercial Banner </a>
											</div>
										</div>
                                          <div>  
										
										<?php
											if($_GET['dmsg']!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Commercial Banner has been successfully deleted.
		                                     </div>
											<?php }?>
                                            
                                            
                                             <?php
											if($_GET['amsg']==1)
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Commercial Banner has been successfully actiavted/Deactivated.
		                                     </div>
											<?php }?></div>
										<div class="row-fluid">
                                         <?php
		$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    	$limit = 10;
    	$startpoint = ($page * $limit) - $limit;
        //to make pagination
        $statement = "tbl_comercialBanner";
		if($_GET['BannerByCategory']!='')
		{
		$url="manage_commercialBannerCategory.php?BannerByCategory=".$_GET['BannerByCategory']."&";
		$where="BannerByCategory=N'".$_GET['BannerByCategory']."' and bannerPage='3'";
		$qur="SELECT * FROM {$statement} where BannerByCategory=N'".$_GET['BannerByCategory']."' LIMIT {$startpoint} , {$limit}";
		}
		elseif($_GET['BannerByService']!='')
		{
		$url="manage_commercialBannerCategory.php?BannerByService=".$_GET['BannerByService']."&";
		$where="BannerByService=N'".$_GET['BannerByService']."' and bannerPage='3'";
		
		$qur="SELECT * FROM {$statement} where BannerByService=N'".$_GET['BannerByService']."' and bannerPage='3' LIMIT {$startpoint} , {$limit}";
		}
		elseif($_GET['BannerByService']!='')
		{
		$url="manage_commercialBannerCategory.php?BannerByService=".$_GET['BannerByService']."&";
		$where="BannerByService=N'".$_GET['BannerByService']."' and bannerPage='3'";
		
		$qur="SELECT * FROM {$statement} where BannerByService=N'".$_GET['BannerByService']."' and bannerPage='3' LIMIT {$startpoint} , {$limit}";
		}	
		elseif($_GET['bannerExpiredStatus']!='')
		{
		$url="manage_commercialBannerCategory.php?bannerExpiredStatus=".$_GET['bannerExpiredStatus']."&";
		$where="bannerExpiredStatus='".$_GET['bannerExpiredStatus']."' and bannerPage='3'";
		
		$qur="SELECT * FROM {$statement} where bannerExpiredStatus='".$_GET['bannerExpiredStatus']."' and bannerPage='3' LIMIT {$startpoint} , {$limit}";
		}
		elseif($_GET['statusid']!='')
		{
		$url="manage_commercialBannerCategory.php?statusid=".$_GET['statusid']."&";
		$where="status='".$_GET['statusid']."' and bannerPage='3'";
		$qur="SELECT * FROM {$statement} where status='".$_GET['statusid']."' and bannerPage='3' LIMIT {$startpoint} , {$limit}";
		}				
		else
		{
		$url="manage_commercialBannerCategory.php?bannerPage=1&";
		$where=" bannerPage='3'";
		$qur="SELECT * FROM {$statement} where bannerPage='3' LIMIT {$startpoint} , {$limit}";
		}
		//echo $qur;
		 $query = mysql_query($qur);
		 $numrowdata=mysql_num_rows($query);
		 
											 ?>
    <div class="span12">
    
    <form action="manage_commercialBannerCategory.php" method="get" id="userform" name="userform">
      <table width="100%" border="0">
  <tr>
  
  <td><label for="Name"> Category Type</label></td>
    <td>
    <select class="chzn-select"  id="BannerByCategory" name="BannerByCategory" onChange="document.userform.submit();" style="width:160px;" >
											  <?php 
											  $StateQuery = $dbb->showtable("tbl_restaurantType","restaurant_type_name","asc");
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['restaurant_name']; ?>" <?php if($_GET['BannerByCategory']==$StateData['restaurant_name']){ ?> selected <?php } ?>><?php echo ucwords($StateData['restaurant_name']); ?></option>
                                              <?php } ?>
											
											</select>
    </td>
    
     <td><label for="Name">Restaurant Service</label></td>
    <td>
    <select class="chzn-select"  id="BannerByService" name="BannerByService" onChange="document.userform.submit();" style="width:160px;" >
									<?php $StateQuery = $dbb->showtable("tbl_restaurantService","restaurant_service_name","asc");
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                               <option value="<?php echo $StateData['restaurant_service_name']; ?>" <?php if($_GET['BannerByService']==$StateData['restaurant_service_name']){ ?> selected <?php } ?>><?php echo ucwords($StateData['restaurant_service_name']); ?></option>
                                              <?php } ?>
											
											</select>
    </td>
     <td><label for="Name"> Expired</label></td>
    <td>
    <select  id="bannerExpiredStatus" name="bannerExpiredStatus" onChange="document.userform.submit();" style="width:100px;" >
							<option value="0" <?php if($_GET['statusid']==0){ ?> selected="selected" <?php } ?> >Activated</option>
<option value="1" <?php if($_GET['statusid']==1){ ?> selected="selected" <?php } ?> >Deactivated</option>
											
											</select>
    </td>
    
      <td><strong style="font-size:14px; font-weight:bold;">Status : </strong> </td>
    <td> <select   name="statusid" style="width:100px;" id="statusid" onChange="document.userform.submit();" >
    <option value="">select</option>
				<option value="0" <?php if($_GET['statusid']==0){ ?> selected="selected" <?php } ?> >Activated</option>
<option value="1" <?php if($_GET['statusid']==1){ ?> selected="selected" <?php } ?> >Deactivated</option>
                </select></td>
  </tr>
</table>
    </form>
    
   

		<form name="frmproduct" method="post">
										<table class="table table-bordered">
			
				<?php if($numrowdata>0){ ?>
                                               <tr  id="alldispaly" style="display:none;">
													<td colspan="5" align="right" style="margin-left:200px;"><input name="deleteall" id="deleteall" class="btn btn-warning" title="Delete All Commercial Banner" value="Delete All" onClick="return confirm('Are you sure to delete selected Commercial Banner');"  type="submit">&nbsp;<input name="activateall" id="activateall" class="btn btn-warning" title="Activate All Commercial Banner" value="Activate All" onClick="return confirm('Are you sure to activate selected Commercial Banner.');"  type="submit">&nbsp;<input name="dactivateall" id="dactivateall" class="btn btn-warning" title="Deactivate All Commercial Banner" value="Deactivate All" onClick="return confirm('Are you sure to deactivate selected Commercial Banner');"  type="submit"></td></tr>
                                                    <?php } ?>
												<tr>
                                                <th><input type="checkbox" id="check_all" value=""></th>
												  <th>#</th>
                                                   <th>Catgeory Name</th>
                                                    <th>Service Name</th>
                                                  <th> Start Date</th>
                                                  <th> Expired Date</th>
                                                  <th> Limit</th>
                                                     <th> Expired Status</th>
												<th>Home </th>
                                               
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
                                            <?php
		if($numrowdata>0)
			{
            $count=1;
		
        	while ($row = mysql_fetch_assoc($query)) {
			
        ?>
												<tr>
                                                <td><input type="checkbox" value="<?php echo $row['id']; ?>" name="data[]" id="data"></td>
													<td><?php echo $count; ?></td>
                                                    <td><?php echo $row['BannerByCategory'];?></td>
                                                     <td><?php echo $row['BannerByService'];?></td>
                                                      <td><?php echo $row['created_date'];?></td>
                                                       <td><?php echo $row['BannerExpireDate'];?></td>
                                                        <td><?php echo $row['BannerTimeLimit'];?> Days</td>
                                                     <td><?php
													  if($row['bannerExpiredStatus']==1)
													  {
													  echo 'Yes';
													  }
													  if($row['bannerExpiredStatus']==0)
													  {
													  echo 'No';
													  }
													   ?></td>
                                                      <td><?php
													  if($row['HomeDisplay']==1)
													  {
													  echo 'Yes';
													  }
													  if($row['HomeDisplay']==0)
													  {
													  echo 'No';
													  }
													   ?></td>
                                                       
                                                 
													<td>	
                      
                      <a href="addBannerbyCategoryNService.php?eid=<?php echo $row['id'];?>" class="btn btn-dualima" title="Edit Restaurant Commercial Banner" >View/Edit</a>
                     <a href="InsertPhp.php?tag=ResBannerDelete&eid=<?php echo $row['id'];?>" class="btn btn-dualima" title="Delete Commercial Banner" onClick="javascript:return confirm('are you sure to delete permanently')" >Delete</a>
                        
                           <?php if($row['status']==0){ ?>
                        <a href="InsertPhp.php?tag=ResBannerActivate&active=1&statusid=<?php echo $row['id'];?>" class="btn btn-duasembilan" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Restaurant Commercial Banner">Activated</a><?php } else {?>
                        <a href="InsertPhp.php?tag=ResBannerActivate&active=0&statusid=<?php echo $row['id'];?>" class="btn btn-tigaempat" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Restaurant Commercial Banner">
                        Deactivated</a>
                          <?php } ?>
                          
                     </td>
												</tr>
                                                <?php
												$count++;
												 }
												 } else { 
												  ?>
                                                <tr><td colspan="10" align="center"><strong style="color:#D20000; padding:5px; font-size:14px;">No Commercial Banner is available in current Database.</strong></td></tr>
                                                <?php } ?>
                                                
												
											</tbody>
										</table>
                                       
                                        </form>
                                        
                                           <table width="100%" style="margin-left:100px;">
                                        <tr><td align="center" ><?php echo pagination($statement,$where,$limit,$page,$url);?></td></tr>
                                        </table>
		
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
