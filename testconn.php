
	<?php
		include 'dbconn.php';
	?>

<br />
<br />

	<?php
		include 'getTextFromHtml.php';
		
		$query = mysqli_query($conn, 
			"SELECT * FROM callnumbers where RangeStart LIKE 'QA76.N'");
			//query with the many diferent php variables
		
		echo 'Query results are: </br> ';
		
		//Assuming there is only 1 database result
		$row = mysqli_fetch_array($query);
		$latitude = $row['Latitude'];
		$longitude = $row['Longitude'];
			
		$coords = $latitude . ',' . $longitude;
			
		echo $coords . '</br>';
		
		$url = 'https://www.google.com/maps/place/' . $coords;
	?>
	
	<a href = '<?php echo $url; ?>'>  <h3>This is a link to Google Maps with a marker on this coordinate</h3></a>