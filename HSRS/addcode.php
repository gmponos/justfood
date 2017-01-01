<!-- Welcome to the scripts database of HIOX INDIA      -->
<!-- This tool is developed and a copyright             -->
<!-- product of HIOX INDIA.			        -->
<!-- For more information visit http://www.hscripts.com -->

<br>

<link href="rating.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src="jquery.js"></script>
<script type='text/javascript'>
$(document).ready(function(){
$('.star a').hover(function(){
      var uid = this.id;
      switch(uid){
        case '1':
          $('#rateit').css({visibility: "visible", color: "red","font-size": "12", "font-family":"Arial"});
          $('#rateit').html('&nbsp;Poor');
          break;
        case '2':
          $('#rateit').css({visibility: "visible", color: "#b8860b","font-size": "12", "font-family":"Arial"});
          $('#rateit').html('&nbsp;Fair');
          break;
        case '3':
          $('#rateit').css({visibility: "visible", color: "purple","font-size": "12", "font-family":"Arial"});
          $('#rateit').html('&nbsp;Good');
          break;
        case '4':
          $('#rateit').css({visibility: "visible", color: "blue","font-size": "12", "font-family":"Arial"});
          $('#rateit').html('&nbsp;Very Good');
        case '5':
          $('#rateit').css({visibility: "visible", color: "green","font-size": "12", "font-family":"Arial"});
          $('#rateit').html('&nbsp;Excellent');                         
    }
    });
    
   $('.star a').mouseout(function() {
     var uid = this.id;
     $('#rateit').css({visibility: "hidden"});
     for(var x=1;x<=uid;x++){
        $('#star'+x).css('background-image', 'url("./HSRS/images/star.gif")');
     }
   });

  $('a').click(function(){
        var val = $(this).text();
		var hotel = "2332";
		var loginID = "7";
        $.get("addrating.php","rating="+val+"&hotelID="+hotel+"&UserID="+loginID,function(result){
          if(result != "not added"){
	    var sp = result.split("#");
            var ff = "[ "+sp[0]+" ]";
            var dispstars = sp[1];
            $("#final").html(dispstars);
            $("#strimg").html(ff);
            $('#res').css({opacity: 0.0, visibility: "visible"});
          }else if(result == "not added"){
            var already = ("Your Rating Is Already Present");
            $('#res').css({opacity: 0.0, visibility: "visible"});
            $("#already").css({visibility: "visible", "font-size":"12px",color: "red","padding-left":"15px"});
            $("#already").fadeIn(100);
            $("#already").html(already);
            $("#already").fadeOut(5000);
          }         
       });
    });

   }); 
  
</script>
<?php
  $start = $_GET['begin'];
  if($start == "")
	$start = 0;
  $url = $_SERVER['SCRIPT_NAME'];
  $host = $_SERVER['SERVER_NAME'];
  $ser = "http://$host";	
  $url1 = $_SERVER['argv'];
  $sss = count($url1);
  $serpath = $ser.$url;

if($sss >= 1)
  {
     $argas = $url1[0];
     $url="$url?$argas";
  }
  $url= $ser.$url;

  include "config.php";

  $link = mysql_connect($hostname, $username,$password);
  if($link)
  {
	$dbcon = mysql_select_db($dbname,$link);
  }
  $qur1 = "select count(*) as dd, avg(rateval) as xx from $tablename where url='$url' group by url";
    $result1 = mysql_query($qur1,$link);
  if($line = @mysql_fetch_array($result1, MYSQL_ASSOC))
  {
	$count = $line['dd'];
	$rateval = $line['xx'];
  }

?>

<table cellpadding=0 cellspacing=0 border=0 style="font-family: arial, verdana, san-serif; font-size: 13px;">
   <tr>
      <td colspan=2>
             <?php
             echo "&nbsp;&nbsp;Your Rating:&nbsp;";
             echo "<span id=final>";
             for($i=1;$i<=5;$i++)
                     {
                   	if($rateval>=1)
                	{
		           echo "<img src=\"images/star2.gif\" align=absmiddle alt='star rating'>";
                           $rateval=$rateval-1;
	                }
	                else if($rateval>=0.5)
	                {
 		           echo "<img src=\"images/star3.gif\" align=absmiddle alt='star rating'>";
		           $rateval=$rateval-1;
	                }
 	                else if ($rateval<0.5 && $rateval>0)
	                {
		           echo "<img src=\"images/star1.gif\" align=absmiddle alt='star rating'>";
		           $rateval=$rateval-1;
	                }
	                else if($rateval<=0)
	                {
		           echo "<img src=\"images/star1.gif\" align=absmiddle alt='star rating'>";
	                }
                }
                echo "</span>&nbsp;&nbsp;";
	           echo "<span id='strimg'>[&nbsp;$count&nbsp;]</span>";
	           
	?>
</td>
</tr>
<tr><td>&nbsp;&nbsp;Rate this page:</td><td>
<div id="rate2" class="rating">
<div id="star1" class="star"><a id="1">1</a></div>
<div id="star2" class="star"><a id="2">2</a></div>
<div id="star3" class="star"><a id="3">3</a></div>
<div id="star4" class="star"><a id="4">4</a></div>
<div id="star5" class="star"><a id="5">5</a></div>
<input type=hidden id="rating"><span id="rateit"></span>
</div>
</td><td></td></tr>
<tr><td colspan=2><span id='already' style='visibility: hidden; margin-top:20px;'></span></td></tr>
</table>
<div align=left><a style="margin-left: 150px; color: #efefef; font-size: 10px; text-decoration: none; " id=dum href="http://www.hscripts.com">&copy;h</a></div>