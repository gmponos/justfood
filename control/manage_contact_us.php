<?php include('route/header.php'); 
include('route/DB_Functions.php');
   $dbb = new DB_Functions();
 include('route/pagination.php');
mysql_query ("set character_set_results='utf8'"); 
if($_GET['eid']!='')
{
 $CuisineQuery = $dbb->showtabledata("tbl_onlineContact","id",$_GET['eid']);
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
}
if(isset($_POST['deleteall'])) {
	$id_array = $_POST['data']; // return array
	$id_count = count($_POST['data']); // count array
	for($i=0; $i <$id_count; $i++) {
		$id = $id_array[$i];
		$query = mysql_query("DELETE FROM `tbl_onlineContact` WHERE `id` = '$id'");
		if(!$query) { 
		header("location:manage_contact_us.php");
		}
	}
	
	 // redirent after deleting
}
if(isset($_POST['activateall'])) {
	$id_array = $_POST['data']; // return array
	$id_count = count($_POST['data']); // count array
	for($i=0; $i <$id_count; $i++) {
		$id = $id_array[$i];
		$query = mysql_query("update `tbl_onlineContact` set ipblock='0' WHERE `id` = '$id'");
		if(!$query) { 
		header("location:manage_contact_us.php");
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
		$query = mysql_query("update `tbl_onlineContact` set ipblock='1' WHERE `id` = '$id'");
		if(!$query) 
		{ 
		header("location:manage_contact_us.php");
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
							<li class="active" style="background-color:#f2f2f2;"><a href="#mainFormElements" style="background-color:#f2f2f2;" data-toggle="tab"><i class="icon-file"></i>Online Contact Detail</a></li>
						</ul>

						<div class="tab-content"  style="height:1200px;">
							<div class="tab-pane active" id="mainFormElements"  >
								<div id="itemContainer">
								
									<div class="well">
										<div class="navbar">
											<div class="navbar-inner">
												<a class="brand" href="#">Online Contact Detail</a>
											</div>
										</div>
                                         <div>  
										<?php if($_GET['msg']==1)
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" /> New Online Contact Detail has been successfully saved
		                                     </div>
											<?php } if($_GET['error']==1){?>
											<div id="display-error">
			                                 <img src="img/error.png" alt="Error" />New Online Contact Detail is already exit.
		                                     </div>
                                            <?php } ?>
										<?php
											if($_GET['dmsg']!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Online Contact Detail has been successfully deleted.
		                                     </div>
											<?php }?>
                                            
                                            
                                             <?php
											if($_GET['amsg']==1)
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />Online Contact Detail has been successfully actiavted/Deactivated.
		                                     </div>
											<?php }?></div>
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
		$filed="created_date";
		}	 
		if($_GET['sort']!='')
		{
		$sortBy='order by '.$filed.' '.$_GET['sort'];
		}
		else
		{
		$sortBy='order by '.$filed.'  asc';
		}
        $statement = "tbl_onlineContact";
		if($_GET['ipstatus']!='')
		{
		$url="manage_contact_us.php?ipstatus=".$_GET['ipstatus']."&";
		$where="ipblock='".$_GET['ipstatus']."'";
		
		$qur="SELECT * FROM {$statement} where ipblock='".$_GET['ipstatus']."'  $sortBy LIMIT {$startpoint} , {$limit}";
		}		
		else
		{
		$url="manage_contact_us.php?contact=1&";
		$where="1";
		
		$qur="SELECT * FROM {$statement}  $sortBy LIMIT {$startpoint} , {$limit}";
		}
		//echo $qur;
		 $query = mysql_query($qur);
		 $numrowdata=mysql_num_rows($query);
		 
											 ?>
                                                                                      <script type="text/javascript">
 function submitURL(Dvalue,str,statusid1)
{
window.location.href="manage_contact_us.php?ipstatus="+statusid1+"&sort="+str+"&f="+Dvalue;
}
</script>

    <form action="manage_contact_us.php" method="get" id="userform" name="userform">
      <table width="100%" border="0">
  <tr>
  
   <td><strong style="font-size:14px; font-weight:bold;">IP Status : </strong> </td>
    <td> <select  class="chzn_a span8"  name="ipstatus" style="width:150px;" id="ipstatus" onChange="document.userform.submit();" >
    <option value="">select</option>
				<option value="0" <?php if($_GET['ipstatus']==0){ ?> selected="selected" <?php } ?> >Unblock IP </option>
<option value="1" <?php if($_GET['ipstatus']==1){ ?> selected="selected" <?php } ?> >Block IP</option>
                </select></td>
  </tr>
</table>
    </form>
                                      
   

		  <form name="frmproduct" method="post">
										<table class="table table-bordered">
			
				<?php if($numrowdata>0){ ?>
                                            <tr  id="alldispaly">
													<td colspan="6" align="right" style="margin-left:200px;"><input name="deleteall" id="deleteall" class="btn btn-warning" title="Delete All Online Contact Detail" value="Delete All" onClick="return confirm('Are you sure to delete selected Online Contact Detail.');"  type="submit">&nbsp;<input name="activateall" id="activateall" class="btn btn-warning" title="Activate All Online Contact Detail" value="Activate All" onClick="return confirm('Are you sure to activate selected Online Contact Detail');"  type="submit">&nbsp;<input name="dactivateall" id="dactivateall" class="btn btn-warning" title="Deactivate All Online Contact Detail" value="Deactivate All" onClick="return confirm('Are you sure to deactivate selected Online Contact Detail');"  type="submit"></td></tr>
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
                                                     <a onclick="submitURL('contact_name','<?php echo $pl;?>','<?php echo $_GET['ipstatus'];?>');" style="cursor:pointer;">Contact Name <?php echo $imgSort;?></a></th>
													<th><a onclick="submitURL('contact_email','<?php echo $pl;?>','<?php echo $_GET['ipstatus'];?>');" style="cursor:pointer;">Contact Email <?php echo $imgSort;?></a></th>
                                                    <th><a onclick="submitURL('contact_ip','<?php echo $pl;?>','<?php echo $_GET['ipstatus'];?>');" style="cursor:pointer;">Contact IP <?php echo $imgSort;?></a></th>
                                                    <th><a onclick="submitURL('created_date','<?php echo $pl;?>','<?php echo $_GET['ipstatus'];?>');" style="cursor:pointer;">Created Date <?php echo $imgSort;?></a></th>
													
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
                                                    
                                                     <td><?php echo ucwords($row['contact_name']);?></td>
                                                      <td><?php echo ucwords($row['contact_email']);?></td>
													<td><?php echo ucwords($row['contact_ip']);?></td>
                                                    <td><?php echo ucwords($row['created_date']);?></td>
												
                                                
													<td>	
                         <a href="Contactsend_message.php?ViewId=<?php echo $row['id'];?>" class="btn btn-primary" title="Send Message Online Contact Detail">View/Send Message</a>
						<a href="InsertPhp.php?tag=ResContactDelete&eid=<?php echo $row['id'];?>" class="btn btn-dualima" title="Delete Online Contact Detail" onClick="javascript:return confirm('are you sure to delete permanently')" >Delete</a>
                           <?php if($row['ipblock']==0){ ?>
                        <a href="InsertPhp.php?tag=ResContactIPActivate&ipactive=1&statusid=<?php echo $row['id'];?>" class="btn btn-warning" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate IP Block">IP Block</a><?php } else {?>
                        <a href="InsertPhp.php?tag=ResContactIPActivate&ipactive=0&statusid=<?php echo $row['id'];?>" class="btn btn-warning" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate IP Block">
                        IP UnBlock</a>
                          <?php } ?>
                     </td>
												</tr>
                                                <?php
												$count++;
												 }
												 } else { 
												  ?>
                                                <tr><td colspan="10" align="center"><strong style="color:#D20000; padding:5px; font-size:14px;">No Online Contact Detail is available in current Database.</strong></td></tr>
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
