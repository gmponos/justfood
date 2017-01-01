<?php include('route/header.php'); 
include('route/DB_Functions.php');
$dbb = new DB_Functions();
include('route/pagination.php');
mysql_query ("set character_set_results='utf8'"); 
if($_GET['eid']!='')
{
 $CuisineQuery = $dbb->showtabledata("tbl_menuAddON","id",$_GET['eid']);
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
}
if(isset($_POST['deleteall'])) {
	$id_array = $_POST['data']; // return array
	$id_count = count($_POST['data']); // count array
	for($i=0; $i <$id_count; $i++) {
		$id = $id_array[$i];
		$query = mysql_query("DELETE FROM `tbl_menuAddON` WHERE `id` = '$id'");
		if(!$query) { 
		header("location:ManageResatuarantExtraAddOn.php");
		}
	}
	
	 // redirent after deleting
}
if(isset($_POST['activateall'])) {
	$id_array = $_POST['data']; // return array
	$id_count = count($_POST['data']); // count array
	for($i=0; $i <$id_count; $i++) {
		$id = $id_array[$i];
		$query = mysql_query("update `tbl_menuAddON` set status='0' WHERE `id` = '$id'");
		if(!$query) { 
		header("location:ManageResatuarantExtraAddOn.php");
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
		$query = mysql_query("update `tbl_menuAddON` set status='1' WHERE `id` = '$id'");
		if(!$query) 
		{ 
		header("location:ManageResatuarantExtraAddOn.php");
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
							<li class="active" style="background-color:#f2f2f2;"><a href="#mainFormElements" style="background-color:#f2f2f2;" data-toggle="tab"><i class="icon-file"></i>Restaurant Addons</a></li>
						</ul>

						<div class="tab-content"  style="height:1750px;">
							<div class="tab-pane active" id="mainFormElements"  >
								<div id="itemContainer">
								
									<div class="well">
										<div class="navbar">
											<div class="navbar-inner">
												<a class="brand" href="#">Restaurant Addons</a>
											</div>
										</div>
                                          <div>  
										
										<?php
											if($_GET['dmsg']!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Restaurant Addons has been successfully deleted.
		                                     </div>
											<?php }?>
                                            
                                            
                                             <?php
											if($_GET['amsg']==1)
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Restaurant Addons has been successfully actiavted/Deactivated.
		                                     </div>
											<?php }?></div>
										<div class="row-fluid">
                                         <?php
		$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    	$limit = 10;
    	$startpoint = ($page * $limit) - $limit;
        //to make pagination
		if($_GET['f']!='')
		{
		$filed=$_GET['f'];
		}
		else
		{
		$filed="MenuAddOnName";
		}	 
		if($_GET['sort']!='')
		{
		$sortBy='order by '.$filed.' '.$_GET['sort'];
		}
		else
		{
		$sortBy='order by '.$filed.'  asc';
		}
		$demowhere=" where 1 ";
		if($_GET['restaurant_state']!='')
		{
		$Statewhere =" and restaurant_state='".$_GET['restaurant_state']."'";
		}
		
		if($_GET['restaurant_city']!='')
		{
		$Citywhere =" and restaurant_city=N'".$_GET['restaurant_city']."'";
		}
		
		if($_GET['restaurant_id']!='')
		{
		$Restaurantwhere =" and restaurant_id='".$_GET['restaurant_id']."'";
		}
		
		if($_GET['menuCatgeory']!='')
		{
		$Menuwhere =" and MenuCategory='".$_GET['menuCatgeory']."'";
		}
		if($_GET['statusid']!='')
		{
		$Statuswhere =" and status='".$_GET['statusid']."'";
		}
        $statement = "tbl_menuAddON";
		
		$url="ManageResatuarantExtraAddOn.php?bannerPage=1&restaurant_state=".$_GET['restaurant_state']."&restaurant_city=".$_GET['restaurant_city']."&restaurant_id=".$_GET['restaurant_id']."&menuCatgeory=".$_GET['menuCatgeory']."&statusid=".$_GET['statusid'];
		 $where=" 1  $Statewhere  $Citywhere  $Restaurantwhere  $Menuwhere ";
		$qur="SELECT * FROM {$statement} $demowhere $Statewhere  $Citywhere  $Restaurantwhere  $Menuwhere $Statuswhere  $sortBy  LIMIT {$startpoint} , {$limit}";
		
		//echo $qur;
		 $query = mysql_query($qur);
		 $numrowdata=mysql_num_rows($query);
		 
											 ?>
<script  type="text/javascript"  language="javascript">
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
xmlhttp.open("post","ResFatchOfferAddon.php?q="+str,true);
xmlhttp.send();
}

function getOrgTypeListRestMenuCategory(str){
if (str=="")
{
document.getElementById("menuCatgeory").innerHTML="";
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
document.getElementById("menuCatgeory").innerHTML=xmlhttp.responseText;
}
}
xmlhttp.open("post","ResFatchMenuCategoryAddon.php?q="+str,true);
xmlhttp.send();
}

function submitURL(Dvalue,str,restaurantState2,restaurantState1,restaurantCity1,restaurant_id1,statusid1)
{
window.location.href="ManageResatuarantExtraAddOn.php?restaurant_state="+restaurantState2+"&restaurant_city="+restaurantState1+"&restaurant_id="+restaurantCity1+"&menuCatgeory="+restaurant_id1+"&statusid="+statusid1+"&sort="+str+"&f="+Dvalue
}


</script>
 
    <div class="span12">
    
    <form action="ManageResatuarantExtraAddOn.php" method="get" id="userform" name="userform">
      <table width="100%" border="0">
  <tr>
   <td><label for="Name">State</label></td>
    <td>
   <select  data-placeholder="Select Restaurant..." required onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  id="restaurant_state" name="restaurant_state" onchange="getOrgTypeListRestCityOffer(this.value)" style="width:140px;" >
    <option value="">Select</option>
											  <?php 
											  $StateQuery = $dbb->showtable("tbl_state","stateName","asc");
											   if($_GET['restaurant_state']!='')
											  {
											  $state=$_GET['restaurant_state'];
											  }
											  else
											  {
											  $state=$CuisineData['restaurant_state'];
											  }
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" <?php if($state==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['stateName']); ?></option>
                                              <?php } ?>
											
											</select>
    </td>
    
     <td><label for="Name">City</label></td>
    <td>
  <select data-placeholder="Select Restaurant..." onchange="getOrgTypeListRestOffer(this.value)" required onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  id="restaurant_city" name="restaurant_city" style="width:140px;" >
    <option value="">Select</option>
											  <?php 
											  if($_GET['eid']!='' || $_GET['restaurant_city']!=''){
											  if($_GET['restaurant_city']!='')
											  {
											  $city=$_GET['restaurant_city'];
											  }
											  else
											  {
											  $city=$CuisineData['restaurant_city'];
											  }
											  $StateQueryPP =mysql_query("select * from tbl_city where stateID='".$state."' order by cityName asc");
                                              while($StateDataPPP=mysql_fetch_assoc($StateQueryPP)){
											  ?>
                                              <option value="<?php echo $StateDataPPP['cityName'];?>" <?php if($city==$StateDataPPP['cityName']){ ?> selected <?php } ?>><?php echo ucwords($StateDataPPP['cityName']); ?></option>
                                              <?php } }?>
											
											</select>
    </td>
    
    
     <td><label for="Name">Restaurant </label></td>
    <td>
   <select  data-placeholder="Select Restaurant..." onchange="getOrgTypeListRestMenuCategory(this.value)" required onMouseOver="return clearFieldValue(this);" onClick="return clearFieldValue(this);"  id="restaurant_id" name="restaurant_id" style="width:140px;" >
    <option value="">Select Restaurant</option>
											  <?php 
											   if($_GET['eid']!='' || $_GET['restaurant_city']!=''){
											   if($_GET['restaurant_city']!='')
											  {
											  $StateQuery =mysql_query("select * from tbl_restaurantAdd where restaurantCity=N'".$city."'");
											  
											  }
											  else
											  {
											   $StateQuery = $dbb->showtable("tbl_restaurantAdd","restaurant_name","asc");
											  }
											
											if($_GET['restaurant_id']!=''){
											$resID=$_GET['restaurant_id'];
											}
											else
											{
											$resID=$CuisineData['restaurant_id'];
											}
											
											
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" <?php if($resID==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['restaurant_name']); ?></option>
                                              <?php } } ?>
											
											</select>
    </td>
    
  <td><label for="Name">Category </label></td>
    <td>
     <select  id="menuCatgeory" name="menuCatgeory" style="width:130px;" >
    <option value="">Select Category</option>
											  <?php 
											  if($_GET['restaurant_id']!=''){
											   $StateQuery = mysql_query("select * from tbl_restMenuCategory where restaurantMenuID='".$_GET['restaurant_id']."' order by restaurantMenuName asc ");											}
											   else
											   {
											   $StateQuery = mysql_query("select * from tbl_restMenuCategory group by restaurantMenuName order by restaurantMenuName asc ");
											   }
											   
											   if($_GET['menuCatgeory']!='')
											   {
											   $MenuCate=$_GET['menuCatgeory'];
											   }
											   else
											   {
											    $MenuCate=$CuisineData['MenuCategory'];
											   }
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" <?php if($MenuCate==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['restaurantMenuName']); ?></option>
                                              <?php } ?>
											
											</select>
    </td>
    
  
      <td><label for="Name">Status</label></td>
    <td> <select   name="statusid" style="width:60px;" id="statusid" onChange="document.userform.submit();" >
    <option value="">select</option>
				<option value="0" <?php if($_GET['statusid']==0){ ?> selected="selected" <?php } ?> >Activated</option>
