<?php
	// Set timezone
	date_default_timezone_set('UTC');
 
	// Start date
	$date = '2013-10-06';
	// End date
	$end_date = '2013-10-15';
 
	while (strtotime($date) <= strtotime($end_date)) {
		echo "$date\n";
		$date = date ("M-d", strtotime("+1 day", strtotime($date)));
	}
 
 
 //echo date("D",strtotime(22/11/2013));
?>

