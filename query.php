<?php
	//Establishes connection
	include "dbconn.php";
	
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
		
		echo 'Query 2 results: </br>';
		
		//If retrieved a result from DB
		if (mysqli_stmt_fetch($statement))
		{
			//Output all data from DB
			//Query should only return one result
			while (mysqli_stmt_fetch($statement)){
				echo $lat. ', '. $long .', '. $floor . '</br>';
				
				checkType($lat);
				checkType($long);
				checkType($floor);
			}
		}
		//No data from DB
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
	
	//Makes sure variable from database is a string or integer
	function checkType($var)
	{
		if (is_null($var))
		{
			error_log("Null variable",0);
		}
		if (!is_int($var) || !is_string)
		{
			error_log("Variable not string or int",0);
		}
	}
?>