<?php

	/*Queries the database with our call numer
	* gets latitude, longitude, and floor number
	* returns $lat, $long, $floor
	*/

	//Establishes connection
	include "dbconnection.php";
	
	//Get $callNum variable from URL
	include "getTextFromHtml.php";
	
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
		
		echo 'Query results: </br>';
		
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
					echo $lat. ', '. $long .', '. $floor . '</br>';
				}
			}
			
			//KEEP UNTIL QUERY UPDATED
			else{
				//echo 'Multiple results from database';
				while (mysqli_stmt_fetch($statement)){
					//Makes sure results are the correct type
					if (checkType($lat) && checkType($long) && checkType($floor))
					{
						echo $lat. ', '. $long .', '. $floor . '</br>';
					}
				}
			}
		}
		//If receive no data from DB
		else
		{ 
			echo 'Nothing was found from database with this query.'; 
		}
		
		//Closing SQL query
		mysqli_stmt_close($statement);
	}
	else
	{
		echo 'Bad query.';
	}
	
	
	//Checks database result type: can be a string or integer
	function checkType($var)
	{
		if (is_null($var))
		{
			echo "Null variable";
			return False;
		}
		if (!is_int($var))
		{
			if (!is_string($var))
			{
				echo "Variable is not an integer or string";
				return False;
			}
		}
		return True;
	}

?>