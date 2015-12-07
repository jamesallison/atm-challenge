<?php
	// set the headers
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');
	
	// connect to database
	require_once('../includes/mysql.php');
	
	// sanitise variables
	$cardnumber = intval($_GET['cardnumber']);
	$pin = intval($_GET['pin']);
	
	// check if either is null
	if($cardnumber != 0 && $pin != 0) {
		// write query
		$query = mysql_query("SELECT cardnumber,pin,created,balance FROM accounts WHERE pin=$pin");
		
		// execute query
		if(mysql_num_rows($query)) {
			// account found, return their account info
			echo json_encode(mysql_fetch_assoc($query), JSON_PRETTY_PRINT);
		}
		else {
			// account not found, return false
			echo 'false';
		}
	}
	else {
		// invalid vars
		echo 'false';
	}
	
	
?>