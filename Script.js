if ('geolocation' in navigator) {
  navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
} else {
  console.log('Geolocation is not supported by your browser');
}

function successCallback(position) {
  const latitude = position.coords.latitude;
  const longitude = position.coords.longitude;

  const xhr = new XMLHttpRequest();
  const url = `https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${latitude}&lon=${longitude}`;

  xhr.open('GET', url, true);

  xhr.onload = function() {
    if (xhr.status === 200) {
      const response = JSON.parse(xhr.responseText);
      const city = response.address.city;
      console.log('Your city name is: ' + city);

      const citySet = sessionStorage.getItem('citySet');
      if (!citySet) { // Check if the city has already been set
        sessionStorage.setItem('citySet', 'true');

        // Pass the city name as a query parameter in the URL
        const newUrl = window.location.href + '?city=' + encodeURIComponent(city);
        window.location.href = newUrl;

        // Set the city name as a cookie
        document.cookie = 'City='+ city;
      }
    } else {
      console.log('Request failed. Status code: ' + xhr.status);
    }
  };

  xhr.send();
}

function errorCallback(error) {
  console.log('Error occurred. Error code: ' + error.code);
}



let Log_in = document.querySelector(".Log_in");
let Sign_in = document.querySelector(".Sign_in");

window.onscroll = ()=>{
  console.log(window.scrollY);
  let Nearby_title = document.querySelector('.Nearby-title');
  if(window.scrollY >= 226){
    Nearby_title.style.opacity = "1";
  }
  let Nearby_container = document.querySelector('.Nearby-container');
  if(window.scrollY >= 400){
    Nearby_container.style.opacity = "1";
  }

  //=================================================================================
    let container = document.querySelector('.container');
    if(window.scrollY >= 913){
        container.classList.add('active2');
    }
    //adding the bubble stye
    let video5 = document.querySelector('.video5');
    if(window.scrollY < 1500){
        video5.style.display = "none";
    }
    else{
        video5.style.display ="block";
    }
 //===============================================================
 let Sell = document.querySelector('.Sell');
 if(window.scrollY >= 2050){
  Sell.style.scale= "1";
 }
 //=====================================================================================================

 let About_title = document.querySelector('.About-title');
 if(window.scrollY >= 2250){
  About_title.style.opacity="1";
 }
}

let title = document.querySelector('.title');
const Helpabserver1 = new IntersectionObserver((entries)=>{
    entries.forEach(entry =>{
        if(entry.isIntersecting){
            title.classList.add('active1');
        }
    })
});

Helpabserver1.observe(title);



let menu = document.querySelector('.fa-bars');
menu.addEventListener('click',()=>{
    let Slide = document.querySelector('.Slide');
    Slide.classList.toggle('Slideing');

    menu.classList.toggle('fa-xmark')
})






