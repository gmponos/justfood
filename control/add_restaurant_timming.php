<?php include('route/header.php'); 
include('route/DB_Functions.php');
   $dbb = new DB_Functions();
 include('route/pagination.php');
mysql_query ("set character_set_results='utf8'"); 
?>	
<div id="page-wrap">
		<!-- left sidebar -->
		<?php include('route/side_bar.php'); ?>
		<div id="main-content">
			<div id="inner">
				
				<div class="container-fluid">
					<div class="tabbable main-tabs">
						<ul class="nav nav-tabs">
							<li class="active" style="background-color:#f2f2f2;"><a href="#mainFormElements" style="background-color:#f2f2f2;" data-toggle="tab"><i class="icon-file"></i>Manage Restaurant Time Table</a></li>
						</ul>

						<div class="tab-content"  style="height:1750px;">
							<div class="tab-pane active" id="mainFormElements"  >
								<div id="itemContainer">
								
									<div class="well">
										<div class="navbar">
											<div class="navbar-inner">
												<a class="brand" href="#">Manage Restaurant Time Table </a>
											</div>
										</div>
										<div class="row-fluid">
                  <?php
		
		$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    	$limit = 10;
    	$startpoint = ($page * $limit) - $limit;
        //to make pagination
        $statement = "tbl_restaurantAdd";
		if($_GET['restaurant_id']!='' && $_GET['statusid']!='' )
		{
		$where="id='".$_GET['restaurant_id']."'  and status='".$_GET['statusid']."' ";
		$url="add_restaurant_timming.php?restaurant_id=".$_GET['restaurant_id']."&statusid=".$_GET['statusid']."&";
		
		$qur="SELECT * FROM {$statement} where id='".$_GET['restaurant_id']."' and status='".$_GET['statusid']."' LIMIT {$startpoint} , {$limit}";
		}
		elseif($_GET['restaurant_id']!='')
		{
		$where="restaurant_id='".$_GET['id']."'";
		$url="add_restaurant_timming.php?restaurant_id=".$_GET['restaurant_id']."&";
		
		$qur="SELECT * FROM {$statement} where restaurant_id='".$_GET['id']."' LIMIT {$startpoint} , {$limit}";
		}
		
		elseif($_GET['statusid']!='')
		{
		$where=" status='".$_GET['statusid']."' ";
		$url="add_restaurant_timming.php?statusid=".$_GET['statusid']."&";
		
		$qur="SELECT * FROM {$statement} where status='".$_GET['statusid']."' LIMIT {$startpoint} , {$limit}";
		}		
		else
		{
		$where="1";
		$url="add_restaurant_timming.php?Res=1&";
		
		$qur="SELECT * FROM {$statement} LIMIT {$startpoint} , {$limit}";
		}
		//echo $qur;
		 $query = mysql_query($qur);
		 $numrowdata=mysql_num_rows($query);
		 
											 ?>
                                             <script type="text/javascript">
											 function getOrgTypeListRestCityOffer(str){
//alert(str);
if (str=="")
{
document.getElementById("restaurant_city").innerHTML="";
return;} 
if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp=new XMLHttpRequest();
}
else
{// code for IE6, IE5
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange=function()
{
if (xmlhttp.readyState==4 && xmlhttp.status==200)
{
document.getElementById("restaurant_city").innerHTML=xmlhttp.responseText;
//alert(xmlhttp.responseText);
}
}
xmlhttp.open("post","cityFatchOffer1.php?q="+str,true);
xmlhttp.send();
}


function getOrgTypeListRestOffer(str){
if (str=="")
{
document.getElementById("restaurant_id").innerHTML="";
return;} 
if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp=new XMLHttpRequest();
}
else
{// code for IE6, IE5
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange=function()
{
if (xmlhttp.readyState==4 && xmlhttp.status==200)
{
document.getElementById("restaurant_id").innerHTML=xmlhttp.responseText;
}
}
xmlhttp.open("post","ResFatchOffer1.php?q="+str,true);
xmlhttp.send();
}

											 </script>
    <div class="span12">
   <form action="add_restaurant_timming.php" method="get" id="userform" name="userform">
      <table width="100%" border="0">
  <tr>
  
  <td><label for="restaurant_id">By State</label></td>
    <td>	<select data-placeholder="Select Restaurant..."  id="restaurant_state" name="restaurant_state" onchange="getOrgTypeListRestCityOffer(this.value)" style="width:180px;" >
    <option value="">Select</option>
											  <?php 
											  $StateQuery = $dbb->showtable("tbl_state","stateName","asc");
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" <?php if($_GET['restaurant_state']==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['stateName']); ?></option>
                                              <?php } ?>
											
											</select></td>
                                           
    <td><label for="restaurant_id">By City</label></td>
    <td>	<select data-placeholder="Select Restaurant..." onchange="getOrgTypeListRestOffer(this.value)"  id="restaurant_city" name="restaurant_city" style="width:180px;" >
    <option value="">Select</option>
											  <?php 
											  if($_GET['restaurant_state']!=''){
											  $StateQuery =mysql_query("select * from tbl_city where stateID='".$_GET['restaurant_state']."' order by cityName asc");
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['cityName']; ?>" <?php if($_GET['restaurant_city']==$StateData['cityName']){ ?> selected <?php } ?>><?php echo ucwords($StateData['cityName']); ?></option>
                                              <?php } }?>
											
											</select></td>
                                           
    <td><label for="restaurant_id">By Restaurant </label></td>
    <td>	<select  data-placeholder="Select Restaurant..." onChange="document.userform.submit();"  id="restaurant_id" name="restaurant_id" style="width:180px;" >
    <option value="">Select Restaurant</option>
											   <?php 
											   if($_GET['restaurant_city']!=''){
											  $StateQuery = mysql_query("select *  from tbl_restaurantAdd where restaurantCity=N'".$_GET['restaurant_city']."' order by restaurant_name asc"); 
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" <?php if($_GET['restaurant_id']==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['restaurant_name']); ?></option>
                                              
											<?php }  } ?>
											</select></td>
      <td><strong style="font-size:14px; font-weight:bold;">Status : </strong> </td>
    <td> <select  class="chzn_a span8"  name="statusid" style="width:150px;" id="statusid" onChange="document.userform.submit();" >
    <option value="">select</option>
				<option value="0" <?php if($_GET['statusid']==0){ ?> selected="selected" <?php } ?> >Activated</option>
