<?php

	/*Creates a connection to call number database
	* connection is saved in $conn
	*/

	//Database information
	$servername = 'localhost';
	$username= 'root';
	$password= '';
	$database= 'csv_db';

	//Creates a connection
	$conn = mysqli_connect($servername,$username,$password,$database);

	//Checks connection status
	if ($conn){
		echo 'Successful connection. ';
	}
	else {
		die('Error. ');
	}
	
	//Checks database status
	if ($database){
		echo 'Database found. ';
	}
	else{
		die('Database not found. ');
	}
?>