<?php

	/* Generates a URL that creates a path between 
	* the bookshelf that corresponds to the call number
	* and a library entrance
	* returns $dirurl
	*/
	
	//Gets the book coordinates, correct floor and floor address
	include 'markerurl.php'

	//West Pine Entrance Coordinates
	$westpinelat = 38.636460;
	$westpinelng = -90.235204;		
	$westpinecoords = $westpinelat . ',' . $westpinelng;
	
	//Library Circle Entrance Coordinates
	$libcirclelat = 38.636756;
	$libcirclelng =  -90.234610;
	$libcirclecoords = $libcirclelat . ',' . $libcirclelng;
	
	//Both entrances are on the first floor
	$entrancefloor = 1;

	//Directions path URL , does not show different floor levels
	//$dirurl = 'https://www.google.com/maps/dir/?api=1&origin=' .$fromcoords.'&destination=' .$tocoords. '&travelmode=walking';



?>