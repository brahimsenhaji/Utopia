<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet/dist/leaflet.css" />
  <script src="https://cdn.jsdelivr.net/npm/leaflet/dist/leaflet.js"></script>
</head>
<body>
<!--  <div id="map" style="width: 400px; height: 400px;"></div>
  <div id="map2" style="width: 400px; height: 400px;"></div>-->

<?php
$Latitude = $_COOKIE['Latitude'];
$Longitude = $_COOKIE['Longitude'];
echo $Latitude;
echo $Longitude;
?>


<!--<script>
    const map = L.map('map').setView([0, 0], 13);
    const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 19,
      attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    if ('geolocation' in navigator) {
      navigator.geolocation.getCurrentPosition(position => {
        const latlng = [position.coords.latitude, position.coords.longitude];
        map.setView(latlng, 13);
        L.marker(latlng).addTo(map);

        fetch(`https://nominatim.openstreetmap.org/reverse?lat=${latlng[0]}&lon=${latlng[1]}&format=json`)
          .then(response => response.json())
          .then(data => {
            const address = data.display_name;
            console.log('Current Location:');
            console.log('Latitude:', latlng[0]);
            console.log('Longitude:', latlng[1]);
            console.log('Address:', address);

            const map2 = L.map('map2').setView(latlng, 13);
            const tiles2 = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
              maxZoom: 19,
              attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map2);

            L.marker(latlng).addTo(map2);
            L.popup()
              .setLatLng(latlng)
              .setContent(address)
              .openOn(map2);

            // Click event listener on map1
            map.on('click', function(e) {
              const clickedLatlng = e.latlng;
              const clickedAddress = getAddressFromLatLng(clickedLatlng);

              map2.setView(clickedLatlng, 13);
              L.marker(clickedLatlng).addTo(map2);
              L.popup()
                .setLatLng(clickedLatlng)
                .setContent(clickedAddress)
                .openOn(map2);
            });

            function getAddressFromLatLng(latlng) {
              return fetch(`https://nominatim.openstreetmap.org/reverse?lat=${latlng.lat}&lon=${latlng.lng}&format=json`)
                .then(response => response.json())
                .then(data => data.display_name)
                .catch(error => console.log(error));
            }
          })
          .catch(error => console.log(error));
      });
    } else {
      console.log('Geolocation is not available');
    }
  </script>-->
  <script src="./sellingpage/Cockie.js"></script>
</body>
</html>