<option value="1" <?php if($_GET['statusid']==1){ ?> selected="selected" <?php } ?> >Deactivated</option>
                </select></td>
                
                <td colspan="2"><input name="FilterBy" id="FilterBy" class="btn btn-warning" title="Filter Addons" value="Filter Now" onclick="document.userform.submit();"  type="submit"></td>
  </tr>
</table>
    </form>
    
   

		<form name="frmproduct" method="post">
										<table class="table table-bordered">
			
				<?php if($numrowdata>0){ ?>
                                                <tr  id="alldispaly" style="display:none;">
													<td colspan="6" align="right" style="margin-left:200px;"><input name="deleteall" id="deleteall" class="btn btn-warning" title="Delete All Restaurant  Addons" value="Delete All" onClick="return confirm('Are you sure to delete selected Restaurant Addons');"  type="submit">&nbsp;<input name="activateall" id="activateall" class="btn btn-warning" title="Activate All Restaurant Addons" value="Activate All" onClick="return confirm('Are you sure to activate selected Restaurant Addons');"  type="submit">&nbsp;<input name="dactivateall" id="dactivateall" class="btn btn-warning" title="Deactivate All Restaurant Addons" value="Deactivate All" onClick="return confirm('Are you sure to deactivate selected Restaurant Addons');"  type="submit"></td></tr>
                                                    <?php } ?>
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
                                                   <th><a onclick="submitURL('MenuCategory','<?php echo $pl;?>','<?php echo $_GET['restaurant_state'];?>','<?php echo $_GET['restaurant_city'];?>','<?php echo $_GET['restaurant_id'];?>','<?php echo $_GET['menuCatgeory'];?>','<?php echo $_GET['statusid'];?>');" style="cursor:pointer;">Category Name<?php echo $imgSort;?></a></th>
                                                    <th><a onclick="submitURL('MenuAddOnName','<?php echo $pl;?>','<?php echo $_GET['restaurant_state'];?>','<?php echo $_GET['restaurant_city'];?>','<?php echo $_GET['restaurant_id'];?>','<?php echo $_GET['menuCatgeory'];?>','<?php echo $_GET['statusid'];?>');" style="cursor:pointer;">Addons Name<?php echo $imgSort;?></a></th>
                                                 <th><a onclick="submitURL('MenuAddOnPrice','<?php echo $pl;?>','<?php echo $_GET['restaurant_state'];?>','<?php echo $_GET['restaurant_city'];?>','<?php echo $_GET['restaurant_id'];?>','<?php echo $_GET['menuCatgeory'];?>','<?php echo $_GET['statusid'];?>');" style="cursor:pointer;">Addons Price<?php echo $imgSort;?></a></th>
                                                 
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
													 $StQuery = mysql_fetch_assoc($dbb->showtabledata("tbl_restMenuCategory","id",$row['MenuCategory']));
													echo ucwords($StQuery['restaurantMenuName']);?></td>
                                                     <td><?php echo $row['MenuAddOnName'];?></td>
                                                      <td><?php echo $AdminDataLoginVal['website_CurrencySymbole'];?> <?php 
													  if($row['MenuAddOnPrice']!=''){
													  echo number_format($row['MenuAddOnPrice'],2);
													  }
													  else
													  {
													  echo '0.00';
													  }
													  ?></td>
                                                      
                                                       
                                                 
													<td>	
                      
                      <a href="ResatuarantExtraAddOnUpdate.php?eid=<?php echo $row['id'];?>" class="btn btn-dualima" title="Edit Restaurant Addons" >View/Edit</a>
                     <a href="InsertPhp.php?tag=ResAddonsDelete&eid=<?php echo $row['id'];?>" class="btn btn-dualima" title="Delete Restaurant Addons" onClick="javascript:return confirm('are you sure to delete permanently')" >Delete</a>
                        
                           <?php if($row['status']==0){ ?>
                        <a href="InsertPhp.php?tag=ResAddonsActivate&active=1&statusid=<?php echo $row['id'];?>" class="btn btn-duasembilan" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Restaurant Addons">Activated</a><?php } else {?>
                        <a href="InsertPhp.php?tag=ResAddonsActivate&active=0&statusid=<?php echo $row['id'];?>" class="btn btn-tigaempat" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Restaurant Addons">
                        Deactivated</a>
                          <?php } ?>
                          
                     </td>
												</tr>
                                                <?php
												$count++;
												 }
												 } else { 
												  ?>
                                                <tr><td colspan="10" align="center"><strong style="color:#D20000; padding:5px; font-size:14px;">No Restaurant Addons is available in current Database.</strong></td></tr>
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
