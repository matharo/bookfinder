<?php 

	/* Generates a URL that puts a marker on Google Maps
	* on the bookshelf that corresponds to the call number
	* returns $markerurl
	*/
	

	//Extract the book's coords and floor data from query results
	//$lat, $long, $floor are from query.php
	$booklat = $lat;
	$booklng = $long;
	$floor = $floor;
	
	$coords = $booklat . ',' . $booklng;
		
	echo 'Coords are: ' . $coords . '</br>' . 'Floor: ' . $floor;
	
	//Get appropriate hex URL address that displays the correct floor level
	if ($floor == 2)
	{
		$flooraddr = 'data=!3m1!5s0x87d8b4bca1f57ac3:0x1e54ca82733a0075!4m5!3m4!1s0x0:0xfd4f92d64e89521d!8m2!3d';
	}
	elseif ($floor == 3)
	{
		$flooraddr = 'data=!3m1!5s0x87d8b4bca1f57ab1:0x1e54ca82d4780074!4m5!3m4!1s0x0:0xfd4f92d64e89521d!8m2!3d';
	}
	elseif ($floor == 4)
	{
		$flooraddr = 'data=!3m1!5s0x87d8b4bca1f57a9f:0x1e54ca827fa42c77!4m5!3m4!1s0x0:0xfd4f92d64e89521d!8m2!3d';
	}
	elseif ($floor == 5)
	{
		$flooraddr = 'data=!3m1!5s0x87d8b4bca1f57ad1:0x1e54ca82bd388c79!4m5!3m4!1s0x0:0xfd4f92d64e89521d!8m2!3d';
	}
	else
	{
		//when the floor number is 1
		$flooraddr = '';
	}
	
	//Determines how far to zoom into the map. 20 is a birds eye view of the building
	//21 is a closer look at the bookshelf and portion of the library building
	$zoomlevel = 20;
	
	//Create a marker on the map
	$markerurl = 'www.google.com/maps/place/' . $coords . '/@' . $coords . ',' . $zoomlevel . 'z/' . $flooraddr . $booklat . '!4d' . $booklng; 
	
	
	include 'detectDeviceType.php';
	
	//Add appropriate header to url depending on device type
	$markerurl = $urlHeader . $markerurl;
	
?>