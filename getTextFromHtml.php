<?php

	//Directly pull the call number from the link
	$url = 'http://libraries.slu.edu/maps/index.php?call=QA76%20.S4%202017';
	
	//Testing
	$url2 = 'http://libraries.slu.edu/maps/index.php?call=QA76.9.A43%20F47%202017';
	$url3 = 'http://libraries.slu.edu/maps/index.php?call=PN1997.2.S7378%20S96%202017';
	
	//Parse URL and returns components
	$urlparts = parse_url($url);
	//Separates based on query which is what's after ?, returns an array
	$query_parts = explode('?',$urlparts['query']); 
	//Gets the last element in array, but in this case, only contains 1 thing anyway
	$checkCallNum = $query_parts[count($query_parts)-1]; 
	
	//Makes sure retrieved something from url
	if ($checkCallNum != '')	
	{
			//Removes the excess part, which is call=
			$checkCallNum = str_replace('call=','',$callNum);
			//Removes %20 which represents spaces
			$checkCallNum = str_replace('%20',' ',$callNum);
	
			//Max string 20 only for safety
			if (strlen($checkCallNum) < 20)
			{
				//Make sure only get the verified call number
				$callNum = $checkCallNum;
				echo 'The call number is ' . $callNum . '</br></br>';
			}
			else
			{
				echo 'Bad variable. Variable exceed max length.';
			}
	}
	else
	{ 
		die("Error. Call number not found."); 
	}
?>