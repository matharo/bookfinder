<?php

	/*Redirects to Google Maps with marker URL
	*/

	include 'query.php';

	header('Location: ' . $markerurl);
	die();
	
?>