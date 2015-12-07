<!DOCTYPE html>
<html>
	<head>
		<?php require_once('includes/head.php');?>
		<title>James' ATM</title>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row atm">
				<div class="atm-box">
					<div class="col-xs-2 controls">
						<a id="balanceButton" href="#" class="controlButton">
							<span class="fa-stack fa-lg">
								<i class="fa fa-square-o fa-stack-2x"></i>
								<i class="fa fa-chevron-right fa-stack-1x"></i>
							</span>
						</a>
						<a id="withdrawButton" href="#" class="controlButton">
							<span class="fa-stack fa-lg">
								<i class="fa fa-square-o fa-stack-2x"></i>
								<i class="fa fa-chevron-right fa-stack-1x"></i>
							</span>
						</a>
						<a id="30Button" href="#" class="controlButton">
							<span class="fa-stack fa-lg">
								<i class="fa fa-square-o fa-stack-2x"></i>
								<i class="fa fa-chevron-right fa-stack-1x"></i>
							</span>
						</a>
						<a id="backButton" href="#" class="controlButton">
							<span class="fa-stack fa-lg">
								<i class="fa fa-square-o fa-stack-2x"></i>
								<i class="fa fa-chevron-right fa-stack-1x"></i>
							</span>
						</a>
					</div>
					<div class="col-xs-8 screen">
						<div id="loginScreen">
							<h1 class="welcome"><i class="fa fa-university"></i> Welcome to James' Bank <i class="fa fa-university"></i></h1>
							Enter Your PIN
							<?php
								require_once('includes/elements.php');
								window_and_keypad("login");
							?>
						</div>
						<div id="mainScreen" style="display:none;">
							<div id="mainScreenMenu">
								<div class="row optionrow">
									<div class="col-md-6 left">
										Balance
									</div>
									<div class="col-md-6 right">
										New PIN
									</div>
								</div>
								<div class="row optionrow">
									<div class="col-md-6 left">
										Withdraw
									</div>
									<div class="col-md-6 right">
										Cancel
									</div>
								</div>
							</div>
							<div id="balanceScreen" class="subScreen" style="display: none;">
								Your current balance is:<br>
								<span id="balance" style="color: #283c92;"></span>
								<div style="padding-top: 2em;text-align:left;">Back</div>
							</div>
							<div id="withdrawScreen" class="subScreen" style="display: none;">
								Withdraw Money
								<p style="font-size: 0.5em;">&nbsp;</p>
								<div class="row optionrow">
									<div class="col-md-6 left">
										&pound;10
									</div>
									<div class="col-md-6 right">
										&pound;20
									</div>
								</div>
								<div class="row optionrow">
									<div class="col-md-6 left">
										&pound;30
									</div>
									<div class="col-md-6 right">
										&pound;40
									</div>
								</div>
								<div class="row optionrow">
									<div class="col-md-6 left">
										Back
									</div>
								</div>
							</div>
							<div id="pinScreen" class="subScreen" style="display: none;">
								Enter New PIN
								<?php window_and_keypad("newpin");?>
							</div>
						</div>
					</div>
					<div class="col-xs-2 controls">
						<a id="pinButton" href="#" class="controlButton">
							<span class="fa-stack fa-lg">
								<i class="fa fa-square-o fa-stack-2x"></i>
								<i class="fa fa-chevron-left fa-stack-1x"></i>
							</span>
						</a>
						<a id="cancelButton" href="#" class="controlButton">
							<span class="fa-stack fa-lg">
								<i class="fa fa-square-o fa-stack-2x"></i>
								<i class="fa fa-chevron-left fa-stack-1x"></i>
							</span>
						</a>
						<a id="40Button" href="#" class="controlButton">
							<span class="fa-stack fa-lg">
								<i class="fa fa-square-o fa-stack-2x"></i>
								<i class="fa fa-chevron-left fa-stack-1x"></i>
							</span>
						</a>
						<a id="" href="#" class="controlButton">
							<span class="fa-stack fa-lg">
								<i class="fa fa-square-o fa-stack-2x"></i>
								<i class="fa fa-chevron-left fa-stack-1x"></i>
							</span>
						</a>
					</div>
				</div>
			</div>
		</div>
		<?php require_once('includes/foot.php');?>
		<script src="/assets/js/atm.js" type="text/javascript"></script>
	</body>
</html>