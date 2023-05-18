let Latitude = document.querySelector('.latitude');
let Longitude = document.querySelector('.longitude');
const map = L.map('map').setView([0, 0], 13);
const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
  maxZoom: 19,
  attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

let marker = null;

if ('geolocation' in navigator) {
  navigator.geolocation.getCurrentPosition(position => {
    const latlng = [position.coords.latitude, position.coords.longitude];
    map.setView(latlng, 13);
    marker = L.marker(latlng).addTo(map);

    fetch(`https://nominatim.openstreetmap.org/reverse?lat=${latlng[0]}&lon=${latlng[1]}&format=json`)
      .then(response => response.json())
      .then(data => {
        const address = data.display_name;
        console.log('Current Location:');
        console.log('Latitude:', latlng[0]);
        console.log('Longitude:', latlng[1]);
        console.log('Address:', address);
      })
      .catch(error => console.log(error));
  });
} else {
  console.log('Geolocation is not available');
}

map.on('click', function(e) {
  const latlng = e.latlng;

  if (marker) {
    map.removeLayer(marker);
  }

  marker = L.marker(latlng).addTo(map);

  fetch(`https://nominatim.openstreetmap.org/reverse?lat=${latlng.lat}&lon=${latlng.lng}&format=json`)
    .then(response => response.json())
    .then(data => {
      console.log('Latitude:', latlng.lat);
      console.log('Longitude:', latlng.lng);
      console.log('Address:', data.display_name);

  
      let Latitude = latlng.lat;
      let Longitude = latlng.lng;

      localStorage.setItem("Latitude",Latitude);
      localStorage.setItem("Longitude",Longitude);
      
    })
    .catch(error => console.log(error));
});

//--------------------------------------------------------------------------------
//Code for displing the map
    let showMap = document.querySelector('.showMap');
    let removeMap = document.querySelector('.fa-xmark');
    let map_div = document.querySelector('.map-div');

     showMap.addEventListener('click',()=>{
        map_div.style.transform = "scale(1)";
    });

    removeMap.addEventListener('click',()=>{
        map_div.style.transform = "scale(0)";
    })