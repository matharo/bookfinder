	<?php
		include 'dbconn.php';
	?>

<br />
<br />

	<?php
		include 'getTextFromHtml.php';
		//split '$callNum' with php and make many variables for it
		
		/*
		$split = "STRING_SPLIT('B 1 2',' ')";
		
		$query = mysqli_query($conn, 
			"SELECT * FROM callnumbers WHERE '$split[0]' =  SUBSTRING(RangeStart,1,2)");
		
		$getvalue = "SELECT * from callnumbers where RangeStart like 'var'";
		$result = mysql_query($getvalue) or die(mysql_error());
		
		$query = mysqli_query($conn, 
			"SELECT * FROM callnumbers ORDER BY RangeEnd ASC");
		*/
		
		$query = mysqli_query($conn, 
			"SELECT * FROM callnumbers where RangeStart LIKE 'QA76.N'");
			//query with the many diferent php variables
		
		echo 'Query results are: </br> ';
		
		while ($row = mysqli_fetch_array($query)){
			$latitude = $row['Latitude'];
			$longitude = $row['Longitude'];
			
			echo $latitude . ' - ' . $longitude . '<br />';
		}
	?>
