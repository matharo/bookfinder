<!DOCTYPE html>
<html lang="en">
  <head>
    <title>My Maps API</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
<body>
<?php
	include 'testconn.php';
  ?>
  <h1>My Google Map</h1>	
  <div id="map"></div>
  <script>  
    function initMap(){
      // Map options
      var options = {
        zoom:20,
        center:{lat: 38.636698, lng: -90.234975}
      }

      // New map
      var map = new google.maps.Map(document.getElementById('map'), options);

      // Array of markers
      var markers = [
        {
          coords:{lat:38.636952,lng:-90.234998},
          //iconImage:'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
          content:'BR 118 .Q - BR 139'
        },
        {
          coords:{lat:38.637111,lng:-90.234447},
          content:'<h1>Range: PA 6137.A	- PA 8034.Z</h1>'
        },
        {
          coords:{lat:38.636756,lng:-90.235011},
		  content: 'OSIZEPS 2000	OSIZESC'
        }
      ];

	  //window that opens after click on marker
      var infoWindow = new google.maps.InfoWindow({
        content:'<h1>Pius Library</h1>'
      });
	  
      // Loop through markers
      for(var i = 0;i < markers.length;i++){
        // Add marker
        addMarker(markers[i]);
      }

      // Add Marker Function
      function addMarker(props){
        var marker = new google.maps.Marker({
          position:props.coords,
          map:map
          //icon:props.iconImage
        });

        // Check for customicon
        if(props.iconImage){
          // Set icon image
          marker.setIcon(props.iconImage);
        }

        // Check content
        if(props.content){
          var infoWindow = new google.maps.InfoWindow({
            content:props.content
          });
		//when marker is clicked on, open a window
          marker.addListener('click', function(){
            infoWindow.open(map, marker);
			infoWindow.setContent(infowincontent);
          });
        }
      }
	  

	   downloadUrl('https://storage.googleapis.com/mapsdevsite/json/mapmarkers2.xml', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var id = markerElem.getAttribute('id');
              var name = markerElem.getAttribute('name');
              var address = markerElem.getAttribute('address');
              var type = markerElem.getAttribute('type');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = address
              infowincontent.appendChild(text);
              var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
              });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
        });
	}
	function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}
	  
  </script>
  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKm79Pba4nX72e6z6bfXcdBGRpZs_A1KY&callback=initMap">
  </script>
</body>
</html>
