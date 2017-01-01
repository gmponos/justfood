<style type="text/css">
.search-box {width: 96.2%;    }
	ul.typeahead{max-height:160px;overflow-x:hidden;overflow-y:scroll; width:438px;}
.dropup,.dropdown{position:relative}
.dropdown-toggle{*margin-bottom:-3px}
.dropdown-toggle:active,.open .dropdown-toggle{outline:0}
/*.caret{display:inline-block;width:0;height:0;vertical-align:top;border-top:4px solid #000;border-right:4px solid transparent;border-left:4px solid transparent;content:""}*/
.dropdown .caret{margin-top:8px;margin-left:2px}
.dropdown-menu{position:absolute;top:100%;left:0;z-index:1000;display:none;float:left;min-width:438px;padding:5px 0;margin:2px 0 0;list-style:none;background-color:#fff;border:1px solid #ccc;border:1px solid rgba(0,0,0,0.2);*border-right-width:2px;*border-bottom-width:2px;-webkit-border-radius:6px;-moz-border-radius:6px;border-radius:6px;-webkit-box-shadow:0 5px 10px rgba(0,0,0,0.2);-moz-box-shadow:0 5px 10px rgba(0,0,0,0.2);box-shadow:0 5px 10px rgba(0,0,0,0.2);-webkit-background-clip:padding-box;-moz-background-clip:padding;background-clip:padding-box}
.dropdown-menu.pull-right{right:0;left:auto}
.dropdown-menu .divider{*width:100%;height:1px;margin:9px 1px;*margin:-5px 0 5px;overflow:hidden;background-color:#e5e5e5;border-bottom:1px solid #fff}
.dropdown-menu>li>a{display:block;padding:3px 20px;clear:both;font-weight:normal;line-height:20px;color:#333;white-space:nowrap;text-align:left;}
.dropdown-menu>li>a:hover,.dropdown-menu>li>a:focus,.dropdown-submenu:hover>a,.dropdown-submenu:focus>a{text-decoration:none;color:#fff;background-color:#e51b24;background-repeat: repeat-x;background-image: linear-gradient(to bottom,#e51b,#e51b24);}
.dropdown-menu>.active>a,.dropdown-menu>.active>a:hover,.dropdown-menu>.active>a:focus{color:#fff;text-decoration:none;outline:0;background-color:#e51b24;background-repeat: repeat-x;background-image: linear-gradient(to bottom,#e51b,#e51b24);}
.dropdown-menu>.disabled>a,.dropdown-menu>.disabled>a:hover,.dropdown-menu>.disabled>a:focus{color:#999}
.dropdown-menu>.disabled>a:hover,.dropdown-menu>.disabled>a:focus{text-decoration:none;background-color:transparent;background-image:none;filter:progid:DXImageTransform.Microsoft.gradient(enabled = false);cursor:default}
.open{*z-index:1000}
.open>.dropdown-menu{display:block}
.dropdown-backdrop{position:fixed;left:0;right:0;bottom:0;top:0;z-index:990}
.pull-right>.dropdown-menu{right:0;left:auto}
/*.dropup .caret,.navbar-fixed-bottom .dropdown .caret{border-top:0;border-bottom:4px solid #000;content:""}*/
.dropup .dropdown-menu,.navbar-fixed-bottom .dropdown .dropdown-menu{top:auto;bottom:100%;margin-bottom:1px}
.dropdown-submenu{position:relative}
.dropdown-submenu>.dropdown-menu{top:0;left:100%;margin-top:-6px;margin-left:-1px;-webkit-border-radius:0 6px 6px 6px;-moz-border-radius:0 6px 6px 6px;border-radius:0 6px 6px 6px}
.dropdown-submenu:hover>.dropdown-menu{display:block}
.dropup .dropdown-submenu>.dropdown-menu{top:auto;bottom:0;margin-top:0;margin-bottom:-2px;-webkit-border-radius:5px 5px 5px 0;-moz-border-radius:5px 5px 5px 0;border-radius:5px 5px 5px 0}
.dropdown-submenu>a:after{display:block;content:" ";float:right;width:0;height:0;border-color:transparent;border-style:solid;border-width:5px 0 5px 5px;border-left-color:#ccc;margin-top:5px;margin-right:-10px}
.dropdown-submenu:hover>a:after{border-left-color:#fff}
.dropdown-submenu.pull-left{float:none}
.dropdown-submenu.pull-left>.dropdown-menu{left:-100%;margin-left:10px;-webkit-border-radius:6px 0 6px 6px;-moz-border-radius:6px 0 6px 6px;border-radius:6px 0 6px 6px}
.dropdown .dropdown-menu .nav-header{padding-left:20px;padding-right:20px}
.typeahead{z-index:1051;margin-top:2px;-webkit-border-radius:4px;-moz-border-radius:4px;border-radius:4px;}
.fade{opacity:0;-webkit-transition:opacity .15s linear;-moz-transition:opacity .15s linear;-o-transition:opacity .15s linear;transition:opacity .15s linear}
.fade.in{opacity:1}
.collapse{position:relative;height:0;overflow:hidden;-webkit-transition:height .35s ease;-moz-transition:height .35s ease;-o-transition:height .35s ease;transition:height .35s ease}
.collapse.in{height:auto}
</style>
<link rel="stylesheet" href="css/colorbox.css" />
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
		
		<script src="http://www.jacklmoore.com/colorbox/jquery.colorbox.js"></script>
       
		<script>
			$(document).ready(function(){
				
				$(".iframe").colorbox({iframe:true, width:"70%", height:"85%"});
				
			});			
			
			
		</script>
          <script src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
            <script type="text/javascript">
function initialize() {
    var input = document.getElementById('searchTextField');
    var options = {componentRestrictions: {country: 'GR'}};
                 
    new google.maps.places.Autocomplete(input, options);
}
             
google.maps.event.addDomListener(window, 'load', initialize);
</script>
<form id="" action="restaurantSearchText.php"  method="get"  >
        <div class="area">
        <div style="border-left:none;">
       <span class="search-box">
                               <!-- <div class="combobox-container"><span class="add-on btn dropdown-toggle" data-dropdown="dropdown"><span class="caret"></span><span class="combobox-clear"><i class="icon-remove"></i></span></span></div>-->
                          <input id="searchTextField" type="text" placeholder=" Enter Your Address " title=" Enter Your Address eg. 512 New Kot Goan Rakesh Marg " required name="AddressSearch"  class="combobox" style="padding: 4px; height: 38px; margin-top: 0px; border: 0px; ">      
  <?php /*?><select id="ctl00_BodyContent_ddlsearch2" placeholder=" Enter Your Address " title=" Enter Your Address eg. 512 New Kot Goan Rakesh Marg " required name="AddressSearch"  class="combobox" style="padding: 4px; height: 38px; margin-top: 0px; border: 0px; display: none; overflow:scroll; ">
	<?php
include('config1.php');
$sql_res33=mysql_query("select restaurant_address from tbl_restaurantAdd ");
if(mysql_num_rows($sql_res33)>0){
while($row33=mysql_fetch_array($sql_res33))
{
?>
    <option value="<?php echo $row33['restaurant_address']; ?>"><?php echo $row33['restaurant_address']; ?></option>
<?php } } else { ?>   
 <option value="">No search results.</option>
 <?php } ?>

  
	<option value="" selected> Enter your address (or cuisine, or restaurant) </option>

</select><?php */?>
                                </span>
</div>
          <!--<input type="text" placeholder="  Enter your address " name="AddressSearch" id="AddressSearch" style=" font-size:14px; color:#000000;"/ >-->
          </div>
          <a class="iframe" href="googleverification.php" style="text-decoration:none;"><input type="submit" value="Order Now &raquo;" id="bigbutton" style="width:27%; height:50px;"/></a>
        </form>