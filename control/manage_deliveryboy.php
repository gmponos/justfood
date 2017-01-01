<?php include('route/header.php'); 
include('route/DB_Functions.php');
   $dbb = new DB_Functions();
 include('route/pagination.php');
mysql_query ("set character_set_results='utf8'"); 
if($_GET['eid']!='')
{
 $CuisineQuery = $dbb->showtabledata("tbl_resDeliveryBoy","id",$_GET['eid']);
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
}
if(isset($_POST['deleteall'])) {
	$id_array = $_POST['data']; // return array
	$id_count = count($_POST['data']); // count array
	for($i=0; $i <$id_count; $i++) {
		$id = $id_array[$i];
		$query = mysql_query("DELETE FROM `tbl_resDeliveryBoy` WHERE `id` = '$id'");
		if(!$query) { 
		header("location:manage_deliveryboy.php");
		}
	}
	
	 // redirent after deleting
}
if(isset($_POST['activateall'])) {
	$id_array = $_POST['data']; // return array
	$id_count = count($_POST['data']); // count array
	for($i=0; $i <$id_count; $i++) {
		$id = $id_array[$i];
		$query = mysql_query("update `tbl_resDeliveryBoy` set status='0' WHERE `id` = '$id'");
		if(!$query) { 
		header("location:manage_deliveryboy.php");
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
		$query = mysql_query("update `tbl_resDeliveryBoy` set status='1' WHERE `id` = '$id'");
		if(!$query) 
		{ 
		header("location:manage_deliveryboy.php");
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
							<li class="active" style="background-color:#f2f2f2;"><a href="#mainFormElements" style="background-color:#f2f2f2;" data-toggle="tab"><i class="icon-file"></i>Manage Delivery Boy</a></li>
						</ul>

						<div class="tab-content"  style="height:1750px;">
							<div class="tab-pane active" id="mainFormElements"  >
								<div id="itemContainer">
								
									<div class="well">
										<div class="navbar">
											<div class="navbar-inner">
												<a class="brand" href="#">Manage Delivery Boy</a>
											</div>
										</div>
                                         <div>  
										<?php if($_GET['msg']==1)
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" /> New Manage Delivery Boy has been successfully saved
		                                     </div>
											<?php } if($_GET['error']==1){?>
											<div id="display-error">
			                                 <img src="img/error.png" alt="Error" />New Manage Delivery Boy is already exit.
		                                     </div>
                                            <?php } ?>
										<?php
											if($_GET['dmsg']!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Manage Delivery Boy has been successfully deleted.
		                                     </div>
											<?php }?>
                                            
                                            
                                             <?php
											if($_GET['amsg']==1)
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Manage Delivery Boy has been successfully actiavted/Deactivated.
		                                     </div>
											<?php }?></div>
										<div class="row-fluid">
    <div class="span12">
     <?php
		if($_GET['f']!='')
		{
		$filed=$_GET['f'];
		}
		else
		{
		$filed="DeliveryBoyName";
		}	 
		if($_GET['sort']!='')
		{
		$sortBy='order by '.$filed.' '.$_GET['sort'];
		}
		else
		{
		$sortBy='order by '.$filed.'  asc';
		}
		$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    	$limit = 10;
    	$startpoint = ($page * $limit) - $limit;
        //to make pagination
        $statement = "tbl_resDeliveryBoy";
		if($_GET['restaurant_id']!='' && $_GET['statusid']!='' && $_GET['ipstatus']!='' )
		{
		
		$url="manage_deliveryboy.php?restaurant_id=".$_GET['restaurant_id']."&ipstatus=".$_GET['ipstatus']."&statusid=".$_GET['statusid']."&";
		$where="DeliveryBoyRestaurantID='".$_GET['restaurant_id']."' and ipblock='".$_GET['ipstatus']."' and status='".$_GET['statusid']."'";
		
		
		$qur="SELECT * FROM {$statement} where DeliveryBoyRestaurantID='".$_GET['restaurant_id']."' and ipblock='".$_GET['ipstatus']."' and status='".$_GET['statusid']."' $sortBy LIMIT {$startpoint} , {$limit}";
		}
		elseif($_GET['restaurant_id']!='' && $_GET['statusid']!='')
		{		
		
		$url="manage_deliveryboy.php?restaurant_id=".$_GET['restaurant_id']."&statusid=".$_GET['statusid']."&";
		$where="DeliveryBoyRestaurantID='".$_GET['restaurant_id']."' and status='".$_GET['statusid']."'";
		
		$qur="SELECT * FROM {$statement} where DeliveryBoyRestaurantID='".$_GET['restaurant_id']."' and status='".$_GET['statusid']."' $sortBy LIMIT {$startpoint} , {$limit}";
		}
		
		elseif($_GET['restaurant_id']!='' && $_GET['ipstatus']!='')
		{
		$url="manage_deliveryboy.php?restaurant_id=".$_GET['restaurant_id']."&ipstatus=".$_GET['ipstatus']."&";
		$where="DeliveryBoyRestaurantID='".$_GET['restaurant_id']."' and ipblock='".$_GET['ipstatus']."' ";
		
		$qur="SELECT * FROM {$statement} where DeliveryBoyRestaurantID='".$_GET['restaurant_id']."' and ipblock='".$_GET['ipstatus']."' $sortBy LIMIT {$startpoint} , {$limit}";
		}
		
		elseif($_GET['restaurant_id']!='')
		{
		
		$url="manage_deliveryboy.php?restaurant_id=".$_GET['restaurant_id']."&";
		$where="DeliveryBoyRestaurantID='".$_GET['restaurant_id']."' ";
		
		$qur="SELECT * FROM {$statement} where DeliveryBoyRestaurantID='".$_GET['restaurant_id']."' $sortBy LIMIT {$startpoint} , {$limit}";
		}
		
		elseif($_GET['statusid']!='')
		{
		$url="manage_deliveryboy.php?statusid=".$_GET['statusid']."&";
		$where=" status='".$_GET['statusid']."'";
		
		$qur="SELECT * FROM {$statement} where status='".$_GET['statusid']."' $sortBy LIMIT {$startpoint} , {$limit}";
		}
		
		elseif($_GET['ipstatus']!='')
		{
		
		$url="manage_deliveryboy.php?ipstatus=".$_GET['ipstatus']."&";
		$where="ipblock='".$_GET['ipstatus']."'";
		
		$qur="SELECT * FROM {$statement} where ipblock='".$_GET['ipstatus']."' $sortBy LIMIT {$startpoint} , {$limit}";
		}		
		else
		{
		$url="manage_deliveryboy.php?DeliveryBoy=1&";
		$where=" 1";
		
		$qur="SELECT * FROM {$statement} $sortBy LIMIT {$startpoint} , {$limit}";
		}
		//echo $qur;
		 $query = mysql_query($qur);
		 $numrowdata=mysql_num_rows($query);
		?>
 <script type="text/javascript">
 function submitURL(Dvalue,str,restaurantState1,restaurantCity1,statusid1)
{
window.location.href="manage_deliveryboy.php?restaurant_id="+restaurantState1+"&ipstatus="+restaurantCity1+"&statusid"+statusid1+"&sort="+str+"&f="+Dvalue
}
</script>
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
                                             <br />
    <form action="manage_deliveryboy.php" method="get" id="userform" name="userform">
      <table width="100%" border="0">
  <tr>
  
  
    <td>	<select data-placeholder="Select Restaurant..."  id="restaurant_state" name="restaurant_state" onchange="getOrgTypeListRestCityOffer(this.value)" style="width:180px;" >
    <option value="">By State</option>
											  <?php 
											  $StateQuery = $dbb->showtable("tbl_state","stateName","asc");
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" <?php if($_GET['restaurant_state']==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['stateName']); ?></option>
                                              <?php } ?>
											
											</select></td>
                                           
  
    <td>	<select data-placeholder="Select Restaurant..." onchange="getOrgTypeListRestOffer(this.value)"  id="restaurant_city" name="restaurant_city" style="width:180px;" >
    <option value="">By City</option>
											  <?php 
											  if($_GET['restaurant_state']!=''){
											  $StateQuery =mysql_query("select *  from tbl_city where stateID='".$_GET['restaurant_state']."' order by cityName asc");
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['cityName']; ?>" <?php if($_GET['restaurant_city']==$StateData['cityName']){ ?> selected <?php } ?>><?php echo ucwords($StateData['cityName']); ?></option>
                                              <?php } }?>
											
											</select></td>
                                           
   
    <td>	<select  data-placeholder="Select Restaurant..." onChange="document.userform.submit();"  id="restaurant_id" name="restaurant_id" style="width:180px;" >
    <option value="">By Restaurant</option>
											  <?php 
											   if($_GET['restaurant_city']!=''){
											  $StateQuery = mysql_query("select *  from tbl_restaurantAdd where restaurantCity=N'".$_GET['restaurant_city']."' order by restaurant_name asc"); 
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" <?php if($_GET['restaurant_id']==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['restaurant_name']); ?></option>
                                              
											<?php }  } ?>
											</select></td>
    <td> <select  class="chzn_a span8"  name="statusid" style="width:150px;" id="statusid" onChange="document.userform.submit();" >
    <option value="">By Status</option>
				<option value="0" <?php if($_GET['statusid']==0){ ?> selected="selected" <?php } ?> >Activated</option>
