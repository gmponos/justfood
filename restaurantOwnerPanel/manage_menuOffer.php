<?php include('route/header.php');
include('route/DB_Functions.php');
$dbb = new DB_Functions();
include('route/pagination.php');
mysql_query ("set character_set_results='utf8'"); 
if($_GET['eid']!='')
{
 $CuisineQuery = $dbb->showtabledata("table_menuofferTitle","id",$_GET['eid']);
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
 
}
 ?>
 <?php 
 $_GET['RestaurantPizzaID']=$_SESSION['restaurant_id'];
if($_GET['RestaurantPizzaID']!=''){
$StQuery = mysql_fetch_assoc($dbb->showtabledata("tbl_restaurantAdd","id",$_GET['RestaurantPizzaID']));
}
if(isset($_POST['deleteall'])) {
	$id_array = $_POST['data']; // return array
	$id_count = count($_POST['data']); // count array
	for($i=0; $i <$id_count; $i++) {
		$id = $id_array[$i];
		$query = mysql_query("DELETE FROM `table_menuofferTitle` WHERE `id` = '$id'");
		if(!$query) { 
		if($_GET['RestaurantPizzaID']!=''){
		header("location:manage_menuOffer.php?RestaurantPizzaID=".$_GET['RestaurantPizzaID']);
		}
		else
		{
		header("location:manage_menuOffer.php");
		}
		}
	}
	
	 // redirent after deleting
}
if(isset($_POST['activateall'])) {
	$id_array = $_POST['data']; // return array
	$id_count = count($_POST['data']); // count array
	for($i=0; $i <$id_count; $i++) {
		$id = $id_array[$i];
		$query = mysql_query("update `table_menuofferTitle` set status='0' WHERE `id` = '$id'");
		if(!$query) { 
		if($_GET['RestaurantPizzaID']!=''){
		header("location:manage_menuOffer.php?RestaurantPizzaID=".$_GET['RestaurantPizzaID']);
		}
		else
		{
		header("location:manage_menuOffer.php");
		}
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
		$query = mysql_query("update `table_menuofferTitle` set status='1' WHERE `id` = '$id'");
		if(!$query) 
		{ 
		if($_GET['RestaurantPizzaID']!=''){
		header("location:manage_menuOffer.php?restaurantMenuID=".$_GET['RestaurantPizzaID']);
		}
		else
		{
		header("location:manage_menuOffer.php");
		}
		}
	}
	
	 // redirent after deleting
}

 ?>	
 
 <link href="css/multiple_image_display.css" type="text/css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
 <script type="text/javascript" src="js/script.js"></script> 	
<div id="page-wrap">
		<!-- left sidebar -->
		<?php include('route/side_bar.php'); ?>		

		<div id="main-content">
			<div id="inner">
				
				<div class="container-fluid">
					<div class="tabbable main-tabs">
						<ul class="nav nav-tabs">
							<li class="active" style="background-color:#f2f2f2;"><a href="#mainFormElements" style="background-color:#f2f2f2;" data-toggle="tab"><i class="icon-file"></i><?php  if($_GET['eid']=='')
										   { ?>
                            Manage Restaurant Menu Offer
                            <?php } else { ?>
                            Manage Restaurant Menu Offer
                            <?php } ?></a></li>
						</ul>

						<div class="tab-content"  style="height:1750px;">
							<div class="tab-pane active" id="mainFormElements"  >
								<div id="itemContainer">
								
									<div class="well">
										<div class="navbar">
											<div class="navbar-inner">
												<a class="brand" href="#"><?php  if($_GET['eid']=='')
										   { ?>
                            Manage Restaurant Menu Offer
                            <?php } else { ?>
                            Manage Restaurant Menu Offer
                            <?php } ?></a>
											</div>
										</div>
                                        <div class="row-fluid">
    <div class="span12">
    
     <div>  
										
										<?php
											if($_GET['dmsg']!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Restaurant Menu Offer Name has been successfully deleted.
		                                     </div>
											<?php }?>
                                            
                                            
                                             <?php
											if($_GET['amsg']==1)
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Restaurant Menu Offer Name has been successfully actiavted/Deactivated.
		                                     </div>
											<?php }?></div>
                                             <?php
		if($_GET['f']!='')
		{
		$filed=$_GET['f'];
		}
		else
		{
		$filed="MenuofferTitle";
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
        $statement = "table_menuofferTitle";
		if($_GET['RestaurantPizzaID']!='' && $_GET['statusid']!='')
		{
		$url="manage_menuOffer.php?RestaurantPizzaID=".$_GET['RestaurantPizzaID']."&statusid=".$_GET['statusid']."&";
		$where="RestaurantPizzaID='".$_GET['RestaurantPizzaID']."' and status='".$_GET['statusid']."'";
		$qur="SELECT * FROM {$statement} where RestaurantPizzaID='".$_GET['RestaurantPizzaID']."' and status='".$_GET['statusid']."' $sortBy  LIMIT {$startpoint} , {$limit} ";
		}
		elseif($_GET['RestaurantPizzaID']!='')
		{
		
		$url="manage_menuOffer.php?RestaurantPizzaID=".$_GET['RestaurantPizzaID']."&";
			$where="RestaurantPizzaID='".$_GET['RestaurantPizzaID']."'";
		$qur="SELECT * FROM {$statement} where RestaurantPizzaID='".$_GET['RestaurantPizzaID']."' $sortBy  LIMIT {$startpoint} , {$limit} ";
		}
		
		elseif($_GET['statusid']!='')
		{
		$url="manage_menuOffer.php?statusid=".$_GET['statusid']."&";
		
			$where="status='".$_GET['statusid']."'";
		$qur="SELECT * FROM {$statement} where status='".$_GET['statusid']."' $sortBy  LIMIT {$startpoint} , {$limit}";
		}
		else
		{
		$url="manage_menuOffer.php?";
			$where="1";
		$qur="SELECT * FROM {$statement} $sortBy LIMIT {$startpoint} , {$limit} ";
		}
		
		
		
		//echo $qur;
		 $query = mysql_query($qur);
		 $numrowdata=mysql_num_rows($query);
		 
											 ?>
     <br />  <script type="text/javascript">
											 function submitURL(Dvalue,str,restaurantCity1,statusid1)
{
window.location.href="manage_menuOffer.php?RestaurantPizzaID="+restaurantCity1+"&statusid="+statusid1+"&sort="+str+"&f="+Dvalue
}
											 </script>
                                               <script type="text/javascript">
											  function getOrgTypeListRestCityOffer(str){
//alert(str);
if (str=="")
{
document.getElementById("restaurant_city1").innerHTML="";
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
document.getElementById("restaurant_city1").innerHTML=xmlhttp.responseText;
//alert(xmlhttp.responseText);
}
}
xmlhttp.open("post","cityFatchOffer1.php?q="+str,true);
xmlhttp.send();
}


