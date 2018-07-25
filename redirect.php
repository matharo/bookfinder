<?php

	/*Redirects to Google Maps with marker URL
	*/

	include 'markerurl.php';

	header('Location: ' . $markerurl);
	die();
	
?>