<option value="1" <?php if($_GET['statusid']==1){ ?> selected="selected" <?php } ?> >Deactivated</option>
                </select></td>
                
    <td> <select  class="chzn_a span8"  name="ipstatus" style="width:150px;" id="ipstatus" onChange="document.userform.submit();" >
    <option value="">IP Status</option>
				<option value="0" <?php if($_GET['ipstatus']==0){ ?> selected="selected" <?php } ?> >Unblock IP </option>
<option value="1" <?php if($_GET['ipstatus']==1){ ?> selected="selected" <?php } ?> >Block IP</option>
                </select></td>
  </tr>
</table>
    </form>
                                      
    
      <table width="100%" border="0">
  <tr>
    <td> <span class="label label-success pull-right sl_status" style="line-height:23px;"><strong style="padding:5px;">Total Delivery Boy(<?php echo $NumRes=mysql_num_rows($dbb->showtabledata("tbl_resDeliveryBoy","DeliveryBoyName","asc")); ?>)</strong></span> </td>
    <td> <span class="label label-important pull-right sl_status" style="line-height:23px;"><strong style="padding:5px;">Total Activated Delivery Boy (<?php echo $NumRes=mysql_num_rows($dbb->showtabledata("tbl_resDeliveryBoy","status",'0')); ?>)</strong></span></td>
    <td> <span class="label label-warning pull-right sl_status" style="line-height:23px;"><strong style="padding:5px;">Total Deactiaved Delivery Boy (<?php echo $NumRes=mysql_num_rows($dbb->showtabledata("tbl_resDeliveryBoy","status",'1')); ?>)</strong></span></td>
    <td> <span class="label label-info pull-right sl_status" style="line-height:23px;"><strong style="padding:5px;">Total IP Blocked Delivery Boy (<?php echo $NumRes=mysql_num_rows($dbb->showtabledata("tbl_resDeliveryBoy","ipblock",'0')); ?>)</strong></span></td>
    <td> <span class="label label-inverse pull-right sl_status" style="line-height:23px;"><strong style="padding:5px;">Total IP Unblocked Delivery Boy (<?php echo $NumRes=mysql_num_rows($dbb->showtabledata("tbl_resDeliveryBoy","ipblock",'1')); ?>)</strong></span></td>
  </tr>
