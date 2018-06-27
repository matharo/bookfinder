<?php

	$callNum = file_get_contents('http://libraries.slu.edu/maps/index.php?call=QA76%20.S4%202017');
	
	echo 'The call number is ' . $callNum . '</br></br>';
?>