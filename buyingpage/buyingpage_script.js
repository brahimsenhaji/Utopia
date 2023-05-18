let cards = document.querySelectorAll('.Card');
let floors_input = document.querySelector('.floors-input');
//fitring by the number of floors 
//adding event to the floors_input element for fiting the cards
floors_input.addEventListener('input',()=>{
    //looping through the cards data to get the number of the floors       
        cards.forEach(card =>{
            let cardValue_floors = card.getAttribute('floor-value');

            if(floors_input.value == ""){
                card.classList.remove('hide');
            }
            else if(floors_input.value == cardValue_floors){
                card.classList.remove('hide');
            }
            else{
                card.classList.add('hide');
            }
    });
});

//filtring by the number of rooms
let rooms_input = document.querySelector('.rooms-input');
//adding event to the rooms_input element for fiting the cards
rooms_input.addEventListener('input',()=>{
    //looping through the cards data to get the number of the floors       
        cards.forEach(card =>{
            let cardValue_rooms = card.getAttribute('rooms-value');

            if(rooms_input.value == ""){
                card.classList.remove('hide');
            }
            else if(rooms_input.value == cardValue_rooms){
                card.classList.remove('hide');
            }
            else{
                card.classList.add('hide');
            }
    });
});


//filtring by the number of kitchens
let kitchen_input = document.querySelector('.kitchen-input');
//adding event to the rooms_input element for fiting the cards
kitchen_input.addEventListener('input',()=>{
    //looping through the cards data to get the number of the kitchen      
        cards.forEach(card =>{
            let cardValue_kitchen = card.getAttribute('kitchen-value');

            if(kitchen_input.value == ""){
                card.classList.remove('hide');
            }
            else if(kitchen_input.value == cardValue_kitchen){
                card.classList.remove('hide');
            }
            else{
                card.classList.add('hide');
            }
    });
});

//filtring by the number of bathrooms
let bathroom_input = document.querySelector('.bathroom-input');
//adding event to the rooms_input element for fiting the cards
bathroom_input.addEventListener('input',()=>{
    //looping through the cards data to get the number of the bathroom     
        cards.forEach(card =>{
            let cardValue_bathroom = card.getAttribute('bathroom-value');

            if(bathroom_input.value == ""){
                card.classList.remove('hide');
            }
            else if(bathroom_input.value == cardValue_bathroom){
                card.classList.remove('hide');
            }
            else{
                card.classList.add('hide');
            }
    });
});

//filtring by the number of category
let category_input = document.querySelector('.category-input');
//adding event to the rooms_input element for fiting the cards
category_input.addEventListener('input',()=>{
    //looping through the cards data to get the number of the category    
        cards.forEach(card =>{
            let cardValue_category = card.getAttribute('category-value');

            if(category_input.value == ""){
                card.classList.remove('hide');
            }
            else if(category_input.value == cardValue_category){
                card.classList.remove('hide');
            }
            else{
                card.classList.add('hide');
            }
    });
});

//filtring by the number of city
let city_input = document.querySelector('.city-input');
//adding event to the rooms_input element for fiting the cards
city_input.addEventListener('input',()=>{
    //looping through the cards data to get the number of the category    
        cards.forEach(card =>{
            let cardValue_city = card.getAttribute('city-value');

            if(city_input.value == ""){
                card.classList.remove('hide');
            }
            else if(city_input.value == cardValue_city){
                card.classList.remove('hide');
            }
            else{
                card.classList.add('hide');
            }
    });
});