function getOrgTypeListRestOffer(str){
//alert(str);
if (str=="")
{
document.getElementById("RestaurantPizzaID22").innerHTML="";
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
document.getElementById("RestaurantPizzaID22").innerHTML=xmlhttp.responseText;
//alert(xmlhttp.responseText);
}
}
xmlhttp.open("post","ResFatchOfferMenuFilter.php?q="+str,true);
xmlhttp.send();
}

											 </script>
                                            
		   <form name="frmproduct" method="post">
										<table class="table table-bordered">
											<thead>
                                            <?php if($numrowdata>0){ ?>
                                            <tr  id="alldispaly" style="display:none;">
													<td colspan="6" align="right" style="margin-left:200px;"><input name="deleteall" id="deleteall" class="btn btn-warning" title="Delete All Menu Offer Name" value="Delete All" onClick="return confirm('Are you sure to delete selected Menu Offer Name');"  type="submit">&nbsp;<input name="activateall" id="activateall" class="btn btn-warning" title="Activated All Menu Offer Name" value="Activate All" onClick="return confirm('Are you sure to activate selected Menu Offer Name');"  type="submit">&nbsp;<input name="dactivateall" id="dactivateall" class="btn btn-warning" title="Deactivate All Menu Offer Name" value="Deactivate All" onClick="return confirm('Are you sure to deactivated selected Menu Offer Name');"  type="submit"></td></tr>
                                                    <?php }  ?>
												<tr>
                                                
                                                <th><input type="checkbox" id="check_all" value=""></th>
													<th>#</th>
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
					<th><a onClick="submitURL('RestaurantPizzaID','<?php echo $pl;?>','<?php echo $_GET['RestaurantPizzaID'];?>','<?php echo $_GET['statusid'];?>');" style="cursor:pointer;">Restaurant Name <?php echo $imgSort;?> </a></th>
                    
                    <th><a onClick="submitURL('MenuofferTitle','<?php echo $pl;?>','<?php echo $_GET['RestaurantPizzaID'];?>','<?php echo $_GET['statusid'];?>');" style="cursor:pointer;">Offer Name <?php echo $imgSort;?> </a></th>
                    <th><a  style="cursor:pointer;">Offer Description</a></th>
					<th><a  style="cursor:pointer;">Add Offer Slot</a></th>
                
					<th><a  style="cursor:pointer;">Actions</a></th>
				</tr>
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
                                                    <td><?php 
													$plom=mysql_fetch_assoc(mysql_query("select * from tbl_restaurantAdd where id='".$row['RestaurantPizzaID']."'"));
													echo ucwords($plom['restaurant_name']);?></td>
					
                    <td><?php echo ucwords($row['MenuofferTitle']);?> </td>
                    <td><?php echo ucwords($row['ResPizzaDescription']);?></td>
					<td> 
                   
                    <a href="qc_menu_entryoffer.php?RestaurantPizzaID=<?php echo $row['RestaurantPizzaID'];?>" class="btn btn-empatsatu" title="Add Menu Offer">Add Menu offer Slot</a> 
                    
                    </td>
                  
					<td>
                    <?php if($_GET['RestaurantPizzaID']!=''){ ?>
					<a href="menuofferName.php?eid=<?php echo $row['id'];?>&RestaurantPizzaID=<?php echo $_GET['RestaurantPizzaID'];?>" class="btn btn-primary" title="Edit Menu Offer Name">Edit</a>
					<!--	<a href="#" class="sepV_a" title="View"><i class="icon-eye-open"></i></a>-->
						<a href="InsertPhp.php?tag=ResMenuOfferCategoryDelete&eid=<?php echo $row['id'];?>&RestaurantPizzaID=<?php echo $_GET['RestaurantPizzaID'];?>" class="btn btn-dualima" title="Delete Menu Offer Name" onClick="return confirm('Are you sure to do this action.');">Delete</a>
                        
                         <?php if($row['status']==0){ ?>
                        <a href="InsertPhp.php?tag=ResMenuOfferCategoryActivate&active=1&statusid=<?php echo $row['id'];?>&RestaurantPizzaID=<?php echo $_GET['RestaurantPizzaID'];?>" class="btn btn-duasembilan" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Menu Offer Name">Activated</a><?php } else {?>
                        <a href="InsertPhp.php?tag=ResMenuOfferCategoryActivate&active=0&statusid=<?php echo $row['id'];?>&RestaurantPizzaID=<?php echo $_GET['RestaurantPizzaID'];?>" class="btn btn-tigaempat" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Menu Offer Name">
                        Deactivated</a>
                          <?php } ?>
                      
                        <?php } else { ?>
                        <a href="menuofferName.php?eid=<?php echo $row['id'];?>" class="btn btn-primary" title="Edit Menu Offer Name">Edit</a>
					<!--	<a href="#" class="sepV_a" title="View"><i class="icon-eye-open"></i></a>-->
						<a href="InsertPhp.php?tag=ResMenuOfferCategoryDelete&eid=<?php echo $row['id'];?>" class="btn btn-dualima" title="Delete Menu Offer Name">Delete</a>
                        
                         <?php if($row['status']==0){ ?>
                        <a href="InsertPhp.php?tag=ResMenuOfferCategoryActivate&active=1&statusid=<?php echo $row['id'];?>" class="btn btn-duasembilan" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Menu Offer Name">Activated</a><?php } else {?>
                        <a href="InsertPhp.php?tag=ResMenuOfferCategoryActivate&active=0&statusid=<?php echo $row['id'];?>" class="btn btn-tigaempat" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Menu Offer Name">
                        Deactivated</a>
                          <?php } ?>
                        <?php } ?>
					</td>
				</tr>
                   <?php
												$count++;
												 }
												 } else { 
												  ?>
                                                <tr><td colspan="6" align="center"><strong style="color:#D20000; padding:5px; font-size:14px;">No Restaurant Menu Offer Name is available in current Database.</strong></td></tr>
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
	<script src="js/bootstrap-fileupload.js"></script>
        <script src="js/chosen.jquery.min.js"></script>
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
