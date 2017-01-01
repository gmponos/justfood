<?php include('route/header.php'); 
include('route/DB_Functions.php');
   $dbb = new DB_Functions();
 include('route/pagination.php');
mysql_query ("set character_set_results='utf8'"); 
if($_GET['eid']!='')
{
 $CuisineQuery = $dbb->showtabledata("tbl_restaurantOffer","id",$_GET['eid']);
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
}
if(isset($_POST['deleteall'])) {
	$id_array = $_POST['data']; // return array
	$id_count = count($_POST['data']); // count array
	for($i=0; $i <$id_count; $i++) {
		$id = $id_array[$i];
		$query = mysql_query("DELETE FROM `tbl_restaurantOffer` WHERE `id` = '$id'");
		if(!$query) { 
		header("location:manage_restaurant_offer.php");
		}
	}
	
	 // redirent after deleting
}
if(isset($_POST['activateall'])) {
	$id_array = $_POST['data']; // return array
	$id_count = count($_POST['data']); // count array
	for($i=0; $i <$id_count; $i++) {
		$id = $id_array[$i];
		$query = mysql_query("update `tbl_restaurantOffer` set status='0' WHERE `id` = '$id'");
		if(!$query) { 
		header("location:manage_restaurant_offer.php");
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
		$query = mysql_query("update `tbl_restaurantOffer` set status='1' WHERE `id` = '$id'");
		if(!$query) 
		{ 
		header("location:manage_restaurant_offer.php");
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
							<li class="active" style="background-color:#f2f2f2;"><a href="#mainFormElements" style="background-color:#f2f2f2;" data-toggle="tab"><i class="icon-file"></i>Manage Restaurant Discount</a></li>
						</ul>

						<div class="tab-content"  style="height:1000px;">
							<div class="tab-pane active" id="mainFormElements"  >
								<div id="itemContainer">
								
									<div class="well">
										<div class="navbar">
											<div class="navbar-inner">
												<a class="brand" href="#">Manage Restaurant Discount</a>
											</div>
										</div>
										
                                        
                                        <div class="row-fluid">
    <div class="span12">
		 <?php
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
		$sortBy='order by '.$filed.'  desc';
		}
		$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    	$limit = 10;
    	$startpoint = ($page * $limit) - $limit;
        //to make pagination
        $statement = "tbl_restaurantOffer";
		/*if($_GET['restaurant_state']!='' && $_GET['restaurant_city']!='' && $_GET['restaurant_id']!='' && $_GET['statusid']!='' )
		{
		$url="manage_restaurant_offer.php?restaurant_state=".$_GET['restaurant_state']."&restaurant_city=".$_GET['restaurant_city']."&restaurant_id=".$_GET['restaurant_id']."&statusid=".$_GET['statusid']."&";
		$where="restaurant_state='".$_GET['restaurant_state']."' and restaurant_city=N'".$_GET['restaurant_city']."'  and  restaurant_id='".$_GET['restaurant_id']."' and status='".$_GET['statusid']."'";
		$qur="SELECT * FROM {$statement} where restaurant_state='".$_GET['restaurant_state']."' and restaurant_city=N'".$_GET['restaurant_city']."'  and  restaurant_id='".$_GET['restaurant_id']."' and status='".$_GET['statusid']."' $sortBy LIMIT {$startpoint} , {$limit}";
		}
		
		elseif($_GET['restaurant_state']!='' && $_GET['restaurant_city']!='' && $_GET['restaurant_id']!='' )
		{
		$url="manage_restaurant_offer.php?restaurant_state=".$_GET['restaurant_state']."&restaurant_city=".$_GET['restaurant_city']."&restaurant_id=".$_GET['restaurant_id']."&";
		$where="restaurant_state='".$_GET['restaurant_state']."' and restaurant_city=N'".$_GET['restaurant_city']."'  and  restaurant_id='".$_GET['restaurant_id']."' ";
		$qur="SELECT * FROM {$statement} where restaurant_state='".$_GET['restaurant_state']."' and restaurant_city=N'".$_GET['restaurant_city']."'  and  restaurant_id='".$_GET['restaurant_id']."' $sortBy  LIMIT {$startpoint} , {$limit}";
		}
		elseif($_GET['restaurant_state']!='' && $_GET['restaurant_city']!=''  && $_GET['statusid']!='' )
		{
		$url="manage_restaurant_offer.php?restaurant_state=".$_GET['restaurant_state']."&restaurant_city=".$_GET['restaurant_city']."&statusid=".$_GET['statusid']."&";
		$where="restaurant_state='".$_GET['restaurant_state']."' and restaurant_city=N'".$_GET['restaurant_city']."'  and status='".$_GET['statusid']."'";
		$qur="SELECT * FROM {$statement} where restaurant_state='".$_GET['restaurant_state']."' and restaurant_city=N'".$_GET['restaurant_city']."'   and status='".$_GET['statusid']."' $sortBy LIMIT {$startpoint} , {$limit}";
		}
		elseif($_GET['restaurant_state']!='' && $_GET['restaurant_city']!=''  )
		{
		$url="manage_restaurant_offer.php?restaurant_state=".$_GET['restaurant_state']."&restaurant_city=".$_GET['restaurant_city']."&";
		$where="restaurant_state='".$_GET['restaurant_state']."' and restaurant_city=N'".$_GET['restaurant_city']."'  ";
		$qur="SELECT * FROM {$statement} where restaurant_state='".$_GET['restaurant_state']."' and restaurant_city=N'".$_GET['restaurant_city']."' $sortBy LIMIT {$startpoint} , {$limit}";
		}
		
		else*/
		if($_GET['restaurant_id']!='' && $_GET['statusid']!='' )
		{
		$url="manage_restaurant_offer.php?restaurant_id=".$_GET['restaurant_id']."&statusid=".$_GET['statusid']."&";
		$where="restaurant_id='".$_GET['restaurant_id']."' and status='".$_GET['statusid']."'";
		$qur="SELECT * FROM {$statement} where restaurant_id='".$_GET['restaurant_id']."' and status='".$_GET['statusid']."' $sortBy LIMIT {$startpoint} , {$limit}";
		}
		
		elseif($_GET['restaurant_id']!='')
		{
		$url="manage_restaurant_offer.php?restaurant_id=".$_GET['restaurant_id']."&";
		$where="restaurant_id='".$_GET['restaurant_id']."'";
		
		$qur="SELECT * FROM {$statement} where restaurant_id='".$_GET['restaurant_id']."' $sortBy LIMIT {$startpoint} , {$limit}";
		}
		
		elseif($_GET['statusid']!='')
		{
		$url="manage_restaurant_offer.php?statusid=".$_GET['statusid']."&";
		$where="status='".$_GET['statusid']."'";
		
		$qur="SELECT * FROM {$statement} where status='".$_GET['statusid']."'  $sortBy LIMIT {$startpoint} , {$limit}";
		}		
		else
		{
		$url="manage_restaurant_offer.php?OfF=1&";
		$where="1";
		
		$qur="SELECT * FROM {$statement}  $sortBy LIMIT {$startpoint} , {$limit}";
		}
		
		
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
xmlhttp.open("post","ResFatchOffer1.php?q="+str,true);
xmlhttp.send();
}

function submitURL(Dvalue,str,restaurantState1,restaurantCity1,restaurant_id1,statusid1)
{
window.location.href="manage_restaurant_offer.php?restaurantState="+restaurantState1+"&restaurantCity="+restaurantCity1+"&restaurant_id="+restaurant_id1+"&statusid="+statusid1+"&sort="+str+"&f="+Dvalue
}


</script>
                                       
                                        <form action="manage_restaurant_offer.php" method="get" id="userform" name="userform">
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
											  $StateQuery =mysql_query("select *  from tbl_city where stateID='".$_GET['restaurant_state']."' order by cityName asc");
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
    <td> <select  class="chzn_a span8"  name="statusid" style="width:130px;" id="statusid" onChange="document.userform.submit();" >
   
				<option value="0" <?php if($_GET['statusid']==0){ ?> selected="selected" <?php } ?> >Activated</option>
<option value="1" <?php if($_GET['statusid']==1){ ?> selected="selected" <?php } ?> >Deactivated</option>
 <option value="" selected="selected">select</option>
                </select></td>
  </tr>
</table>
    </form>
                                        <form name="frmproduct" method="post">
										<table class="table table-bordered">
											<thead>
                                                <tr  id="alldispaly" style="display:none;">
													<td colspan="8" align="right" style="margin-left:200px;"><input name="deleteall" id="deleteall" class="btn btn-warning" title="Delete All Restaurant Offer" value="Delete All" onClick="return confirm('Are You sure to deleted all selected restaurant Offer');"  type="submit">&nbsp;<input name="activateall" id="activateall" class="btn btn-warning" title="Activate All Restaurant Offer" value="Activate All" onClick="return confirm('Are You sure to Activate all selected restaurant Offer');"  type="submit">&nbsp;<input name="dactivateall" id="dactivateall" class="btn btn-warning" title="Deactivate All Restaurant Offer" value="Deactivate All" onClick="return confirm('Are You sure to Deactivate all selected restaurant Offer');"  type="submit"></td></tr>
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
													$pl='desc';
													$imgSort='<img src="sortasc.png" style="float:right;" />';
													}
													 ?>
                                                     <a onclick="submitURL('restaurant_id','<?php echo $pl;?>','<?php echo $_GET['restaurant_state'];?>','<?php echo $_GET['restaurant_city'];?>','<?php echo $_GET['restaurant_id'];?>','<?php echo $_GET['statusid'];?>');" style="cursor:pointer;">Restaurant Name 
                                                     <?php echo $imgSort;?></a></th>
                                                    <th><a onclick="submitURL('RestaurantOfferStartPrice','<?php echo $pl;?>','<?php echo $_GET['restaurant_state'];?>','<?php echo $_GET['restaurant_city'];?>','<?php echo $_GET['restaurant_id'];?>','<?php echo $_GET['statusid'];?>');" style="cursor:pointer;">Start Price 
                                                     <?php echo $imgSort;?></a></th>
                                                    <th><a onclick="submitURL('RestaurantoffrType','<?php echo $pl;?>','<?php echo $_GET['restaurant_state'];?>','<?php echo $_GET['restaurant_city'];?>','<?php echo $_GET['restaurant_id'];?>','<?php echo $_GET['statusid'];?>');" style="cursor:pointer;">Discount Type 
                                                     <?php echo $imgSort;?></a></th>
                                                    <th><a onclick="submitURL('RestaurantOfferPrice','<?php echo $pl;?>','<?php echo $_GET['restaurant_state'];?>','<?php echo $_GET['restaurant_city'];?>','<?php echo $_GET['restaurant_id'];?>','<?php echo $_GET['statusid'];?>');" style="cursor:pointer;">Price 
                                                     <?php echo $imgSort;?></a></th>
													<th><a onclick="submitURL('RestaurantOfferStartDate','<?php echo $pl;?>','<?php echo $_GET['restaurant_state'];?>','<?php echo $_GET['restaurant_city'];?>','<?php echo $_GET['restaurant_id'];?>','<?php echo $_GET['statusid'];?>');" style="cursor:pointer;">Start Date 
                                                     <?php echo $imgSort;?></a></th>
                                                    <th><a onclick="submitURL('RestaurantOfferEndDate','<?php echo $pl;?>','<?php echo $_GET['restaurant_state'];?>','<?php echo $_GET['restaurant_city'];?>','<?php echo $_GET['restaurant_id'];?>','<?php echo $_GET['statusid'];?>');" style="cursor:pointer;">End Date 
                                                     <?php echo $imgSort;?></a></th>
                                                     <th>Home Display</th>
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
                                                     <td><?php 
													 $StQuery = mysql_fetch_assoc($dbb->showtabledata("tbl_restaurantAdd","id",$row['restaurant_id']));
													echo ucwords($StQuery['restaurant_name']);?></td>
                                                    <td><?php echo number_format($row['RestaurantOfferStartPrice'],2);?> <?php echo $AdminDataLoginVal['website_CurrencySymbole'];?></td>
													<td><?php 
													if($row['RestaurantoffrType']=="pr")
													{
													echo '%';
													}
													if($row['RestaurantoffrType']=="p")
													{
													echo 'Fixed';
													}
													if($row['RestaurantoffrType']=="fr")
													{
													echo 'Free Dish';
													}
													?></td>
                                                    
												<td><?php echo ucwords($row['RestaurantOfferPrice']);?></td>
                                                <td><?php echo ucwords($row['RestaurantOfferStartDate']);?></td>
                                                 <td><?php echo ucwords($row['RestaurantOfferEndDate']);?></td>
                                                 <td>
                                                  <?php if($row['topDiscount']==1){ ?>
                      No
                       <?php } else { ?>
                        Yes</a>
                          <?php } ?>
                                                 </td>
													<td>	<a href="add_restaurant_offer.php?eid=<?php echo $row['id'];?>" class="btn btn-primary" title="Edit Restaurant Offer">Edit</a>
						<a href="InsertPhp.php?tag=ResOfferDelete&eid=<?php echo $row['id'];?>" class="btn btn-dualima" title="Delete Restaurant Offer" onClick="javascript:return confirm('are you sure to delete permanently')" >Delete</a>
                        <?php if($row['status']==0){ ?>
                        <a href="InsertPhp.php?tag=ResOfferActivate&active=1&statusid=<?php echo $row['id'];?>" class="btn btn-duasembilan" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Restaurant Offer">Activated</a><?php } else {?>
                        <a href="InsertPhp.php?tag=ResOfferActivate&active=0&statusid=<?php echo $row['id'];?>" class="btn btn-tigaempat" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Restaurant Offer">
                        Deactivated</a>
                          <?php } ?>
                     </td>
												</tr>
                                                <?php
												$count++;
												 }
												 } else { 
												  ?>
                                                <tr><td colspan="10" align="center"><strong style="color:#D20000; padding:5px; font-size:14px;">No Restaurant Discount is available in current Database.</strong></td></tr>
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
