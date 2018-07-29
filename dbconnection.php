<?php

	/*Creates a connection to call number database
	* connection is saved in $conn
	*/

	//Database information
	
	//Localhost
	$servername = 'localhost';
	$username= 'root';
	$password= '';
	$database= 'csv_db';
	
	//Library
	//$servername = '165.134.107.89';
	//$username = 'bookfinder_ruser';
	//$password = 'Iw4slGPUP4A2kA0z5ba8';
	//$database = 'bookfinder';

	//Creates a connection
	$conn = mysqli_connect($servername,$username,$password,$database);

	//Checks connection status
	if (!$conn)
	{
		die('Error. Connection failed.');
	}
	
	//Checks database status
	if (!$database)
	{
		die('Error. Database not found. ');
	}
	
?>