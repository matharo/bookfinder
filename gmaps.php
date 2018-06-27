<html>
<head>
	<title>Maps API</title>
	<style>
		#map{height:100%;}
		/* Makes page fill the window */
		html,body{
			height: 100%;
			margin: 0;
			padding: 0;
		}
	</style>
</head>

<body>	
	<h1>My Google Maps</h1>
	
	<?php include 'testconn.php'; ?>
	
	<div id = "map"></div>
	<script>
		function initMap()
		{
			//Initialize map to view Pius Library and zoomed
			var options = {
				zoom: 20,
				center: {lat: 38.636698, lng: -90.234975}
			}
		
			var map = new google.maps.Map(document.getElementById('map'),options);
			
			//Receives coordinates from database
			var markers = {
				coords: {lat: '<?php echo $latitude; ?>',
						lng: '<?php echo $longitude; ?>'},
				content: 'hello'
			};

			//Adds the marker to the map
			function addMarker(props){
				var marker = new google.maps.Marker({position:props.coords,map:map});
				
				if(props.content){
					var infoWindow = new google.maps.infoWindow({content:props.content});
				
					marker.addListener('click',
						function(){infoWindow.open(map,marker);}
					);
				}
			}
			
			addMarker(markers);
		}
	</script>
	/* Google Maps API Key */
	<script script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKm79Pba4nX72e6z6bfXcdBGRpZs_A1KY&callback=initMap"> </script>
</body>
</html>