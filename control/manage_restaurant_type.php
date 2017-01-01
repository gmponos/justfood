<?php include('route/header.php'); ?>
<?php
include('route/DB_Functions.php');
$dbb = new DB_Functions();
include('route/pagination.php');
mysql_query ("set character_set_results='utf8'"); 
if($_GET['eid']!='')
{
 $CuisineQuery = $dbb->showtabledata("tbl_restaurantType","id",$_GET['eid']);
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
}
if(isset($_POST['deleteall'])) {
	$id_array = $_POST['data']; // return array
	$id_count = count($_POST['data']); // count array
	for($i=0; $i <$id_count; $i++) {
		$id = $id_array[$i];
		$query = mysql_query("DELETE FROM `tbl_restaurantType` WHERE `id` = '$id'");
		if(!$query) { 
		header("location:manage_restaurant_type.php");
		}
	}
	
	 // redirent after deleting
}
if(isset($_POST['activateall'])) {
	$id_array = $_POST['data']; // return array
	$id_count = count($_POST['data']); // count array
	for($i=0; $i <$id_count; $i++) {
		$id = $id_array[$i];
		$query = mysql_query("update `tbl_restaurantType` set status='0' WHERE `id` = '$id'");
		if(!$query) { 
		header("location:manage_restaurant_type.php");
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
		$query = mysql_query("update `tbl_restaurantType` set status='1' WHERE `id` = '$id'");
		if(!$query) 
		{ 
		header("location:manage_restaurant_type.php");
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
							<li class="active" style="background-color:#f2f2f2;"><a href="#mainFormElements" style="background-color:#f2f2f2;" data-toggle="tab"><i class="icon-file"></i>Manage Restaurant Type</a></li>
						</ul>

						<div class="tab-content"  style="height:1200px;">
							<div class="tab-pane active" id="mainFormElements"  >
								<div id="itemContainer">
								
									<div class="well">
										<div class="navbar">
											<div class="navbar-inner">
												<a class="brand" href="#">Manage Restaurant Type</a>
											</div>
										</div>
                                        <div>  
										<?php if($_GET['msg']==1)
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" /> New Restaurant Type has been successfully saved
		                                     </div>
											<?php } if($_GET['error']==1){?>
											<div id="display-error">
			                                 <img src="img/error.png" alt="Error" />New Restaurant Type is already exit.
		                                     </div>
                                            <?php } ?>
										<?php
											if($_GET['dmsg']!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Restaurant Type has been successfully deleted.
		                                     </div>
											<?php }?>
                                            
                                            
                                             <?php
											if($_GET['amsg']==1)
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Restaurant Type has been successfully actiavted/Deactivated.
		                                     </div>
											<?php }?></div>
										<?php
										  
		
		$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    	$limit = 40;
    	$startpoint = ($page * $limit) - $limit;
        //to make pagination
		if($_GET['f']!='')
		{
		$filed=$_GET['f'];
		}
		else
		{
		$filed="restaurant_type_name";
		}	 
		if($_GET['sort']!='')
		{
		$sortBy='order by '.$filed.' '.$_GET['sort'];
		}
		else
		{
		$sortBy='order by '.$filed.'  asc';
		}
        $statement = "tbl_restaurantType";
		$url="manage_restaurant_type.php?t=1&";
		$where="1'";
		$qur="SELECT * FROM {$statement} $sortBy LIMIT {$startpoint} , {$limit}";
		//echo $qur;
		 $query = mysql_query($qur);
		 $numrowdata=mysql_num_rows($query);
										?>
                                         <script type="text/javascript">
 function submitURL(Dvalue,str)
{
window.location.href="manage_restaurant_type.php?sort="+str+"&f="+Dvalue
}
</script>
                                        
                                        <div class="row-fluid">
    <div class="span12">
      <form name="frmproduct" method="post">
		<table  class="table table-bordered" id="">
			<thead>
             <?php if($numrowdata>0){ ?>
                                           <tr  id="alldispaly" style="display:none;">
													<td colspan="4" align="right" style="margin-left:200px;"><input name="deleteall" id="deleteall" class="btn btn-warning" title="Delete All Restaurant Type" value="Delete All" onClick="return confirm('Are You sure to deleted all selected restaurant Type');"  type="submit">&nbsp;<input name="activateall" id="activateall" class="btn btn-warning" title="Activated All Restaurant Type" value="Activate All"  onclick="return confirm('Are You sure to Activate all selected restaurant Type');"  type="submit">&nbsp;<input name="dactivateall" id="dactivateall" class="btn btn-warning" title="Deactivate All Restaurant Type" value="Deactivate All" onClick="return confirm('Are You sure to Deactivate all selected restaurant Type');"  type="submit"></td></tr>
                                                    <?php }  ?>
				<tr>
					<th class="table_checkbox"><input type="checkbox" id="check_all" value=""></th>
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
                                                     <a onclick="submitURL('restaurant_type_name','<?php echo $pl;?>');" style="cursor:pointer;">Restaurant Type  
                                                     <?php echo $imgSort;?>
                                                   </a></th>
                    <th> <a onclick="submitURL('created_date','<?php echo $pl;?>');" style="cursor:pointer;">Created Date  
                                                     <?php echo $imgSort;?>
                                                   </a></th>
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
                                                    <td><?php echo ucwords($row['restaurant_type_name']);?></td>
                                                     <td><?php echo ucwords($row['created_date']);?></td>
					
					<td>
						<a href="add_restaurant_type.php?eid=<?php echo $row['id'];?>" class="btn btn-primary" title="Edit Restaurant Type">Edit Restaurant Type</a>
					<!--	<a href="#" class="sepV_a" title="View"><i class="icon-eye-open"></i></a>-->
						<a href="InsertPhp.php?tag=ResTypeDelete&eid=<?php echo $row['id'];?>" title="Delete Restaurant Type" onClick="javascript:return confirm('are you sure to delete permanently')" class="btn btn-dualima" >Delete Restaurant Type</a>
                       
                         <?php if($row['status']==0){ ?>
                        <a href="InsertPhp.php?tag=ResTypeActivate&active=1&statusid=<?php echo $row['id'];?>" class="btn btn-duasembilan" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Restaurant Type">Activated</a><?php } else {?>
                        <a href="InsertPhp.php?tag=ResTypeActivate&active=0&statusid=<?php echo $row['id'];?>" class="btn btn-tigaempat" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate Restaurant Type">
                        Deactivated</a>
                          <?php } ?>
                     
                       
					</td>
				</tr>
                                                <?php
												$count++;
												 }
												 } else { 
												  ?>
                                                <tr><td colspan="5" align="center"><strong style="color:#D20000; padding:5px; font-size:14px;">No Restaurant Type is available in current Database.</strong></td></tr>
                                                <?php } ?>
				
			</tbody>
		</table>
		  </form>
                                        <table width="100%" style="margin-left:100px;">
                                        <tr><td align="center" ><?php //echo pagination($statement,$where,$limit,$page,$url);?></td></tr>
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
