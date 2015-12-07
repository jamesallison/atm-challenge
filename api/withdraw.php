<?php
	// set the headers
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');
	
	// connect to database
	require_once('../includes/mysql.php');
	
	// sanitise variables
	$cardnumber = intval($_GET['cardnumber']);
	$pin = intval($_GET['pin']);
	
	// check if amount is valid, and if either cardnumber or pin are null
	if(is_numeric($_GET['amount']) && $cardnumber != 0 && $pin != 0) {
		// all good, write query
		$query = mysql_query("SELECT id,balance FROM accounts WHERE pin=$pin");
		
		// execute query
		if(mysql_num_rows($query)) {
			// account found, check they have sufficient funds
			$account = mysql_fetch_assoc($query);
			if($account['balance'] > $_GET['amount']) {
			
				// calculate new balance value
				$newbalance = $account['balance'] - $_GET['amount'];
				// update balance in table
				$id = $account['id'];
				mysql_query("UPDATE accounts SET balance=$newbalance WHERE id='$id'");
				
				// check the balance change went ahead okay
				$account = mysql_fetch_assoc(mysql_query("SELECT balance FROM accounts WHERE id='$id'"));
				if($account['balance'] == $newbalance) {
					// balance updated, return new balance
					echo json_encode($account, JSON_PRETTY_PRINT);
				}
				else {
					// something didn't work, return false
					echo 'false';
				}
			}
			else {
				// not enough funds
				echo 'false';
			}
		}
		else {
			// account not found, return false
			echo 'false';
		}
	}
	else {
		echo 'false';
		
	}
?>