<option value="1" <?php if($_GET['statusid']==1){ ?> selected="selected" <?php } ?> >Deactivated</option>
                </select></td>
  </tr>
</table>
    </form>
       <table width="100%" border="0">
  <tr>
  
    <td> <span class="label label-success pull-right sl_status" style="height:15px;"><strong style="padding:5px;">Total Restaurant (<?php echo $NumRes=mysql_num_rows($dbb->showtabledata("tbl_restaurantAdd","restaurant_name","asc")); ?>)</strong></span> </td>
    <td> <span class="label label-important pull-right sl_status" style="height:15px;"><strong style="padding:5px;">Total Activate Restaurant (<?php echo $NumRes=mysql_num_rows($dbb->showtabledata("tbl_restaurantAdd","status",'0')); ?>)</strong></span></td>
    <td> <span class="label label-warning pull-right sl_status" style="height:15px;"><strong style="padding:5px;">Total Deactivated Restaurant (<?php echo $NumRes=mysql_num_rows($dbb->showtabledata("tbl_restaurantAdd","status",'1')); ?>)</strong></span></td>
    <?php /*?><td> <span class="label label-info pull-right sl_status" style="height:15px;"><strong style="padding:5px;">Total Restaurant with Offer (0)</strong></span></td>
    <td> <span class="label label-inverse pull-right sl_status" style="height:15px;"><strong style="padding:5px;">Total Restaurant with Event (0)</strong></span></td><?php */?>
  </tr>
</table>
<br />
    
		<table  class="table table-striped table-condensed table-bordered">
			<thead>
            
				<tr>
				
					<th>Name</th>
				
					<th>Option</th>
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
				
					<td>
                    <?php if($row['restaurant_Logo']!=''){ ?>
                    <img src="restaurantlogoimg/small/<?php echo $row['restaurant_Logo'];?>" width="150" height="90" style="margin-left:5px;" />
                    <?php } else { ?>
                    <img src="img/no.jpg" width="150" height="90" style="margin-left:5px;" />
                    <?php } ?>
                    <br>
                    <p align="center"><strong style="color:#000099; font-size:16px;" ><?php echo ucwords($row['restaurant_name']);?></strong></p>
                    <p align="center"><?php echo ucwords($row['restaurant_address']);?></p>
                    </td>
                    
					<td>
                    <p>
						      <a href="add_restaurant_timming_alcohal.php?restaurant_id=<?php echo $row['id'];?>" class="btn btn-warning" title="Update Served Alcohol for selecting Restaurant" style="padding:10px; width:100px;">Served Alcohol</a>
                               <a href="add_restaurant_timming_buffet.php?restaurant_id=<?php echo $row['id'];?>" class="btn btn-tigadua" title="Update Buffet Time for selecting Restaurant" style="padding:10px; width:95px;">Buffet Time</a>
                         <a href="add_restaurant_timming_delivery.php?restaurant_id=<?php echo $row['id'];?>" class="btn btn-empatenam" title="Update Delivery Time for selecting Restaurant" style="padding:10px; width:95px;">Delivery Time</a>
                       
						<a href="add_restaurant_timming_takeaway.php?restaurant_id=<?php echo $row['id'];?>" class="btn btn-primary" title="Update Takeaway Time for selecting Restaurant" style="padding:10px; width:100px;">Takeaway Time</a>
                        <a href="add_restaurant_timming_table.php?restaurant_id=<?php echo $row['id'];?>" class="btn btn-tigadua" title="Update Table Booking Time for selecting Restaurant" style="padding:10px; width:110px;">Table Booking</a>
                        
                        
                         
                      
                        
                        </p>
                        
                      
					</td>
				</tr>
                  <?php
												$count++;
												 }
												 } else { 
												  ?>
                                                <tr><td colspan="10" align="center"><strong style="color:#D20000; padding:5px; font-size:14px;">No Restaurant Time Table is available in current Database.</strong></td></tr>
                                                <?php } ?>
                
				
			</tbody>
		</table>
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
