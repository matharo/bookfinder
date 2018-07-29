<?php
//index.php

	/*Queries the database with our call number
	* gets latitude, longitude, and floor number
	* returns $lat, $long, $floor
	*/

	//Establishes connection
	include 'dbconnection.php';
	
	//For localhost only
	include 'getTextFromHtml.php';
	
	//For library site
	//$callNum = $_GET["call"];

	//Sara Jain needs to update this
	//replace $callNum with ?
	$query = "SELECT Latitude,Longitude,Floor FROM callnumbers WHERE (? BETWEEN RangeStart AND RangeEnd)";
	
	//Prepare statement used to prevent SQL injection
	if ($statement = mysqli_prepare($conn,$query))
	{
		//Bind and substitute ? param for $callNum in $query statement
		mysqli_stmt_bind_param($statement,'s',$callNum);
		
		//Execute statement
		mysqli_stmt_execute($statement);
		
		//Bind an results to correct output variables
		//lat = latitude, long = longitude, floor = floor number
		mysqli_stmt_bind_result($statement,$lat,$long,$floor);
		
		//If retrieved a result from DB
		if (mysqli_stmt_fetch($statement))
		{
			//Checks how many results are outputted
			//Query should only return one result
			if (mysqli_stmt_num_rows($statement) == 1)
			{	
				//Makes sure results are the correct type
				if (checkType($lat) && checkType($long) && checkType($floor))
				{
					include 'markerurl.php';
				}
			}
			
			//KEEP UNTIL QUERY UPDATED
			//Change to error message because should only receive one result from database
			//bad query
			else{
					if (checkType($lat) && checkType($long) && checkType($floor))
					{
						include 'markerurl.php';
					}
			}
		}
		//If receive no data from DB
		else
		{ 
			echo 'Nothing was found from the database.'; 
		}
		
		//Closing SQL query
		mysqli_stmt_close($statement);
	}
	else
	{
		echo 'Check database connection.';
	}
		
	//Checks database result type: can be a string or integer
	function checkType($var)
	{
		if (is_null($var))
		{
			echo 'Null variable';
			return False;
		}
		if (!is_int($var))
		{
			if (!is_string($var))
			{
				echo 'Variable is not an integer or string';
				return False;
			}
		}
		return True;
	}

/*--- Here begins code for the webpage that displays for mobile users ---*/	

	if ($deviceType == 'mobile')
	{
		echo include 'mobilePage.html';
	}
	else
	{
		//Desktop users
		//Directly takes you to maps URL after this page loads
		echo '<script>window.location.href = "redirect.php";</script>';
	}
	
	//End of script, close database connections
	mysqli_close($conn);
?>