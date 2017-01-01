<?php //echo $_SERVER['HTTP_ACCEPT_LANGUAGE']; ?>
<script src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
            <script type="text/javascript">
function initialize() {
    var input = document.getElementById('AddressSearch');
    var options = {componentRestrictions: {country: 'GR'}};
                 
    new google.maps.places.Autocomplete(input, options);
}
             
google.maps.event.addDomListener(window, 'load', initialize);
</script>
<script type='text/javascript'>
$(function(){
var overlay = $('<div id="overlay"></div>');
$('.close').click(function(){
$('.popup').hide();
overlay.appendTo(document.body).remove();
return false;
});

$('.x').click(function(){
$('.popup').hide();
overlay.appendTo(document.body).remove();
return false;
});

$('.click').click(function(){
overlay.show();
overlay.appendTo(document.body);
$('.popup').show();
return false;
});
});
</script>
<link rel="stylesheet" href="css/colorbox.css" />
<?php /*?><link rel="stylesheet" href="css/colorbox.css" />
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
		
		<script src="http://www.jacklmoore.com/colorbox/jquery.colorbox.js"></script>
       
		<script>
			$(document).ready(function(){
				
				$(".iframe").colorbox({iframe:true, width:"70%", height:"85%"});
				
				
			});			
			
			
		</script><?php */?>
        
                   
        <script>
		
function getVote(int)
{
if(int=="")
{
document.getElementById("AddressSearch").style.background="#DD0000";
}
else
{
document.getElementById("AddressSearch").style.background="";
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
    document.getElementById("datadiv").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","poll_vote.php?vote="+int,true);
xmlhttp.send();
}
}
</script>

<style type="text/css">
#overlay {position: fixed;top: 0;left: 0;width: 100%;height: 100%;background-color: #000;filter:alpha(opacity=70);-moz-opacity:0.7;-khtml-opacity: 0.7;opacity: 0.7;z-index: 100;
display: none;}
.popup{width: 63%;margin-left: 8%;background: #FFFFFF;top: 11%;height:550px;display: none;position: fixed;z-index: 101;}
</style>
         
<form id="popupform"  name="popupform" method="get"  >
        <div class="area">
        
          <input type="text" required placeholder="  Enter your address " name="AddressSearch" id="AddressSearch" onblur="getVote(this.value)" / >
          <div id="errorDiv" style="color:#FF0000;"></div>
          </div>
          <input type="submit" value="<?php echo ucwords($TableLanguage['OrderNowButton']);?> &raquo;" id="order_address_btn" class="click"/>
        </form>
         <div class='popup'><?php include('googleverification.php'); ?></div>   
