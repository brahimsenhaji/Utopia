let card = document.querySelectorAll('.prop_form');

let search_filter = document.querySelector('.search_filter');
let search_btn = document.querySelector('.search_btn');

search_btn.addEventListener("click",()=>{
    card.forEach(card =>{
     let card_title = card.getAttribute('title-value');

        if(search_filter.value == ""){
            card.style.display = "flex";
        }
       else if(search_filter.value == card_title ){
            card.style.display = "flex";
        }
        else{
            card.style.display = "none";
        }
    })
})

let all_btn = document.querySelector('.all_btn');
all_btn.addEventListener("click",()=>{
    card.forEach(card =>{
        card.style.display = "flex";
       })
})

let category_input = document.querySelector('.category-input');

category_input.addEventListener("input",()=>{
    card.forEach(card =>{
     let card_category = card.getAttribute('category-value');

        if(category_input.value == ""){
            card.style.display = "flex";
        }
       else if(category_input.value == card_category ){
            card.style.display = "flex";
        }
        else{
            card.style.display = "none";
        }
    })
})


let created_input = document.querySelector('.created');

created_input.addEventListener("input",()=>{
    card.forEach(card =>{
     let card_created = card.getAttribute('created-value');

        if(created_input.value == ""){
            card.style.display = "flex";
        }
       else if(card_created.includes(created_input.value) ){
            card.style.display = "flex";
        }
        else{
            card.style.display = "none";
        }
    })
})



