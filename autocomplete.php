<?php
	include('config1.php');
	$q=$_GET['q'];
	$my_data=mysql_real_escape_string($q);
	
	$sql="SELECT * FROM tbl_restaurantAdd WHERE restaurant_address LIKE '%$my_data%' ORDER BY restaurant_address";
	$result = mysql_query($sql) or die(mysql_error());
	
	if($result)
	{
		while($row=mysql_fetch_array($result))
		{
			echo $row['restaurant_address']."\n";
		}
	}
?>