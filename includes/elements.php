<?php
	function window_and_keypad($id) {
		
?>
<div class="window" id="window-<?php echo $id;?>">
	<!-- Blank thing for now, astericks will appear here -->
	&#8291;
</div>
<div class="keypad" id="keyboard-<?php echo $id;?>">
	<div class="row">
		<a href="#" class="col-sm-4 pinbutton pinbutton-<?php echo $id;?>">1</a>
		<a href="#" class="col-sm-4 pinbutton pinbutton-<?php echo $id;?>">2</a>
		<a href="#" class="col-sm-4 pinbutton pinbutton-<?php echo $id;?>">3</a>
	</div>
	<div class="row">
		<a href="#" class="col-sm-4 pinbutton pinbutton-<?php echo $id;?>">4</a>
		<a href="#" class="col-sm-4 pinbutton pinbutton-<?php echo $id;?>">5</a>
		<a href="#" class="col-sm-4 pinbutton pinbutton-<?php echo $id;?>">6</a>
	</div>
	<div class="row">
		<a href="#" class="col-sm-4 pinbutton pinbutton-<?php echo $id;?>">7</a>
		<a href="#" class="col-sm-4 pinbutton pinbutton-<?php echo $id;?>">8</a>
		<a href="#" class="col-sm-4 pinbutton pinbutton-<?php echo $id;?>">9</a>
	</div>
</div>
<?php
	} // end of function
?>