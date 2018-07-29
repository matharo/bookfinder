<?php

	/*Extracts call number from a URL link
	* returns $callNum
	*/

	//Directly pull the call number from the link
	$url = 'http://libraries.slu.edu/maps/index.php?call=QA76%20.S4%202017';
	
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
		$checkCallNum = str_replace('call=','',$checkCallNum);
		//Removes %20 which represents spaces
		$checkCallNum = str_replace('%20',' ',$checkCallNum);

		//Max string 20 only for safety
		if (strlen($checkCallNum) < 20)
		{
			//Make sure only get the verified call number
			$callNum = $checkCallNum;
		}
		else
		{
			die("Error. Call number exceed max length.")
		}
	}
	else
	{ 
		die("Error. Call number not found."); 
	}
?>