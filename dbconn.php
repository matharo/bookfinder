<?php

	$servername = 'localhost';
	$username= 'root';
	$password= '';
	$database= 'csv_db';

	$conn = mysqli_connect($servername,$username,$password,$database);

	if ($conn){
			echo 'Successful connection. ';
	}
	else {
		die('Error. ');
	}
	
	if ($database){
		echo 'Database found. ';
	}
	else{
		die('Database not found. ');
	}
?>