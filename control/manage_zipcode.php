<?php include('route/header.php'); ?>	
<?php
include('route/DB_Functions.php');
$dbb = new DB_Functions();
include('route/pagination.php');
mysql_query ("set character_set_results='utf8'"); 
if($_GET['eid']!='')
{
 $CuisineQuery = $dbb->showtabledata("tbl_PostcodeArea","id",$_GET['eid']);
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
}
if(isset($_POST['deleteall'])) {
	$id_array = $_POST['data']; // return array
	$id_count = count($_POST['data']); // count array
	for($i=0; $i <$id_count; $i++) {
		$id = $id_array[$i];
		$query = mysql_query("DELETE FROM `tbl_PostcodeArea` WHERE `id` = '$id'");
		if(!$query) { 
		header("location:manage_zipcode.php");
		}
	}
	
	 // redirent after deleting
}
if(isset($_POST['activateall'])) {
	$id_array = $_POST['data']; // return array
	$id_count = count($_POST['data']); // count array
	for($i=0; $i <$id_count; $i++) {
		$id = $id_array[$i];
		$query = mysql_query("update `tbl_PostcodeArea` set status='0' WHERE `id` = '$id'");
		if(!$query) { 
		header("location:manage_zipcode.php");
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
		$query = mysql_query("update `tbl_PostcodeArea` set status='1' WHERE `id` = '$id'");
		if(!$query) 
		{ 
		header("location:manage_zipcode.php");
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
							<li class="active" style="background-color:#f2f2f2;"><a href="#mainFormElements" style="background-color:#f2f2f2;" data-toggle="tab"><i class="icon-file"></i>Manage Zipcode</a></li>
						</ul>

						<div class="tab-content"  style="height:1200px;">
							<div class="tab-pane active" id="mainFormElements"  >
								<div id="itemContainer">
								
									<div class="well" id="manage">
										<div class="navbar">
											<div class="navbar-inner">
												<a class="brand" href="#">Display Zipcode</a>
											</div>
										</div>
                                        <div>  
										<?php if($_GET['msg']==1)
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" /> New Zipcode has been successfully saved
		                                     </div>
											<?php } if($_GET['error']==1){?>
											<div id="display-error">
			                                 <img src="img/error.png" alt="Error" />New Zipcode is already exit.
		                                     </div>
                                            <?php } ?>
										<?php
											if($_GET['dmsg']!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Zipcode has been successfully deleted.
		                                     </div>
											<?php }?>
                                            
                                            
                                             <?php
											if($_GET['amsg']==1)
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Zipcode has been successfully actiavted/Deactivated.
		                                     </div>
											<?php }?></div>
                                              <?php
		if($_GET['f']!='')
		{
		$filed=$_GET['f'];
		}
		else
		{
		$filed="delivery_areaName";
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
        $statement = "tbl_PostcodeArea";
		if($_GET['countryID']!='' && $_GET['stateID']!='' && $_GET['cityName']!='')
		{
		
		$url="manage_zipcode.php?countryID=".$_GET['countryID']."&stateID=".$_GET['stateID']."&cityName=".$_GET['cityName']."&";
		$where="countryID='".$_GET['countryID']."' and cityName=N'".$_GET['cityName']."' and stateID='".$_GET['stateID']."'";
		
		$qur="SELECT * FROM {$statement} where countryID='".$_GET['countryID']."' and cityName=N'".$_GET['cityName']."' and stateID='".$_GET['stateID']."' $sortBy LIMIT {$startpoint} , {$limit}";
		}
		elseif($_GET['countryID']!='' && $_GET['stateID']!='')
		{
		
		$url="manage_zipcode.php?countryID=".$_GET['countryID']."&stateID=".$_GET['stateID']."&";
		$where="countryID='".$_GET['countryID']."' and stateID='".$_GET['stateID']."'";
		
		$qur="SELECT * FROM {$statement} where countryID='".$_GET['countryID']."' and stateID='".$_GET['stateID']."' $sortBy LIMIT {$startpoint} , {$limit}";
		}
		elseif($_GET['statusid']!='')
		{
		$url="manage_zipcode.php?statusid=".$_GET['statusid']."&";
		$where="status='".$_GET['statusid']."'";
		
		$qur="SELECT * FROM {$statement} where status='".$_GET['statusid']."' $sortBy LIMIT {$startpoint} , {$limit}";
		}
		
		elseif($_GET['statusid']!='' && $_GET['countryID']!='' && $_GET['stateID']!='')
		{
		
		$url="manage_zipcode.php?countryID=".$_GET['countryID']."&stateID=".$_GET['stateID']."&statusid=".$_GET['statusid']."&";
		$where="countryID='".$_GET['countryID']."' and status='".$_GET['statusid']."' and stateID='".$_GET['stateID']."'";
		
		$qur="SELECT * FROM {$statement} where countryID='".$_GET['countryID']."' and status='".$_GET['statusid']."' and stateID='".$_GET['stateID']."' $sortBy LIMIT {$startpoint} , {$limit}";
		}
		else
		{
		$url="manage_zipcode.php?";
		$where="1";
		
		$qur="SELECT * FROM {$statement} $sortBy LIMIT {$startpoint} , {$limit}";
		}
		//echo $qur;
		 $query = mysql_query($qur);
		 $numrowdata=mysql_num_rows($query);
		 
											 ?>
                                             
<script  type="text/javascript"  language="javascript">
function getOrgTypeListRest(str){
if (str=="")
{
document.getElementById("stateID").innerHTML="";
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
document.getElementById("stateID").innerHTML=xmlhttp.responseText;
}
}
xmlhttp.open("post","stateFatch2.php?q="+str,true);
xmlhttp.send();
}


function getOrgTypeListRestCity(str){
if (str=="")
{
document.getElementById("cityName").innerHTML="";
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
document.getElementById("cityName").innerHTML=xmlhttp.responseText;
}
}
xmlhttp.open("post","cityFatech1.php?q="+str,true);
xmlhttp.send();
}
function submitURL(Dvalue,str,restaurantState1,restaurantCity1,cityName1,statusid1)
{
window.location.href="manage_zipcode.php?countryID="+restaurantState1+"&stateID1="+restaurantCity1+"&cityName="+cityName1+"&statusid"+statusid1+"&sort="+str+"&f="+Dvalue
}
</script>                                          <br />
                                             <form action="manage_zipcode.php" method="get" id="userform" name="userform">
      <table width="100%" border="0">
  <tr>
    <td><label for="Name">Country </label></td>
    <td>
    <select data-placeholder="Select Country..." id="countryID" name="countryID" style="width:180px;" onChange="getOrgTypeListRest(this.value)">
     <option value="">Select</option>
											  <?php 
											  $StateQuery = $dbb->showtable("tbl_country","countryName","asc");
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" <?php if($_GET['countryID']==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['countryName']); ?></option>
                                              <?php } ?>
											
											</select>
    </td>
   <td><label for="Name">State </label></td>
    <td >
    <select  data-placeholder="Select State..." id="stateID" name="stateID" style="width:180px;"  onChange="getOrgTypeListRestCity(this.value)" >
    <option value="">Select</option>
											  <?php 
											  if($_GET['countryID']!=''){
											  $StateQuery = $dbb->showtabledata("tbl_state","countryID",$_GET['countryID']);
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" <?php if($_GET['stateID']==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['stateName']); ?></option>
                                              <?php } ?>
                                              <?php } ?>
											
											</select>
    </td>
   <td><label for="Name">City </label></td>
    <td >  <select  onChange="document.userform.submit();" data-placeholder="Select State..." id="cityName" name="cityName" style="width:180px;"  >
    <option value="">Select</option>
											  <?php 
											  if($_GET['stateID']!=''){
											  $StateQuery = $dbb->showtabledata("tbl_city","stateID",$_GET['stateID']);
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['cityName']; ?>" <?php if($_GET['cityName']==$StateData['cityName']){ ?> selected <?php } ?>><?php echo ucwords($StateData['cityName']); ?></option>
                                              <?php } ?>
                                              <?php } ?>
											
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
                                             
                                        <form name="frmproduct" method="post">
										<table class="table table-bordered">
											<thead>
                                            <?php if($numrowdata>0){ ?>
                                            <tr  id="alldispaly" style="display:none;">
													<td colspan="6" align="right" style="margin-left:200px;"><input name="deleteall" id="deleteall" class="btn btn-warning" title="Delete All Postcode/Delivery Area" value="Delete All" onClick="return confirm('Are You sure to delete all Selected Delivery Area/Postcode');"  type="submit">&nbsp;<input name="activateall" id="activateall" class="btn btn-warning" title="Activate All Postcode/Delivery Area" value="Activate All" onClick="return confirm('Are You sure to activate all Selected Delivery Area/Postcode');"  type="submit">&nbsp;<input name="dactivateall" id="dactivateall" class="btn btn-warning" title="Deactivate All Postcode/Delivery Area" value="Deactivate All" onClick="return confirm('Are You sure to Deactivate all Selected Delivery Area/Postcode');"  type="submit"></td></tr>
                                                    <?php }  ?>
												<tr>
                                                <?php
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
                                                <th><input type="checkbox" id="check_all" value=""></th>
													<th>#</th>
                                                     <th><a onclick="submitURL('cityName','<?php echo $pl;?>','<?php echo $_GET['countryID'];?>','<?php echo $_GET['stateID1'];?>','<?php echo $_GET['cityName'];?>','<?php echo $_GET['statusid'];?>');" style="cursor:pointer;">City Name
                                                     <?php echo $imgSort;?></a></th>
                                                      <th><a onclick="submitURL('postcode','<?php echo $pl;?>','<?php echo $_GET['countryID'];?>','<?php echo $_GET['stateID1'];?>','<?php echo $_GET['cityName'];?>','<?php echo $_GET['statusid'];?>');" style="cursor:pointer;">Postcode<?php echo $imgSort;?></a></th>
                                                       <th><a onclick="submitURL('delivery_areaName','<?php echo $pl;?>','<?php echo $_GET['countryID'];?>','<?php echo $_GET['stateID1'];?>','<?php echo $_GET['cityName'];?>','<?php echo $_GET['statusid'];?>');" style="cursor:pointer;">Delivery Area<?php echo $imgSort;?></a></th>
                                                        <th><a onclick="submitURL('delivery_charge','<?php echo $pl;?>','<?php echo $_GET['countryID'];?>','<?php echo $_GET['stateID1'];?>','<?php echo $_GET['cityName'];?>','<?php echo $_GET['statusid'];?>');" style="cursor:pointer;">Delivery Charge<?php echo $imgSort;?></a></th>
                                                         <th><a onclick="submitURL('minimum_order','<?php echo $pl;?>','<?php echo $_GET['countryID'];?>','<?php echo $_GET['stateID1'];?>','<?php echo $_GET['cityName'];?>','<?php echo $_GET['statusid'];?>');" style="cursor:pointer;">Minimum Order<?php echo $imgSort;?></a></th>
                                                          <th><a onclick="submitURL('shipping_charge','<?php echo $pl;?>','<?php echo $_GET['countryID'];?>','<?php echo $_GET['stateID1'];?>','<?php echo $_GET['cityName'];?>','<?php echo $_GET['statusid'];?>');" style="cursor:pointer;">Shipping Charge<?php echo $imgSort;?></a></th>
                                                    
													<th><a  style="cursor:pointer;">Action</a></th>
												</tr>
											</thead>
											<tbody>
                                          
           <?php
            //show records
            if($numrowdata>0)
			{
            $count=1;
        	while ($row = mysql_fetch_assoc($query)) {
			
        ?>
												<tr>
                                                <td><input type="checkbox" value="<?php echo $row['id']; ?>" name="data[]" id="data"></td>
													<td><?php echo $count; ?></td>
                                                    <td><?php echo ucwords($row['cityName']);?></td>
                                                    <td><?php echo ucwords($row['postcode']);?></td>
                                                    <td><?php echo ucwords($row['delivery_areaName']);?></td>
                                                    <td><?php echo $row['delivery_charge'];?></td>
                                                     <td><?php echo $row['minimum_order'];?></td>
                                                      <td><?php echo $row['shipping_charge'];?></td>
                                                    
                                                   
													
													<td>	<a href="edit_zipcode.php?eid=<?php echo $row['id'];?>" class="btn btn-primary" title="Edit Postcode/Delivery Area">Edit</a>
						<a href="InsertPhp.php?tag=DeliveryDelete&eid=<?php echo $row['id'];?>" class="btn btn-dualima" title="Delete Postcode/Delivery Area" onClick="javascript:return confirm('are you sure to delete permanently')" >Delete</a>
                        <?php if($row['status']==0){ ?>
                        <a href="InsertPhp.php?tag=DeliveryActivate&active=1&statusid=<?php echo $row['id'];?>" class="btn btn-duasembilan" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Postcode/Delivery Area">Activated</a><?php } else {?>
                        <a href="InsertPhp.php?tag=DeliveryActivate&active=0&statusid=<?php echo $row['id'];?>" class="btn btn-tigaempat" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Postcode/Delivery Area">
                        Deactivated</a>
                          <?php } ?>
                     </td>
												</tr>
                                                <?php
												$count++;
												 }
												 } else { 
												  ?>
                                                <tr><td colspan="9" align="center"><strong style="color:#D20000; padding:5px; font-size:14px;">No Postcode/Delivery Area is available in current Database.</strong></td></tr>
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
