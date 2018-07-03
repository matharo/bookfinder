
	<?php
		include 'dbconn.php';
	?>

<br />
<br />

	<?php
		include 'getTextFromHtml.php';
		
		/*$query = "SELECT Latitude,Longitude,Floor FROM callnumbers WHERE (? BETWEEN RangeStart AND RangeEnd)";
		
		$statement = mysqli_prepare($conn,$query);
		
		//Bind & substitute ? param for $callNum in $sql statement
		mysqli_stmt_bind_param($statement,'s',$callNum);
		
		//execute statement
		mysqli_stmt_execute($statement);
		
		//bind an output variable
		mysqli_stmt_bind_result($statement,$lat,$long,$floor);
		
		while (mysqli_stmt_fetch($statement))
		{
			echo $lat . $long . $floor;
		}
		*/
		
		/*
		//Assuming there is only 1 database result
		//$row = mysqli_fetch_array($query);
		$latitude = $row['Latitude'];
		$longitude = $row['Longitude'];
		$floor = $row['Floor'];
			
		$coords = $latitude . ',' . $longitude;
			
		echo $coords . '</br>' . 'Floor: ' . $floor;
	
		
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
		
		//properly zooms
		$url = 'https://www.google.com/maps/place/' . $coords . '/@' . $coords . ',20z/' . $flooraddr . $latitude . '!4d' . $longitude; 
		$url = 'https://www.google.com/maps/place/' . $coords . '/@' . $coords . ',20z/' . $flooraddr . $latitude . '!4d' . $longitude; 
		*/
	?>
	
	<a href = '<?php echo $url; ?>'>  <h3>This is a link to Google Maps with a marker on this coordinate</h3></a>
	