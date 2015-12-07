<?php
	// set the headers
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');
	
	// first check the new pin is valid
	if(is_int(intval($_GET['newpin'])) && strlen($_GET['newpin'])==4) {
		// connect to database
		require_once('../includes/mysql.php');
		
		// sanitise variables
		$cardnumber = intval($_GET['cardnumber']);
		$pin = intval($_GET['pin']);
		
		// check if either is null
		if($cardnumber != 0 && $pin != 0) {
			// write query
			$query = mysql_query("SELECT id FROM accounts WHERE pin=$pin");
			
			// execute query
			if(mysql_num_rows($query)) {
				// account found, change the pin
				$account = mysql_fetch_assoc($query);
				mysql_query("UPDATE accounts SET pin=".$_GET['newpin']." WHERE id=".$account['id']);
				
				// done, return true
				echo 'true';
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
	}
	else {
		// pin invalid, return false
		echo 'false';
	}
?>