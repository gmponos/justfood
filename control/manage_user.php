<?php include('route/header.php'); 
include('route/DB_Functions.php');
   $dbb = new DB_Functions();
 include('route/pagination.php');
mysql_query ("set character_set_results='utf8'"); 
if($_GET['eid']!='')
{
 $CuisineQuery = $dbb->showtabledata("tbl_user","id",$_GET['eid']);
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
}
if(isset($_POST['deleteall'])) {
	$id_array = $_POST['data']; // return array
	$id_count = count($_POST['data']); // count array
	for($i=0; $i <$id_count; $i++) {
		$id = $id_array[$i];
		$query = mysql_query("DELETE FROM `tbl_user` WHERE `id` = '$id'");
		if(!$query) { 
		header("location:manage_user.php");
		}
	}
	
	 // redirent after deleting
}
if(isset($_POST['activateall'])) {
	$id_array = $_POST['data']; // return array
	$id_count = count($_POST['data']); // count array
	for($i=0; $i <$id_count; $i++) {
		$id = $id_array[$i];
		$query = mysql_query("update `tbl_user` set status='0' WHERE `id` = '$id'");
		if(!$query) { 
		header("location:manage_user.php");
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
		$query = mysql_query("update `tbl_user` set status='1' WHERE `id` = '$id'");
		if(!$query) 
		{ 
		header("location:manage_user.php");
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
							<li class="active" style="background-color:#f2f2f2;"><a href="#mainFormElements" style="background-color:#f2f2f2;" data-toggle="tab"><i class="icon-file"></i>Restaurant User</a></li>
						</ul>

						<div class="tab-content"  style="height:1200px;">
							<div class="tab-pane active" id="mainFormElements"  >
								<div id="itemContainer">
								
									<div class="well">
										<div class="navbar">
											<div class="navbar-inner">
												<a class="brand" href="#">Restaurant User </a>
											</div>
										</div>
										<div class="row-fluid">
    <div class="span12">
    
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
		$filed="id";
		}	 
		if($_GET['sort']!='')
		{
		$sortBy='order by '.$filed.' '.$_GET['sort'];
		}
		else
		{
		$sortBy='order by '.$filed.'  asc';
		}
        $statement = "tbl_user";
		if($_GET['countryID']!='')
		{
		$CountryQuery=" and countryID='".$_GET['countryID']."'";
		}
		
		if($_GET['stateID']!='')
		{
		$stateQuery=" and state_name='".$_GET['stateID']."'";
		}
		
		if($_GET['cityName']!='')
		{
		$cityQuery=" and city_name=N'".$_GET['city_name']."'";
		}
		if($_GET['ipstatus']!='' && $_GET['statusid']!='' )
		{
		
		$url="manage_user.php?ipstatus=".$_GET['ipstatus']."&statusid=".$_GET['statusid']."&";
		$where="ipblock='".$_GET['ipstatus']."' and status='".$_GET['statusid']."'  $CountryQuery $stateQuery  $cityQuery";
		
		$qur="SELECT * FROM {$statement} where ipblock='".$_GET['ipstatus']."' and status='".$_GET['statusid']."' $CountryQuery $stateQuery  $cityQuery $sortBy LIMIT {$startpoint} , {$limit}";
		}
		elseif($_GET['ipstatus']!='')
		{
		$url="manage_user.php?ipstatus=".$_GET['ipstatus']."&";
		$where="ipblock='".$_GET['ipstatus']."'  $CountryQuery $stateQuery  $cityQuery ";
		
		$qur="SELECT * FROM {$statement} where ipblock='".$_GET['ipstatus']."' $CountryQuery $stateQuery  $cityQuery  $sortBy LIMIT {$startpoint} , {$limit}";
		}
		
		elseif($_GET['statusid']!='')
		{
		$url="manage_user.php?statusid=".$_GET['statusid']."&";
		$where="status='".$_GET['statusid']."' $CountryQuery $stateQuery  $cityQuery";
		
		$qur="SELECT * FROM {$statement} where status='".$_GET['statusid']."'  $CountryQuery $stateQuery  $cityQuery  $sortBy LIMIT {$startpoint} , {$limit}";
		}		
		else
		{
		
		$url="manage_user.php?U=1&";
		$where="1  $CountryQuery $stateQuery  $cityQuery";
		
		$qur="SELECT * FROM {$statement} where 1 $CountryQuery $stateQuery  $cityQuery $sortBy LIMIT {$startpoint} , {$limit}";
		}
		//echo $qur;
		 $query = mysql_query($qur);
		 $numrowdata=mysql_num_rows($query);
		 
											 ?>
                                       <script type="text/javascript">
 function submitURL(Dvalue,str,restaurant_id1,statusid1)
{
window.location.href="manage_user.php?statusid="+restaurant_id1+"&ipstatus="+statusid1+"&sort="+str+"&f="+Dvalue;
}
</script>
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
</script>
                                        <form action="manage_user.php" method="get" id="userform" name="userform">
      <table width="100%" border="0">
  <tr>
       <td><label for="Name">Country </label></td>
    <td>
    <select class="chzn-select" data-placeholder="Select Country..." id="countryID" name="countryID" style="width:160px;" onChange="getOrgTypeListRest(this.value)">
											  <?php 
											  $StateQuery = $dbb->showtable("tbl_country","countryName","asc");
                                              while($StateData=mysql_fetch_assoc($StateQuery)){
											  ?>
                                              <option value="<?php echo $StateData['id']; ?>" <?php if($_GET['countryID']==$StateData['id']){ ?> selected <?php } ?>><?php echo ucwords($StateData['countryName']); ?></option>
                                              <?php } ?>
											
											</select>
    </td>
   <td><label for="Name">State </label></td>
    <td id="stateID">
    <select class="chzn-select" data-placeholder="Select State..." id="stateID" name="stateID" style="width:160px;"  onChange="getOrgTypeListRestCity(this.value)" >
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
    <td id="cityName">  <select class="chzn-select" onChange="document.userform.submit();" data-placeholder="Select State..." id="cityName" name="cityName" style="width:160px;"  >
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
       <td><strong style="font-size:14px; font-weight:bold;">IP Status : </strong> </td>
    <td> <select  class="chzn_a span8"  name="ipstatus" style="width:120px;" id="ipstatus" onChange="document.userform.submit();" >
    <option value="">select</option>
				<option value="0" <?php if($_GET['ipstatus']==0){ ?> selected="selected" <?php } ?> >Unblock IP </option>
<option value="1" <?php if($_GET['ipstatus']==1){ ?> selected="selected" <?php } ?> >Block IP</option>
                </select></td>
                
      <td><strong style="font-size:14px; font-weight:bold;">Status : </strong> </td>
    <td> <select  class="chzn_a span8"  name="statusid" style="width:120px;" id="statusid" onChange="document.userform.submit();" >
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
                                            <tr  id="alldispaly" style="display:none;">
													<td colspan="4" align="right" style="margin-left:200px;"><input name="deleteall" id="deleteall" class="btn btn-warning" title="Delete All Restaurant User" value="Delete All" onClick="return confirm('Are you sure to delete selected all restaurant User ?');"  type="submit">&nbsp;<input name="activateall" id="activateall" class="btn btn-warning" title="Activate All Restaurant User" value="Activate All" onClick="return confirm('Are you sure to activate selected all restaurant User ?');"  type="submit">&nbsp;<input name="dactivateall" id="dactivateall" class="btn btn-warning" title="Deactivate All Restaurant User" value="Deactivate All" onClick="return confirm('Are you sure to Deactivate selected all restaurant User ?');"  type="submit"></td></tr>
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
                                                    <th><a onclick="submitURL('fname','<?php echo $pl;?>','<?php echo $_GET['statusid'];?>','<?php echo $_GET['ipstatus'];?>');" style="cursor:pointer;">Name <?php echo $imgSort;?></a></th>
                                                    <th><a onclick="submitURL('user_email','<?php echo $pl;?>','<?php echo $_GET['statusid'];?>','<?php echo $_GET['ipstatus'];?>');" style="cursor:pointer;">LoginID <?php echo $imgSort;?></a></th>
													<th><a onclick="submitURL('user_pass','<?php echo $pl;?>','<?php echo $_GET['statusid'];?>','<?php echo $_GET['ipstatus'];?>');" style="cursor:pointer;">Password <?php echo $imgSort;?></a></th>
                                                    <th><a onclick="submitURL('city_name','<?php echo $pl;?>','<?php echo $_GET['statusid'];?>','<?php echo $_GET['ipstatus'];?>');" style="cursor:pointer;">City <?php echo $imgSort;?></a></th>
                                                    
                                                    <th><a onclick="submitURL('state_name','<?php echo $pl;?>','<?php echo $_GET['statusid'];?>','<?php echo $_GET['ipstatus'];?>');" style="cursor:pointer;">State <?php echo $imgSort;?></a></th>
                                                    
                                                    <th><a onclick="submitURL('id','<?php echo $pl;?>','<?php echo $_GET['statusid'];?>','<?php echo $_GET['ipstatus'];?>');" style="cursor:pointer;">Total Order <?php echo $imgSort;?></a></th>
                                                    
                                                    <th><a onclick="submitURL('id','<?php echo $pl;?>','<?php echo $_GET['statusid'];?>','<?php echo $_GET['ipstatus'];?>');" style="cursor:pointer;">Order Price <?php echo $imgSort;?></a></th>
                                                   
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
                                                    
													<td>
													<?php if($row['fname']!=''){ ?>
													<?php echo ucwords($row['fname']);?> <?php echo ucwords($row['lname']);?>
                                                    <?php } else { ?>
                                                    <?php echo ucwords($row['user_name']);?>
                                                    <?php } ?>
                                                    </td>
												<td><?php echo ucwords($row['user_email']);?></td>
                                                <td><?php echo ucwords($row['user_pass']);?></td>
                                                
                                                  <td><?php echo ucwords($row['city_name']);?></td>
                                                   <td><?php 
												   $staneT=mysql_fetch_assoc(mysql_query("select * from tbl_state where id='".$row['state_name']."'"));
												   echo ucwords($staneT['stateName']);?></td>
                                                    <td><?php 
													$restaurantID=mysql_fetch_assoc(mysql_query("select * from resto_order where userId='".$row['id']."'"));
													$restaurantName=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantAdd where id='".$restaurantID['restoid']."'"));
													echo $restaurantName['restaurant_name'].'('.$restaurantOrder=mysql_num_rows(mysql_query("select * from resto_order where userId='".$row['id']."'")).')';?></td>
                                                    <td><?php
													$OrderQuery = "SELECT SUM(ordPrice) FROM resto_order where userId='".$row['id']."'"; 
$resultOrderPrice = mysql_query($OrderQuery) or die(mysql_error());
// Print out result
while($rowOrderPrice = mysql_fetch_array($resultOrderPrice)){
if($rowOrderPrice['SUM(ordPrice)']!=''){
echo $rowOrderPrice['SUM(ordPrice)'];
}
else
{
echo '0.00';
}
}?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?> </td>
                                              
													<td>	<a href="add_restaurant_user.php?eid=<?php echo $row['id'];?>" class="btn btn-primary" title="Edit Restaurant Owner">View/Edit</a>
                                                    
                                                    <?php /*?><a href="Detail_restaurant_user.php?eid=<?php echo $row['id'];?>" class="btn btn-primary" title="Edit Restaurant Owner">Detail</a><?php */?>
						<a href="InsertPhp.php?tag=ResUserDelete&eid=<?php echo $row['id'];?>" class="btn btn-dualima" title="Delete Restaurant Owner" onClick="javascript:return confirm('are you sure to delete permanently')" >Delete</a>
                        <?php if($row['status']==0){ ?>
                        <a href="InsertPhp.php?tag=ResUserActivate&active=1&statusid=<?php echo $row['id'];?>" class="btn btn-duasembilan" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Restaurant User">Activated</a><?php } else {?>
                        <a href="InsertPhp.php?tag=ResUserActivate&active=0&statusid=<?php echo $row['id'];?>" class="btn btn-tigaempat" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Restaurant User">
                        Deactivated</a>
                          <?php } ?>
                          
                           <?php if($row['ipblock']==0){ ?>
                        <a href="InsertPhp.php?tag=ResUserIPActivate&ipactive=1&statusid=<?php echo $row['id'];?>" class="btn btn-duasembilan" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Restaurant User">Unblock IP</a><?php } else {?>
                        <a href="InsertPhp.php?tag=ResUserIPActivate&ipactive=0&statusid=<?php echo $row['id'];?>" class="btn btn-tigaempat" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Restaurant Owner">
                        Block IP</a>
                          <?php } ?>
                     </td>
												</tr>
                                                  <?php
												$count++;
												 }
												 } else { 
												  ?>
                                                <tr><td colspan="7" align="center"><strong style="color:#D20000; padding:5px; font-size:14px;">No Restaurant User is available in current Database.</strong></td></tr>
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
