<html><body>
	<?php
		include 'dbconn.php';
		//don't forget error checking everything
	?>

<br />
<br />

	<?php
		include 'getTextFromHtml.php';
		
		$query = "SELECT Latitude,Longitude,Floor FROM callnumbers WHERE (? BETWEEN RangeStart AND RangeEnd)";
		//https://www.w3schools.com/php/php_mysql_prepared_statements.asp
		//look into a different prepared statement tut for query
		//use ? inside the query to avoid database infiltration
		
		
		/*
		$query = "SELECT Latitude,Longitude,Floor FROM callnumbers WHERE (? BETWEEN RangeStart AND RangeEnd)";
		
		$statement = mysqli_prepare($conn,$query);
		
		//Bind & substitute ? param for $callNum in $sql statement
		mysqli_stmt_bind_param($statement,'d',$callNum);
		
		//execute statement
		mysqli_stmt_execute($statement);
		
		//bind an output variable
		mysqli_stmt_bind_result($statement,$lat,$long,$floor);
		
		
		while (mysqli_stmt_fetch($statement))
		{
			echo $lat. ', '. $long .', '. $floor . '</br>';
		}*/
		
		
		$westpinelat = 38.636460;
		$westpinelng = -90.235204;		
		$westpinecoords = $westpinelat . ',' . $westpinelng;
		
		$libcirclelat = 38.636756;
		$libcirclelng =  -90.234610;
		$libcirclecoords = $libcirclelat . ',' . $libcirclelng;
		
		$entrancefloor = 1; //floor level for lib circle and west pine entrance
		
		/*SIMPLEST METHOD, NOT WORKING
		$sql = "SELECT Latitude, Longitude, Floor FROM callnumbers WHERE ('$callNum' BETWEEN RangeStart AND RangeEnd)";

		$query = mysqli_query($conn,$sql);
		
		if (!$query){
			die("Bad query.");
		}
		else{
		
		
		//Assuming there is only 1 database result
		
		//if (mysqli_num_rows($query) > 0){ ... }
		$row = mysqli_fetch_array($query);
		$booklat = $row['Latitude'];
		$booklng = $row['Longitude'];
		$floor = $row['Floor'];
		
		//need to error check coords
		$coords = $booklat . ',' . $booklng;
			
		echo 'Coords are: ' . $coords . '</br>' . 'Floor: ' . $floor;
	
		
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
		
		if ($typemarker)
		{
			$urltype = 'place/';
		}
		elseif ($typedir)
		{
			$urltype = 'dir/';
		}
		
		$urlstruc = 'https://www.google.com/maps/' . $urltype . $coords . '/@' . $coords . ',20z/'
		
		//properly zooms
		$markerurl = 'https://www.google.com/maps/place/' . $coords . '/@' . $coords . ',20z/' . $flooraddr . $latitude . '!4d' . $longitude; 
		
		$markerurl2 = $urlstruc . $flooraddr . $latitude . '!4d' . $longitude;
		
		//get url to make a direction path to guide user 
		$dirurl = 'https://www.google.com/maps/dir/?api=1&origin=' .$fromcoords.'&destination=' .$tocoords. '&travelmode=walking';
		
		
		//DOUBLE CHECK
		$dirurl2 = $urlstruc . 'data=!4m2!4m1!3e2';
		}
		*/
	?>
	
	<a href = '<?php echo $markerurl; ?>' ><h3>This is a link to Google Maps with a marker on this coordinate</h3></a>
	
	<a href = '<?php echo $westpineurl; ?>' ><h3>Directions from West Pine Entrance to bookshelf</h3></a>
	<a href = '<?php echo $libcircleurl; ?>' ><h3>Directions from Library Circle Entrance to bookshelf</h3></a>
</body></html>