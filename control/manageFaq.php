<?php include('route/header.php');
include('route/DB_Functions.php');
   $dbb = new DB_Functions();
 include('route/pagination.php');
mysql_query ("set character_set_results='utf8'"); 
if($_GET['eid']!='')
{
 $CuisineQuery = $dbb->showtabledata("tbl_FAQ","id",$_GET['eid']);
 $CuisineData=mysql_fetch_assoc($CuisineQuery);
}
if(isset($_POST['deleteall'])) {
	$id_array = $_POST['data']; // return array
	$id_count = count($_POST['data']); // count array
	for($i=0; $i <$id_count; $i++) {
		$id = $id_array[$i];
		$query = mysql_query("DELETE FROM `tbl_FAQ` WHERE `id` = '$id'");
		if(!$query) { 
		header("location:manageFaq.php");
		}
	}
	
	 // redirent after deleting
}
if(isset($_POST['activateall'])) {
	$id_array = $_POST['data']; // return array
	$id_count = count($_POST['data']); // count array
	for($i=0; $i <$id_count; $i++) {
		$id = $id_array[$i];
		$query = mysql_query("update `tbl_FAQ` set status='0' WHERE `id` = '$id'");
		if(!$query) { 
		header("location:manageFaq.php");
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
		$query = mysql_query("update `tbl_FAQ` set status='1' WHERE `id` = '$id'");
		if(!$query) 
		{ 
		header("location:manageFaq.php");
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
							<li class="active" style="background-color:#f2f2f2;"><a href="#mainFormElements" style="background-color:#f2f2f2;" data-toggle="tab"><i class="icon-file"></i><?php  if($_GET['eid']=='')
										   { ?>
                           Manage FAQ
                            <?php } else { ?>
                            Manage FAQ
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
                           Display FAQ
                            <?php } else { ?>
                            Display FAQ
                            <?php } ?></a>
											</div>
										</div>
                                        <div align="center">  
										
										<?php
											if($_GET['dmsg']!='')
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />FAQ has been successfully deleted.
		                                     </div>
											<?php }?>
                                            
                                            
                                             <?php
											if($_GET['amsg']==1)
											{?>
											<div id="display-success">
			                                 <img src="img/correct.png" alt="Success" />FAQ has been successfully actiavted/Deactivated.
		                                     </div>
											<?php }?></div>
                                        <div class="row-fluid">
    <div class="span12">
        <div class="row-fluid">
            <div class="span12">
				<h3 class="heading">Display FAQ</h3>
				<div id="accordion1" class="accordion">
					<?php
		
		$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    	$limit = 10;
    	$startpoint = ($page * $limit) - $limit;
        //to make pagination
        $statement = "`tbl_FAQ`";
		$url="manageFaq.php?contact=1&";
		$where="1";
		 $query = mysql_query("SELECT * FROM {$statement} order by ViewPostion asc  LIMIT {$startpoint} , {$limit}");
		 $numrowdata=mysql_num_rows($query);
		 
											 ?>
                                              <?php
            //show records
            if($numrowdata>0)
			{
            $count=1;
        	while ($row = mysql_fetch_assoc($query)) {
			
        ?>
					<div class="accordion-group">
						<div class="accordion-heading">
							<a href="#collapseTwo<?php echo $count; ?>" data-parent="#accordion<?php echo $count; ?>" data-toggle="collapse" class="accordion-toggle">
								Question #<?php echo $count; ?> : <?php echo ucwords($row['faq_question']);?>
							</a>
						</div>
						<div class="accordion-body collapse" id="collapseTwo<?php echo $count; ?>">
							<div class="accordion-inner">
                            <table width="100%" border="0">
  <tr>
    <td><?php echo ucwords($row['faq_answer']);?></td>
    <td>View Position - <?php echo ucwords($row['ViewPostion']);?></td>
    <td><a href="cms_faq.php?eid=<?php echo $row['id'];?>" class="btn btn-primary" title="Edit Country">Edit</a>
						<a href="InsertPhp.php?tag=FAQDelete&eid=<?php echo $row['id'];?>" class="btn btn-dualima" title="Delete Country" onClick="javascript:return confirm('are you sure to delete permanently')" >Delete</a>
                        
                          <?php if($row['status']==0){ ?>
                        <a href="InsertPhp.php?tag=FAQActivate&active=1&statusid=<?php echo $row['id'];?>" class="btn btn-duasembilan" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate FAQ">Activate</a><?php } else {?>
                        <a href="InsertPhp.php?tag=FAQActivate&active=0&statusid=<?php echo $row['id'];?>" class="btn btn-tigaempat" onClick="return confirm('Are you sure to do this action.');" title="Activate/Deactivate FAQ">
                        Deactivate</a>
                          <?php } ?>
                        </td>
  </tr>
</table>

								 
							</div>
						</div>
					</div>
					
                       <?php
												$count++;
												 }
												 } else { 
												  ?>
                                                  <table width="100%" cellpadding="0">
                                                <tr><td colspan="3" align="center"><strong style="color:#D20000; padding:5px; font-size:14px;">No FAQ is available in current Database.</strong></td></tr></table>
                                                <?php } ?>
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
