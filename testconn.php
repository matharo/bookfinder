<?php 
		include "query.php";
		
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
		
		//Extract the book's coords and floor data from query results
		//$lat, $long, $floor are from query.php
		$booklat = $lat;
		$booklng = $long;
		$floor = $floor;
		
		//need to error check coords
		$coords = $booklat . ',' . $booklng;
			
		echo 'Coords are: ' . $coords . '</br>' . 'Floor: ' . $floor;
		
		//How far to zoom into map, normal view is 15, floor plan view is 20
		//21 is much closer but does not always work on Gmaps
		$zoomlevel = 21;
		
		//URL header
		//$urlend = $coords . '/@' . $coords . ',' . $zoomlevel . 'z/'
		
		//Create a marker on the map
		$markerurl = 'https://www.google.com/maps/place/' . $coords . '/@' . $coords . ',' . $zoomlevel . 'z/' . $flooraddr . $booklat . '!4d' . $booklng; 
		
		
		//Directions path URL , does not show different floor levels
		//$dirurl = 'https://www.google.com/maps/dir/?api=1&origin=' .$fromcoords.'&destination=' .$tocoords. '&travelmode=walking';

		
	?>
	
	<html><body>
	<a href = '<?php echo $markerurl; ?>' ><h3>This is a link to Google Maps with a marker on this coordinate</h3></a>
	
	<!--<a href = '<?php echo $westpineurl; ?>' ><h3>Directions from West Pine Entrance to bookshelf</h3></a>
	<a href = '<?php echo $libcircleurl; ?>' ><h3>Directions from Library Circle Entrance to bookshelf</h3></a> -->
</body></html>