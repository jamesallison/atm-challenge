// declare globals
var pinLength = 0;
var pin = "";
var accountnumber = "4444444444444444";
var currentUserDetails = "";

$(".pinbutton-login").click(function() {
	// first check if there is 4 digits in there already
	if(pinLength + 1 == 4) {
		// add the last digit and submit Pin
		pin = pin + $(this).text();
		submitPin(pin);
		// add the asterisk again
		$("#window-login").html($("#window-login").html() + "<i class='fa fa-asterisk'></i>");
	}
	else {
		// get the value of the button that was pressed
		// add asterick to the window
		$("#window-login").html($("#window-login").html() + "<i class='fa fa-asterisk'></i>");
		
		// add pinLength
		pinLength = pinLength + 1;
		
		// add to actual pin string
		pin = pin + $(this).text();
	}
});

function submitPin(pin) {
	var response;
	// ajax request to api (login.php endpoint)
	$.ajax({
	    "type": "GET",
	    "url": "/api/login.php?cardnumber=4444444444444444&pin=" + pin,
	    "success": function(text) {
		    response = text;
	    }
	
	}).done(function ( ) {
		// if the api responded with "false" then their login details were wrong
		if(response == false) {
			// reset the page
			location.reload();
		}
		else {
			// logged in successfully, change currentUser and send them to the main screen
			currentUserDetails = response;
			mainScreen();
		}
	    console.log(response);
	
	}).fail(function ( jqXHR, textStatus, errorThrown ) {
	    console.log(jqXHR);
	    console.log(textStatus);
	    console.log(errorThrown);
	});
}

function mainScreen() {
	// hide the screen's login section and any subscreens, and show the main section
	$(".subScreen").hide();
	$("#loginScreen").hide();
	$("#mainScreen").show();
	$("#mainScreenMenu").show();
	
	//alert(currentUser["balance"]);
}

// cancel button, which will 'return' their card and take them back to pin input
$("#cancelButton").click(function() {
	// if they're on the withdrawal subscreen, then this button should serve as the £20 button
	if($("#withdrawScreen").css('display') == 'none') {
		// reset currentUserDetails
		currentUserDetails = "";
		// show the pin input menu by resetting the page
		location.reload();
	}
	else {
		// they're on the withdrawal screen, serve as £20 button
		withdraw(20);
	}
});

// back button, to escape from sub-screens and go to the main menu
$("#backButton").click(function() {
	$(".subScreen").hide();
	$("#mainScreenMenu").show();
});

// balance screen
$("#balanceButton").click(function() {
	// hide the menu screen
	$("#mainScreenMenu").hide();
	// show balance screen
	$("#balanceScreen").show();
	// update the balance span
	$("#balance").html("&pound;" + currentUserDetails["balance"]);
});

// pin change screen
$("#pinButton").click(function() {
	// hide the menu screen
	$("#mainScreenMenu").hide();
	// show pin change screen
	$("#pinScreen").show();
});
// reset global pin vars for new pin too
var newpinLength = 0;
var newpin = "";
$(".pinbutton-newpin").click(function() {
	// first check if there is 4 digits in there already
	if(newpinLength + 1 == 4) {
		// add the last digit and submit Pin
		changePin(newpin + $(this).text());
		// add the asterisk again
		$("#window-newpin").html($("#window-newpin").html() + "<i class='fa fa-asterisk'></i>");
	}
	else {
		// add the  asterick to the window
		$("#window-newpin").html($("#window-newpin").html() + "<i class='fa fa-asterisk'></i>");
		
		// add pinLength
		newpinLength = newpinLength + 1;
		
		// add to actual pin string
		newpin = newpin + $(this).text();
	}
});

// pin change function
function changePin(newpin) {
	var response_newpin;
	$.ajax({
	    "type": "GET",
	    "url": "/api/pin.php?cardnumber=4444444444444444&pin=" + pin + "&newpin=" + newpin,
	    "success": function(text) {
		    response_newpin = text;
    	}

	}).done(function ( ) {
		// if the api responded with "false" then their login details were wrong
		if(response_newpin == false) {
			// reset the page
			location.reload();
		}
		else {
			// pin changed successfully, login them in again with their new pin and send them to the main menu
			submitPin(newpin)
			mainScreen();
		}
	    console.log(response);
	
	}).fail(function ( jqXHR, textStatus, errorThrown ) {
	    console.log(jqXHR);
	    console.log(textStatus);
	    console.log(errorThrown);
	});
}

// withdraw screen
$("#withdrawButton").click(function() {
	// if they're on the withdrawal subscreen, then this button should serve as the £10 button
	if($("#withdrawScreen").css('display') == 'none') {
		// hide the menu screen
		$("#mainScreenMenu").hide();
		// show withdraw screen
		$("#withdrawScreen").show();
	}
	else {
		// they're on the withdrawal screen, serve as £10 button
		withdraw(10);
	}
});

// withdraw function
function withdraw(amount) {
	var response;
	$.ajax({
	    "type": "GET",
	    "url": "/api/withdraw.php?cardnumber=4444444444444444&pin=" + pin + "&newpin=" + newpin + "&amount=" + amount,
	    "success": function(text) {
		    response = text;
    	}

	}).done(function ( ) {
		// if the api responded with "false" then their login details were wrong
		if(response == false) {
			// reset the page
			alert("Withdrawal failed - possibly insufficient funds.");
		}
		else {
			// withdraw successful, send to the main menu
			$(".subScreen").hide();
			$("#mainScreenMenu").show();
		}
	    console.log(response);
	
	}).fail(function ( jqXHR, textStatus, errorThrown ) {
	    console.log(jqXHR);
	    console.log(textStatus);
	    console.log(errorThrown);
	});
	
	// now we've done it server-side, change the local balance record
	currentUserDetails["balance"] = currentUserDetails["balance"] - amount;
	$("#balance").html(currentUserDetails["balance"]);
}
// withdraw 30
$("#30Button").click(function() {
	// withdraw it
	withdraw(30);
});
// withdraw 40
$("#40Button").click(function() {
	// withdraw it
	withdraw(40);
});