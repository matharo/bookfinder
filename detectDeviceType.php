<?php 

	/* Detects what device type user is on
	 * Most important is iOS mobile because Google Maps link differs
	 * returns $deviceType and $urlHeader
	 */

	//Get browser/device information
	$userAgent = $_SERVER['HTTP_USER_AGENT'];
	
	//Check if mobile or desktop device
	if (strpos($userAgent,'mobile'))
	{
		$deviceType = 'mobile';
		
		//Check if mobile iOS device
		if (preg_match('/iPhone|iPod|iPad/',$userAgent))
		{
			$urlHeader = 'maps://';
		}
		
		//Any other mobile device
		else
		{
			$urlHeader = 'https://';
		}
	}
	else
	{
		$deviceType = 'desktop';
		$urlHeader = 'https://';
	}
?>