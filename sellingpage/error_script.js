let input = document.querySelectorAll('#input');
let title = document.querySelector(".title");
let disruption = document.querySelector(".disruption");
let floors = document.querySelector(".floors");
let rooms = document.querySelector(".rooms");
let kitchen = document.querySelector(".kitchen");
let bathroom = document.querySelector(".bathroom");
let price = document.querySelector(".price");
let street = document.querySelector(".street");
let number = document.querySelector(".number");
let upload_btn = document.querySelector(".upload-btn");
input.forEach(input =>{
    input.addEventListener("input", function() {
        if (title.value.length >= 5  && disruption.value.length >= 5 && floors.value.length >= 1 && rooms.value.length >= 1 && kitchen.value.length >= 1 && bathroom.value.length >= 1 && price.value.length >= 1 && street.value.length >= 1 && number.value.length >= 1 ) {
            console.log("All input fields meet the requirements");
            upload_btn.disabled = false; // Enable the button
          } else{
            console.log("Some input fields do not meet the requirements");
            upload_btn.disabled = true; // Disable the button
          }          
        });
        
})
  