</table>

<br />
		  <form name="frmproduct" method="post">
										<table class="table table-bordered">
			
				<?php if($numrowdata>0){ ?>
                                            <tr  id="alldispaly" style="display:none;">
													<td colspan="6" align="right" style="margin-left:200px;"><input name="deleteall" id="deleteall" class="btn btn-warning" title="Delete All Delivery Boy" value="Delete All" onClick="return confirm('Are you sure to delete selected Delivery Boy');"  type="submit">&nbsp;<input name="activateall" id="activateall" class="btn btn-warning" title="Activate All Delivery Boy" value="Activate All" onClick="return confirm('Are you sure to activate selected Delivery Boy');"  type="submit">&nbsp;<input name="dactivateall" id="dactivateall" class="btn btn-warning" title="Deactivate All Delivery Boy" value="Deactivate All" onClick="return confirm('Are you sure to Deactivated selected Delivery Boy');"  type="submit"></td></tr>
                                                    <?php } ?>
												<tr>
                                                <th><input type="checkbox" id="check_all" value=""></th>
													<th>#</th>
                                                       <th><?php
													if($_GET['sort']=='asc'){
													$pl='desc';
													$imgSort='<img src="sortasc.png" style="float:right;" />';
													}
													elseif($_GET['sort']=='desc'){
													$pl='asc';
													$imgSort='<img src="sortdesc.png" style="float:right;" />';
													}
													else
													{
													$pl='asc';
													$imgSort='<img src="sortasc.png" style="float:right;" />';
													}
													 ?>
                                                     <a onclick="submitURL('DeliveryBoyRestaurantID','<?php echo $pl;?>','<?php echo $_GET['restaurant_id'];?>','<?php echo $_GET['ipstatus'];?>','<?php echo $_GET['statusid'];?>');" style="cursor:pointer;">Restaurant  
                                                     <?php echo $imgSort;?>
                                                   </a></th>
													<th><a onclick="submitURL('DeliveryBoyName','<?php echo $pl;?>','<?php echo $_GET['restaurant_id'];?>','<?php echo $_GET['ipstatus'];?>','<?php echo $_GET['statusid'];?>');" style="cursor:pointer;">Name  
                                                     <?php echo $imgSort;?>
                                                   </a></th>
                                                    <th><a  style="cursor:pointer;">Address</a></th>
                                                    <th><a  style="cursor:pointer;">Delivery Area</a></th>
													<!--<th>Email ID</th>-->
                                                   <!-- <th>Mobile No</th>-->
                                                 
													<th><a  style="cursor:pointer;">Action</a></th>
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
                                                    <td><?php 
													 $StQuery = mysql_fetch_assoc($dbb->showtabledata("tbl_restaurantAdd","id",$row['DeliveryBoyRestaurantID']));
													echo ucwords($StQuery['restaurant_name']);?></td>
                                                     <td><?php echo ucwords($row['DeliveryBoyName']);?></td>
                                                      <td><?php echo ucwords($row['DeliveryBoyAddress']);?></td>
													<td><?php echo ucwords($row['DeliveryBoyArea']);?></td>
												
                                              <?php /*?>  <td><?php echo ucwords($row['DeliveryBoyEmailID']);?></td><?php */?>
                                               <?php /*?>  <td><?php echo ucwords($row['DeliveryBoyMobileNo']);?></td><?php */?>
                                                 
													<td>	<a href="add_new_deliveryboy.php?eid=<?php echo $row['id'];?>" class="btn btn-primary" title="Edit Delivery Boy">Edit</a>
                        <?php /*?> <a href="delivery_boy_details.php?ViewId=<?php echo $row['id'];?>" class="btn btn-primary" title="Edit Delivery Boy">View</a><?php */?>
						<a href="InsertPhp.php?tag=ResDeliveryBoyDelete&eid=<?php echo $row['id'];?>" class="btn btn-dualima" title="Delete Delivery Boy" onClick="javascript:return confirm('are you sure to delete permanently')" >Delete</a>
                        <?php if($row['status']==0){ ?>
                        <a href="InsertPhp.php?tag=ResDeliveryBoyActivate&active=1&statusid=<?php echo $row['id'];?>" class="btn btn-duasembilan" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Delivery Boy">Activated</a><?php } else {?>
                        <a href="InsertPhp.php?tag=ResDeliveryBoyActivate&active=0&statusid=<?php echo $row['id'];?>" class="btn btn-tigaempat" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Delivery Boy">
                        Deactivated</a>
                          <?php } ?>
                          
                           <?php if($row['ipblock']==0){ ?>
                        <a href="InsertPhp.php?tag=ResDeliveryBoyIPActivate&ipactive=1&statusid=<?php echo $row['id'];?>" class="btn btn-warning" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate IP Block">IP Block</a><?php } else {?>
                        <a href="InsertPhp.php?tag=ResDeliveryBoyIPActivate&ipactive=0&statusid=<?php echo $row['id'];?>" class="btn btn-warning" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate IP Block">
                        IP UnBlock</a>
                          <?php } ?>
                     </td>
												</tr>
                                                <?php
												$count++;
												 }
												 } else { 
												  ?>
                                                <tr><td colspan="10" align="center"><strong style="color:#D20000; padding:5px; font-size:14px;">No Restaurant Delivery Boy is available in current Database.</strong></td></tr>
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
